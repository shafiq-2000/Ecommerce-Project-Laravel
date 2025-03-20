<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function index()
    {
        $sizes = Size::all();
        return view('backend.size.manage', compact('sizes'));
    }


    public function create()
    {
        return view('backend.size.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required|string',
        ]);

        $sizeArray = array_filter(array_map('trim', explode(',', $request->size)));

        if (empty($sizeArray)) {
            return redirect()->back()->with('error', 'Size field is empty!');
        }

        Size::create([
            'size' => json_encode($sizeArray),
            'status' => 0,
        ]);

        return redirect()->route('size.index')->with('message', 'Size inserted successfully!');
    }




    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $size = Size::findOrFail($id);
        $sizes = json_decode($size->size);

        return view('backend.size.edit', compact('size', 'sizes'));
    }


    public function update(Request $request, $id)
    {
        $size = Size::findOrFail($id);

        $sizeArray = explode(',', $request->size);
        $size->size = json_encode($sizeArray);
        $size->save();

        return redirect()->route('size.index')->with('message', 'Size updated successfully!');
    }

    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('size.index')->with('message', 'size deleted successfully!');
    }

    public function change_status_size(Request $request, Size $size)
    {

        $size->status = $size->status == 1 ? 0 : 1;
        $size->save();
        return redirect()->back()->with('message', 'Size status updated successfully!');
    }
}
