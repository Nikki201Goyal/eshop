@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cart as $carts)

                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{asset($carts->product->image)}}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{ $carts->product->name }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{ $carts->product->price }}</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" class="form-control quantity"
                                                data-id="{{ $carts->id }}" value="{{ $carts->quantity }}" min="1"
                                                max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">Rs.{{ $carts->product->price * $carts->quantity }} </td>
                                    <td class="remove-col"><a href="{{ route('cart.remove',$carts->id) }}"
                                            class="btn-remove"><i class="icon-close"></i></a></td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table><!-- End .table table-wishlist -->


                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>Rs. {{ $total }}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Normal</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>Free</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="standart-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="standart-shipping">Express</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>Rs. 100.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="express-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">Same
                                                    day</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>Rs. 200.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-estimate">
                                        <td>Active Address<br>
                                            @isset($address)
                                            {{ $address->address }}
                                            @endisset<a href="{{ route('dashboard') }}">Change address</a></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <!--End .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>$160.00</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{route('checkout')}}"
                                class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{ route('home') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
@section('page-scripts')
@auth
<script>
    $('.quantity').change(function () {
        var id = $(this).data('id');
        var quantity = $(this).val();
        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                id: id,
                quantity: quantity,
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                location.reload();
            }
        });
    });
</script>
@endauth
@endsection
