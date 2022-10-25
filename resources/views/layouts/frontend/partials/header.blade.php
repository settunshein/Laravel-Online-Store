<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +959 123 123 123</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@example.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="{{ asset('frontend/images/home/logo.png') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li class="dropdown acc-dropdown">
                                <a href="#">
                                    <i class="ri ri-account-circle-line"></i>
                                    ACCOUNT<i class="fa fa-angle-down"></i>
                                </a>
                                <ul role="menu" class="acc-sub-menu sub-menu">
                                    <li>
                                        <a href="blog.html">
                                            <i class="ri ri-profile-line"></i>
                                            PROFILE    
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-single.html">
                                            <i class="ri ri-history-line"></i>
                                            ORDER HISTORY
                                        </a>
                                    </li>
                                </ul>
                            </li> 
                            <li>
                                <a href="{{ route('cart.index') }}">
                                    <i class="ri ri-shopping-cart-line"></i>
                                    CART
                                    ( 
                                    <span class="cart-count">
                                        {{ session()->has('cart') && count(session()->get('cart')) > 0 ? count(session()->get('cart')) : 0 }}
                                    </span>
                                     )
                                </a>
                            </li>
                            <li>
                                @guest
                                <a href="{{ url('/login') }}">
                                    <i class="ri ri-lock-unlock-line"></i> 
                                    LOGIN & REGISTER
                                </a>
                                @else
                                <a href="{{ url('/logout') }}">
                                    <i class="ri ri-lock-unlock-line"></i> 
                                    LOGOUT
                                </a>
                                @endguest
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('home') }}" class="@yield('home-active')">HOME</a></li>
                            <li><a href="{{ url('/') }}" class="">SHOP</a></li>
                            <li><a href="{{ route('cart.index') }}" class="@yield('cart-active')">CART</a></li>
                            <li><a href="contact-us.html">CONTACT</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!--/header-->