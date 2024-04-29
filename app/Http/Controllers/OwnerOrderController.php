<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerOrderController extends Controller
{
    //
    public function index()
    {
        $loggedInUserId = auth()->id();
    
        $orders = DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->select('orders.*', 'orders.status as order_status', 'flats.*')
            ->where('flats.owner_id', $loggedInUserId)
            ->orderByDesc('orders.created_at') // Order by created_at column in descending order
            ->paginate(10); // Paginate the results with 10 items per page
    
        return view('pages.owner.order.index', ['orders' => $orders]);
    }
    
}
