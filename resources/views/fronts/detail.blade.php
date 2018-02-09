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
                            <?php $i=1;?>
                            @foreach($photos as $p)
                                @if($i==1)
                                    <div class='item active'>
                                        <img src="{{asset('uploads/products/540x540/'.$p->file_name)}}" alt='product image' data-zoom-image="{{asset('front/img/1.jpg')}}"​ width="100%" />
                                    </div>
                                @else
                                    <div class='item'>
                                        <img src="{{asset('uploads/products/540x540/'.$p->file_name)}}" alt='product image' data-zoom-image="{{asset('front/img/1.jpg')}}"​ width="100%" />
                                    </div>
                                @endif
                                @php($i++)
                            @endforeach
                        </div>
                        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'><</a>
                        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>></a>
                    </div>
                    <ol class='carousel-indicators mCustomScrollbar meartlab'>
                        @foreach($photos as $p)
                        <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                            <img src="{{asset('uploads/products/41x41/'.$p->file_name)}}" alt='small product' />
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-6">
    
            <div class="product-name">
                <h5>
                  {{$product->name}} (<span class="text-danger">Code={{$product->id}}</span>)
                </h5><hr>
                <p>
                    {{$product->short_description}}
                </p>
                <div class="row pro-vdoo">
                    <div class="col-md-2">Price: </div><span class="line-through">$ {{$product->price}} </span>
                </div>
                <div class="row pro-vdoo">
                    <?php 
                        $p = $product->price *(1-$product->discount/100);
                    ?>
                    <div class="col-md-2">Discount Price: </div><span class="price">{{$product->discount}}% = ${{$p}}</span> 
                </div>
                <div class="row pro-vdoo">
                    <div class="col-md-2">Category: </div><b>{{$product->category_name}}</b></span> 
                </div>
                <div class="row pro-vdoo">
                    <div class="col-md-2">Model: </div> <span class="piece">{{$product->model}}</span> 
                </div><hr>
                <div class="pro-vdoo">
                    <div class="col-md-12 contact-info">
                        <h6 class="text-info pro-vdoo">Payment Mothod</h6>

                        <p>{{@$shop->payment}}</p>
                      
                    </div>
                </div>
                <div class="pro-vdoo">
                        <div class="col-md-12 contact-info">
                            <h6 class="text-info pro-vdoo">Contact Information</h6>
                            <p>Shop Name: {{$shop->name}}</p>
                            <p>Address: {{$shop->address}}</p>
                            <p>Contact Person: {{$shop->contact_person}}</p>
                            <p>Email: {{$shop->email}}</p>
                            <p>Phone Number: {{$shop->phone}}</p>
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
           <p>
               {!!$product->description!!}
           </p>
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
        @if(count($products)<=0)
            <div class="col-sm-12">
                <h6>No Product found!</h6>
            </div>
        @else
            @foreach($products as $pro)
            <div class="col-lg-2 col-md-3 mb-4 pd-pro">
                    <div class="card h-100">
                        <div class="pro">
                            <a href="{{url('product/detail/'.$pro->id)}}"><img class="card-img-top" src="{{asset('uploads/products/250x250/'.$pro->file_name)}}" alt=""></a>
                        </div>
                        <div class="card-body">
                            <a href="{{url('product/detail/'.$pro->id)}}">
                                <b>{{$pro->name}}</b>
                            </a>
                            <p class="card-text">{{$pro->short_description}}</p>
                            <aside class="r-price"> US $ {{$pro->price}}</aside>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
            
    </div>
</div>
<script src="{{asset('front/js/jquery-git.min.js')}}"></script>   
<script src="{{asset('front/bootstrap/bootstrap3.min.js')}}"></script>
@endsection