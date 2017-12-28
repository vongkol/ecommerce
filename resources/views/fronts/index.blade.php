@extends('layouts.front')
@section('content')
    <div class="padding-slider"></div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol><br>
            <div class="border-radius-none padding-none container">
                <div class="col-md-12">
                    <div class="carousel-inner s-border" role="listbox">
                        <div class="item active">
                            <img src="{{asset('front/images/slider1.png')}}" class="img-responsive" alt="slide show">
                        </div>

                        <div class="item">
                            <img src="{{asset('front/images/slider2.png')}}" class="img-responsive" alt="slide show">
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="col-md-12 group-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-xs-3 custom-padding-col">
                            <button class="btn btn-detault btn-group-menu w-100"><i class="fa fa-tags fa-2x"></i><br>All Catogory</button>
                        </div>
                        <div class="col-md-3 col-xs-3 custom-padding-col">
                            <button class="btn btn-detault btn-group-menu w-100"><i class="fa fa-users fa-2x"></i><br>Customer </button>
                        </div>
                        <div class="col-md-3 col-xs-3 custom-padding-col">
                            <button class="btn btn-detault btn-group-menu w-100"><i class="fa fa-exchange fa-2x"></i><br>Trade assurant</button>
                        </div>
                        <div class="col-md-3 col-xs-3 custom-padding-col">
                            <button class="btn btn-detault btn-group-menu w-100"><i class="fa fa-laptop fa-2x"></i><br>Smart Electronics</button>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
        <article class="container">
            <article class="row">
                <section class="col-lg-12">
                    <h3>Latest Product</h3>
                </section>
                @foreach($products as $pro)
                <section class="col-md-3 col-sm-6">
                    <aside class="thumbnail thumbnailm padding-none">
                        <div class="vdoo-product">
                            <img src="{{asset('front/images/'.$pro->file_name)}}" alt="product" width="100%">
                        </div>
                        <div class="caption captionm">
                            <a href="{{url('/product/detail')}}" class="text-decoration-none">
                                <h5 class="bold">{{$pro->name}}</h5>
                                <p class="gray">
                                    {{$pro->short_description}}
                                </p>
                                <aside class="bold vdoo-price">US $ {{ $pro->price}} </aside>
                                <aside class="line-through">US $  {{$pro->max_price}}</aside>
                            </a>
                        </div>
                    </aside>
                </section>
                @endforeach
            </article>
            <article class="text-center">
                <nav aria-label="Page navigation">
                {{$products->links()}}
                </nav>
            </article>
        </article>
@endsection