<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function createUser(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'role' => 'required|in:user,owner',
            'name' => 'required|string',
            'password' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'present_address' => 'required|string',
            'permanent_address' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

        if ($request->hasFile('photo')) {
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

            // Create the new user
            $user = new User();
            $user->role = $request->role;
            $user->name = $request->name;
            $user->password = Hash::make($request->password); // Hash the password
            $user->photo = $path;
            $user->present_address = $request->present_address;
            $user->permanent_address = $request->permanent_address;
            $user->country = $request->country;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('login')->with('success', 'Registration Successful.');
        }
        // Redirect to login page with success message
    }
}
