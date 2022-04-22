@extends('BackEnd.starter')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Blogs</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
          <li class="breadcrumb-item active">Create Blogs</li>
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
            <h5 class="card-title">Create Blogs</h5><br>
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
            <form action="{{route('storeBlogs')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

              <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter title name">

                </div><!-- /.card-body -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Author Name</label>
                  <input type="text" class="form-control" name="author" placeholder="Enter Author name">
                </div><!-- /.card-body -->

                <div class="form-group">
                    <label class="form-control-label" for="input-image">Author Image</label>
                    <input type="file" name="AuthorPic" class="form-control">
                  </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Date</label>
                  <input type="date" class="form-control" name="date">

                </div><!-- /.card-body -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea name="description" id="editor1" cols="30" rows="5"></textarea>

                </div><!-- /.card-body -->

                <div class="form-group">
                  <label class="form-control-label" for="input-image">Images</label>
                  <input type="file" name="image" class="form-control">
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
  @section('admin-scripts')
  <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'description' );
</script>
  @endsection


