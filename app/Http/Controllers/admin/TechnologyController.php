<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator, Str;
use App\Http\Requests\TechnologyRequest;
use App\Models\{Technology, TechnologyList};


class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = TechnologyList::with('type')->orderBy('created_at','DESC')->get();
        // echo "<pre>";
        // print_r($technologies);
        // die;
        return view('admin.pages.technology.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Technology::get();
        return view('admin.pages.technology.add', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyRequest $request)
    {
        unset($request['_token']);
        // Handle file upload
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconFileName = $icon->getClientOriginalName();

            $icon->move(public_path('techimages'), $iconFileName);

            $iconPath = 'techimages/' . $iconFileName;
            
        }

        TechnologyList::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'icon' => $iconPath,
            'technology_id' => $request->input('type')
        ]);

        return redirect()->route('admin.technology.index')
            ->with('success', 'Technology added successfully!');
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
    public function edit(TechnologyList $technology)
    {   
        $types = Technology::all();
        return view('admin.pages.technology.add', compact('technology','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechnologyRequest $request, TechnologyList $technology)
    {
        
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconFileName = $icon->getClientOriginalName();

            $icon->move(public_path('techimages'), $iconFileName);

            $technology->icon = 'techimages/' . $iconFileName;
        }

        $technology->name = $request->input('name');
        $technology->technology_id = $request->input('type');
        $technology->description = $request->input('description');

        $technology->save();

        return redirect()->route('admin.technology.index')->with('success', 'Technology updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $technology = TechnologyList::find($request->id);
        $technology->delete();

        return true;
    }
}
