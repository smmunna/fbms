<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all locations, order by descending order, and paginate
        $locations = Location::orderBy('created_at', 'desc')->paginate(10);

        // Return view with locations data
        return view('pages.admin.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.location.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Create a new location instance
        $location = new Location();
        $location->name = $request->input('name');
        // Set other fields as needed

        // Save the location
        $location->save();

        // Redirect back with a success message
        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
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
        $location = Location::findOrFail($id);
        return view('pages.admin.location.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Find the location by ID
        $location = Location::findOrFail($id);
        // Update the location attributes
        $location->name = $request->input('name');
        // Set other fields as needed

        // Save the updated location
        $location->save();

        // Redirect back with a success message
        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        // Find the location by ID
        $location = Location::findOrFail($id);
        // Delete the location
        $location->delete();

        // Redirect back with a success message
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
