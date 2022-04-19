@extends('BackEnd.starter')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product List</li>
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
                        <h5 class="card-title">Product List</h5><br>

                        <a href="{{route('products.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Products</a><br><br>
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th> Name</th>
                                    <th> Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Cover Image</th>
                                    <th>Category</th>
                                    <th>stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $pro)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$pro->name}}</td>
                                    <td>{{$pro->price}}</td>
                                    <td>{!!$pro->description!!}</td>
                                    <td><img src="{{asset($pro->image)}}" style="width: 60px; height: 60px;"></td>
                                    <td><img src="{{asset($pro->cover)}}" style="width: 60px; height: 60px;"></td>
                                    <td>{{$pro->category->name}}</td>
                                    <td>{{$pro->stock}}</td>

                                    <td>@if($pro->status == true) <a href="{{ route('Product.toggleStatus', $pro->id) }}" class="btn btn-primary">Enabled</a>
                                    @else <a href="{{ route('Product.toggleStatus', $pro->id) }}" class="btn btn-danger">Disabled</a>@endif </td>

                                    <td>
                                        <a href="{{route('products.edit', $pro->id)}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{route('products.show', $pro->id)}}" class="btn btn-sm btn-success">
                                            <i class="fa fa-desktop"></i>
                                        </a>

                                        <!-- <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="products-delete-{{$pro->id}}">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        <form id="products-delete-{{$pro->id}}" action="{{route('admin.delete', $pro->id)}}">
                                            @csrf
                                            @method('DELETE')

                                        </form> -->
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

