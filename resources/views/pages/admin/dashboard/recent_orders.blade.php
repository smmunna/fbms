@php
    $recentOrders = DB::table('orders')
        ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
        ->join('users', 'flats.owner_id', '=', 'users.id')
        ->select(
            'orders.*',
            'users.name as owner_name',
            'users.phone as owner_phone',
            'users.present_address as owner_address',
            'flats.title as flat_title',
        )
        ->orderByDesc('orders.created_at')
        ->take(5)
        ->get();

@endphp
<div class="container">
    <h2>Recent Booking</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Flat ID</th>
                <th>Flat Title</th>
                <th>Name</th>
                <th>Status</th>
                <th>Owner</th>
                <th>Booking Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recentOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->flat_id }}</td>
                    <td>{{ $order->flat_title }}</td>
                    <td>{{ $order->name }} <br>{{ $order->email }} <br>{{ $order->phone }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->owner_name }} <br> {{ $order->owner_address }} <br> {{ $order->owner_phone }}
                    </td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
