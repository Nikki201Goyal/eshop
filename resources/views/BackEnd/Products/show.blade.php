@extends('BackEnd.starter')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sales</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Sales Details</li>
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
                        <h2 class="card-title" style="font: 700">Sales Details</h2><br>
                       <br>
                        <div >
                            <img src="{{ asset($product->image) }}" style="border-radius: 50%; height: 100px;"><br>
                            <h5> Product Name: {{ $product->name}}</h5>
                            <h5>Price: {{ $product->price }}</h5>
                            <h5>Category: {{ $product->category->name}}</h5>

                </div>
            </div>
            <div class="col-lg-12">


                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Sales Report</h5><br>



                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th> Buyers Name</th>
                                    <th> Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                     @foreach ($product->orders as $i=>$sale )


                                <tr>
                                    <th scope="row">{{$i+1 }}</th>
                                    <td>{{ $sale->order->user->name }}</td>
                                    <td>{{ $sale->price }}</td>
                                    <td>{{ $sale->quantity}}</td>
                                    <td>{{$sale->price* $sale->quantity }}</td>
                                    <td>
                                        {{ $sale->order->id}}
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

    @endsection

