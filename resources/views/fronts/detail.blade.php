@extends('layouts.front')
@section('content')
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/detail-product.css')}}">
        <div class="header-margin"></div>
		    <div class="homepage-container">
			    <div class='row single-product outer-bottom-sm'>
				    <div class='col-md-7'>
					    <div class="row  wow fadeInUp">
						    <div class="col-xs-12 col-sm-12 col-md-12 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery">
                                                <img class="img-responsive" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide2">
                                            <a data-lightbox="image-1" data-title="Gallery">
                                                <img class="img-responsive" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide3">
                                            <a data-lightbox="image-1" data-title="Gallery">
                                                <img class="img-responsive" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide4">
                                            <a data-lightbox="image-1" data-title="Gallery">
                                                <img class="img-responsive" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide5">
                                            <a data-lightbox="image-1" data-title="Gallery">
                                                <img class="img-responsive" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide6">
                                            <a data-lightbox="image-1" data-title="Gallery">
                                                <img class="img-responsive" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                            </a>
                                        </div>
                                        <div class="single-product-gallery-item" id="slide7">
                                            <a data-lightbox="image-1" data-title="Gallery">
                                                <img class="img-responsive" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                            </a>
                                        </div>
                                        <div class="single-product-gallery-item" id="slide8">
                                            <a data-lightbox="image-1" data-title="Gallery">
                                                <img class="img-responsive" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                            </a>
                                        </div>
                                        <div class="single-product-gallery-item" id="slide9">
                                            <a data-lightbox="image-1" data-title="Gallery">
                                                <img class="img-responsive" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="single-product-gallery-thumbs second-gallery-thumb gallery-thumbs">
                                        <div id="owl-single-product2-thumbnails">
                                    <div class="item">
                                        <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="0" href="#slide1">
                                            <img class="img-responsive" width="85" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                        </a>
                                    </div>
                                    <div class="item">

                                        <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="1" href="#slide2">
                                            <img class="img-responsive" width="85" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}"/>
                                        </a>
                                    </div>
                                    <div class="item">

                                        <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide3">
                                            <img class="img-responsive" width="85" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                        </a>
                                    </div>
                                    <div class="item">

                                        <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="0" href="#slide4">
                                            <img class="img-responsive" width="85" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                        </a>
                                    </div>
                                    <div class="item">

                                        <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="1" href="#slide5">
                                            <img class="img-responsive" width="85" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                        </a>
                                    </div>
                                    <div class="item">

                                        <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide6">
                                            <img class="img-responsive" width="85" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                        </a>
                                    </div>
                                    <div class="item">

                                        <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="0" href="#slide7">
                                            <img class="img-responsive" width="85" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                        </a>
                                    </div>
                                    <div class="item">

                                        <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="1" href="#slide8">
                                            <img class="img-responsive" width="85" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                        </a>
                                    </div>
                                    <div class="item">

                                        <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide9">
                                            <img class="img-responsive" width="85" alt="" src="{{asset('front/images/detail_image.jpg')}}" data-echo="{{asset('front/images/detail_image.jpg')}}" />
                                        </a>
                                    </div>
                                </div><!-- /#owl-single-product-thumbnails -->
                                <div class="nav-holder left">
                                        <a class="prev-btn slider-prev" data-target="#owl-single-product2-thumbnails" href="#prev"></a>
                                </div><!-- /.nav-holder -->
                                <div class="nav-holder right">
                                    <a class="next-btn slider-next" data-target="#owl-single-product2-thumbnails" href="#next"></a>
                                </div><!-- /.nav-holder -->
						    </div><!-- /.gallery-thumbs -->

					    </div><!-- /.single-product-gallery -->
				    </div><!-- /.gallery-holder -->	       
                    <div class="col-md-12 col-sm-12">
                        <h3>Description</h3><hr>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis, accusantium
                         a quae suscipit hic incidunt optio praesentium 
                         nesciunt eum ab? Laudantium id tempore consectetur 
                         aspernatur eveniet iusto corrupti soluta omnis
                    </div> 			
			    </div>
		    </div>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail border-radius-none padding-none">
                    <h1 class="bold text-center"><span class="cool-green bold">$</span>24.63</h1>
                    <hr>
                    <div class="caption">
                        <h5 class="bold">
                            <span class="label label-success background-cool-green">
                            <i class="fa fa-check"></i></span>&nbsp; &nbsp;Name Product Label
                        </h5>
                        <p class="gray"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data Lorem ipsum dolor sit amet, consectetur adipisicing elit. just simple dataLorem ipsum dolor sit amet, consectetur adipisicing elit. just simple data</small></p><hr>
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <button class="btn btn-default btn-default-custom" style="width: 100%;">
                                    <p class="margin-button-none">Add To Cart</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail border-radius-none padding-none">
                    <h4 class="bold text-center"><span class="cool-green bold">Shop Name</span></h4>
                    <hr>
                    <img src="{{asset('front/images/pixel_m.jpg')}}">
                    <div class="caption">
                        <h6>
                            I sale product online 
                            with mastermalls.com 
                            you can make order but
                            can't cancel after order 
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection