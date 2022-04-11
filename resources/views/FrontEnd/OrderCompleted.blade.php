@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Completed</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="error-content text-center" style="background-image: url({{asset('Frontend/assets/images/orderCompleted.jpg')}})">
        <div class="container">
            <h1 class="error-title">Order Completed</h1><!-- End .error-title -->
            <a href="{{ route('home') }}" class="btn btn-outline-primary-2 btn-minwidth-lg">
                <span>BACK TO HOMEPAGE</span>
                <i class="icon-long-arrow-right"></i>
            </a>
            <a href="{{ route('invoice',['oid'=>request('oid')]) }}" class="btn btn-outline-primary-2 btn-minwidth-lg">
                <span>PRINT INVOIVE</span>
                <i class="icon-long-arrow-right"></i>
            </a>
        </div><!-- End .container -->
    </div><!-- End .error-content text-center -->
</main><!-- End .main -->

@endsection
