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
                        <h5 class="card-title">Orders</h5><br>



                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th> Name</th>
                                    <th> Contact</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Payment-Method</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $ord)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$ord->user->name}}</td>
                                    <td>{{$ord->user->contact}}</td>
                                    <td>{{$ord->total}}</td>
                                    <td>{{$ord->discount}}</td>
                                    <td>{{$ord->payment_method}}</td>
<td>
                                        <a href="{{ route('orders.show', $ord->id) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-desktop"></i>Details
                                        </a>
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
