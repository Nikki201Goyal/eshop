@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>

            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">


            <div class="entry-container max-col-2" data-layout="fitRows">
                <div class="entry-item lifestyle shopping col-sm-6">
                     @foreach($blogs as $blog)
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <a href="">
                                <img src="{{asset($blog->image)}}" alt="image desc" >
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                <span class="entry-author">
                                    by <a href="#">{{$blog->author}}</a>
                                </span>
                                <span class="meta-separator">|</span>
                                <a href="#">{{$blog->date}}</a>

                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                <a href="">{{$blog->title}}</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>{{$blog->description}}</p>

                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->

                    </article><!-- End .entry -->
                    @endforeach
                </div><!-- End .entry-item -->
            </div><!-- End .entry-container -->
            <div class="d-flex justify-content-center">
                {{ $blogs->links() }}

            </div>
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
