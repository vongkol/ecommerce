@extends('layouts.front')
@section('content')
<div class="row">
    <div class="col-md-3 pd-cat-right">
        <div class="main-navigation-container">
        <nav class="main-navigation">
            <div class="categories-vdoo"><span class="cateogries-product">Categories</span> 
            <a class="small see-all-cat" href="#">See All >></a>
        </div> 
        <ul>
            <li><a href="#"><img src="{{asset('front/img/images.png')}}">Woman Fashion <i class="fa fa-angle-right"></i></a>
                <div class="mega-menu">
                    <div class="mega-menu-content">
                        <div class="mm-row">
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><i>Praesent</i></h4></li>
                                        <li><a href="#">Viverra</a></li>
                                        <li><a href="#">Odio Porta</a></li>
                                        <li><a href="#">Ornare</a></li>
                                        <li><a href="#">Malesuada</a></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><a href="#">Donec</a></h4></li>
                                        <li><a href="#">Aliquam</a></li>
                                        <li><a href="#">Sollicitudin</a></li>
                                        <li><a href="#">Imperdiet</a></li>
                                        <li><a href="#">Maximus</a></li>
                                        <li><a href="#">Vitae Justo</a></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><i>Quisque</i></h4></li>
                                        <li><a href="#">Vehicula</a></li>
                                        <li><a href="#">Viverra</a></li>
                                        <li><a href="#">Arcu</a></li>
                                        <li><a href="#">Egestas</a></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><a href="#">Phasellus</a></h4></li>
                                        <li><a href="#">Dictum</a></li>
                                        <li><a href="#">Ultricies</a></li>
                                        <li><a href="#">In Lacinia</a></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><i>Mauris</i></h4></li>
                                        <li><a href="#">Acinia</a></li>
                                        <li><a href="#">Maecenas</a></li>
                                        <li><a href="#">Libero</a></li>
                                        <li><a href="#">Morbi</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="mm-row">
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><a href="#">Suscipit</a></h4></li>
                                        <li><a href="#">Pellentesque</a></li>
                                        <li><a href="#">Rhoncus</a></li>
                                        <li><a href="#">Velit Non</a></li>
                                        <li><a href="#">Facilisis</a></li>
                                        <li><a href="#">Tristique</a></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><i>Aenean</i></h4></li>
                                        <li><a href="#">Gravida</a></li>
                                        <li><a href="#">Blandit</a></li>
                                        <li><a href="#">Elementum</a></li>
                                        <li><a href="#">Pulvinar Arcu</a></li>
                                    </ol>
                                
                                </div>
                            </div>
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><a href="#">Placerat</a></h4></li>
                                        <li><a href="#">Hendrerit</a></li>
                                        <li><a href="#">Bibendum Sagas</a></li>
                                        <li><a href="#">Quis Enim</a></li>
                                        <li><a href="#">Lobortis</a></li>
                                        <li><a href="#">Mauris</a></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><i>Posuere</i></h4></li>
                                        <li><a href="#">Ullamcorper</a></li>
                                        <li><a href="#">Ligula</a></li>
                                        <li><a href="#">Viverra</a></li>
                                        <li><a href="#">Consecter</a></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mm-one-fifth">
                                <div class="mm-cell">
                                    <ol class="list">
                                        <li class="list-headline"><h4><a href="#">Interdum</a></h4></li>
                                        <li><a href="#">Tincidunt</a></li>
                                        <li><a href="#">Maecenas</a></li>
                                        <li><a href="#">Consequat</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<article class="row">
    <section class="col-lg-12">
        <h6 class="text-primary">Latest Product</h6><hr>
    </section>
    @foreach($products as $pro)
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 mb-4 pd-pro">
        <div class="card h-100">
            <a href="{{url('product/detail')}}"><img class="card-img-top" src="{{asset('front/img/8.jpg')}}" alt=""></a>
            <div class="card-body">
                <p class="card-text text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <h6>$24.99</h6>
            </div>
        </div>
    </div>
    @endforeach
</article>
@endsection