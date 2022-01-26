@extends('BackEnd.starter')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
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
                        <h5 class="card-title">Categories</h5><br>

                        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Categories</a><br><br>

                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th> Name</th>
                                    <th> Photo</th>
                                    <th>Cover</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $cate)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$cate->name}}</td>
                                    <td><img src="{{asset($cate->photo)}}" style="width: 60px; height: 60px;"></td>
                                    <td><img src="{{asset($cate->cover)}}" style="width: 60px; height: 60px;"></td>
                                    <td>{{$cate->slug}}</td>
                                    <td>
                                        <a href="{{route('categories.edit', $cate->id)}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('categories.show', $cate->id)}}" class="btn btn-sm btn-success">
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
