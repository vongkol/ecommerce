

 
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-bold">
                <i class="fa fa-align-justify"></i> Product Detial&nbsp;&nbsp;
                <a href="{{url('/admin/product')}}" class="btn btn-link btn-sm">
                    Back
                </a>
            </div>
            <div class="card-block">
                @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-p="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-p="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                   
                     @foreach($pro_detail as $p)
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <p for="name" class="control-p col-sm-4">Product Name:</p>
                                    <div class="col-sm-8">
                                        <p class="to_span_align">{{$p->pro_name}}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <p for="category" class="control-p col-sm-4">Category:</p>
                                    <div class="col-sm-8">
                                       <p class="to_span_align">{{$p->cat_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <p for="quantity" class="control-p col-sm-4">Model:</p>
                                        <div class="col-sm-8">
                                            <p class="to_span_align">{{$p->model}}</p>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <p for="shop" class="control-p col-sm-4">Shop:</p>
                                        <div class="col-sm-8">
                                            <p class="to_span_align">{{$p->shop_name}}</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <p for="quantity" class="control-p col-sm-4">Quantity:</p>
                                        <div class="col-sm-8">
                                            <p class="to_span_align">{{$p->quantity}}</p>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <p for="discount" class="control-p col-sm-4">Discount (%):</p>
                                        <div class="col-sm-8">
                                            <p class="to_span_align">{{$p->discount}}</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <p for="min_price" class="control-p col-sm-4">Min Price:</p>
                                        <div class="col-sm-8">
                                            <p class="to_span_align">{{$p->min_price}}</p>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <p for="max_price" class="control-p col-sm-4">Max Price:</p>
                                        <div class="col-sm-8">
                                            <p class="to_span_align">{{$p->max_price}}</p>
                                        </div>
                                       
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <p for="price" class="control-p col-sm-4">Price:</p>
                                        <div class="col-sm-8">
                                            <p class="to_span_align">{{$p->price}}</p>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <p for="short_description" class="control-p col-sm-4">Short Description:</p>
                                        <div class="col-sm-12">
                                            <p class="to_span_align">{{$p->short_description}}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <form>
                                                <p for="short_description" class="">Upload product images:</p>
                                        
                                                <input type="file" name="pro_image" class="form-control btn btn-info" name="file">
                                                <br>
                                                <br>
                                                <button class="btn btn-primary">Sart Upload</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                       <p for="category" class="control-p col-sm-4">Description:</p>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" rows="5">{{$p->description}}</textarea>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    @endforeach                   
            </div>
        </div>
    </div>
</div>

@endsection