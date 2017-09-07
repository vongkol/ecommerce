@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Subscription Detail
                    <a href="{{url('/subscription')}}" class="btn btn-link btn-sm">Back To List</a>
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
                    <form action="{{url('/subscription/approve')}}" class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Subscription ID</label>
                            <div class="col-lg-4 col-sm-8">
                                <p>{{$subscription->id}}</p>
                                <input type="hidden" name="id" value="{{$subscription->id}}">
                                <input type="hidden" name="status" value="{{$subscription->status}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Employer ID</label>
                            <div class="col-lg-4 col-sm-8">
                                <p>{{$subscription->customer_id}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Employer Name</label>
                            <div class="col-lg-4 col-sm-8">
                                <p>{{$subscription->first_name . ' ' . $subscription->last_name}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Price</label>
                            <div class="col-lg-4 col-sm-8">
                               <p>{{$subscription->price}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Number of Day</label>
                            <div class="col-lg-4 col-sm-8">
                                <p>{{$subscription->day_number}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Number of Job</label>
                            <div class="col-lg-4 col-sm-8">
                                <p>{{$subscription->product_number}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Expired Date</label>
                            <div class="col-lg-4 col-sm-8">
                                <p>{{$subscription->expired_date}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">Status</label>
                            <div class="col-lg-4 col-sm-8">
                                <p>{{$subscription->status==0?'Pending':'Approved'}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                @if($subscription->status==0)
                                <button class="btn btn-primary" type="submit">Approve</button>
                                @else
                                    <button class="btn btn-warning" type="submit">De-Approve</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        CKEDITOR.replace( 'description',
            {
                customConfig : 'config.js',
                toolbar : 'simple'
            })
        $(document).ready(function(){
            $("#expired_date").inputmask('9999-99-99');
        });
    </script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
@endsection