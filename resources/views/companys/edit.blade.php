@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Company&nbsp;&nbsp;
                    <a href="{{url('/company')}}" class="btn btn-link btn-sm">Back To List</a>
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
                    <form action="{{url('/company/update')}}" 
                        class="form-horizontal" 
                        method="post" 
                        enctype="multipart/form-data"
                    >
                        {{csrf_field()}}
                        <input type="hidden" id="id" name="id" value="{{$company->id}}">
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">
                                Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input 
                                    type="text" 
                                    required 
                                    autofocus 
                                    name="name"
                                    value="{{$company->name}}"
                                    class="form-control"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">
                                Address
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input 
                                    type="text"
                                    name="address" 
                                    value="{{$company->address}}"
                                    class="form-control"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">
                                Contact Person
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input 
                                    type="text" 
                                    name="contact_person" 
                                    value="{{$company->contact_person}}"
                                    class="form-control"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">
                                Phone
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input 
                                    type="text" 
                                    name="phone" 
                                    value="{{$company->phone}}"
                                    class="form-control"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">
                                E-mail
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input 
                                    type="email" 
                                    name="email" 
                                    value="{{$company->email}}"
                                    class="form-control"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">
                                Payment
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input 
                                    type="text" 
                                    name="payment" 
                                    value="{{$company->payment}}"
                                    class="form-control"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Logo</label>
                            <div class="col-lg-6 col-sm-6">
                                <input type="file" name="logo" id="logo" class="form-control" onchange="loadFile(event)">
                                <br>
                                <img src="{{asset('upload/company/'.$company->logo)}}" alt="" width="150" id="preview">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">
                                Description
                            </label>
                            <div class="col-lg-10 col-sm-10">
                                <textarea name="description" id="" cols="30" rows="10" class="ckeditor">{{$company->description}}</textarea>
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
@endsection
@section('js')
    <script>
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
@endsection