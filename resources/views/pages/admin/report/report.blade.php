@extends('layouts.dashboard_layout')
@section('title', 'Reports')

@section('dash_content')

    <div class="report-options pt-4">
        <form action="{{ route('reports.get') }}" method="post">
            @csrf
            <button type="submit" name="type" value="today" class="btn btn-info">Today</button>
            <button type="submit" class="btn btn-primary" name="type" value="last7days">Last 7 Days</button>
            <button type="submit" class="btn btn-success" name="type" value="lastMonth">Last Month</button>
            <button type="submit" class="btn btn-warning" name="type" value="currentMonth">Current Month</button>
            <button type="submit" class="btn btn-primary" name="type" value="all">All Bookings</button>
        </form>
    </div>

    <div class="report-options d-flex justify-content-center">
        <form class="form-inline" action="{{ route('reports.get') }}" method="post">
            @csrf
            <div class="form-group mr-2">
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group mr-2">
                <input type="date" name="end_date" class="form-control">
            </div>
            <button type="submit" name="type" value="dateRange" class="btn btn-primary">Date Range</button>
        </form>
    </div>

    <!-- Display report data here -->
    @if (isset($data))

        <div id="report-table" class="report-table">
            <h3 style="text-align: center;">Booking List</h3>
            <hr>
            <!-- Styled total amount and total booking paragraphs -->
            <div class="total-info" style="margin-top: 20px; text-align: left;">
                <p style="margin-bottom: 5px;"><strong>Total Amount:</strong> {{ $totalAmount }}Tk</p>
                <p style="margin-bottom: 5px;"><strong>Total Booking:</strong> {{ $totalBooking }}</p>
                <p style="margin-bottom: 5px; float: right"><strong>Range:</strong>
                    @if ($type == 'last7days')
                        Last 7 Days
                    @elseif ($type == 'dateRange')
                        @if ($startDate && $endDate)
                            {{ \Carbon\Carbon::parse($startDate)->format('F j, Y') }} to
                            {{ \Carbon\Carbon::parse($endDate)->format('F j, Y') }}
                        @endif
                    @elseif ($type == 'lastMonth')
                        Last Month
                    @elseif ($type == 'today')
                        Today
                    @elseif ($type == 'currentMonth')
                        Current Month
                    @else
                        all
                    @endif
                </p>

                {{-- <p style="margin-bottom: 5px;"><strong>Date Range:</strong> {{ $startDate }} - {{ $endDate }}</p> --}}
            </div>
            <p id="printDateTime" style="margin-bottom: 5px; display: none;"><strong>Print Date &
                    Time:</strong></p>



            <table>
                <!-- Table headers -->
                <thead>
                    <tr style="background-color: #4CAF50">
                        <th>SL</th>
                        <th>Booking ID</th>
                        <th>Flat ID</th>
                        <th>Flat Title</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Owner</th>
                        <th>Booking Date</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    @foreach ($data as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->flat_id }}</td>
                            <td>{{ $order->flat_title }}</td>
                            <td>{{ $order->name }} <br>{{ $order->email }} <br>{{ $order->phone }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->amount }} Tk</td>
                            <td>{{ $order->owner_name }} <br> {{ $order->owner_address }} <br> {{ $order->owner_phone }}
                            </td>
                            <td>{{ $order->created_at }}</td>
                            {{-- <td>{{ $order->customer_name }}</td> --}}
                            <!-- Add more columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button onclick="printTable()" class="print-btn">Print Now</button>
        </div>
    @endif

@endsection

@push('scripts')
    <script>
        function printTable() {
            window.print();
        }
    </script>
@endpush

@push('styles')
    <style>
        .report-options {
            text-align: center;
            margin-bottom: 20px;
        }

        .print-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .print-btn:hover {
            background-color: #45a049;
        }

        .report-table {
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;
        }

        .report-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .report-table th,
        .report-table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .report-table th {
            background-color: green;
            color: whitesmoke
        }

        .report-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }


        @media print {
            body * {
                visibility: hidden;
            }

            #report-table,
            #report-table * {
                visibility: visible;
            }

            #report-table {
                position: absolute;
                left: 0;
                top: 0;
            }

            .report-options {
                text-align: center;
                margin-bottom: 20px;
            }

            .print-btn {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            .print-btn:hover {
                background-color: #45a049;
            }

            .report-table {
                margin: 0 auto;
                /* max-width: 800px; */
                max-width: none !important;
                text-align: center;
            }

            .report-table table {
                width: 100%;
                border-collapse: collapse;
            }

            .report-table th,
            .report-table td {
                border: 1px solid #dddddd;
                padding: 8px;
                text-align: left;
            }

            .report-table th {
                background-color: green !important;
                /* Apply background color and override other styles */
                color: whitesmoke !important;
                /* Apply text color and override other styles */
            }

            .report-table tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Function to update the print date and time
        function updatePrintDateTime() {
            // Get the current date and time
            var currentDate = new Date();
            var formattedDate = currentDate.toLocaleDateString();
            var formattedTime = currentDate.toLocaleTimeString();

            // Concatenate date and time
            var printDateTime = "Print Date & Time: " + formattedDate + " " + formattedTime;

            // Set the content of the <p> tag
            document.getElementById("printDateTime").textContent = printDateTime;
        }

        // Event listener for printing
        window.onbeforeprint = function() {
            updatePrintDateTime(); // Update the print date and time
            document.getElementById("printDateTime").style.display = "block"; // Show the <p> tag
        };
    </script>
@endpush
