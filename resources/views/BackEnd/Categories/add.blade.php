@extends('BackEnd.starter')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Categories</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
          <li class="breadcrumb-item active">Create</li>
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
            <h5 class="card-title">Create Categories</h5><br>
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
            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter category name">
                  @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div><!-- /.card-body -->


                <div class="form-group">
                  <label class="form-control-label" for="input-image">Images</label>
                  <input type="file" name="photo" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-control-label" for="input-image">Cover</label>
                  <input type="file" name="cover" class="form-control">
                </div>

               

                <div class="form-group">
                    <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
              </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- /.card -->
      </div>
      <!-- /.col-md-6 -->

      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

  @endsection
