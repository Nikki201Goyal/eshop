<header class="header header-intro-clearance header-3">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>{{ __('navbar.Call')}}: +0123 456 789</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>

                            <li>
                                <div class="header-dropdown">
                                    <a href="#"> {{ Config::get('languages')[App::getLocale()] }}</a>
                                    <div class="header-menu">
                                        <ul>
                                            @foreach (Config::get('languages') as $lang => $language)
                                                @if ($lang != App::getLocale())
                                                    <li><a href="{{ route('language', $lang) }}">{{$language}}</a></li>
{{--                                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>--}}
                                                @endif
                                            @endforeach
{{--                                            <li><a href="{{ route('language','en') }}">English</a></li>--}}
{{--                                            <li><a href="{{ route('language','np') }}">Nepali</a></li>--}}

                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li>
                            @auth
                            <li><a href="{{ route('logout') }}">{{ __('navbar.Logout')}}</a></li>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal">{{ __('navbar.Login')}} / {{ __('navbar.Register')}}</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{asset('FrontEnd/assets/images/eshoplogo.png')}}" alt="Molla Logo" width="200" height="30" style="margin-top: -15%; margin-left:-30%">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{ route('search') }}" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q" placeholder="{{ __('navbar.Search product')}} ..."
                                required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                @auth
                    <div class="wishlist">
                        <a href="{{ route('compare') }}" title="Wishlist">
                            <div class="icon">
                                <i class="icon-random"></i>

                            </div>
                            <p>{{ __('navbar.Compare') }}</p>
                        </a>
                    </div><!-- End .compare-dropdown -->

                <div class="wishlist">
                    <a href="{{ route('wishlist') }}" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>

                        </div>
                        <p>{{ __('navbar.Wishlist') }}</p>
                    </a>
                </div><!-- End .compare-dropdown -->

                <div class="dropdown cart-dropdown">
                    <a href="{{ route('cart') }}" class="dropdown-toggle" title="Cart">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>

                        </div>
                        <p>{{ __('navbar.Cart') }}</p>
                    </a>


                </div><!-- End .cart-dropdown -->
                <div class="wishlist">
                    <a href="{{ route('dashboard') }}" title="Wishlist">
                        <div class="icon">
                            <i class="icon-user"></i>

                        </div>
                        <p>{{ __('navbar.Profile') }}</p>
                    </a>
                </div><!-- End .compare-dropdown -->
                @endauth
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static" title="Browse Categories">
                        {{ __('navbar.Browse Categories')}}<i class="icon-angle-down"></i>
                    </a>

                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                @foreach ($cats as $category )

                                <li>
                                    <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>


                                </li>
                                @endforeach

                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{route('home')}}">{{ __('navbar.Home') }}</a>
                        </li>

                        <!-- <li>
                            <a href="product.html">Product</a>


                        </li> -->
                        <li>
                            <a href="#" class="sf-with-ul">{{ __('navbar.Pages') }}</a>

                            <ul>
                                <li>
                                    <a href="{{route('about')}}">{{ __('navbar.About') }}</a>


                                </li>
                                <li>
                                    <a href="{{route('contact')}}">{{ __('navbar.Contact') }}</a>


                                </li>

                                <li><a href="{{route('faq')}}">{{ __('navbar.FAQs') }}</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="{{route('blogs')}}">{{ __('navbar.Blog') }}</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div>{{$error}}</div>
    @endforeach
    @endif
</header><!-- End .header -->
