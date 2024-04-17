<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator, Str;
use App\Models\{Industry, IndustryList};

class IndustryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = Industry::all();
        return view('admin.pages.industry.types.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.industry.types.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('industries', 'name'),
        ]);

        $type = new Industry();
        $type->name = $request->name;
        $type->save();

        return redirect()->route('admin.industry_type.index')->with('success', 'Industry type added successfully!');
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
    public function edit(string $id)
    {
        $industry = Industry::find($id);
        return view('admin.pages.industry.types.add', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('industries', 'name')->ignore($id),
        ]);
        $industry = Industry::where('id',$id)->first();
        $industry->name = $request->input('name');

        $industry->save();

        return redirect()->route('admin.industry_type.index')->with('success', 'Industry type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $typeData = IndustryList::where('industry_id', $request->id)->first();
        if($typeData){
            return 'false';
        }
        $technology = Industry::find($request->id)->delete();

        return 'true';
    }
}
