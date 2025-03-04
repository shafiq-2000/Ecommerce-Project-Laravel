<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('backend.category.manage', compact('categories'));
    }


    public function create()
    {
        return view('backend.category.create');
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:9000',
            ]);
            $name = ucwords($request->name);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/category'), $imageName);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Image not found.']);
            }

            Category::create([
                'name' => $name,
                'description' => $request->description,
                'image' => $imageName,
                'status' => 0,
            ]);

            return redirect()->route('categories.index')->with('message', 'Category insert successfully!');
        } catch (Exception $e) {

            return response()->json([
                'status' => 'failed',
                'message' => 'Upload Failed-->' . $e->getMessage(),
            ], 200);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $categories = Category::findOrFail($id);
        return view('backend.category.edit', compact('categories'));
    }

    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9000',
            ]);

            $name = ucwords($request->name);
            $imageName = $category->image;

            if ($request->hasFile('image')) {
                $deleteOldImage = public_path('images/category/' . $category->image);
                if (file_exists($deleteOldImage)) {
                    File::delete($deleteOldImage); // File delete
                }

                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/category'), $imageName); // Move image to folder
            }

            $category->update([
                'name' => $name,
                'description' => $request->description,
                'image' => $imageName,
            ]);

            return redirect()->route('categories.index', $category->id)->with('message', 'Category updated successfully!');
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Update Failed --> ' . $e->getMessage(),
            ], 200);
        }
    }


    public function destroy(string $id)
    {
        $category = Category::find($id);
        $imagePath = public_path('images/category/' . $category->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $category->delete();
        return redirect()->back()->with('message', 'Category Delete successfully!');
    }

    public function change_status(Request $request, Category $category)
    {

        $category->status = $category->status == 1 ? 0 : 1;
        $category->save();
        return redirect()->back()->with('message', 'Category status updated successfully!');
    }
}
