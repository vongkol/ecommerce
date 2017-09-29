<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mastermalls</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('front/css/heroic-features.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('home')}}">
                    <img src="{{asset('front/images/logo.png')}}" width="52">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Phone</a>
                    </li>
                    <li>
                        <a href="#">Clothes</a>
                    </li>
                    <li>
                        <a href="#">Watches</a>
                    </li>
                    <li>
                        <a href="#">Jewellry</a>
                    </li>
                    <li>
                        <a href="#">Book</a>
                    </li>
                    <li>
                        <a href="#">Laptop</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>
          <div class="container">
                <div class="row">    
                    <div class="col-xs-8 col-xs-offset-2">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept">All</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#contains">Phone</a></li>
                                  <li><a href="#its_equal">Watch</a></li>
                                  <li><a href="#greather_than">Ring</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">         
                            <input type="text" class="form-control" name="x" placeholder="Search term...">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-default-custom" type="button"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div><br>
    <section>
        @yield('content')
    </section>

    <footer>
    <div class="well border-radius-none background-black">
        <div class="row"> 
            <div class="col-md-3">
                <img src="images/logo.png">
                <p><i class="fa fa-map-marker"></i> &nbsp; &nbsp; &nbsp; Street 271 ,Solar 2004, Phnom Penh,  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cambodia</p>
                <p><i class="fa fa-users"></i> &nbsp; &nbsp; &nbsp;<span class="cool-green bold">122,23</span> Seller </p>
                <p><i class="fa fa-phone"></i>  &nbsp; &nbsp; &nbsp;096 2555 209 / 015 885 689</p>
                <p><i class="fa fa-envelope-o"></i> &nbsp; &nbsp; &nbsp;Sorvichey@gmail.com</p>
                <p>
                    <i class="fa fa-facebook btn btn-default btn-default-custom border-radius-none"></i>
                    <i class="fa fa-twitter btn btn-default btn-default-custom border-radius-none"></i> 
                    <i class="fa fa-linkedin btn btn-default btn-default-custom border-radius-none"></i>
                </p>
            </div>  
            <div class="col-md-3">
                <h4 class="bold">Our Community</h4><hr>
                <p>How to Join us</p>
                <p>Buying and Selling</p>
                <p>Emerald Forum</p>
                <p>Emerald Blog</p>
                <p>Free Goods</p>
                <p>Job Oportunities</p>
            </div>
            <div class="col-md-3">
                <h4 class="bold">Member Links</h4><hr>
                <p>How to Join us</p>
                <p>Buying and Selling</p>
                <p>Emerald Forum</p>
                <p>Emerald Blog</p>
                <p>Free Goods</p>
                <p>Job Oportunities</p>
            </div>
            <div class="col-md-3">
                <h4 class="bold">Help and FAQs</h4><hr>
                <p>How to Join us</p>
                <p>Buying and Selling</p>
                <p>Emerald Forum</p>
                <p>Emerald Blog</p>
                <p>Free Goods</p>
                <p>Job Oportunities</p>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('front/js/jquery.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>

</body>
</html>