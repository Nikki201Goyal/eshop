@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main"></main>
<div class="page-content">
<div class="container">
<div class="products mb-3 mt-3">
    <h2 class="text-center">Search Results</h2>
    <div class="row justify-content-center">
        @forelse($products as $pro)
        <div class="col-6 col-md-4 col-lg-4">

            <div class="product product-7 text-center">
                <figure class="product-media">

                    <a href="">
                        <img src="{{ asset($pro->image) }}" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist"  user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $pro->id }}"><span>add to wishlist</span></a>
                        <a href="#" class="btn-product-icon btn-quickview" data-toggle="modal"
                        data-target="#quickview"
                        data-name="{{ $pro->name }}"
                        data-price="{{ $pro->price }}"
                        data-image="{{ $pro->image }}"
                        data-id="{{ $pro->id }}"
                            title="Quick view"

                           ><span>Quick view</span></a>

                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                                            @if ($pro->stock == 1)
                                            <a href="#" class="btn-product btn-cart" title="Add to cart" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $pro->id }}"><span>add to
                                                cart</span></a>
                                            @else
                                            <button href="#" class="btn-product btn-cart"  disabled ><span>Out Of Stock</span></button>
                                            @endif

                                        </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <h3 class="product-title"><a href=""></a>{{ $pro-> name}}</h3><!-- End .product-title -->
                    <div class="product-price">{{ $pro->price }}
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: {{ round($pro->avgRating())*20 }}%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( {{ $pro->ratings->count() }} Reviews )</span>
                    </div><!-- End .rating-container -->


                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div><!-- End .col-sm-6 col-lg-4 -->

 @empty
<p>No results found</p>
@endforelse

    </div><!-- End .row -->
</div><!-- End .products -->
</div>
</div>
@endsection
