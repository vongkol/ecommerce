@extends('layouts.front')
@section('content')
    <div class="row">
        <div class="col-md-3 pd-cat-right">
            <div class="main-navigation-container">
                <nav class="main-navigation">
                    <div class="categories-vdoo">
                        <span class="cateogries-product">Categories</span> 
                        <a class="small see-all-cat float-right" href="#">See All >></a>
                    </div> 
            <ul>
                @foreach($categories as $cat)
                <?php
                    $subs = DB::table('categories')->where('active',1)->where('parent_id', $cat->id)->get();
                ?>
                <li><a href="#"><img src="{{asset('uploads/icons/'.$cat->icon)}}" width="20"> {{$cat->name}} <i class="fa fa-angle-right"></i></a>
                    @if(count($subs)>0)
                    <div class="mega-menu">
                            <div class="mega-menu-content">
                                <div class="row">
                                   @foreach($subs as $s)
                                    <div class="col-sm-2">
                                        <a href="#">{{$s->name}}</a>
                                    </div>
                                   @endforeach
                                 
                                </div>
                               
                            </div>
                    </div>
                    @endif
                </li>
                @endforeach
                <li><a href="#"><img src="{{asset('front/img/images.png')}}">Woman Fashion <i class="fa fa-angle-right"></i></a>
                   
                </li>
            </div>
        </div>
        <div class="col-lg-9">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{asset('front/img/post-4.png')}}" alt="slide" width="100%">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{asset('front/img/post-4.jpg')}}" alt="slide" width="100%">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{asset('front/img/post-4.png')}}" alt="slide"  width="100%">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<article class="row">
    <section class="col-lg-12">
        <h6 class="text-primary">Featured Products</h6><hr>
    </section>
    @foreach($features as $pro)
    <div class="col-lg-2 col-md-3 mb-4 pd-pro">
        <div class="card h-100">
            <a href="{{url('product/detail/'.$pro->id)}}"><img class="card-img-top" src="{{asset('uploads/products/250x250/'.$pro->file_name)}}" alt=""></a>
            <div class="card-body">
                <a href="{{url('product/detail/'.$pro->id)}}">
                    <h5>{{$pro->name}}</h5>
                </a>
                <p class="card-text text-left">{{$pro->short_description}}</p>
                
                <h6>$ {{$pro->price}}</h6>
            </div>
        </div>
    </div>
    @endforeach
</article>
<article class="row">
    <section class="col-lg-12">
        <h6 class="text-primary">Latest Products</h6><hr>
    </section>
    @foreach($products as $pro)
    <div class="col-lg-2 col-md-3 mb-4 pd-pro">
            <div class="card h-100">
                <a href="{{url('product/detail/'.$pro->id)}}"><img class="card-img-top" src="{{asset('uploads/products/250x250/'.$pro->file_name)}}" alt=""></a>
                <div class="card-body">
                    <a href="{{url('product/detail/'.$pro->id)}}">
                        <h5>{{$pro->name}}</h5>
                    </a>
                    <p class="card-text text-left">{{$pro->short_description}}</p>
                    
                    <h6>$ {{$pro->price}}</h6>
                </div>
            </div>
        </div>
    @endforeach
</article>
<article class="row">
        <section class="col-lg-12">
            <h6 class="text-primary">Discount Products</h6><hr>
        </section>
        @foreach($discounts as $pro)
        <div class="col-lg-2 col-md-3 mb-4 pd-pro">
                <div class="card h-100">
                    <a href="{{url('product/detail/'.$pro->id)}}"><img class="card-img-top" src="{{asset('uploads/products/250x250/'.$pro->file_name)}}" alt=""></a>
                    <div class="card-body">
                        <a href="{{url('product/detail/'.$pro->id)}}">
                            <h5>{{$pro->name}}</h5>
                        </a>
                        <p class="card-text text-left">{{$pro->short_description}}</p>
                        <p>{{$pro->discount}}%</p>
                        <h6><del>$ {{$pro->price}}</del> ${{$pro->price*(1-$pro->discount/100)}}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </article>
@endsection