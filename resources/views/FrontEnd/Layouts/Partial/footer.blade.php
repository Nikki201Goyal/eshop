<footer class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="{{asset('FrontEnd/assets/images/logoEshop.png')}}" class="footer-logo" alt="Footer Logo" width="250" height="25">
                        <p> One of the best ecommerce web application, with branded product and minum rate. </p>

                        <div class="widget-call">
                            <i class="icon-phone"></i>
                            Got Question? Call us 24/7
                            <a href="tel:#">+0123 456 789</a>
                        </div><!-- End .widget-call -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">{{ __('navbar.Useful Links') }}</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{route('about')}}">{{ __('navbar.About') }} </a></li>
                            <li><a href="{{route('faq')}}">{{ __('navbar.FAQs') }}</a></li>
                            <li><a href="{{route('contact')}}">{{ __('navbar.Contact Us') }}</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">{{ __('navbar.Customer Service') }}</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{route('return')}}">{{ __('navbar.Returns') }}</a></li>
                            <li><a href="{{route('terms')}}">{{ __('navbar.Terms and conditions') }}</a></li>
                            <li><a href="{{route('privacy')}}">{{ __('navbar.Privacy Policy') }}</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">{{ __('navbar.My Account') }}</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{ route('dashboard') }}">{{ __('navbar.My Profile') }}</a></li>
                            <li><a href="{{ route('cart') }}">{{ __('navbar.View Cart') }}</a></li>
                            <li><a href="{{ route('wishlist') }}">{{ __('navbar.My Wishlist')}}</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2020 Nikki Goyal. All Rights Reserved.</p><!-- End .footer-copyright -->
            <figure class="footer-payments">
                <img src="{{asset('FrontEnd/assets/images/payments.png')}}" alt="Payment methods" width="272" height="20">
            </figure><!-- End .footer-payments -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->
</div><!-- End .page-wrapper -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        {{-- <li class="active">
                            <a href="index.html">Home</a>
                            <ul>
                                <li>
                                    <a href="#">Electronics</a>
                                </li>
                                <li>
                                    <a href="#">Furniture</a>
                                </li>
                                <li>
                                    <a href="#">Clothing</a>
                                </li>
                                <li><a href="#">Home Appliances</a></li>
                                <li><a href="#">Healthy & Beauty</a></li>
                                <li><a href="#">Shoes & Boots</a></li>
                            </ul>
                        </li> --}}
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>

                        <li>
                            <a href="#">Pages</a>
                            <ul>
                                <li>
                                    <a href="{{route('about')}}">About</a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}">Contact</a>
                                </li>
                                <li><a href="{{route('faq')}}">FAQs</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('blogs')}}">Blog</a>


                        </li>

                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                        <ul class="menu-vertical sf-arrows">
                            @foreach ($cats as $category )

                            <li>
                                <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>


                            </li>
                            @endforeach

                        </ul><!-- End .menu-vertical -->
                    </ul><!-- End .mobile-cats-menu -->
                </nav><!-- End .mobile-cats-nav -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->


    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Sign in / Register Modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="singin-email">Username or email address *</label>
                                        <input type="text" class="form-control" id="singin-email" name="email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password *</label>
                                        <input type="password" class="form-control" id="singin-password" name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="{{route('password.request')}}" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>

                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="register-email">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-email">Your email address *</label>
                                        <input type="email" class="form-control" id="register-email" name="email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-email">Contact *</label>
                                        <input type="text" class="form-control" id="contact" name="contact" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-email">Address *</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control" id="register-password" name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password"> Confirm Password *</label>
                                        <input type="password" class="form-control" id="register-confirmpassword" name="password_confirmation" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>

                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->
