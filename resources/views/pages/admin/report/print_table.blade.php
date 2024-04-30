<!-- print_table.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Table</title>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #report-table, #report-table * {
                visibility: visible;
            }
            #report-table {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>
<body>
    <div id="report-table">
        <table>
            <!-- Table headers -->
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Owner</th>
                    <th>Order Date</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach ($data as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->owner_name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
