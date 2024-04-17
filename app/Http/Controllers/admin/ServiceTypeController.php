<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator, Str;
use App\Models\{Service, ServiceList};

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.pages.service.types.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.service.types.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('services', 'name'),
        ]);

        $type = new Service();
        $type->name = $request->name;
        $type->save();

        return redirect()->route('admin.service_type.index')->with('success', 'Service type added successfully!');
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
        $service = Service::find($id);
        return view('admin.pages.service.types.add', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => Rule::unique('services', 'name')->ignore($id),
        ]);
        $technology = Service::where('id',$id)->first();
        $technology->name = $request->input('name');

        $technology->save();

        return redirect()->route('admin.service_type.index')->with('success', 'Service type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $typeData = ServiceList::where('service_id', $request->id)->first();
        if($typeData){
            return 'false';
        }
        $technology = Service::find($request->id)->delete();

        return 'true';
    }
}
