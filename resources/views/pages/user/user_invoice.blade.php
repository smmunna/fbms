@extends('layouts.dashboard_layout')
@section('title', 'Invoice')

@section('dash_content')
    <!-- Main content -->
    <div class="invoice mt-2 p-3 mb-3 ">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> FBMS, Inc.
                    <small class="float-right">Date: {{ date('m/d/Y', strtotime($orders->created_at)) }}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>FBMS, Inc.</strong><br>
                    Dhaka, Bangladesh<br>
                    Phone: +8801918218962<br>
                    Email: admin@gmail.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{ $orders->name }}</strong><br>
                    {{ $orders->address }}<br>
                    Phone: {{ $orders->phone }}<br>
                    Email: {{ $orders->email }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Order ID #{{ $orders->id }}</b><br>
                <br>
                <b>Transaction ID:</b> {{ $orders->transaction_id }}<br>
                <b>Order Status:</b> {{ $orders->order_status }}<br>
                <b>Payment Date:</b> {{ date('m/d/Y', strtotime($orders->created_at)) }}<br>
                <!-- Add more invoice details here -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Title</th>
                            <th>Flat ID</th>
                            <th>Owner Details</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $orders->title }}</td>
                            <!-- Add more details from order and flats table -->
                            <td>{{ $orders->flat_id }}</td>
                            <td>{{ $orders->owner_name }}, {{ $orders->owner_phone }} <br>{{ $orders->owner_address }}
                            </td>
                            <td>{{ $orders->amount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- Accepted payments column -->
            <div class="col-6">
                <!-- Add payment methods and other details -->
            </div>
            <!-- /.col -->
            <div class="col-6">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>{{ $orders->amount }} TK</td>
                        </tr>
                        <!-- Add more invoice total details -->
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <div class="float-left">
                    @if (auth()->user()->role == 'user')
                        <a href="{{ route('user.invoice.pdf', ['id' => $orders->id]) }}" class="btn btn-success">Download
                            Now</a>
                    @elseif (auth()->user()->role == 'owner')
                        <a href="{{ route('owner.myinvoice.pdf', ['id' => $orders->id]) }}"
                            class="btn btn-success">Download
                            Now</a>
                    @endif
                </div>
                <!-- Add print, submit payment, and generate PDF buttons -->
            </div>
        </div>
    </div>
    <!-- /.invoice -->

@endsection
