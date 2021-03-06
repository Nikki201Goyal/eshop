@extends('FrontEnd.Layouts.master')
@section('content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__('navbar.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('navbar.About us') }}</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
	        	<div class="page-header page-header-big text-center" style="background-image: url({{asset('Frontend/assets/images/Image/Products/about2.png')}})">
        			<h1 class="page-title text-white">{{ __('navbar.About us') }}<span class="text-white">{{ __('navbar.Who we are') }}</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <h2 class="title">{{ __('navbar.Our Vision') }}</h2><!-- End .title -->
                            <p style="text-justify: auto;">E-SHOP visions itself on-trend styles catering every gadget, adhering to the concept that "everyone can enjoy the beauty of shopping with thier comfort zones"
                            E-SHOP visions itself on-trend styles catering every gadget, adhering to the concept that "everyone can enjoy the beauty of shopping with thier comfort zones". ' </p>
                        </div><!-- End .col-lg-6 -->

                        <div class="col-lg-6">
                            <h2 class="title">{{ __('navbar.Our Mission') }}</h2><!-- End .title -->
                            <p> We aim to buld a strong and profitable service by delivering to our customers a professional service ensuring that the statisfaction of their needs is central to everything we do. <p>
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->

                    <div class="mb-5"></div><!-- End .mb-4 -->

                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-puzzle-piece"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ __('navbar.Design Quality')}}</h3><!-- End .icon-box-title -->
                                    <p>This ESHOP provides the best quality products with best and nice brands and amanzaing products with different categories.</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-life-ring"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ __('navbar.Professional Support')}}</h3><!-- End .icon-box-title -->
                                    <p>This ESHOP provides best quality products with minimum and affordable price and best brands. Hence, provides professional support too. </p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-heart-o"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ __('navbar.Made With Love')}}</h3><!-- End .icon-box-title -->
                                    <p>Pellentesque a diam sit amet mi ullamcorper <br>vehicula. Nullam quis massa sit amet <br>nibh viverra malesuada.</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->



                <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <h2 class="title">{{ __('navbar.Who We Are')}}</h2><!-- End .title -->
                                <p class="lead text-primary mb-3">ESHOP <br>One of the best Ecommerce Web App</p><!-- End .lead text-primary -->
                                <p class="mb-2"> The innovating ideas giving experience to client in a professional manner to ensure the satisfaction of online shopping in your area. </p>

                                <a href="{{route('blogs')}}" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                                    <span>{{ __('navbar.VIEW OUR NEWS')}}</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .col-lg-5 -->

                            <div class="col-lg-6 offset-lg-1">
                                <div class="about-images">
                                    <img src="{{asset('Frontend/assets/images/about/img11.png')}}" alt="" class="about-img-front">
                                    <img src="{{asset('Frontend/assets/images/about/img2.png')}}" alt="" class="about-img-back">
                                </div><!-- End .about-images -->
                            </div><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light-2 pt-6 pb-6 -->

                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="brands-text">
                                <h2 class="title">{{ __('navbar.The worlds premium design brands in one destination.')}}</h2><!-- End .title -->
                                <p>{{ __('navbar.Our ESHOP provides the products of all the best and named brands all over the world.')}}</p>
                            </div><!-- End .brands-text -->
                        </div><!-- End .col-lg-5 -->



                        <div class="col-lg-7">
                            <div class="brands-display">
                                <div class="row justify-content-center">
                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="{{asset('Frontend/assets/images/Image/Products/nike.png')}}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="{{asset('Frontend/assets/images/Image/Products/gucci.png')}}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="{{asset('Frontend/assets/images/Image/Products/brand1.png')}}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="{{asset('Frontend/assets/images/Image/Products/brand2.png')}}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="{{asset('Frontend/assets/images/Image/Products/dell (2).png')}}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="{{asset('Frontend/assets/images/Image/Products/hp (1).png')}}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="{{asset('Frontend/assets/images/Image/Products/erke.png')}}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="{{asset('Frontend/assets/images/Image/Products/Untitled design (8).png')}}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="{{asset('Frontend/assets/images/Image/Products/Untitled design (9).png')}}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .brands-display -->
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->

                    <div class="bg-image pt-7 pb-5 pt-md-12 pb-md-9" style="background-image: url({{asset('Frontend/assets/images/bg-4.jpg')}})">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <div class="count-container text-center">
                                        <div class="count-wrapper text-white">
                                            <span class="count" data-from="0" data-to="40" data-speed="3000" data-refresh-interval="50">0</span>k+
                                        </div><!-- End .count-wrapper -->
                                        <h3 class="count-title text-white">{{ __('navbar.Happy Customer')}}</h3><!-- End .count-title -->
                                    </div><!-- End .count-container -->
                                </div><!-- End .col-6 col-md-3 -->

                                <div class="col-6 col-md-3">
                                    <div class="count-container text-center">
                                        <div class="count-wrapper text-white">
                                            <span class="count" data-from="0" data-to="20" data-speed="3000" data-refresh-interval="50">0</span>+
                                        </div><!-- End .count-wrapper -->
                                        <h3 class="count-title text-white">{{ __('navbar.Years in Business')}}</h3><!-- End .count-title -->
                                    </div><!-- End .count-container -->
                                </div><!-- End .col-6 col-md-3 -->

                                <div class="col-6 col-md-3">
                                    <div class="count-container text-center">
                                        <div class="count-wrapper text-white">
                                            <span class="count" data-from="0" data-to="95" data-speed="3000" data-refresh-interval="50">0</span>%
                                        </div><!-- End .count-wrapper -->
                                        <h3 class="count-title text-white">{{ __('navbar.Return Clients')}}</h3><!-- End .count-title -->
                                    </div><!-- End .count-container -->
                                </div><!-- End .col-6 col-md-3 -->

                                <div class="col-6 col-md-3">
                                    <div class="count-container text-center">
                                        <div class="count-wrapper text-white">
                                            <span class="count" data-from="0" data-to="15" data-speed="3000" data-refresh-interval="50">0</span>
                                        </div><!-- End .count-wrapper -->
                                        <h3 class="count-title text-white">{{ __('navbar.Awards Won')}}</h3><!-- End .count-title -->
                                    </div><!-- End .count-container -->
                                </div><!-- End .col-6 col-md-3 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .bg-image pt-8 pb-8 -->

                    <hr class="mt-4 mb-6">

                    <h2 class="title text-center mb-4">{{ __('navbar.Meet Our Team')}}</h2><!-- End .title text-center mb-2 -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="member member-anim text-center">
                                <figure class="member-media">
                                    <img src="{{asset('Frontend/assets/images/team/Nikki (1).png')}}" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="member-overlay-content">
                                            <h3 class="member-title">Nikki Goyal<span>Founder & CEO</span></h3><!-- End .member-title -->
                                            <p>Sed pretium, ligula sollicitudin viverra, tortor libero sodales leo, eget blandit nunc.</p>
                                            <div class="social-icons social-icons-simple">
                                                <a href="https://www.facebook.com" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .member-overlay-content -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">Nikki Goyal<span>Founder & CEO</span></h3><!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="member member-anim text-center">
                                <figure class="member-media">
                                    <img src="{{asset('Frontend/assets/images/team/Krish.png')}}" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="member-overlay-content">
                                            <h3 class="member-title">Krish Goyal<span>Sales & Marketing Manager</span></h3><!-- End .member-title -->
                                            <p>Sed pretium, ligula sollicitudin viverra, tortor libero sodales leo, eget blandit nunc.</p>
                                            <div class="social-icons social-icons-simple">
                                                <a href="https://www.facebook.com" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .member-overlay-content -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">Krish Goyal<span>Sales & Marketing Manager</span></h3><!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="member member-anim text-center">
                                <figure class="member-media">
                                    <img src="{{asset('Frontend/assets/images/team/Pratik.png')}}" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="member-overlay-content">
                                            <h3 class="member-title">Nikesh Agarwal<span>Product Manager</span></h3><!-- End .member-title -->
                                            <p>Sed pretium, ligula sollicitudin viverra, tortor libero sodales leo, eget blandit nunc.</p>
                                            <div class="social-icons social-icons-simple">
                                                <a href="https://www.facebook.com" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .member-overlay-content -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">Nikesh Agarwal<span>Product Manager</span></h3><!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->

                <div class="mb-2"></div><!-- End .mb-2 -->

                <div class="about-testimonials bg-light-2 pt-6 pb-6">
                    <div class="container">
                        <h2 class="title text-center mb-3">{{ __('navbar.What Customer Say About Us')}}</h2><!-- End .title text-center -->

                        <div class="owl-carousel owl-simple owl-testimonials-photo" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "1200": {
                                        "nav": true
                                    }
                                }
                            }'>
                            <blockquote class="testimonial text-center">
                                <img src="{{asset('Frontend/assets/images/testimonials/user-1.jpg')}}" alt="user">
                                <p>??? Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque aliquet nibh nec urna. <br>In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. ???</p>
                                <cite>
                                    Nikhil Singhal
                                    <span>Customer</span>
                                </cite>
                            </blockquote><!-- End .testimonial -->

                            <blockquote class="testimonial text-center">
                                <img src="{{asset('Frontend/assets/images/testimonials/user-2.jpg')}}" alt="user">
                                <p>??? Impedit, ratione sequi, sunt incidunt magnam et. Delectus obcaecati optio eius error libero perferendis nesciunt atque dolores magni recusandae! Doloremque quidem error eum quis similique doloribus natus qui ut ipsum.Velit quos ipsa exercitationem, vel unde obcaecati impedit eveniet non. ???</p>

                                <cite>
                                    Rushali Acharya
                                    <span>Customer</span>
                                </cite>
                            </blockquote><!-- End .testimonial -->
                        </div><!-- End .testimonials-slider owl-carousel -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light-2 pt-5 pb-6 -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        @endsection
