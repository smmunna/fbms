@extends('layouts.home_layout')
@section('title', 'Flat Details')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Flat Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $flat->owner_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $flat->owner_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $flat->owner_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $flat->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $flat->description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ $flat->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $flat->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>{{ $flat->price }} TK</td>
                                    </tr>
                                    <tr>
                                        <th>Property Type</th>
                                        <td>{{ $flat->property_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Size</th>
                                        <td>{{ $flat->size }} sqft</td>
                                    </tr>
                                    <tr>
                                        <th>Bedrooms</th>
                                        <td>{{ $flat->bed }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bathrooms</th>
                                        <td>{{ $flat->bath }}</td>
                                    </tr>
                                    <tr>
                                        <th>Photo</th>
                                        <td>
                                            @if ($flat->photo)
                                                <img src="{{ asset($flat->photo) }}" alt="Flat Photo" class="img-fluid"
                                                    style="height: 300px; width:300px">
                                            @else
                                                No Photo Available
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @php
                        $isBooked = DB::table('orders')
                            ->where('flat_id', $flat->flat_id)
                            ->where(function ($query) {
                                $query->where('status', 'Processing')->orWhere('status', 'Completed');
                            })
                            ->exists();
                    @endphp
                    @if (auth()->check())
                        @if ($isBooked)
                            {{-- Flat is already booked --}}
                            <p class="text-center btn btn-warning">Already Booked</p>
                        @else
                            {{-- Flat is not booked, show the "Book Now" button --}}
                            <a href="{{ route('payment.form', ['id' => $flat->flat_id]) }}"
                                class="btn btn-primary text-center">
                                Book Now
                            </a>
                        @endif
                        {{-- <a href="{{ route('payment.form', ['id' => $flat->flat_id]) }}"
                            class="btn btn-primary text-center">
                            Book Now
                        </a> --}}
                    @else
                        <p class="text-center">Please <a href="{{ route('login') }}">login</a> to book</p>
                    @endif
                </div>


            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Leave a Comment</h2>
                    </div>
                    <div class="card-body">
                        @if (auth()->check())
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Write your comment here:</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="5" placeholder="Write your comment here"
                                        required></textarea>
                                </div>
                                <input type="hidden" name="flat_id" value="{{ $flat->flat_id }}">
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating:</label>
                                    <div class="starability-growRotate starability-basic">
                                        <input type="radio" id="rate1" name="rating" value="1">
                                        <label for="rate1" title="Terrible"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="rate2" name="rating" value="2">
                                        <label for="rate2" title="Not good"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="rate3" name="rating" value="3">
                                        <label for="rate3" title="Average"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="rate4" name="rating" value="4">
                                        <label for="rate4" title="Very good"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="rate5" name="rating" value="5">
                                        <label for="rate5" title="Amazing"><i class="fas fa-star"></i></label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @else
                            <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
                        @endif
                    </div>
                </div>
                {{-- Showing comments --}}
                <div class="card">
                    <div class="container my-3">
                        @if ($comments->isEmpty())
                            <p>No comments found.</p>
                        @else
                            <ul style="list-style: none; padding-left: 0;">
                                @foreach ($comments as $comment)
                                    <li style="margin-bottom: 20px; position: relative;">
                                        <div>
                                            <img src="{{ asset($comment->user_photo) }}"
                                                alt="{{ $comment->user_name }}'s photo"
                                                style="width: 50px; height: 50px; border-radius: 50%; margin-right: 12px;">
                                            <span>{{ $comment->user_name }}</span>
                                        </div>
                                        <div class="mt-2">
                                            {{ $comment->comment }}
                                        </div>
                                        <div class="starability-result mt-2" data-rating="{{ $comment->rating }}">
                                            Rated:
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $comment->rating)
                                                    <i class="fas fa-star" style="color: gold;"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>

                                        {{-- @if (auth()->check() && $comment->user_id === auth()->id())
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                                style="position: absolute; top: 0; right: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif --}}

                                        @if (auth()->check() && ($comment->user_id === auth()->id() || auth()->user()->role == 'admin'))
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                                style="position: absolute; top: 0; right: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif

                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                            <!-- Pagination Links -->
                            {{ $comments->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
