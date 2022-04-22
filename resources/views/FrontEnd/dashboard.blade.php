@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar.Home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('navbar.My Account')}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">{{ __('navbar.Account Details')}}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">{{ __('navbar.Orders')}}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">{{ __('navbar.Addresses')}}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab-review-link" data-toggle="tab" href="#tab-review" role="tab" aria-controls="tab-review" aria-selected="false">{{ __('navbar.Reviews')}}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('navbar.Sign Out')}}</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">


                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">

                                <div class="products mb-3">
                                @forelse ($order as $orders )

                                    <div class="product product-list">
                                        @foreach ($orders->orderDetails as $detailsOfOrder)

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <figure class="product-media">

                                                        <img src="{{$detailsOfOrder->prod->image}}" alt="Product image" class="product-image">
                                                    </a>
                                                </figure><!-- End .product-media -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->

                                            <div class="col-md-3">
                                                <div class="product-cat">
                                                    <a href="#">{{$detailsOfOrder->prod->category->name}}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title">{{$detailsOfOrder->prod->name}}</h3><!-- End .product-title -->
                                                <h6>Price: Rs.{{$detailsOfOrder->price}}</h6>
                                                @if($detailsOfOrder->status == 3)
                                                <button class="btn btn-warning mt-3" data-toggle="modal" data-target="#AddReview"
                                                data-name="{{ $detailsOfOrder->prod->name }}"
                                                data-image="{{$detailsOfOrder->prod->image}}"
                                                data-id="{{ $detailsOfOrder->prod->id }}"
                                                >ADD REVIEW</button>
                                                @endif
                                            </div><!-- End .col-lg-6 -->

                                            <div class="col-md-3 ">
                                                    <div class="product-Qunatity">
                                                        QTY: {{$detailsOfOrder->quantity}}
                                                    </div><!-- End .product-Qunatity -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->

                                            <div class="col-md-3">
                                                <h6 class="product-title"> @if ($detailsOfOrder->status == 0)
                                                    Processing
                                                    @elseif($detailsOfOrder->status == 1)
                                                    Confirmed
                                                    @elseif ($detailsOfOrder->status == 2)
                                                    In route
                                                    @elseif ($detailsOfOrder->status == 3)
                                                    Delivered
                                                    @elseif ($detailsOfOrder->status == 4)
                                                    Cancelled
                                            @endif
                                                    </h6><!-- End .product-title -->
                                            </div><!-- End .col-lg-6 -->

                                        </div><!-- End .row -->
                                        @endforeach


                                    </div><!-- End .product -->

                                    @empty
                                    <p>{{ __('navbar.No order has been made yet.')}}</p>
                                    <a href="{{ route('home') }}" class="btn btn-outline-primary-2"><span>{{ __('navbar.GO SHOP')}}</span><i class="icon-long-arrow-right"></i></a>
                                @endforelse

                                </div>

                            </div><!-- .End .tab-pane -->



                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>{{ __('navbar.The following addresses will be used on the checkout page by default.')}}</p>  <a href="#" data-toggle="modal" data-target="#exampleModal">Add <i class="icon-plus"></i></a>
                                <div class="row">@foreach ($address as $i=>$add )

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">{{ __('navbar.Address')}} {{ $i+1 }}</h3><!-- End .card-title -->

                                                <p>User Name : {{ $add->name }}<br>
                                                Address : {{ $add->address }}<br>
                                               Contact : {{ $add->contact }}<br>
                                                Email : {{ $add->email }}<br>
                                                Postal Code : {{ $add->postcode }}<br>

                                                <a href="#" data-toggle="modal" data-target="#editAddress"
                                                data-name="{{ $add->name }}"
                                                data-address="{{ $add->address }}"
                                                data-contact="{{ $add->contact }}"
                                                data-email="{{ $add->email }}"
                                                data-postcode="{{ $add->postcode }}"
                                                data-id="{{ $add->id }}"
                                                >Edit <i class="icon-edit"></i></a></p>
                                @if ($add->status == 0)

                                                <form action="{{ route('address.activate', $add->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm">Set Default</button>
                                                </form>
                                                @else
                                                <button class="btn btn-success btn-sm">Active</button>

                                @endif

                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                    @endforeach


                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade show active" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="{{route('editProfile')}}" method="POST">
                                  @csrf
                                    <div class="row">
                                      <label> {{ __('navbar.Name')}} *</label>
                                       <input type="text" class="form-control" required value="{{ $user->name }}" name="name">

                                    <label>{{ __('navbar.Address')}}</label>
                                    <input type="text" class="form-control" required value="{{ $user->address }}" name="address">

                                    <label>{{ __('navbar.Contact')}}</label>
                                    <input type="text" class="form-control" required value="{{ $user->contact }}" name="contact">

                                    <label>{{ __('navbar.Email address')}} *</label>
                                    <input type="email" class="form-control" required value="{{ $user->email }}" name="email">

                                    <label>{{ __('navbar.Current password')}} {{__('navbar.(leave blank to leave unchanged)')}}</label>
                                    <input type="password" class="form-control" name="oldpassword">

                                    <label>{{ __('navbar.New password')}}  {{__('navbar.(leave blank to leave unchanged)')}}</label>
                                    <input type="password" class="form-control" name="password">

                                    <label>{{ __('navbar.Confirm new password')}}</label>
                                    <input type="password" class="form-control mb-2" name="password_confirmation">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>{{ __('navbar.SAVE CHANGES')}}</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                    </div>
                                </form>
                            </div><!-- .End .tab-pane -->


                            <div class="tab-pane fade" id="tab-review" role="tabpanel" aria-labelledby="tab-review-link">

                                <div class="products mb-3">
                                 @forelse ($order as $orders )

                                    <div class="product product-list">
                                        @foreach ($orders->orderDetails as $detailsOfOrder)

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <figure class="product-media" style="height: 80px; width:100px;">

                                                        <img src="{{$detailsOfOrder->prod->image}}" alt="Product image" height="100px" class="product-image">
                                                    </a>
                                                </figure><!-- End .product-media -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->

                                            <div class="col-md-3">
                                                <div class="product-cat">
                                                    <a href="#">{{$detailsOfOrder->prod->category->name}}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title">{{$detailsOfOrder->prod->name}}</h3><!-- End .product-title -->
                                                <h6>Price: Rs.{{$detailsOfOrder->price}}</h6>


                                            </div><!-- End .col-lg-6 -->

                                            <div class="col-md-3 ">
                                                    <div class="product-Qunatity">
                                                        QTY: {{$detailsOfOrder->quantity}}
                                                    </div><!-- End .product-Qunatity -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->

                                            <div class="col-md-3">
                                                <h6 class="product-title">
                                                    @if ($detailsOfOrder->status == 0)
                                                    Processing
                                                    @elseif($detailsOfOrder->status == 1)
                                                    Confirmed
                                                    @elseif ($detailsOfOrder->status == 2)
                                                    In route
                                                    @elseif ($detailsOfOrder->status == 3)
                                                    Delivered
                                                    @elseif ($detailsOfOrder->status == 4)
                                                    Cancelled
                                            @endif
                                                    </h6><!-- End .product-title -->
                                            </div><!-- End .col-lg-6 -->

                                            <div class="col-12">
                                                <h4>{{ __('navbar.My Reviews')}}</h4>
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit earum perspiciatis, beatae velit reiciendis magnam quam quos perferendis nisi esse veritatis nulla! Natus, aut fuga est neque accusantium fugiat mollitia?</p>
                                             </div>

                                        </div><!-- End .row -->
                                        @endforeach



                                    </div><!-- End .product -->
                                    @empty
                                    @endforelse




                                </div>



                            </div><!-- .End .tab-pane -->

                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('navbar.Add')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('address') }}" method="POST" class="p-2">
            @csrf
            <div class="form-group">
                <label for="register-email">{{ __('navbar.Name')}}</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <label for="register-email">{{ __('navbar.Email address')}} *</label>
                <input type="email" class="form-control" id="register-email" name="email" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <label for="register-email">{{ __('navbar.Contact')}}  *</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <label for="register-email">{{ __('navbar.Address')}}  *</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <label for="register-email">{{ __('navbar.Post Code')}}  *</label>
                <input type="text" class="form-control" id="postcode" name="postcode" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">{{ __('navbar.SAVE CHANGES')}}</button>
              </div>

          </form>
        </div>

      </div>
    </div>
  </div>

<div class="modal fade" id="editAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('navbar.New message')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('address.edit') }}" method="POST" class="p-2">
        @csrf
        <input type="hidden" name="id" id="id_edit">
        <div class="form-group">
            <label for="register-email">{{ __('navbar.Name')}}</label>
            <input type="text" class="form-control" id="name_edit" name="name" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="register-email">{{ __('navbar.Email address')}} *</label>
            <input type="email" class="form-control" id="email_edit" name="email" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="register-email">{{ __('navbar.Contact')}} *</label>
            <input type="text" class="form-control" id="contact_edit" name="contact" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="register-email">{{ __('navbar.Address')}} *</label>
            <input type="text" class="form-control" id="address_edit" name="address" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="register-email">{{ __('navbar.Post Code')}}*</label>
            <input type="text" class="form-control" id="postcode_edit" name="postcode" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('navbar.Close')}}</button>
            <button type="submit" class="btn btn-primary">{{ __('navbar.SAVE CHANGES')}}</button>
          </div>

      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="AddReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('navbar.Add Review')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('rating') }}" method="POST" class="p-2">
            @csrf
         <input type="hidden" name="user_id" id="user_id">
        <div class="modal-body">
            <div class="">
                <div class="">
                    <div class="product-details-top p-3">
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img class="product-image"  id="product_image" src=""  alt="product image">

                                        </figure><!-- End .product-main-image -->

                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->
                            <div class="col-md-4">
                                <div class="product-details">
                                    <h1 class="product-title" id="product_title">nikki</h1><!-- End .product-title -->
                                </div>


                            </div>
                            <div class="col-12">
                                <input id="rated" type="hidden" name="rating" value="0">
                                <div class='rating-stars text-center'>
                                    <ul id='stars'>
                                      <li class='star' title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                    </ul>
                                  </div>

                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" style="width: 100%" name="comment" required placeholder="Message *"></textarea>
                                <hr>
                                <button class="btn btn-primary" type="submit">{{ __('navbar.SUBMIT')}}</button>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
  </div>
</div>


@endsection


@section('page-scripts')



<script>
    $('#editAddress').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var address = button.data('address') // Extract info from data-* attributes
  var email = button.data('email') // Extract info from data-* attributes
  var contact = button.data('contact') // Extract info from data-* attributes
  var postcode = button.data('postcode') // Extract info from data-* attributes
  var name = button.data('name') // Extract info from data-* attributes
  var id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#name_edit').val(name)
  modal.find('#email_edit').val(email)
  modal.find('#address_edit').val(address)
  modal.find('#contact_edit').val(contact)
  modal.find('#postcode_edit').val(postcode)
  modal.find('#id_edit').val(id)
//   modal.find('.modal-body input').val(recipient)
});

$('#AddReview').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var name = button.data('name')
    var image = button.data('image')
    var id = button.data('id')

    var modal = $(this)
modal.find('#product_image').attr('src', image)
modal.find('#product_title').html(name)
modal.find('#user_id').val(id)
});



$(document).ready(function(){

  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });


  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = ratingValue;
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);

  });
});


function responseMessage(msg) {
//   $('.success-box').fadeIn(200);
//   $('.success-box div.text-message').html("<span>" + msg + "</span>");
$('#rated').val(msg);
}
</script>



@endsection
@section('page-styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
<style>

/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;

  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;

}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}

</style>
@endsection
