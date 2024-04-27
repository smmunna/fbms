<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::orderBy('id', 'desc')->paginate(10); // Assuming 10 properties per page
        return view('pages.admin.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.property.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255', // Adjust validation rules as needed
        ]);

        // Create a new instance of the Property model
        $property = new Property();

        // Set the property name from the request
        $property->name = $request->input('name');

        // Save the property to the database
        $property->save();

        // Redirect back to the index page with a success message
        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
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
        // Find the property by its ID
        $property = Property::findOrFail($id);

        // Return the edit view with the property data
        return view('pages.admin.property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255', // Adjust validation rules as needed
        ]);

        // Find the property by its ID
        $property = Property::findOrFail($id);

        // Update the property's attributes with the data from the request
        $property->name = $request->input('name');

        // Save the updated property to the database
        $property->save();

        // Redirect back to the index page with a success message
        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);

        // Delete the property
        $property->delete();

        // Redirect back to the properties index page with a success message
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
