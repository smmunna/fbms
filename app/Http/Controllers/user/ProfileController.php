<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //get profile
    public function index()
    {
        return view('pages.profile.index');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('pages.profile.edit', compact('user'));
    }
    // Method to update the user profile
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'present_address' => 'required|string',
            'permanent_address' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string|min:11',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow null for photo, and validate if it's an image file
            // Add other validation rules as needed
        ]);

        $user = auth()->user();

        // Retrieve the path of the existing image from the database
        $existingImagePath = $user->photo;

        // Update the user profile fields except for the photo
        DB::table('users')
            ->where('id', $user->id)
            ->update($request->except(['photo', '_token', '_method']));

        if ($request->hasFile('photo')) {
            // Delete the existing photo if it exists
            if ($existingImagePath) {
                Storage::disk('public')->delete($existingImagePath);
            }

            // Get the file from the request
            $image = $request->file('photo');

            // Generate a unique ID for the file name
            $uniqueId = uniqid();

            // Get the current date and time
            $currentDateTime = now()->format('Ymd_His');

            // Get the original file name
            $originalFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            // Construct the new file name
            $fileName = $originalFileName . '_' . $currentDateTime . '_' . $uniqueId . '.' . $image->getClientOriginalExtension();

            // Store the image in the storage directory with the constructed file name
            $path = $image->storeAs('images', $fileName, 'public');

            // Update the user's image field in the database
            DB::table('users')
                ->where('id', $user->id)
                ->update(['photo' => $path]);
        }

        // Redirect back to the profile page with a success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
