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
        <div class="container fixed-top fixed-top-header">     
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-9 col-sm-9 col-xs-9">
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
                        <div class="pro-item text-center">
                            <a href="{{url('buyer/login')}}">
                                <span class="item-number"><img src="{{asset('front/img/login.png')}}">Login</span>
                            </a> | 
                            <a href="{{url('buyer/register')}}">
                                <span class="item-number">Register</span>
                            </a>
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
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="{{asset('front/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>
</html>