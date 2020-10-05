<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('assets/website/images/index.png')}}">
    <title>@yield('title')</title>


    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap-select.min.css') }}">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="{{ asset('assets/website/js/jquery-1.11.1.min.js') }}"></script>
</head>
<body class="cnt-home">
@csrf
<!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <div class="top-bar animate-dropdown">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                            <li><a href="#"><i class="icon fa fa-lock"></i>Login</a></li>
                            <li><a href="#"><i class="icon fa fa-home"></i>Register</a></li><li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon fa fa-arrow-circle-right" ></i>Logout</a></li>
                        </ul>
                    </div><!-- /.cnt-account -->

                    <div class="cnt-block">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">BDT</a></li>
                                </ul>
                            </li>

                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.cnt-cart -->
                    <div class="clearfix"></div>
                </div><!-- /.header-top-inner -->
            </div><!-- /.container -->
        </div><!-- /.header-top -->
        <!-- ============================================== TOP MENU : END ============================================== -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo">
                            <a href="#">

                                <img src="{{asset('assets/website/images/index.png')}}" alt="" style="height: 40px; ">

                            </a>
                        </div><!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                        <!-- /.contact-row -->
                        <!-- ============================================================= SEARCH AREA ============================================================= -->
                        <div class="search-area">
                            <form>
                                <div class="control-group">

                                    <ul class="categories-filter animate-dropdown">
                                        <li class="dropdown">

                                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Categories <b class="caret"></b></a>

                                            <ul class="dropdown-menu" role="menu" >
                                                <li class="menu-header">Computer</li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">- Clothing</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">- Electronics</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">- Shoes</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">- Watches</a></li>

                                            </ul>
                                        </li>
                                    </ul>

                                    <input class="search-field" placeholder="Search here..." />

                                    <a class="search-button" href="#" ></a>

                                </div>
                            </form>
                        </div><!-- /.search-area -->
                        <!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                        <div class="dropdown dropdown-cart">
                            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </div>
                                    <div class="basket-item-count"><span class="count">2</span></div>
                                    <div class="total-price-basket">
                                        <span class="lbl">cart -</span>
                                        <span class="total-price">
						<span class="sign">$</span><span class="value">600.00</span>
					</span>
                                    </div>


                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image">
                                                    <a href="#"><img src="{{asset('assets/website/images/cart.jpg')}}" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">

                                                <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                                                <div class="price">$600.00</div>
                                            </div>
                                            <div class="col-xs-1 action">
                                                <a href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->
                                    <div class="clearfix"></div>
                                    <hr>

                                    <div class="clearfix cart-total">
                                        <div class="pull-right">

                                            <span class="text">Sub Total :</span><span class='price'>$600.00</span>

                                        </div>
                                        <div class="clearfix"></div>

                                        <a href="#" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                    </div><!-- /.cart-total-->


                                </li>
                            </ul><!-- /.dropdown-menu-->
                        </div><!-- /.dropdown-cart -->

                        <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
                </div><!-- /.row -->

            </div><!-- /.container -->

        </div><!-- /.main-header -->

        <!-- ============================================== NAVBAR ============================================== -->
        <div class="header-nav animate-dropdown">
            <div class="container">
                <div class="yamm navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="nav-bg-class">
                        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                            <div class="nav-outer">
                                <ul class="nav navbar-nav">
                                    <li class="active dropdown yamm-fw">
                                        <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                                    </li>
                                    @foreach($brands as $brand)
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">{{$brand->brand_name}}</a>
                                    </li>
                                    @endforeach

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
                                        <ul class="dropdown-menu pages">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">

                                                        <div class="col-xs-12 col-menu">
                                                            <ul class="links">
                                                                <li><a href="#">Home</a></li>
                                                                <li><a href="#">Category</a></li>
                                                                <li><a href="#">Brands</a></li>
                                                                <li><a href="#">Checkout</a></li>
                                                                <li><a href="#">Wishlist</a></li>
                                                                <li><a href="#">Blog</a></li>
                                                                <li><a href="#">Blog Detail</a></li>
                                                                <li><a href="#">Contact</a></li>
                                                                <li><a href="#">Terms and Condition</a></li>
                                                                <li><a href="#">Track Orders</a></li>
                                                                <li><a href="#">FAQ</a></li>
                                                                <li><a href="#">404</a></li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>



                                        </ul>
                                    </li>
                                    <li class="dropdown  navbar-right special-menu">
                                        <a href="#">Todays offer</a>
                                    </li>


                                </ul><!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div><!-- /.nav-outer -->
                        </div><!-- /.navbar-collapse -->


                    </div><!-- /.nav-bg-class -->
                </div><!-- /.navbar-default -->
            </div><!-- /.container-class -->

        </div><!-- /.header-nav -->
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>

    <!-- ============================================== HEADER : END ============================================== -->



    <style>
    .search-area {
        position: relative;
    }
    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #fff;
        z-index: 999;
        border-radius: 4px;
        margin-top: 5px;
        padding-left: 9px;
    }
</style>


<script>
    function search_result_hide() {
        $("#searchProducts").slideUp();
    }
    function search_result_show() {
        $("#searchProducts").slideDown();
    }
</script>
