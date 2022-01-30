@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
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
                                <a class="nav-link active" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Sign Out</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">


                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <p>No order has been made yet.</p>
                                <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- .End .tab-pane -->



                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>  <a href="#" data-toggle="modal" data-target="#exampleModal">Add <i class="icon-plus"></i></a>
                                <div class="row">@foreach ($address as $i=>$add )

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Address {{ $i+1 }}</h3><!-- End .card-title -->

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
                                <form action="#">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Display Name *</label>
                                    <input type="text" class="form-control" required>
                                    <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                    <label>Email address *</label>
                                    <input type="email" class="form-control" required>

                                    <label>Current password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control mb-2">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
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
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('address') }}" method="POST" class="p-2">
            @csrf
            <div class="form-group">
                <label for="register-email">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <label for="register-email">Your email address *</label>
                <input type="email" class="form-control" id="register-email" name="email" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <label for="register-email">Contact *</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <label for="register-email">Address *</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <label for="register-email">Post Code *</label>
                <input type="text" class="form-control" id="postcode" name="postcode" required>
            </div><!-- End .form-group -->

            <div class="form-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
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
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('address.edit') }}" method="POST" class="p-2">
        @csrf
        <input type="hidden" name="id" id="id_edit">
        <div class="form-group">
            <label for="register-email">Name</label>
            <input type="text" class="form-control" id="name_edit" name="name" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="register-email">Your email address *</label>
            <input type="email" class="form-control" id="email_edit" name="email" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="register-email">Contact *</label>
            <input type="text" class="form-control" id="contact_edit" name="contact" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="register-email">Address *</label>
            <input type="text" class="form-control" id="address_edit" name="address" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="register-email">Post Code *</label>
            <input type="text" class="form-control" id="postcode_edit" name="postcode" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
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
})
</script>
@endsection
