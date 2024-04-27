<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $flats = Flat::where('owner_id', $userId)->orderByDesc('created_at')->paginate(10);
        return view('pages.owner.flats.index', compact('flats'));
    }

    public function search(Request $request)
    {
        // Get the search query
        $searchQuery = $request->input('search');

        // Perform the search based on multiple criteria
        $flats = DB::table('flats')
            ->where('location', 'LIKE', "%{$searchQuery}%")
            ->orWhere('status', 'LIKE', "%{$searchQuery}%")
            ->orWhere('size', 'LIKE', "%{$searchQuery}%")
            ->orWhere('bed', 'LIKE', "%{$searchQuery}%")
            ->orWhere('bath', 'LIKE', "%{$searchQuery}%")
            ->get();

        // Pass the search results to the view
        return view('pages.owner.flats.index', compact('flats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        $propertyTypes = Property::all();
        return view('pages.owner.flats.create', compact('locations', 'propertyTypes'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric',
            'property_type' => 'required',
            'size' => 'required|numeric',
            'bed' => 'required|numeric',
            'bath' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // 2MB max size
        ]);

        // Process the photo upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $fileName, 'public');
            $validatedData['photo'] = $path;
        }

        // Set the owner_id to the ID of the authenticated user
        $validatedData['owner_id'] = Auth::id();
        // Create the flat
        DB::table('flats')->insert($validatedData);

        return redirect()->route('flats.index')->with('success', 'Flat created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        // Retrieve the flat from the database based on its ID
        $flat = DB::table('flats')->where('flat_id', $id)->first();

        // Check if the flat exists
        if (!$flat) {
            abort(404); // or handle the case when the flat does not exist
        }

        // Pass the retrieved data to the view for rendering
        return view('pages.owner.flats.show', compact('flat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the flat and location data from the database
        $flat = DB::table('flats')->where('flat_id', $id)->first();
        $locations = DB::table('locations')->get();
        $properties = DB::table('properties')->get();

        // Pass the retrieved data to the view for editing
        return view('pages.owner.flats.edit', compact('flat', 'locations', 'properties'));
    }


    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric',
            'property_type' => 'required',
            'size' => 'required|numeric',
            'bed' => 'required|numeric',
            'bath' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // 2MB max size
        ]);

        $flat = DB::table('flats')->where('flat_id', $id)->first();

        if ($request->hasFile('photo')) {
            // Delete the previous photo if it exists
            $photoPath = $flat->photo;
            if ($photoPath) {
                Storage::disk('public')->delete($photoPath);
            }
            // Upload the new photo
            $image = $request->file('photo');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $fileName, 'public');
            $validatedData['photo'] = $path;
        }

        // Update the flat
        DB::table('flats')->where('flat_id', $id)->update($validatedData);

        return redirect()->route('flats.index')->with('success', 'Flat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the flat record
        $flat = DB::table('flats')->where('flat_id', $id)->first();

        $photoPath = $flat->photo;
        if ($photoPath) {
            Storage::disk('public')->delete($photoPath);
            // Delete the flat record from the database
            DB::table('flats')->where('flat_id', $id)->delete();

            return redirect()->route('flats.index')->with('success', 'Flat deleted successfully.');
        }

        return redirect()->route('flats.index')->with('error', 'Flat not found.');
    }
}
