@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <figure class="entry-media">
                <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl">
                    <img src="{{asset($blog->image)}}" alt="image desc" style="height: 500px;">
                </div><!-- End .owl-carousel -->
            </figure><!-- End .entry-media -->
            <div class="row">
                <div class="col-lg-12">
                    <article class="entry single-entry">-
                        <div class="entry-body">
                            <div class="entry-meta">
                                <span class="entry-author">
                                    by <a href="#">{{$blog->author}}</a>
                                </span>
                                <span class="meta-separator">|</span>
                                <a href="#">{{$blog->date}}</a>

                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title entry-title-big">
                                {{$blog->title}}
                            </h2><!-- End .entry-title -->



                            <div class="entry-content editor-content">
                                <p>{{$blog->description}}</p>


                            </div><!-- End .entry-content -->

                            <div class="entry-footer row no-gutters flex-column flex-md-row">



                            </div><!-- End .entry-footer row no-gutters -->
                        </div><!-- End .entry-body -->

                        <div class="entry-author-details">
                            <figure class="author-media">
                                <a href="#">
                                    <img src="{{asset($blog->AuthorPic)}}"alt="User name">
                                </a>
                            </figure><!-- End .author-media -->

                            <div class="author-body">
                                <div class="author-header row no-gutters flex-column flex-md-row">
                                    <div class="col">
                                        <h4><a href="#">{{$blog->author}}</a></h4>
                                    </div><!-- End .col -->

                                </div><!-- End .row -->

                                <div class="author-content">
                                    <p> {{ Str::limit($blog->description, 90) }}</p>
                                </div><!-- End .author-content -->
                            </div><!-- End .author-body -->
                        </div><!-- End .entry-author-details-->
                    </article><!-- End .entry -->



                    <div class="related-posts">
                        <h3 class="title">Related Posts</h3><!-- End .title -->

                        <div class="owl-carousel owl-simple" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    }
                                }
                            }'>
                            @foreach ($blogs as $blog )

                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="{{route('blogsSingle',$blog->slug)}}">
                                        <img src="{{asset($blog->image)}}"  alt="image desc">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="{{route('blogsSingle',$blog->slug)}}">{{$blog->author}}</a>
                                        <span class="meta-separator">|</span>
                                        <a href="{{route('blogsSingle',$blog->slug)}}">{{$blog->date}}</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="{{route('blogsSingle',$blog->slug)}}">{{$blog->title}}</a>
                                    </h2><!-- End .entry-title -->


                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                            @endforeach

                        </div><!-- End .owl-carousel -->
                    </div><!-- End .related-posts -->


            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
