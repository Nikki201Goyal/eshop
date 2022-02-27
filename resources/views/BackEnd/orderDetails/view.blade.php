@extends('BackEnd.starter')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Orders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">


                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h2 class="card-title">Orders Details</h2><br>
                        <div >
                            <h5>Name: {{ $order->user->name }}</h5>
                            <h5>Address: {{ $order->user->address }}</h5>
                            <h5>Contact: {{ $order->user->contact}}</h5>
                            <h5>Total Amount: {{ $order->total }}</h5>

                </div>
            </div>
            <div class="col-lg-12">


                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5><br>



                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th> Name</th>
                                    <th> Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($order->orderDetails as $i=>$product )


                                <tr>
                                    <th scope="row">{{ $i+1 }}</th>
                                    <td>{{ $product->prod->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price * $product->quantity }}</td>
                                    <td>
                                        <h6>Status: @if ($product->status == 0)
                                            Processing
                                            @elseif($product->status == 1)
                                            Confirmed
                                            @elseif ($product->status == 2)
                                            In route
                                            @elseif ($product->status == 3)
                                            Delivered
                                            @elseif ($product->status == 4)
                                            Cancelled
                                    @endif</h6>

                                        <a href="#" data-toggle="modal" data-target="#changeStatus" data-id="{{ $product->id }}" class="btn-sm btn-info mt-2"> Change Status</a>

                                    </td>
                                </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('Order.changeStatus') }}" method="post" class="p-2">
                @csrf
                <div class="toolbox-right">
                    <div class="toolbox-sort">
                        <label for="status">Change Status:</label>
                        <input type="hidden" id="id" name="id">
                        <div class="select-custom">
                            <select name="status" id="status" class="form-control">
                                <option  value= "0">Processing</option>
                                <option value="1">Confirmed</option>
                                <option value="2">In route</option>
                                <option value="3">Delivered</option>
                                <option value="4">Cancelled</option>
                            </select>
                        </div>
                    </div><!-- End .toolbox-sort -->
                </div>

                <button class="btn btn-primary mt-3" type="submit">Submit</button>

              </form>
            </div>

          </div>
        </div>
      </div>


    @endsection



   @section('admin-scripts')
   <script>
    $('#changeStatus').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#id').val(id)
  console.log(id);
})
</script>
   @endsection
