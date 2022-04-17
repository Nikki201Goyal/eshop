@extends('BackEnd.starter')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">User List</li>
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
                        <h5 class="card-title">User List</h5><br>

                        <a href="{{route('users.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add User </a><br><br>
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
                                    <th> Address</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $user)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->contact}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><img src="{{asset($user->image)}}" style="width: 60px; height: 60px;"></td>
                                    <td>@if($user->status == true) <a href="{{ route('user.toggleStatus', $user->id) }}" class="btn btn-primary">Enabled</a>
                                    @else <a href="{{ route('user.toggleStatus', $user->id) }}" class="btn btn-danger">Disabled</a>@endif </td>

                                    <td>
                                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
@if($user->id != Auth::user()->id)
                                        <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="users-delete-{{$user->id}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
@endif
                                        <form id="users-delete-{{$user->id}}" action="{{route('user.delete', $user->id)}}">
                                            @csrf
                                            @method('DELETE')

                                        </form>
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

