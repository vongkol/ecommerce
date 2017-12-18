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
                            <button class="btn btn-detault btn-all-cat btn-group-menu w-100"><i class="fa fa-tags fa-2x"></i><br>All Catogory</button>
                        </div>
                        <div class="col-md-3 col-xs-3 custom-padding-col">
                            <button class="btn btn-detault btn-cus btn-group-menu w-100"><i class="fa fa-users fa-2x"></i><br>Customer </button>
                        </div>
                        <div class="col-md-3 col-xs-3 custom-padding-col">
                            <button class="btn btn-detault btn-trade btn-group-menu w-100"><i class="fa fa-exchange fa-2x"></i><br>Trade assurant</button>
                        </div>
                        <div class="col-md-3 col-xs-3 custom-padding-col">
                            <button class="btn btn-detault btn-eli btn-group-menu w-100"><i class="fa fa-laptop fa-2x"></i><br>Smart Electronics</button>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Latest Product</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/miniverse_m.jpg')}}">
                        <div class="caption captionm">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data
                            </p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 100.00 
                                    </p>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/flat_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 133.00 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{('front/images/pixel_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 231.00 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/westeros_m.jpg')}}" alt="">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 299.00 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.row -->
                        <!-- Page Features -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/miniverse_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 100.00 
                                    </p>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/flat_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 133.00 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/pixel_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 231.00 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/westeros_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</small></p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 299.00 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/miniverse_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 100.00 
                                    </p>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/flat_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</small></p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 133.00 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/pixel_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 231.00 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail thumbnailm border-radius-none padding-none">
                        <img src="{{asset('front/images/westeros_m.jpg')}}">
                        <div class="caption">
                            <h5 class="bold"><a href="{{url('/product/detail')}}" class="text-decoration-none"><span class="cool-green">Feature Label</span></a></h5>
                            <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</p><hr>
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-6">
                                    <p class="margin-button-none"><i class="fa fa-shopping-cart cool-green"></i></i></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p class="bold margin-button-none">
                                    <span class="bold cool-green">$</span> 299.00 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <nav aria-label="Page navigation">
              <ul class="pagination pagination-custom">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true"><span class="bold">&laquo;</span></span>
                  </a>
                </li>
                <li><a href="#"><span class="bold">1</span></a></li>
                <li><a href="#"><span class="bold">2</span></a></li>
                <li><a href="#"><span class="bold">3</span></a></li>
                <li><a href="#"><span class="bold">4</span></a></li>
                <li><a href="#"><span class="bold">5</span></a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true"><span class="bold">&raquo;</span></span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
@endsection