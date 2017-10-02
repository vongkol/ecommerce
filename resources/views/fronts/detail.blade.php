@extends('layouts.front')
@section('content')
<div class="header-margin"></div>
<div class="container">
    <div class="row">
        <div class="com-md-12">
            <div class="col-md-9 col-sm-9 hero-feature">
                <div class="thumbnail border-radius-none padding-none">
                    <img src="{{asset('front/images/detail_image.jpg')}}"><hr>
                    <div class="caption">
                        <h3 class="bold">Description</h3>
                        <p class="gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <div class="row">
                            
                        </div>
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