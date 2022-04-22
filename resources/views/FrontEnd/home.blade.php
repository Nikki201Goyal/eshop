@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <div class="mb-lg-2"></div><!-- End .mb-lg-2 -->
    <div class="intro-section pt-3 pb-3 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="intro-slider-container slider-container-ratio mb-2 mb-lg-0">
                        <div class="intro-slider owl-carousel owl-simple owl-dark owl-nav-inside" data-toggle="owl"
                            data-owl-options='{
                                        "nav": false,
                                        "dots": true,
                                        "responsive": {
                                            "768": {
                                                "nav": true,
                                                "dots": false
                                            }
                                        }
                                    }'>
                            @foreach ( $slider as $slide )

                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture style="height: 100%">
                                        <source media="(max-width: 480px)" srcset="{{asset($slide->cover)}}">
                                        <img style="height: 100%; object-fit: cover" src="{{asset($slide->cover)}}" alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->

                                <div class="intro-content">
                                    <h1 class="intro-title">
                                        {{$slide ->category->name}}
                                    </h1><!-- End .intro-title -->

                                    <div class="intro-price">
                                        <sup>Today:</sup>
                                        <span class="text-primary">
                                            Rs. {{ $slide->price }}
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="{{ route('product', $slide->slug) }}" class="btn btn-primary btn-round">
                                        <span>Click Here</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .intro-content -->
                            </div><!-- End .intro-slide -->
                            @endforeach

                        </div><!-- End .intro-slider owl-carousel owl-simple -->

                        <span class="slider-loader"></span><!-- End .slider-loader -->
                    </div><!-- End .intro-slider-container -->
                </div><!-- End .col-lg-8 -->

                <div class="col-lg-4">
                    <div class="intro-banners">
                        @foreach ($feature as $feat )

                        <div class="banner mb-lg-1 mb-xl-2">
                            <a href="#">
                                <img src="{{asset($feat->cover)}}" alt="Banner" style=" height: 120px;
                                object-fit: cover;">
                            </a>

                            <div class="banner-content">
                                <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">{{ $feat->category->name
                                        }}</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title"><a href="#">{{ $feat->name }}</a></h3>
                                <!-- End .banner-title -->
                                <a href="{{ route('product', $feat->slug) }}" class="banner-link">Shop Now<i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                        @endforeach

                    </div><!-- End .intro-banners -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .intro-section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-10">
                <div class="row">
                    <div class="col-lg-12 col-xxl-4-5col">
                        <div class="row intro-banners">
                            @foreach ($banner as $bann)


                            <div class="col-md-6">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="{{asset($bann->cover)}}" alt="Banner img desc" style=" height: 250px;
                                        object-fit: cover;">
                                    </a>

                                    <div class="banner-content">

                                        <h3 class="banner-title text-white"><a href="#">{{ $bann->name }}</a></h3>
                                        <!-- End .banner-title -->
                                        <a href="{{ route('category', $bann->slug) }}" class="banner-link">Shop Now<i
                                                class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-md-6 -->
                            @endforeach

                        </div><!-- End .row -->
                    </div><!-- End .col-lg-3 col-xxl-4-5col -->
                </div><!-- End .row -->

                <div class="mb-3"></div><!-- End .mb-3 -->

                <div class="owl-carousel owl-simple brands-carousel" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "420": {
                                        "items":3
                                    },
                                    "600": {
                                        "items":4
                                    },
                                    "900": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                    <a href="#" class="brand">
                        <img src="{{asset('FrontEnd/assets/images/Image/Products/nike.png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{asset('FrontEnd/assets/images/Image/Products/gucci.png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{asset('FrontEnd/assets/images/Image/Products/brand1.png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{asset('FrontEnd/assets/images/Image/Products/brand2.png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{asset('FrontEnd/assets/images/Image/Products/Untitled design (8).png')}}"
                            alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{asset('FrontEnd/assets/images/Image/Products/Untitled design (9).png')}}"
                            alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{asset('FrontEnd/assets/images/Image/Products/dell (2).png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{asset('FrontEnd/assets/images/Image/Products/hp (1).png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{asset('FrontEnd/assets/images/Image/Products/erke.png')}}" alt="Brand Name">
                    </a>
                </div><!-- End .owl-carousel -->

                <div class="mb-5"></div><!-- End .mb-5 -->

                <div class="bg-lighter trending-products">
                    <div class="heading heading-flex mb-3">
                        <div class="heading-left">
                            <h2 class="title">{{ __('navbar.Trending Today') }}</h2><!-- End .title -->
                        </div><!-- End .heading-left -->

                        <div class="heading-right">
                            <ul class="nav nav-pills justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="trending-all-link" data-toggle="tab"
                                        href="#trending-all-tab" role="tab" aria-controls="trending-all-tab"
                                        aria-selected="true">All</a>
                                </li>
                                @foreach($categories as $cate)
                                <li class="nav-item">
                                    <a class="nav-link" id="trending-{{ $cate->slug }}-link" data-toggle="tab"
                                        href="#trending-{{ $cate->slug }}-tab" role="tab"
                                        aria-controls="trending-{{ $cate->slug }}-tab" aria-selected="false">{{
                                        $cate->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div><!-- End .heading-right -->
                    </div><!-- End .heading -->

                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane p-0 fade show active" id="trending-all-tab" role="tabpanel"
                            aria-labelledby="trending-all-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                                data-toggle="owl" data-owl-options='{
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
                                                    "items":3,
                                                    "nav": true
                                                },
                                                "1600": {
                                                    "items":5,
                                                    "nav": true
                                                }
                                            }
                                        }'>
                                @foreach ($ProductAll as $All )


                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{route('product',$All->slug)}}">
                                            <img src="{{asset($All->image)}}" alt="Product image" class="product-image">
                                          
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"
                                                user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $All->id }}"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-quickview" data-toggle="modal"
                                            data-target="#quickview"
                                            data-name="{{ $All->name }}"
                                            data-price="{{ $All->price }}"
                                            data-image="{{ $All->image }}"
                                            data-id="{{ $All->id }}"
                                                title="Quick view"><span>Quick view</span></a>

                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            @if ($All->stock == 1)
                                            <a href="#" class="btn-product btn-cart" title="Add to cart" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $All->id }}"><span>add to
                                                cart</span></a>
                                            @else
                                            <button href="#" class="btn-product btn-cart"  disabled ><span>Out Of Stock</span></button>
                                            @endif

                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $All->category->name }}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route('product',$All->slug)}}">{{
                                                $All->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{$All->price}}
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: {{ round($All->avgRating())*20 }}%;"></div>

                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( {{ $All->ratings->count() }} Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                @endforeach

                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        @foreach ( $categories as $cate )


                        <div class="tab-pane p-0 fade" id="trending-{{ $cate->slug }}-tab" role="tabpanel"
                            aria-labelledby="trending-{{ $cate->slug }}-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                                data-toggle="owl" data-owl-options='{
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
                                                    "items":3,
                                                    "nav": true
                                                },
                                                "1600": {
                                                    "items":5,
                                                    "nav": true
                                                }
                                            }
                                        }'>
                                @foreach ($cate->products as $prod )


                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{route('product',$prod->slug)}}">
                                            <img src="{{asset($prod->image)}}" alt="Product image"
                                                class="product-image">

                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"  user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $prod->id }}"><span>add to wishlist</span></a>
                                                <a href="#" class="btn-product-icon btn-quickview" data-toggle="modal"
                                                data-target="#quickview"
                                                data-name="{{ $prod->name }}"
                                                data-price="{{ $prod->price }}"
                                                data-image="{{ $prod->image }}"
                                                data-id="{{ $prod->id }}"

                                                    title="Quick view"><span>Quick view</span></a>


                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            @if ($prod->stock == 1)
                                            <a href="#" class="btn-product btn-cart" title="Add to cart" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $prod->id }}"><span>add to
                                                cart</span></a>
                                            @else
                                            <button href="#" class="btn-product btn-cart"  disabled ><span>Out Of Stock</span></button>
                                            @endif

                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">

                                        <h3 class="product-title"><a href="{{route('product',$prod->slug)}}">{{
                                                $prod->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            Rs. {{$prod->price}}
                                        </div><!-- End .product-price -->

                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: {{ round($prod->avgRating())*20 }}%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( {{ $prod->ratings->count() }} Reviews )</span>
                                        </div><!-- End .rating-container -->

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                @endforeach

                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        @endforeach

                    </div><!-- End .tab-content -->
                </div><!-- End .bg-lighter -->

                <div class="mb-5"></div><!-- End .mb-5 -->
                @foreach($categories as $cate)
                <div class="row cat-banner-row electronics">
                    <div class="col-xl-3 col-xxl-4">
                        <div class="cat-banner row no-gutters">
                            <div class="cat-banner-list col-sm-6 d-xl-none d-xxl-flex"
                                style="background-image: url({{ asset($cate->image) }}); ">
                                <div class="banner-list-content">
                                    <h2><a href="#">{{ $cate->name }}</a></h2>


                                </div><!-- End .banner-list-content -->
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6 col-xl-12 col-xxl-6">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="{{asset($cate->cover)}}" alt="Banner img desc" style=" height: 500px;
                                        object-fit: cover;">
                                    </a>

                                    <div class="banner-content intro-banners">
                                        <h4 class="banner-subtitle text-white"><span><a href="#">{!!$cate->description!!}</a></span></h4>
                                        <!-- End .banner-subtitle -->
                                        
                                        <a href="{{ route('category', $cate->slug) }}" class="banner-link">Shop Now <i
                                                class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .cat-banner -->
                    </div><!-- End .col-xl-3 -->

                    <div class="col-xl-9 col-xxl-8">

                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
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
                                                "items":3
                                            },
                                            "1600": {
                                                "items":4
                                            }
                                        }
                                    }'>
                            @foreach($cate->products as $elec)
                            <div class="product text-center">

                                <figure class="product-media">

                                    <a href="{{route('product',$elec->slug)}}">
                                        <img src="{{asset($elec->image)}}" alt="Product image" class="product-image"
                                            style=" height: 330px;
                                        object-fit: cover;">
                                        
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"  user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $elec->id }}"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-quickview" data-toggle="modal"
                                            data-target="#quickview"
                                            data-name="{{ $elec->name }}"
                                            data-price="{{ $elec->price }}"
                                            data-image="{{ $elec->image }}"
                                            data-id="{{ $elec->id }}"
                                                title="Quick view"><span>Quick view</span></a>

                                        
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        @if ($elec->stock == 1)
                                        <a href="#" class="btn-product btn-cart" title="Add to cart" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $elec->id }}"><span>add to
                                            cart</span></a>
                                        @else
                                        <button href="#" class="btn-product btn-cart"  disabled ><span>Out Of Stock</span></button>
                                        @endif

                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">

                                    <h3 class="product-title"><a
                                            href="{{route('product',$elec->slug)}}">{{$elec->name}}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        {{$elec->price}}
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{ round($elec->avgRating())*20 }}%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( {{ $elec->ratings->count() }} Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->

                            </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->

                    </div><!-- End .col-xl-9 -->
                </div><!-- End .row cat-banner-row -->

                <div class="mb-3"></div><!-- End .mb-3 -->
                @endforeach


                <div class="mb-3"></div><!-- End .mb-3 -->
                <div class="icon-boxes-container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-rocket"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                        <p>Orders $50 or more</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-rotate-left"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                        <p>Within 30 days</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-info-circle"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                        <p>When you sign up</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-life-ring"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                        <p>24/7 amazing services</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .icon-boxes-container -->

                <div class="mb-5"></div><!-- End .mb-5 -->
            </div><!-- End .col-lg-9 col-xxl-10 -->

            <aside class="col-xl-3 col-xxl-2 order-xl-first">
                <div class="sidebar sidebar-home">
                    <div class="row">
                        @foreach ($FeaturedOne as $feature )

                        <div class="col-sm-6 col-xl-12">
                            <div class="widget widget-banner intro-banners">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="{{asset($feature->cover)}}" alt="Banner img desc" style=" height: 500px;
                                        object-fit: cover;">
                                    </a>

                                    <div class="banner-content banner-content-top banner-content-right text-right">
                                        <h3 class="banner-title text-white"><a href="#">{{ $feature->name }}</a></h3>
                                        <!-- End .banner-title -->
                                        <a href="{{ route('category', $feature->slug) }}" class="banner-link">Shop Now <i
                                                class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner banner-overlay -->
                            </div><!-- End .widget widget-banner -->
                        </div><!-- End .col-sm-6 col-xl-12 -->
                        @endforeach


                        <div class="col-sm-6 col-xl-12 mb-2">
                            <div class="widget widget-products">
                                <h4 class="widget-title"><span>Best Sellers</span></h4><!-- End .widget-title -->

                                <div class="products">
                                    @foreach($bests as $sell)
                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="{{route('product',$sell->slug)}}">
                                                <img src="{{asset($sell->image)}}" alt="Product image"
                                                    class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a
                                                    href="{{route('product',$sell->slug)}}">{{$sell->name}}</a></h5>
                                            <!-- End .product-title -->
                                            <div class="product-price">
                                                {{$sell->price}}
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->
                                    @endforeach

                                </div><!-- End .products -->

                            </div><!-- End .widget widget-products -->
                        </div><!-- End .col-sm-6 col-xl-12 -->

                        <div class="col-12">
                            <div class="widget widget-deals">
                                <h4 class="widget-title"><span>Special Offer</span></h4><!-- End .widget-title -->

                                <div class="row">
                                    @foreach ($offers as $offer )

                                    <div class="col-sm-6 col-xl-12">

                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-sale">Deal of the week</span>
                                                <a href="{{route('product',$offer->slug)}}">
                                                    <img src="{{asset($offer->image)}}" alt="Product image"
                                                        class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                        title="Add to wishlist"  user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{$offer->id }}"><span>add to wishlist</span></a>
                                                        <a href="#" class="btn-product-icon btn-quickview" data-toggle="modal"
                                                        data-target="#quickview"
                                                        data-name="{{ $offer->name }}"
                                                        data-price="{{ $offer->price }}"
                                                        data-image="{{ $offer->image }}"
                                                        data-id="{{ $offer->id }}"
                                                            title="Quick view"><span>Quick view</span></a>
                                                    
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    @if ($offer->stock == 1)
                                                    <a href="#" class="btn-product btn-cart" title="Add to cart" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $offer->id }}"><span>add to
                                                        cart</span></a>
                                                    @else
                                                    <button href="#" class="btn-product btn-cart"  disabled ><span>Out Of Stock</span></button>
                                                    @endif

                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">{{ $offer->category->name }}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{route('product',$offer->slug)}}">{{
                                                        $offer->name }}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="new-price">{{ $offer->price }}</span>

                                                </div><!-- End .product-price -->

                                            </div><!-- End .product-body -->

                                            <div class="deal-bottom" style="margin-left: 20%;">
                                                <div class="deal-countdown offer-countdown" data-until="+11d"></div>
                                                <!-- End .deal-countdown -->
                                            </div><!-- End .deal-bottom -->

                                            <!-- <div class="product-countdown" data-until="+44h" data-relative="true" data-labels-short="true"></div>End .product-countdown -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-xl-12 -->

                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .widget widget-deals -->
                        </div><!-- End .col-sm-6 col-lg-xl -->

                        <div class="col-12">
                            <div class="widget widget-deals">
                                <div class="mb-3" style="display: flex;justify-content:space-between;align-items:center">
<h4 class="widget-title mb-0"><span>Flash Deal</span></h4>
                                <p  id="demo" style="background:orange; padding:5px; color:white"></p>
                                </div>

                                <!-- End .widget-title -->
                                <div class="row">
                                    @foreach ($flash as $flash )

                                    <div class="col-sm-6 col-xl-12">

                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{route('product',$flash->slug)}}">
                                                    <img src="{{asset($flash->image)}}" alt="Product image"
                                                        class="product-image">
                                                </a>


                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                        title="Add to wishlist"  user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{$flash->id }}"><span>add to wishlist</span></a>
                                                        <a href="#" class="btn-product-icon btn-quickview" data-toggle="modal"
                                                        data-target="#quickview"
                                                        data-name="{{ $flash->name }}"
                                                        data-price="{{ $flash->price }}"
                                                        data-image="{{ $flash->image }}"
                                                        data-id="{{ $flash->id }}"
                                                            title="Quick view"><span>Quick view</span></a>
                                                   
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    @if ($flash->stock == 1)
                                                    <a href="#" class="btn-product btn-cart" title="Add to cart" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $flash->id }}"><span>add to
                                                        cart</span></a>
                                                    @else
                                                    <button href="#" class="btn-product btn-cart"  disabled ><span>Out Of Stock</span></button>
                                                    @endif

                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">{{ $flash->category->name }}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{route('product',$flash->slug)}}">{{
                                                        $flash->name }}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="new-price">{{ $flash->price }}</span>

                                                </div><!-- End .product-price -->

                                            </div><!-- End .product-body -->


                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-xl-12 -->

                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .widget widget-deals -->
                        </div><!-- End .col-sm-6 col-lg-xl -->

                        <div class="col-sm-6 col-xl-12">
                            <div class="widget widget-posts">
                                <h4 class="widget-title"><span>Latest Blog Posts</span></h4><!-- End .widget-title -->

                                <div class="owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
                                                "nav":false,
                                                "dots": true,
                                                "loop": false,
                                                "autoHeight": true
                                            }'>
                                    @foreach ($blogs as $blog )

                                    <article class="entry">
                                        <figure class="entry-media">
                                            <a href="{{route('blogsSingle',$blog->slug)}}">
                                                <img src="{{asset($blog->image)}}" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="{{route('blogsSingle',$blog->slug)}}">{{ $blog->date }}</a>
                                            </div><!-- End .entry-meta -->

                                            <h5 class="entry-title">
                                                <a href="{{route('blogsSingle',$blog->slug)}}">{{ $blog->title }}</a>
                                            </h5><!-- End .entry-title -->

                                            <div class="entry-content">
                                                <p>{!! Str::limit($blog->description, 50) !!}</p>
                                                <a href="{{route('blogsSingle',$blog->slug)}}" class="read-more">Read More</a>
                                            </div><!-- End .entry-content -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->
                                    @endforeach
                                </div><!-- End .owl-carousel -->
                            </div><!-- End .widget widget-posts -->
                        </div><!-- End .col-sm-6 col-xl-12 -->
                    </div><!-- End .row -->
                </div><!-- End .sidebar sidebar-home -->
            </aside><!-- End .col-lg-3 col-xxl-2 -->
        </div><!-- End .row -->
    </div><!-- End .container-fluid -->
</main><!-- End .main -->

<div class="cta pt-4 pt-lg-6 pb-5 pb-lg-7 mb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                <div class="cta-heading text-center">
                    <h3 class="cta-title">Sign Up for news letter updates</h3><!-- End .cta-title -->

                </div><!-- End .text-center -->

                <form action="{{ route('storeSubscribe') }}">
                    @csrf
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Enter your Email Address" name="email"
                            aria-label="Email Adress" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" title="Sing up"><i
                                    class="icon-long-arrow-right"></i></button>
                        </div><!-- .End .input-group-append -->
                    </div><!-- .End .input-group -->
                </form>
            </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .cta -->
@endSection

@section('page-scripts')
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>







