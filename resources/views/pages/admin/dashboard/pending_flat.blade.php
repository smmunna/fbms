@php
    $pendingFlats = DB::table('flats')->where('status', 'pending')->take(5)->get();
@endphp

<div class="container">
    <h2>Pending Flats</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Booking Price</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingFlats as $flat)
                <tr>
                    <td>{{ $flat->title }}</td>
                    <td>{{ $flat->location }}, {{ $flat->address }}</td>
                    <td>{{ $flat->price }} TK</td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
