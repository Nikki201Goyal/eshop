@extends('FrontEnd.Layouts.master')
@section('content')

<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('navbar.Contact Us') }}</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
	        	<div class="page-header page-header-big text-center" style="background-image: url({{asset('Frontend/assets/images/Image/Slider/contact-header-bg.jpg')}})">
        			<h1 class="page-title text-white">{{ __('navbar.Contact Us') }}<span class="text-white">{{ __('navbar.keep in touch with us') }}</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
                			<h2 class="title mb-1">{{ __('navbar.Contact Information') }}</h2><!-- End .title mb-2 -->
                			<p class="mb-3">{{ __('navbar.Our ecomerce website named ESHOP is one of the famous web application with varieties of products available. If any problem please free to contact with us. Keep in touch.') }}</p>
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<h3>{{ __('navbar.The') }} {{ __('navbar.Office') }}</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-map-marker"></i>
	                							{{ __('navbar.Dharan') }}, {{ __('navbar.Nepal') }}
	                						</li>
                							<li>
                								<i class="icon-phone"></i>
                								<a href="tel:#">+977 530 754</a>
                							</li>
                							<li>
                								<i class="icon-envelope"></i>
                								<a href="mailto:#">Nikkigoyal107@gmail.com</a>
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->

                				<div class="col-sm-5">
                					<div class="contact-info">
                						<h3>{{ __('navbar.The') }} {{__('navbar.Office') }}</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-clock-o"></i>
	                							<span class="text-dark">{{__('navbar.Sunday') }}-{{__('navbar.Friday') }}</span> <br>11am-7pm
	                						</li>
                							<li>
                								<i class="icon-calendar"></i>
                								<span class="text-dark">{{ __('navbar.Sunday') }}</span> <br>11am-6pm
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-5 -->
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h2 class="title mb-1">{{__('navbar.Got Any Questions?') }}</h2><!-- End .title mb-2 -->
                			<p class="mb-2">{{ __('navbar.Use the form below to get in touch with the sales team') }}</p>

                			<form action="{{route('storeContact')}}" class="contact-form mb-3">
                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cname" class="sr-only">{{ __('navbar.Name') }}</label>
                						<input type="text" class="form-control" name="name" id="cname" placeholder="{{ __('navbar.Name') }} *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="cemail" class="sr-only">{{ __('navbar.Email') }}</label>
                						<input type="email" class="form-control" name="email" id="cemail" placeholder="{{ __('navbar.Email') }} *" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cphone" class="sr-only">{{ __('navbar.Phone') }}</label>
                						<input type="tel" class="form-control" name="phone" id="cphone" placeholder="{{ __('navbar.Phone') }}">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="csubject" class="sr-only">{{ __('navbar.Subject') }}</label>
                						<input type="text" class="form-control" name="subject" id="csubject" placeholder="{{ __('navbar.Subject') }}">
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                                <label for="cmessage" class="sr-only">{{ __('navbar.Message') }}</label>
                				<textarea class="form-control" cols="30" rows="4" name="message" id="cmessage" required placeholder="{{ __('navbar.Message') }} *"></textarea>

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>{{ __('navbar.SUBMIT') }}</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

                	<hr class="mt-4 mb-5">


                </div><!-- End .container -->
            	<div id="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.781513670599!2d87.26944461453817!3d26.462770785686057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef745d361fcd85%3A0x4630dea93a524ebc!2sMamata%20Marg%2C%20Biratnagar%2056613!5e0!3m2!1sen!2snp!4v1641974995418!5m2!1sen!2snp"
                        width="160%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div><!-- End #map -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        @endsection
