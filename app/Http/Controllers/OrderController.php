<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch data from the orders table and join it with the flats table
        $orders = DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->select('orders.*', 'orders.status as order_status', 'flats.*') // Select columns from both tables
            ->paginate(10);

        // dd($orders);

        // Pass the data to the view
        return view('pages.admin.orders.index', ['orders' => $orders]);
    }

    // Search Bookings
    public function search(Request $request)
    {
        // Get the search query parameters
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $transactionId = $request->input('transaction_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query the orders table and join with the flats table
        $query = DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->select('orders.*', 'orders.status as order_status', 'flats.*');

        // Apply filters based on the search parameters
        if ($name) {
            $query->where('orders.name', 'LIKE', "%$name%");
        }
        if ($email) {
            $query->where('orders.email', 'LIKE', "%$email%");
        }
        if ($phone) {
            $query->where('orders.phone', 'LIKE', "%$phone%");
        }
        if ($transactionId) {
            $query->where('orders.transaction_id', 'LIKE', "%$transactionId%");
        }
        if ($startDate && $endDate) {
            $query->whereBetween('orders.created_at', [$startDate, $endDate]);
        }

        // Fetch the filtered bookings
        $bookings = $query->paginate(10);

        // Pass the filtered bookings to the view
        return view('pages.admin.orders.index', ['orders' => $bookings]);
    }

    // admin Invoice
    public function adminInvoice(string $id)
    {
        $orders = DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'flats.*', 'users.name as owner_name', 'users.email as owner_email', 'users.phone as owner_phone', 'users.present_address as owner_address')
            ->where('orders.id', $id)
            ->first(); // Retrieve only the first item

        // dd($orders);

        return view('pages.admin.orders.invoice', ['orders' => $orders]);
    }

    // admin Invoice PDF Download
    public function adminInvoicePDF(string $id)
    {
        $orders = DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'flats.*', 'users.name as owner_name', 'users.email as owner_email', 'users.phone as owner_phone', 'users.present_address as owner_address')
            ->where('orders.id', $id)
            ->first(); // Retrieve only the first item

        // return view('pages.admin.orders.invoice_pdf', ['orders' => $orders]);
        $pdf = PDF::loadView('pages.admin.orders.invoice_pdf', ['orders' => $orders]);
        return $pdf->download('invoice.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $entity = DB::table('orders')->where('id', $id)->first();
        // dd($entity);
        // Pass the entity and dropdown options to the view
        return view('pages.admin.orders.edit', ['entity' => $entity]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $order)
    // {
    //     // Update entity attributes based on the request
    //     DB::table('orders')->where('id', $order)->update([
    //         'status' => $request->input('status'), // Assuming 'status' is the attribute to be updated
    //         // Add other attributes to be updated
    //     ]);

    //     // Redirect back or to a different page after updating
    //     return redirect()->route('orders.index');
    // }

    public function update(Request $request, string $order)
    {
        // Update entity attributes based on the request
        DB::table('orders')->where('id', $order)->update([
            'status' => $request->input('status'), // Assuming 'status' is the attribute to be updated
            // Add other attributes to be updated
        ]);

        // Check if the status is 'Completed' and update the booking_status in flats table accordingly
        if ($request->input('status') === 'Completed') {
            $orderData = DB::table('orders')->where('id', $order)->first();
            if ($orderData) {
                DB::table('flats')
                    ->where('flat_id', $orderData->flat_id)
                    ->update(['booking_status' => 'booked']);
            }
        }

        // Redirect back or to a different page after updating
        return redirect()->route('orders.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
