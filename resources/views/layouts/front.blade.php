<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Phsa24 is the best ecommerce in Cambodia">
        <meta name="keywords" content="Phsa24, Cambodia buy and Sell, The Best Online Shop in Cambodia, Online Shop, Ecommerce, Online Sell">
        <meta name="author" content="Sor Vichey">
        <title>Phsa 24</title>
        <link href="{{asset('front/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('front/css/animation.css')}}" rel="stylesheet">
        <link href="{{asset('front/css/shop-homepage.css')}}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('front/img/logo.png')}}" width="100"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        @if(Session::has('shop_owner'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <img src="{{asset('front/img/shop.png')}}" alt="shop icon"> Hi,{{ Session::get('shop_owner')->first_name }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('shop-owner/profile')}}">Profile</a>
                                <a class="dropdown-item text-danger" href="{{url('shop-owner/logout')}}">Sing Out</a>
                            </div>
                        </li>
                        @else
                            <li class="nav-item shop-login">
                            ​ <img src="{{asset('front/img/shop.png')}}" alt="shop icon"> <a href="{{asset('shop-owner/login')}}"> Shop owner login</a> | <a href="{{asset('shop-owner/account/register')}}">Register</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="{{asset('front/img/kh.png')}}"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="{{asset('front/img/en.png')}}"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluit vdoo-search fixed-top fixed-top-header">    
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="What you looking for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><img src="{{asset('front/img/54481.png')}}"></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-1 col-xs-1">
                        <div class="pro-item text-center">
                            <a href="#">
                                <img src="{{asset('front/img/item.png')}}" width="25"><span class="item-number"> 0</span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-sm-2 col-xs-2">
                        @if(Session::has('customer'))
                        <div class="dropdown">
                            <div class="dropdown-toggle customer" data-toggle="dropdown">
                                <img src="{{asset('front/img/login.png')}}">  Hi, {{ Session::get('customer')->first_name }}
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{url('buyer/profile')}}">Profile</a>
                                <a class="dropdown-item text-danger" href="{{url('buyer/logout')}}">Sing Out</a>
                            </div>
                        </div>
                        @else
                            <div class="pro-item text-center">
                                <img src="{{asset('front/img/login.png')}}"><a href="{{url('buyer/login')}}">Buyer Login
                                </a> | 
                                <a href="{{url('buyer/register')}}">Register
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <section>
            @yield('content')
        </section>
    </div>
    <footer id="footer" align="center">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h6>Stay Connected</h6>
                    <img src="{{asset('front/img/fb.png')}}" width="25" alt="social">
                    <img src="{{asset('front/img/in.png')}}" width="25" alt="social">
                </div>
                <div class="col-md-3">
                    <h6>Help</h6>
                    <aside><a href="#">Customer Service</a></aside>
                    <aside><a href="#">Delivery Options</a></aside>
                </div>
                <div class="col-md-3">
                    <h6>How to Buy</h6>
                    <aside><a href="#">Delivery Options</a></aside>
                    <aside><a href="#">New User Guide</a></aside>
                </div>
                <div class="col-md-3">
                    <h6>Partner Promotion</h6>
                    @if(Session::has('shop_owner'))
                    <img src="{{asset('front/img/shop.png')}}" alt="shop icon">​ <a href="{{url('shop-owner/profile')}}">Hi, {{session('shop_owner')->first_name}}</a>
                    @else
                        <img src="{{asset('front/img/shop.png')}}" alt="shop icon">​<a href="{{asset('shop-owner/login')}}"> Shop owner login</a> | <a href="{{asset('shop-owner/account/register')}}">Register</a>
                    </div>
                    @endif
                </div>
                  
            </div>
        </div>
    </footer>
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="{{asset('front/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>
</html>