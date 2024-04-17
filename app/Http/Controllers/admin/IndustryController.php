<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator, Str;
use App\Models\{Industry, IndustryList};

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = IndustryList::with('type')->orderBy('created_at','DESC')->get();
        return view('admin.pages.industry.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Industry::get();
        return view('admin.pages.industry.add', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('industry_lists', 'name'),
        ]);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconFileName = $icon->getClientOriginalName();

            $icon->move(public_path('industryimages'), $iconFileName);

            $iconPath = 'industryimages/' . $iconFileName;

            $industry = new IndustryList();
            $industry->name = $request->input('name');
            $industry->industry_id = $request->input('type');
            $industry->description = $request->input('description');
            $industry->icon = $iconPath;
            // $technology->slug = Str::slug($request->input('name', '_'));
            // dd($technology);
            $industry->save();

            return redirect()->route('admin.industry.index')->with('success', 'Industry added successfully!');
        }

        return redirect()->back()->withErrors(['error' => 'Please upload a file.']);
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
    public function edit(IndustryList $industry)
    {
        $types = Industry::all();
        return view('admin.pages.industry.add', compact('industry','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IndustryList $industry)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('industry_lists', 'name')->ignore($industry->id),
        ]);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconFileName = $icon->getClientOriginalName();

            $icon->move(public_path('industryimages'), $iconFileName);

            $technology->icon = 'industryimages/' . $iconFileName;
        }

        $industry->name = $request->input('name');
        $industry->industry_id = $request->input('type');
        $industry->description = $request->input('description');

        $industry->save();

        return redirect()->route('admin.industry.index')->with('success', 'Industry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $technology = IndustryList::find($request->id);
        $technology->delete();

        return true;
    }
}
