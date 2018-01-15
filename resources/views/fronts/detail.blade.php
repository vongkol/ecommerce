@extends('layouts.front')
@section('content')
<link href="{{asset('front/bootstrap/bootstrap3.min.css')}}" rel="stylesheet">
<link href="{{asset('front/css/detail.css')}}" rel="stylesheet">
<section class="single-product">
    <div class="row mt-20">
        <div class="col-md-6">
            <div class="single-product-slider">
                <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                    <div class='carousel-outer'>
                        <div class='carousel-inner '>
                            <div class='item active'>
                                <img src="{{asset('front/img/1.jpg')}}" alt='product image' data-zoom-image="{{asset('front/img/1.jpg')}}"​ width="100%" />
                            </div>
                            <div class='item'>
                                <img src="{{asset('front/img/2.jpg')}}" alt='product image' data-zoom-image="{{asset('front/img/2.jpg')}}" width="100%"/>
                            </div>
                        </div>
                        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'><</a>
                        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>></a>
                    </div>
                    <ol class='carousel-indicators mCustomScrollbar meartlab'>
                        <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                            <img src="{{asset('front/img/1.jpg')}}" alt='small product' />
                        </li>
                        <li data-target='#carousel-custom' data-slide-to='1'>
                            <img src="{{asset('front/img/2.jpg')}}" alt='small product' />
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-name">
                <h5>
                SMAEL impermeable Reloj Deportivo Blanco S Choque Relojes Hombre relogio masculino 2017 del ejército militar Reloj de Los Hombres 1509 Reloj Digital LED
                </h5><hr>
                <div class="row pro-vdoo">
                    <div class="col-md-2">Price: </div><span class="line-through">US $269.99 / piece </span>
                </div>
                <div class="row pro-vdoo">
                    <div class="col-md-2">Discount Price: </div><span class="price">US $199.99 <span class="piece">/ piece </span></span> 
                </div>
                <div class="row pro-vdoo">
                    <div class="col-md-2">Condication: </div><b>New</b></span> 
                </div>
                <div class="row pro-vdoo">
                    <div class="col-md-2">Color: </div> <span class="piece">White | Black | Gray | Blue</span> 
                </div><hr>
                <div class="pro-vdoo">
                    <div class="col-md-12 contact-info">
                        <h6 class="text-info pro-vdoo">Contact Information</h6>
                        <p>Phone number: 096 2555 209 / 015 88 56 89</p>
                        <p>Email: sorvichey@gmail.com</p>
                        <p>Facebook: sor vichey</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"><br>
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                    <a class="nav-link active" href="#"><h6 class="text-warning">Product Details</h6></a>
                    </li>
                </ul>
            </div><br>
            <ul>
                <li>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</li>
            </ul>   <ul>
                <li>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</li>
            </ul> <ul>
                <li>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</li>
            </ul> <ul>
                <li>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</li>
            </ul>   
            <br>
        </div>
    </div>
</div>  
    <div class="container">
    <div class="card-header">
        <ul class="nav card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><h6 class="text-primary">Related Products</h6></a>
            </li>
        </ul>
    </div><br>
    <div class="row">
        <div class="col-lg-2 col-md-3 mb-4 pd-pro">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{asset('front/img/3.jpg')}}" alt="product image"></a>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <h6>$24.99</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('front/js/jquery-git.min.js')}}"></script>   
<script src="{{asset('front/bootstrap/bootstrap3.min.js')}}"></script>
@endsection