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
        <h1 class="m-0">Blogs</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
          <li class="breadcrumb-item active">Edit Blogs</li>
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
            <h5 class="card-title">Edit Blogs</h5><br>

            <form action="{{route('updateBlogs', $blog->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

              <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" value="{{$blog->name}}">
                </div><!-- /.card-body -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Authur Name</label>
                  <input type="text" class="form-control" name="author" value="{{$blog->name}}">
                </div><!-- /.card-body -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Date</label>
                  <input type="date" class="form-control" name="date"  value="{{$blog->price}}">

                </div><!-- /.card-body -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <input type="text" class="form-control" name="description" value="{{$blog->description}}">

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