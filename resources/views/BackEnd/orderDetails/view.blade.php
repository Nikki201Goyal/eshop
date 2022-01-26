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

    @endsection
