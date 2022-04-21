@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>

            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row mt-5">

            <div class="entry-container max-col-2" data-layout="fitRows">
                @foreach($blogs as $blog)

                <div class="entry-item lifestyle shopping col-sm-6">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <a href="{{route('blogsSingle',$blog->slug)}}">
                                <img src="{{asset($blog->image)}}" alt="image desc" >
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                <span class="entry-author">
                                    by <a href="{{route('blogsSingle',$blog->slug)}}">{{$blog->author}}</a>
                                </span>
                                <span class="meta-separator">|</span>
                                <a href="{{route('blogsSingle',$blog->slug)}}">{{$blog->date}}</a>

                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                <a href="{{route('blogsSingle',$blog->slug)}}">{{$blog->title}}</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>{!! Str::limit($blog->description, 200) !!}</p>
                                <a href="{{route('blogsSingle',$blog->slug)}}" class="read-more">Continue Reading</a>

                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->

                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->
                @endforeach

            </div><!-- End .entry-container -->
            </div>
            
            <div class="d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
            </div>
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
