<header class="header header-intro-clearance header-3">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>

                            <li>
                                <div class="header-dropdown">
                                    <a href="#">English</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">Nepali</a></li>

                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li>
                            @auth
                            <li><a href="#signin-modal">Logout</a></li>

                            @else
                            <li><a href="#signin-modal" data-toggle="modal">Login / Register</a></li>
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

                <a href="index.html" class="logo">
                    <!-- <img src="{{asset('FrontEnd/assets/images/Image/Slider/logo.png')}}" alt="Molla Logo" width="105" height="25"> -->
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..."
                                required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                @auth
                <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static" title="Compare Products"
                        aria-label="Compare Products">
                        <div class="icon">
                            <i class="icon-random"></i>
                        </div>
                        <p>Compare</p>
                    </a>


                </div><!-- End .compare-dropdown -->

                <div class="wishlist">
                    <a href="{{ route('wishlist') }}" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>

                        </div>
                        <p>Wishlist</p>
                    </a>
                </div><!-- End .compare-dropdown -->

                <div class="dropdown cart-dropdown">
                    <a href="{{ route('cart') }}" class="dropdown-toggle" title="Cart">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>

                        </div>
                        <p>Cart</p>
                    </a>


                </div><!-- End .cart-dropdown -->
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
                        Browse Categories <i class="icon-angle-down"></i>
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
                            <a href="{{route('home')}}">Home</a>


                        </li>

                        <!-- <li>
                            <a href="product.html">Product</a>


                        </li> -->
                        <li>
                            <a href="#" class="sf-with-ul">Pages</a>

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
