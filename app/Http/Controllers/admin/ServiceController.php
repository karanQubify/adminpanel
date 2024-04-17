<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Service, ServiceList};
use Illuminate\Validation\Rule;
use Validator, Str;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServiceList::with('type')->orderBy('created_at','DESC')->get();        
        return view('admin.pages.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Service::get();
        return view('admin.pages.service.add', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('service_lists', 'name'),
        ]);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconFileName = $icon->getClientOriginalName();

            $icon->move(public_path('serviceimages'), $iconFileName);

            $iconPath = 'serviceimages/' . $iconFileName;

            $service = new ServiceList();
            $service->name = $request->input('name');
            $service->service_id = $request->input('type');
            $service->description = $request->input('description');
            $service->icon = $iconPath;
            // $technology->slug = Str::slug($request->input('name', '_'));
            // dd($technology);
            $service->save();

            return redirect()->route('admin.service.index')->with('success', 'Service added successfully!');
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
    public function edit(ServiceList $service)
    {
        $types = Service::get();
        return view('admin.pages.service.add', compact('service','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceList $service)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('service_lists', 'name')->ignore($service->id),
        ]);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconFileName = $icon->getClientOriginalName();

            $icon->move(public_path('serviceimages'), $iconFileName);

            $service->icon = 'serviceimages/' . $iconFileName;
        }

        $service->name = $request->input('name');
        $service->service_id = $request->input('type');
        $service->description = $request->input('description');

        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $technology = ServiceList::find($request->id)->delete();

        return true;
    }
}
