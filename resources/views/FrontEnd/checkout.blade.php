@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                    <div class="row">
                        @if(!is_null($address))
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label> Name *</label>
                                    <input type="text" class="form-control" value="{{ $address->name }}" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->


                            <label> Address *</label>
                            <input type="text" class="form-control" placeholder="House number and Street name"   value="{{ $address->address }}"required>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP *</label>
                                    <input type="text" class="form-control"  value="{{ $address->postcode }}"required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="tel" class="form-control"  value="{{ $address->contact }}"required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Email address *</label>
                            <input type="email" class="form-control"  value="{{ $address->email }}" required>

                            <label>Order notes (optional)</label>
                            <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->

                        @else
                        <div class="col-lg-9">
                                <h2>Please add an address first</h2>
                        </div>
@endif
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($cart as $carts )


                                        <tr>
                                            <td><a href="#">{{ $carts->product->name}}</a></td>
                                            <td>{{ $carts->quantity * $carts->product->price }}</td>
                                        </tr>


                                        @endforeach
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>{{ $total }}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>
                                                @if($shipping == 0)
                                                    Free Shipping
                                                    @elseif($shipping == 100)
                                                    Express Shipping
                                                    @elseif($shipping == 200)
                                                Same Day Shipping
                                                    @endif
                                            </td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>{{ $total }}</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->
                                <form action="{{ route('placeOrder') }}" method="post">
                                    @csrf
                                <div class="accordion-summary" id="accordion-payment">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cash" name="payment" value="cash"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="cash">Cash on Delivery</label>
                                        </div><!-- End .custom-control -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="esewa" name="payment" value="esewa"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="esewa">eSewa</label>
                                        </div><!-- End .custom-control -->


                                </div><!-- End .accordion -->

{{--                                    <input type="hidden" name="payment_method" value="esewa">--}}
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <input type="hidden" name="discount" value="0">
                                    <input type="hidden" name="address_id" value="@isset($address)
                                    {{ $address->id }}
                                    @endisset">
                                    <input type="hidden" name="order_notes" value="test">
                                    @if(!is_null($address))

                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                            <span class="btn-text">Place Order</span>
                                            <span class="btn-hover-text">Place Order</span>
                                        </button>
                                    @endif
                                </form>

                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
@section('page-scripts')
{{--    <script>
        // $(document).ready(function () {
        //     let curShip = $('input[type=radio][name=payment]:checked').val();
        //     $('#cart_total').html(parseInt(sub)+parseInt(curShip));
        //     // console.log();
        // });
        $('input[type=radio][name=payment]').change(function() {
            let type = $(this).val();
            console.log(type);
            // let sub = $('#sub').text();
            // $('#cart_total').html(parseInt(sub)+parseInt(curShip));
        });
    </script>--}}
@endsection
