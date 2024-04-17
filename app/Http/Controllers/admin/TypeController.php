<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\{Type};
use Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::get();
        return view('admin.pages.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.type.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('types', 'name'),
        ]);
        // if (count($validatedData) > 0) {
        //     return redirect()->back()->withErrors($validatedData)->withInput();
        // }
        $type = new Type();
        $type->name = $request->name;
        $type->type = $request->type;
        $type->save();


        return redirect()->route('admin.types.index')->with('success', 'Type created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.pages.type.add', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('types', 'name')->ignore($type->id),
        ]);
        $data= $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $type->name = $data['name'];
        $type->type = $data['type'];
        $type->update();

        return redirect()->route('admin.types.index')->with('success', 'Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $type = Type::find($request->id);
        $type->delete();

        return true;
    }
}
