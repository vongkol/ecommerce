@extends('layouts.shop_owner')
@section('content')
    <div class="panel panel-default border-radius-none">
        <div class="panel-heading bold">Shop</div>
        <div class="panel-body">
            @if(Session::has('sms'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success border-radius-none" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            {{session('sms')}}
                        </div>
                    </div>
                </div>
            @endif
            @if(Session::has('sms1'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger border-radius-none" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            {{session('sms1')}}
                        </div>
                    </div>
                </div>
            @endif
        <div class="col-md-12 col-sm-12">
            <form enctype="multipart/form-data"  action="{{url('/shop-owner/shop/save')}}" method="post" class="from-horizontal">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-4">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" required name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Contact Person <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" required name="contact_person">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Address <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" name="address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">
                                Description
                            </label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-4">Phone <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" id="" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control border-radius-none" id="email" required name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Payment</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-radius-none" name="payment">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Logo</label>
                            <div class="col-sm-8">
                                <input type="file" name="logo" id="logo" class="form-control" onchange="loadFile(event)">
                                <br>
                                <img src="{{asset('upload/company/default-logo.png')}}" alt="logo" width="100" id="img">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">&nbsp;</label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary border-radius-none">Save</button>
                                <a href="{{url('/shop-owner/shop')}}" class="btn btn-danger border-radius-none">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 150;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection