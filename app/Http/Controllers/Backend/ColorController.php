<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('backend.color.manage', compact('colors'));
    }


    public function create()
    {
        return view('backend.color.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required|string',
        ]);

        $colorArray = array_filter(array_map('trim', explode(',', $request->color)));

        if (empty($colorArray)) {
            return redirect()->back()->with('error', 'Color field is empty!');
        }

        Color::create([
            'color' => json_encode($colorArray),
            'status' => 0,
        ]);

        return redirect()->route('color.index')->with('message', 'Color inserted successfully!');
    }




    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $color = Color::findOrFail($id);
        $colors = json_decode($color->color);

        return view('backend.color.edit', compact('color', 'colors'));
    }


    public function update(Request $request, $id)
    {
        $color = Color::findOrFail($id);

        $colorArray = explode(',', $request->color);
        $color->color = json_encode($colorArray);
        $color->save();

        return redirect()->route('color.index')->with('message', 'Color updated successfully!');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('color.index')->with('message', 'color deleted successfully!');
    }

    public function change_status_color(Request $request, Color $color)
    {

        $color->status = $color->status == 1 ? 0 : 1;
        $color->save();
        return redirect()->back()->with('message', 'Color status updated successfully!');
    }
}
