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
                    <li class="breadcrumb-item active">Blogs</li>
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
                        <h5 class="card-title">Blogs</h5><br>

                        <a href="{{route('createBlogs')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Blogs</a><br><br>
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Title</th>
                                    <th>Author Name</th>
                                    <th>Author Image</th>
                                    <th> Date of Blog</th>
                                    <th>image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->author}}</td>
                                    <td><img src="{{asset($blog->AuthorPic)}}" style="width: 60px; height: 60px;"></td>
                                    <td>{{$blog->date}}</td>
                                    <td><img src="{{asset($blog->image)}}" style="width: 60px; height: 60px;"></td>
                                    <td>{{$blog->description}}</td>

                                    <td>
                                        <?php if ($blog->status == '1') { ?>
                                            <a href="{{url('/status-updateBlog',$blog->id)}}" class="btn btn-success">Active</a>

                                        <?php } else { ?>
                                            <a href="{{url('/status-updateBlog',$blog->id)}}" class="btn btn-danger">Inactive</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="{{route('editBlogs', $blog->id)}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>Edit
                                        </a>

                                        <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="Blogs-delete-{{$blog->id}}">
                                            <i class="fa fa-trash"></i>Delete
                                        </a>

                                        <form id="Blogs-delete-{{$blog->id}}" action="{{route('deleteBlogs', $blog->id)}}">
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
