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
                                        <div class="col-sm-3 pd">
                                        <aside class="vdoo-category"><a href="#">{{$s->name}}</a></aside>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-lg-9 pd-0">
            <?php
                $a = 1;
                $slides = DB::table('slides')->orderBy('order','asc')->where('active', 1)->get();
                $j = 0;
            ?>
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                @foreach($slides as $s)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$j++}}" class="active"></li>
                @endforeach
                </ol>
            <div class="carousel-inner" role="listbox">
                <?php $i = 1;?>
                @foreach($slides as $s)
                    @if($i == 1) 
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{asset('img/'.$s->photo)}}" alt="slide" width="100%">
                    </div> <?php $i++; ?>
                    @else
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{asset('img/'.$s->photo)}}" alt="slide" width="100%">
                    </div>
                    @endif
               @endforeach
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
            <div class="pro">
                <a href="{{url('product/detail/'.$pro->id)}}"><img src="{{asset('uploads/products/250x250/'.$pro->file_name)}}" alt="feature product" width="100%"></a>
            </div>
            <div class="card-body">
                <a href="{{url('product/detail/'.$pro->id)}}">
                    <b>{{$pro->name}}</b>
                </a>
                <p class="card-text">{{$pro->short_description}}</p>
                <aside class="price">US $ {{$pro->price}}</aside>
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
                <div class="pro">
                    <a href="{{url('product/detail/'.$pro->id)}}"><img src="{{asset('uploads/products/250x250/'.$pro->file_name)}}" alt="latest product" width="100%"></a>
                </div>
                <div class="card-body">
                    <a href="{{url('product/detail/'.$pro->id)}}">
                        <b>{{$pro->name}}</b>
                    </a>
                    <p class="card-text">{{$pro->short_description}}</p>
                    <aside class="price">US $ {{$pro->price}}</aside>
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
                    <div class="pro">
                        <a href="{{url('product/detail/'.$pro->id)}}"><img src="{{asset('uploads/products/250x250/'.$pro->file_name)}}" alt="discount product" width="100%"></a>
                    </div>
                    <div class="card-body">
                        <a href="{{url('product/detail/'.$pro->id)}}">
                            <b>{{$pro->name}}</b>
                        </a>
                        <p class="card-text">{{$pro->short_description}}</p>
                        <aside class="price">US $ {{$pro->price*(1-$pro->discount/100)}} /  <del class="old-price red"> $ {{$pro->price}}</del></aside>
                        <div class="dis">{{$pro->discount}}%</div>
                    </div>
                </div>
            </div>
        @endforeach
    </article>
@endsection