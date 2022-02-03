@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">

            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="container">
					<table class="table table-wishlist table-mobile">
						<thead>
							<tr>
								<th>Product</th>
								<th>Price</th>
								<th>Stock Status</th>
								<th></th>
								<th></th>
							</tr>
						</thead>

						<tbody>
                            @foreach ($wishlist as $wish )

							<tr>
								<td class="product-col">
									<div class="product">
										<figure class="product-media">
											<a href="#">
												<img src="{{ asset($wish->product->image) }}" alt="Product image">
											</a>
										</figure>

										<h3 class="product-title">
											<a href="#">{{ $wish->product->name }}</a>
										</h3><!-- End .product-title -->
									</div><!-- End .product -->
								</td>
								<td class="price-col">{{ $wish->product->price }}</td>
								<td class="stock-col"><span class="in-stock">{{ $wish->product->stock }}</span></td>
                                <td class="action-col">
									<a href="{{ route('wishlist.Cart', $wish->id) }}" class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</a >
								</td>
								<td class="remove-col"><a href="{{ route('wishlist.Delete', $wish->id) }}" class="btn-remove"><i class="icon-close"></i></a></td>
							</tr>
                            @endforeach


						</tbody>
					</table><!-- End .table table-wishlist -->

            	</div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        @endsection
