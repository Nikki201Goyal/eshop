@extends('FrontEnd.Layouts.master')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compare products</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="container">
            <div class="page-header page-header-big text-center" style="background-color: rgb(0, 174, 255)">
                <h1 class="page-title text-white">Compare Products</h1>

            </div><!-- End .page-header -->
            <div>
                <div class="products mb-3">
                    <div class="d-flex" style="gap: 15px">
                        <div class="sel-cat">
                            <label for="sortby">Select Category:</label>
                            <br>
                            <div class="select-custom">
                                <select name="sortby" id="sortby" class="form-control">
                                    <option value="" selected hidden>Select Category</option>
                                    @foreach($cats as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                        <div class="sel-first d-none">
                            <label for="sortby">Select First Product:</label>
                            <div class="select-custom">
                                <select name="First Product" id="first_prod" class="form-control">
                                    <option value="" selected hidden>Select First</option>

                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                        <div class="sel-second d-none">
                            <label for="sortby">Select Comparing Product:</label>
                            <div class="select-custom">
                                <select name="First Product" id="second_prod" class="form-control">
                                    <option value="" selected hidden>Select Product</option>
                                    @foreach($cats as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                    </div>


                    <div class="row justify-content-center m-auto">
                        <div class="col-md-4 col-lg-4 first-prod-col d-none">
                            <div class="product product-7 text-center">
                                <figure class="product-media">

                                    <a href="#">
                                        <img src="" alt="Product image" id="first_prod_image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                            wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"  id="first_btn_cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">

                                    <h3 class="product-title" id="first_prod_name"><a href="#">Product name</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price" id="first_prod_price">
                                        $60.00
                                    </div><!-- End .product-price -->
                                    <div class="product-description" id="first_prod_desc">
                                        description
                                    </div><!-- End .product-price -->

                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 -->
                        <div class="col-md-4 col-lg-4 second-prod-col d-none">
                            <div class="product product-7 text-center">
                                <figure class="product-media">

                                    <a href="#">
                                        <img src="" alt="Product image" id="second_prod_image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                            wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" id="second_btn_cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">

                                    <h3 class="product-title" id="second_prod_name"><a href="#">Product name</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price" id="second_prod_price">
                                        $60.00
                                    </div><!-- End .product-price -->
                                    <div class="product-description" id="second_prod_desc">
                                        description
                                    </div><!-- End .product-price -->


                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 -->


                    </div>
                </div>
            </div>
        </div>
        </div><!-- End .container -->






    </main>
@endsection
@section('page-scripts')
    <script>
        $('#sortby').change(function () {
            var sortby = $(this).val();
            console.log(sortby);
            // var url = $(this).attr('data-url');
            var url = '{{ route('api.compare',':id') }}';
            n_url = url.replace(':id', sortby);
            // console.log(nurl);
            $.get(n_url,function(data){
                console.log(data);
                $('.sel-first').removeClass('d-none');
                $('#first_prod').empty();
                $('#second_prod').empty();
                $('#first_prod').append('<option value="" selected hidden>Select Product</option>');
                $('#second_prod').append('<option value="" selected hidden>Select Product</option>');
                $.each(data, function(index, value){
                    $('#first_prod').append('<option value="'+value.id+'">'+value.name+'</option>');
                    $('#second_prod').append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            });

        });
        $('#first_prod').change(function () {
            let id = $(this).val();
            $('.sel-second').removeClass('d-none');
            let firstCol= $('.first-prod-col');
            firstCol.removeClass('d-none');
            let url = '{{ route('api.product',':id') }}';
            let prod_url = url.replace(':id', id);
            // console.log(n_url);
            $.get(prod_url,function(data){
                console.log(data);
                firstCol.find('#first_prod_image').attr('src',data.image);
                firstCol.find('#first_prod_name').text(data.name);
                firstCol.find('#first_prod_price').text(data.price);
                firstCol.find('#first_prod_desc').text(data.description);
                firstCol.find('#first_btn_cart').attr('user',{{ Auth::user()->id }});
                firstCol.find('#first_btn_cart').attr('product',data.id);

            });
        });
        $('#second_prod').change(function () {
            let secCol= $('.second-prod-col');
            secCol.removeClass('d-none');
            let id = $(this).val();
            console.log(id);
            let url = '{{ route('api.product',':id') }}';
            let prod_url = url.replace(':id', id);
            // console.log(n_url);
            $.get(prod_url,function(data){
                console.log(data);
                secCol.find('#second_prod_image').attr('src',data.image);
                secCol.find('#second_prod_name').text(data.name);
                secCol.find('#second_prod_price').text(data.price);
                secCol.find('#second_prod_desc').text(data.description);
                secCol.find('#second_btn_cart').attr('user',{{ Auth::user()->id }});
                secCol.find('#second_btn_cart').attr('product',data.id);
            });

        });
    </script>
@endsection
