@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Package&nbsp;&nbsp;
                    <a href="{{url('/package')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif

                    <form 
                        action="{{url('/package/save')}}" 
                        class="form-horizontal"  
                        method="post"
                    >
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">Name<span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required autofocus name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_of_number" class="control-label col-lg-2 col-sm-2">Type<span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <select class="form-control" name="type" id="type" required id="exampleSelect1">
                                    <option value="Monthly">Monthly</option> 
                                    <option value="Yearly">Yearly</option>                
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="control-label col-lg-2 col-sm-2">Price</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="number" step="0.1" name="price" value="0" id="price" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="number_of_product" class="control-label col-lg-2 col-sm-2">Number of Product</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="number" name="number_of_product" id="number_of_product" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="control-label col-lg-2 col-sm-2">Description</label>
                            <div class="col-lg-6 col-sm-8">
                                <textarea id="description" name="description" class="form-control">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-danger" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection