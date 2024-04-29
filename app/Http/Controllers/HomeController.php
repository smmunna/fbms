<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function allProperties()
    {
        $properties = DB::table('flats')
            ->orderByDesc('created_at')
            ->paginate(6);

        // return view('pages.home.all_property', compact('properties'));

        // Retrieve all locations and property types for filtering options
        $locations = Location::all();
        $propertyTypes = Property::all();

        return view('pages.home.all_property', compact('properties', 'locations', 'propertyTypes'));
    }
    public function filter(Request $request)
    {
        // Start building the query for filtering
        $query = DB::table('flats');

        // Filter by location if provided
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Filter by property type if provided
        if ($request->filled('property_type')) {
            $query->where('property_type', $request->property_type);
        }

        // Search by title, size, bed, bath if search query provided
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('size', 'like', '%' . $search . '%')
                    ->orWhere('bed', 'like', '%' . $search . '%')
                    ->orWhere('bath', 'like', '%' . $search . '%');
            });
        }

        // Get paginated results
        $properties = $query->paginate(6);

        // Retrieve all locations and property types for filtering options
        $locations = DB::table('locations')->get();
        $propertyTypes = DB::table('properties')->get();

        return view('pages.home.all_property', compact('properties', 'locations', 'propertyTypes'));
    }

    // Properties by type
    public function showPropertiesByType($propertyType)
    {
        // Fetch flats based on the specified property type
        $properties = DB::table('flats')
            ->where('property_type', $propertyType)
            ->where('status', 'approved')
            ->orderByDesc('created_at')
            ->paginate(10);

        // Pass the fetched data to the view
        return view('pages.home.properties_by_type', compact('properties'));
    }
}
