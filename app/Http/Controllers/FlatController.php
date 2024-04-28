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

    // Search Flats
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
            'sale_status' => 'required',
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
            'sale_status' => 'required',
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


    // For Admin Page;
    public function adminPendingFlats()
    {
        $flats = Flat::where('status', 'pending')->orderByDesc('created_at')->paginate(10);
        return view('pages.admin.flats.pending_flat', compact('flats'));
    }

    public function adminFlatDetails(string $id)
    {
        // dd($id);
        // Retrieve the flat from the database based on its ID
        $flat = DB::table('flats')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('flats.*', 'users.name as owner_name', 'users.photo as owner_photo', 'users.email as owner_email', 'users.phone as owner_phone')
            ->where('flats.flat_id', $id)
            ->first();

        // Check if the flat exists
        if (!$flat) {
            abort(404); // or handle the case when the flat does not exist
        }

        // Pass the retrieved data to the view for rendering
        return view('pages.admin.flats.flat_details', compact('flat'));
    }

    // public flat details
    public function publicFlatDetails(string $id)
    {
        // dd($id);
        // Retrieve the flat from the database based on its ID
        $flat = DB::table('flats')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('flats.*', 'users.name as owner_name', 'users.photo as owner_photo', 'users.email as owner_email', 'users.phone as owner_phone')
            ->where('flats.flat_id', $id)
            ->first();

        // Showing the comments
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name as user_name', 'users.photo as user_photo')
            ->where('comments.flat_id', $id)
            ->orderByDesc('comments.created_at') // Order by created_at in descending order
            ->paginate(10);

        // dd($comments);

        // Check if the flat exists
        if (!$flat) {
            abort(404); // or handle the case when the flat does not exist
        }

        // Pass the retrieved data to the view for rendering
        return view('pages.home.flat_details', compact('flat', 'comments'));
    }

    public function adminApproveFlat(string $id)
    {
        $flat = DB::table('flats')->where('flat_id', $id)->first();
        DB::table('flats')->where('flat_id', $id)->update(['status' => 'approved']);
        return redirect()->route('pending.flat')->with('success', 'Flat approved successfully.');
    }

    public function adminDestroyPending(string $id)
    {
        // Find the flat record
        $flat = DB::table('flats')->where('flat_id', $id)->first();

        $photoPath = $flat->photo;
        if ($photoPath) {
            Storage::disk('public')->delete($photoPath);
            // Delete the flat record from the database
            DB::table('flats')->where('flat_id', $id)->delete();

            return redirect()->route('pending.flat')->with('success', 'Pending Flat deleted successfully.');
        }

        return redirect()->route('pending.flat')->with('error', 'Flat not found.');
    }

    public function adminAllFlat()
    {
        $flats = Flat::where('status', 'approved')->orderByDesc('created_at')->paginate(10);
        return view('pages.admin.flats.all_flat', compact('flats'));
    }

    public function adminSearchAllFlat(Request $request)
    {
        // Perform the search based on multiple criteria
        $searchQuery = $request->input('search');

        $flats = DB::table('flats')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('flats.*', 'users.name as owner_name', 'users.photo as owner_photo', 'users.email as owner_email', 'users.phone as owner_phone')
            ->where('flats.status', 'approved') // Filter only flats with "approved" status
            ->where(function ($query) use ($searchQuery) {
                $query->where('flats.location', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('flats.size', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('flats.bed', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('flats.bath', 'LIKE', "%{$searchQuery}%");
            })
            ->get();

        return view('pages.admin.flats.all_flat', compact('flats'));
    }

    // Toogle Feature, isFeature true or false
    public function toggleFeatured(Request $request, $id)
    {
        // Validate request data if needed

        // Retrieve the current featured status of the flat
        $currentStatus = DB::table('flats')->where('flat_id', $id)->value('featured');

        // Toggle the featured status
        $newStatus = $currentStatus === 'true' ? 'false' : 'true';

        // Update the flat's featured status in the database
        DB::table('flats')->where('flat_id', $id)->update(['featured' => $newStatus]);

        // Redirect back to the previous page or any other desired page
        return back()->with('success', 'Featured status changed successfully.');
    }
}
