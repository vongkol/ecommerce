@extends('layouts.shop_owner')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold">Product
            / <a href="{{url('/shop-owner/product')}}" class="text-info">Back to List</a></div>
        <div class="panel-body">
            <div class="panel-body">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-5">Name</label>
                        <div class="col-sm-7">
                            <p>{{$product->name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Shop Name</label>
                        <div class="col-sm-7">
                            <p>{{$product->shop_name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Quantity</label>
                        <div class="col-sm-7">
                            <p>{{$product->quantity}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Model</label>
                        <div class="col-sm-7">
                            <p>{{$product->model}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-5">Price</label>
                        <div class="col-sm-7">
                            <p>{{$product->price}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 text-danger">Discount</label>
                        <div class="col-sm-7">
                            <p class="text-danger">{{$product->discount}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Category</label>
                        <div class="col-sm-7">
                            <p>{{$product->cat_name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Short Description</label>
                        <div class="col-sm-7">
                            <p>{{$product->short_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                <hr>
                    <div class="form-group row">
                        <label class="col-sm-12">Description</label>
                        <div class="col-sm-12">
                            <p>{!!$product->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection