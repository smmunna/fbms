<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('pages.dashboard.dashboard');
    }

    // Owner List
    public function ownerList()
    {
        $owners = User::where('role', 'owner')->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.user.owner_list', compact('owners'));
    }
}
