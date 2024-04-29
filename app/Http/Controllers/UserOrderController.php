<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class UserOrderController extends Controller
{
    //
    public function userOrder()
    {
        $userEmail = auth()->user()->email;

        $orders = DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->select('orders.*', 'orders.status as order_status', 'flats.*') // Select columns from both tables
            ->where('orders.email', $userEmail) // Filter by the logged-in user's email
            ->get();

        return view('pages.user.user_order', ['orders' => $orders]);
    }

    public function userInvoice($id)
    {
        $orders = DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'flats.*', 'orders.status as order_status', 'users.name as owner_name', 'users.email as owner_email', 'users.phone as owner_phone','users.present_address as owner_address')
            ->where('orders.id', $id)
            ->first(); // Retrieve only the first item

        // dd($orders);

        return view('pages.user.user_invoice', ['orders' => $orders]);
    }

    public function userInvoicePDF(string $id)
    {
        $orders = DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'flats.*','orders.status as order_status', 'users.name as owner_name', 'users.email as owner_email', 'users.phone as owner_phone','users.present_address as owner_address')
            ->where('orders.id', $id)
            ->first(); // Retrieve only the first item

        // return view('pages.admin.orders.invoice_pdf', ['orders' => $orders]);
        $pdf = PDF::loadView('pages.user.user_invoice_pdf', ['orders' => $orders]);
        return $pdf->download('invoice.pdf');
    }
}
