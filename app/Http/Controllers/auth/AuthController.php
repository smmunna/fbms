<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    function loginpage(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => $request->role])) {
            // Authentication successful
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    // Redirect to the admin dashboard
                    return redirect()->route('admin.dashboard');
                    break;
                case 'user':
                    // Redirect to the teacher dashboard
                    return redirect()->route('user.dashboard');
                    break;
                case 'owner':
                    // Redirect to the parent dashboard
                    return redirect()->route('owner.dashboard');
                    break;
                default:
                    // Redirect to the default dashboard or the intended URL
                    return redirect()->intended('/');
                    break;
            }
        }
        // Authentication failed
        return redirect()->back()->with('loginError', 'Invalid username or password');
    }


    //Logout
    function logout()
    {
        // dd($request->all());
        Auth::logout();
        return redirect()->route('login');
    }
}
