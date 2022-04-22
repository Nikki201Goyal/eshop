@extends('BackEnd.starter')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
          <li class="breadcrumb-item active">Edit Products</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">


        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title">Edit Products</h5><br>
            @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" value="{{$user->name}}">

                </div><!-- /.card-body -->

                <div class="form-group">
                  <label for="exampleInputEmail1">address</label>
                  <input type="text" class="form-control" name="address"  value="{{$user->address}}">

                </div><!-- /.card-body -->

                <div class="form-group">
                  <label for="description">Contact</label>
                  <input type="text" class="form-control" name="contact"  value="{{$user->contact}}">


                </div><!-- /.card-body -->

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email"  value="{{$user->email}}">

                  </div><!-- /.card-body -->

                  <div class="form-group">
                    <label class="form-control-label" for="input-image">Images</label>
                    <input type="file" name="image" class="form-control">
                  </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Submit</button>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.card -->
    </div>
    <!-- /.col-md-6 -->

    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->


@endsection
