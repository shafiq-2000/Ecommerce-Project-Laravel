<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('backend.product.manage', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('backend.product.create', compact('categories', 'subcategories', 'brands', 'units', 'sizes', 'colors'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required|integer',
            'name' => 'required|string',
            'cat_id' => 'required|integer',
            'subcat_id' => 'nullable|integer',
            'br_id' => 'nullable|integer',
            'unit_id' => 'nullable|integer',
            'size_id' => 'nullable|integer',
            'color_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:80000',
        ]);

        $uploadedImages = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/product'), $filename);
                $uploadedImages[] = $filename;
            }
        }

        Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'cat_id' => $request->cat_id,
            'subcat_id' => $request->subcat_id,
            'br_id' => $request->br_id,
            'unit_id' => $request->unit_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'description' => $request->description,
            'price' => $request->price,
            'image' => json_encode($uploadedImages),
            'status' => 1,
        ]);

        return redirect()->route('products.index')->with('message', 'Product inserted successfully!');
    }



    public function show(Product $product)
    {
        //
    }


    public function edit(string $id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        $product = Product::findOrFail($id);
        return view('backend.product.edit', compact('categories', 'subcategories', 'brands', 'units', 'sizes', 'colors', 'product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|integer',
            'name' => 'required|string',
            'cat_id' => 'nullable|integer',
            'subcat_id' => 'nullable|integer',
            'br_id' => 'nullable|integer',
            'unit_id' => 'nullable|integer',
            'size_id' => 'nullable|integer',
            'color_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:80000',
        ]);

        $product = Product::findOrFail($id);
        $uploadedImages = [];

        // new image add and old image delete
        if ($request->hasFile('image')) {
            // old image delete
            $oldImages = json_decode($product->image);
            if (is_array($oldImages)) {
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path('images/product/' . $oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            // new image upload
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/product'), $filename);
                $uploadedImages[] = $filename;
            }
        } else {
            // if,image not upload
            $uploadedImages = json_decode($product->image);
        }

        // db update
        $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'cat_id'     => $request->cat_id     ?? $product->cat_id,
            'subcat_id'  => $request->subcat_id  ?? $product->subcat_id,
            'br_id'      => $request->br_id      ?? $product->br_id,
            'unit_id'    => $request->unit_id    ?? $product->unit_id,
            'size_id'    => $request->size_id    ?? $product->size_id,
            'color_id'   => $request->color_id   ?? $product->color_id,
            'description' => $request->description,
            'price'      => $request->price,
            'image'      => json_encode($uploadedImages),
            'status'     => $product->status,
        ]);

        return redirect()->route('products.index')->with('message', 'Product updated successfully!');
    }


    public function destroy(string $id)
    {
        $product = Product::find($id);

        $images = json_decode($product->image);

        if ($images) {
            foreach ($images as $img) {
                $imagePath = public_path('images/product/' . $img);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $product->delete();

        return redirect()->back()->with('message', 'Product deleted successfully!');
    }


    public function change_status_product(Product $product)
    {

        $product->status = $product->status == 1 ? 0 : 1;
        $product->save();
        return redirect()->back()->with('message', 'Product status updated successfully!');
    }
}
