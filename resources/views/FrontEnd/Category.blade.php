@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="higher_price" {{ request('sortBy') == 'higher_price' ? 'selected' : null }}>Higher Price</option>
                                        <option value="lower_price" {{ request('sortBy') == 'lower_price' ? 'selected' : null }}>Lower Price</option>
                                        <option value="newness" {{ request('sortBy') == 'newness' ? 'selected' : null }}>Latest</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                            <div class="toolbox-layout">
                                <a href="{{route('categoryList', $category->slug )}}" class="btn-layout">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="10" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="10" height="4" />
                                    </svg>
                                </a>

                                <a href="{{route('category2grid', $category->slug)}}" class="btn-layout">
                                    <svg width="10" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                    </svg>
                                </a>

                                <a href="{{route('category', $category->slug)}}" class="btn-layout active">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="12" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                        <rect x="12" y="6" width="4" height="4" />
                                    </svg>
                                </a>

                                <a href="{{route('category4grid',$category->slug)}}" class="btn-layout">
                                    <svg width="22" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="12" y="0" width="4" height="4" />
                                        <rect x="18" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                        <rect x="12" y="6" width="4" height="4" />
                                        <rect x="18" y="6" width="4" height="4" />
                                    </svg>
                                </a>
                            </div><!-- End .toolbox-layout -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach ($products as $pro )

                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">

                                        <a href="{{route('product',$pro->slug)}}">
                                            <img src="{{asset($pro->image)}}" alt="Product image" class="product-image" style=" height: 300px;
                                        object-fit: cover;">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"  user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $pro->id }}"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-quickview" data-toggle="modal"
                                            data-target="#quickview"
                                            data-name="{{ $pro->name }}"
                                            data-price="{{ $pro->price }}"
                                            data-image="{{ $pro->image }}"
                                            data-id="{{ $pro->id }}"
                                                title="Quick view"><span>Quick view</span></a>

                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            @if ($pro->stock == 1)
                                            <a href="#" class="btn-product btn-cart" title="Add to cart" user="@if(Auth::user()) {{  Auth::user()->id }} @else 0 @endif" product="{{ $pro->id }}"><span>add to
                                                cart</span></a>
                                            @else
                                            <button href="#" class="btn-product btn-cart" title="Add to cart" disabled ><span>Out Of Stock</span></button>
                                            @endif

                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{route('product', $pro->slug)}}">{{ $pro->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                           {{$pro->price}}
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val"  style="width: {{ round($pro->avgRating())*20 }}%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text"> {{ $pro->ratings->count() }} Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 -->
@endforeach

                        </div><!-- End .row -->
                    </div><!-- End .products -->

                    <div class="d-flex justify-content-center">
                        {{ $products->appends(request()->query())->links() }}

                    </div>
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
{{--                                    {{ request()->category }}--}}
                                    <form action="{{ route('filter') }}" method="GET">
                                        <input type="hidden" name="link" value="category">
                                        <div class="filter-items filter-items-count">
                                            @foreach($cats as $cat)
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="category[]" class="custom-control-input" onChange="this.form.submit()" value="{{ $cat->slug }}" id="{{ $cat->slug }}" {{ $cat->id == $category->id? 'checked':null }}
                                                            @isset(request()->category)
                                                            @foreach(request()->category as $c)
                                                                {{ $c == $cat->slug? 'checked':null }}
                                                               @endforeach
                                                            @endisset
                                                        >
                                                        <label class="custom-control-label" for="{{ $cat->slug }}">{{ $cat->name }}</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">{{ $category->products->count() }}</span>
                                                </div><!-- End .filter-item -->
                                            @endforeach
{{--                                            <button type="submit"> submit</button>--}}
                                        </div><!-- End .widget-body -->
                                    </form>

                            </div><!-- End .collapse -->



                            <div class="widget mercado-widget widget-product mt-2">
                                <h2 class="widget-title">Popular Products</h2>
                                <div class="widget-content">
                                    <div class="products">
                                        @foreach ($PopularProducts as $popProduct)

                                        <div class="product product-sm">
                                            <figure class="product-media">
                                                <a href="{{route('product', $popProduct->slug)}}">
                                                    <img src="{{asset($popProduct->image)}}" alt="Product image" class="product-image" style=" height: 80px;
                                        object-fit: cover;">
                                                </a>
                                            </figure>

                                            <div class="product-body">
                                                <h5 class="product-title"><a href="{{route('product',  $popProduct->slug)}}">{{  $popProduct->name }}</a></h5><!-- End .product-title -->
                                                <div class="product-price">
                                                   {{  $popProduct->price }}
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product product-sm -->

                                        @endforeach

                                    </div><!-- End .products -->
                                </div>
                            </div><!-- brand widget-->
                        </div><!-- End .widget -->


                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
@section('page-scripts')

<script>
    // $('#sortby').on('change',function(){
    //     let by = $(this).val();
    //     console.log(by);
    // })
    $('#sortby').change(function () {
        var by = $(this).val();
        console.log(sortby);

        // var url = $(this).attr('data-url');
        var url = '{{ route('sortBy',':slug') }}';
        n_url = url.replace(':slug', '{{ $category->slug }}');
        let redirect = n_url+'?link=category&sortBy='+by+'';
       window.location.replace(redirect);

        // $.get(n_url,function(d){
        //         console.log(d);
        // });

    });
</script>
@endsection
