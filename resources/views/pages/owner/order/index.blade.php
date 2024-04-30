@extends('layouts.dashboard_layout')
@section('title', 'Bookings')

@section('dash_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Bookings</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Flat ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Transaction ID</th>
                                <th>Booking Date</th>
                                <th>Action</th> <!-- New heading for actions -->
                                <!-- Add more table headings as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->flat_id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->amount }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->transaction_id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <a href="{{ route('owner.invoice', $order->id) }}" class="btn btn-info">Invoice</a>
                                    </td>
                                    <!-- Add more table cells with corresponding data from flats table -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
