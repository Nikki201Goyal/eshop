@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>

            </ol>

        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{asset($product->image)}}" data-zoom-image="{{asset($product->image)}}" alt="product image">


                                </figure><!-- End .product-main-image -->

                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: {{ round($product->avgRating())*20 }}%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-accordion" id="review-link">( {{ $product->ratings->count() }} Reviews )</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                               {{$product->price}}
                            </div><!-- End .product-price -->



                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->



                            <div class="product-details-action">
                                <a href="#" class="btn-product btn-cart" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $product->id }}">add to cart</a>

                                <div class="details-action-wrapper">
                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $product->id }}"><span>Add to Wishlist</span></a>
                                    
                                   
                                </div><!-- End .details-action-wrapper -->
                            </div><!-- End .product-details-action -->

                            <div>
                                <style>
                                    .btn-buy{
                                        background-color: white;
                                        border: 1px solid orange;
                                        width: 100px;
                                    }
                                </style>
                                @if(Auth::user())
                                    <a href="{{ route('buyNow',$product->slug) }}" class="btn-product btn-buy"><span><i class="fa-solid fa-basket-shopping"></i>Buy NOW</span></a>
                                @endif
                            </div>


                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            {!! $product->description !!}
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

                       <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        @foreach ($likeProducts as $like )

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="{{route('product',$like->slug)}}">
                                    <img src="{{asset($like->image)}}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"
                                        user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $like->id }}"><span>add to wishlist</span></a>
                                        <a href="#" class="btn-product-icon btn-quickview" data-toggle="modal"
                                        data-target="#quickview"
                                        data-name="{{ $like->name }}"
                                        data-price="{{ $like->price }}"
                                        data-image="{{ $like->image }}"
                                        data-id="{{ $like->id }}"
                                            title="Quick view"><span>Quick view</span></a>
                                   
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                            @if ($like->stock == 1)
                                            <a href="#" class="btn-product btn-cart" title="Add to cart" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $like->id }}"><span>add to
                                                cart</span></a>
                                            @else
                                            <button href="#" class="btn-product btn-cart"  disabled ><span>Out Of Stock</span></button>
                                            @endif

                                        </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{ $like->category->name }}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{route('product',$like->slug)}}">{{ $like->name }}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                  Rs.{{ $like->price }}
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: {{ round($like->avgRating())*20 }}%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( {{ $like->ratings->count() }} Reviews )</span>
                                </div><!-- End .rating-container -->


                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach

                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
			</main>
			@endsection
