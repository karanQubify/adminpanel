<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator, Str;
use App\Models\{Technology, TechnologyList};


class TechnologyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Technology::all();
        return view('admin.pages.technology.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.technology.types.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('technologies', 'name'),
        ]);

        $type = new Technology();
        $type->name = $request->name;
        $type->save();

        return redirect()->route('admin.technology_type.index')->with('success', 'Technology type added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $technology = Technology::find($id);
        return view('admin.pages.technology.types.add', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('technologies', 'name')->ignore($id),
        ]);
        $technology = Technology::where('id',$id)->first();
        $technology->name = $request->input('name');

        $technology->save();

        return redirect()->route('admin.technology_type.index')->with('success', 'Technology type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $typeData = TechnologyList::where('technology_id', $request->id)->first();
        if($typeData){
            return 'false';
        }
        $technology = Technology::find($request->id)->delete();

        return 'true';
    }
}
