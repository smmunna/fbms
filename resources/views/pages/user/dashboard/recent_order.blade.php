@php
    $recentOrders = DB::table('orders')
        ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
        ->join('users', 'flats.owner_id', '=', 'users.id')
        ->where('orders.email', Auth::user()->email)
        ->select('orders.*', 'orders.status as order_status')
        ->orderByDesc('orders.created_at')
        ->take(5)
        ->get();
@endphp

<div>
    @if ($recentOrders->isNotEmpty())
        <h2>Recent Booking</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Flat ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Amount</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Transaction ID</th>
                    <th>Currency</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentOrders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->flat_id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->order_status }}</td>
                        <td>{{ $order->transaction_id }}</td>
                        <td>{{ $order->currency }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No orders found.</p>
    @endif
</div>
