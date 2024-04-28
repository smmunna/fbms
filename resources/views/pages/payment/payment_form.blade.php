@extends('layouts.home_layout')
@section('title', 'Payment Form')

@section('content')

    @php
        $flat = DB::table('flats')->select('price', 'title')->where('flat_id', $id)->first();
    @endphp

    <div class="container">
        <div class="py-5 text-center">
            <h2>Book Now</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mt-4 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Summary</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    @if ($flat)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $flat->title }}</h6>
                            </div>
                            <span class="text-muted">{{ $flat->price }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (BDT)</span>
                            <strong>{{ $flat->price }} TK</strong>
                        </li>
                    @else
                        <li class="list-group-item text-danger">Flat not found</li>
                    @endif
                </ul>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Payment Information</h4>
                @if ($flat)
                    <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Full name</label>
                                <input type="text" name="customer_name" class="form-control" id="customer_name"
                                    placeholder="" value="{{ auth()->user()->name }}" readonly>
                            </div>
                        </div>

                        {{-- Flat ID --}}
                        <input type="hidden" name="flat_id" class="form-control" placeholder=""
                            value="{{ $id }}">


                        <div class="mb-3">
                            <label for="mobile">Mobile</label>
                            <div class="input-group">
                                <input type="text" name="customer_mobile" class="form-control" id="mobile"
                                    placeholder="Mobile" value="{{ auth()->user()->phone }}" readonly>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted"></span></label>
                            <input type="email" name="customer_email" class="form-control" id="email"
                                placeholder="you@example.com" value="{{ auth()->user()->email }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address"
                                placeholder="1234 Main St" value="{{ auth()->user()->present_address }}" readonly>
                        </div>

                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" value="{{ $flat->price }}" name="amount" id="total_amount" required />
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay</button>
                        </div>
                    </form>
                @else
                    <p class="text-danger">Unable to load flat information. Please try again later.</p>
                @endif
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <!-- If you want to use the popup integration, -->
    <script>
        var obj = {};
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('#address').val();
        obj.amount = $('#total_amount').val();

        $('#sslczPayBtn').prop('postdata', obj);

        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>
@endpush
