<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;

use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::all();
        return view('backend.unit.manage', compact('units'));
    }


    public function create()
    {
        return view('backend.unit.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Unit::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 0,
        ]);

        return redirect()->route('unit.index')->with('message', 'Unit insert successfully!');
    }


    public function show(Unit $unit)
    {
        //
    }

    public function edit($id)
    {
        $units = Unit::findOrFail($id);
        return view('backend.unit.edit', compact('units'));
    }


    public function update(Request $request, Unit $Unit)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $Unit->update([
            'name' => $request->name,
            'description' => $request->description,

        ]);
        return redirect()->route('unit.index')->with('message', 'Unit update successfully!');
    }


    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('unit.index')->with('message', 'Unit deleted successfully!');
    }

    public function change_status_unit(Request $request, Unit $unit)
    {

        $unit->status = $unit->status == 1 ? 0 : 1;
        $unit->save();
        return redirect()->back()->with('message', 'Unit status updated successfully!');
    }
}
