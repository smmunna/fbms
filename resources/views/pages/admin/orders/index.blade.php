@extends('layouts.dashboard_layout')
@section('title', 'Bookings')

@section('dash_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Bookings</h2>
                <div class="mb-4">
                    <form action="{{ route('orders.search') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="transaction_id">Transaction ID:</label>
                                    <input type="text" class="form-control" name="transaction_id" id="transaction_id">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" class="form-control" name="start_date" id="start_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date">
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
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
                                <th>Date</th>
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
                                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('orders.adminInvoice', $order->id) }}"
                                            class="btn btn-info">Invoice</a>
                                    </td>
                                    <!-- Add more table cells with corresponding data from flats table -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination links -->
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
