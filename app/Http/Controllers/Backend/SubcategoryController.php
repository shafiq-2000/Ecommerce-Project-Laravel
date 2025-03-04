<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Exception;

class SubcategoryController extends Controller
{

    public function index()
    {
        $subcategories = Subcategory::all();
        return view('backend.subcategory.manage', compact('subcategories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategory.create', compact('categories'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'cat_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Subcategory::create([
            'name' => $request->name,
            'cat_id' => $request->cat_id,
            'description' => $request->description,
            'status' => 0,
        ]);

        return redirect()->route('subcategories.index')->with('message', 'Subcategory insert successfully!');
    }



    public function show(Subcategory $subcategory)
    {
        //
    }

    public function edit(string $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $category = Category::all();

        return view('backend.subcategory.edit', compact('category', 'subcategory'));
    }


    public function update(Request $request, Subcategory $subcategory)
    {

        $request->validate([
            'name' => 'required|string',
            'cat_id' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);
        $subcategory->update([
            'name' => $request->name,
            'cat_id' => $request->cat_id ?? $subcategory->cat_id,
            'description' => $request->description,

        ]);
        return redirect()->route('subcategories.index')->with('message', 'Subcategory update successfully!');

    }


    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('message', 'Subcategory deleted successfully!');
    }

    public function change_status_sub(Request $request, Subcategory $subcategory)
    {

        $subcategory->status = $subcategory->status == 1 ? 0 : 1;
        $subcategory->save();
        return redirect()->back()->with('message', 'subcategory status updated successfully!');
    }
}
