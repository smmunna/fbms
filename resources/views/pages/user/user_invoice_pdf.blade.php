<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FBMS | Invoice</title>
    <style>
        /* Basic styles */


        .wrapper {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h4 {
            margin-top: 0;
        }

        .invoice-info {
            margin-top: 20px;
        }

        .invoice-info address {
            font-style: normal;
        }

        .invoice-col {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .no-print {
            display: none;
        }

        @media print {
            .no-print {
                display: block;
            }
        }

        /* Signature styles */
        .signature-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .signature-column {
            flex: 0 0 30%;
        }

        .signature-column h5 {
            margin: 0;
            font-size: 18px;
        }

        .signature-column p {
            margin-top: 10px;
            /* border-top: 1px solid #000; */
            padding-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="wrapper">
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
                        {{ auth()->user()->present_address }}<br>
                        Phone: {{ auth()->user()->phone }}<br>
                        Email: {{ auth()->user()->email }}
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
                    <b>Status:</b> {{ $orders->order_status }}<br>
                    <b>Payment Date:</b> {{ date('m/d/Y', strtotime($orders->created_at)) }}<br>
                    <!-- Add more invoice details here -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12">
                    <table>
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
                                <td>{{ $orders->owner_name }}, {{ $orders->owner_phone }}
                                    <br>{{ $orders->owner_address }}
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
                    <div>
                        <table>
                            <tr>
                                <th style="width:50%">Subtotal: {{ $orders->amount }} TK</th>
                            </tr>
                            <!-- Add more invoice total details -->
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


            <!-- this row will not appear when printing -->
        </div>
        <!-- /.invoice -->
    </div>

</body>

</html>
