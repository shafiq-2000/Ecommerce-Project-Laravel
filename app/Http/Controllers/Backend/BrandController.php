<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        return view('backend.brands.manage', compact('brands'));
    }


    public function create()
    {
        return view('backend.brands.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 0,
        ]);

        return redirect()->route('brands.index')->with('message', 'Brand insert successfully!');
    }


    public function show(Brand $brand)
    {
        //
    }


    public function edit(string $id)
    {
        $brands = Brand::findOrFail($id);
        return view('backend.brands.edit', compact('brands'));
    }

    public function update(Request $request, Brand $Brand)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $Brand->update([
            'name' => $request->name,
            'description' => $request->description,

        ]);
        return redirect()->route('brands.index')->with('message', 'Brand update successfully!');
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('message', 'Brand deleted successfully!');
    }

    public function change_status_brand(Request $request, Brand $brand)
    {

        $brand->status = $brand->status == 1 ? 0 : 1;
        $brand->save();
        return redirect()->back()->with('message', 'brand status updated successfully!');
    }
}
