
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i>  Product Detail&nbsp;&nbsp;
                    <a href="{{url('/admin/product')}}" class="btn btn-link btn-sm">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <a href="#" class="text-danger" onclick="showEdit(event)"><i class="fa fa-pencil"></i> Edit</a>
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
                    <form action="{{url('/admin/product/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('You want to save change?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-4">Product Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" required value="{{$product->name}}" disabled="disabled">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="control-label col-sm-4">Model</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="model" name="model"
                                               value="{{$product->model}}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="control-label col-sm-4">Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" min="0" class="form-control" id="quantity" name="quantity"
                                               value="{{$product->quantity}}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="min_price" class="control-label col-sm-4">Min Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" min="0" class="form-control" id="min_price" name="min_price"
                                               value="{{$product->min_price}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="control-label col-sm-4">Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" min="0" class="form-control" id="price" name="price"
                                               value="{{$product->price}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="max_price" class="control-label col-sm-4">Max Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" min="0" class="form-control" id="max_price"
                                               name="max_price" disabled
                                               value="{{$product->max_price}}">
                                        <br>
                                        <p id="box" class="hide">
                                            <button type="submit" name="btn_save" class="btn btn-primary">Save</button>
                                            <button type="button" onclick="cancelEdit()" class="btn btn-danger">Cancel</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category" class="control-label col-sm-4">Category <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="category" id="category" class="form-control chosen-select" data-placeholder="Chose a category" tabindex="2" disabled="disabled">
                                            <option value=""></option>
                                            @foreach($categories as $c)
                                                <option value="{{$c->id}}" {{$product->category_id==$c->id?'selected':''}}>{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shop" class="control-label col-sm-4">Shop <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="shop" id="shop" class="form-control chosen-select" data-placeholder="Chose a shop" tabindex="2" disabled>
                                            <option value=""></option>
                                            @foreach($shops as $s)
                                                <option value="{{$s->id}}" {{$s->id==$product->shop_id?'selected':''}}>{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="discount" class="control-label col-sm-4">Discount (%)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="discount" value="0" name="discount" disabled
                                               value="{{$product->discount}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="short_description" class="control-label col-sm-4">Short Description</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="short_description"
                                               id="short_description" value="{{$product->short_description}}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="control-label col-sm-4">Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="description" id="description" cols="30" rows="3"
                                                  class="form-control" disabled>{{$product->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <h3 class="text-primary">Product Photos</h3>
                        <form action="{{url('/admin/product/photo/upload')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label for="">Choose photos to upload <span class="text-danger">(Max 10 product picture)</span></label>
                            <input type="file" multiple name="photo[]" required>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </form>
                       <p></p>
                    <div class="img-box">
                       @foreach($photos as $p)
                        <div class="img" style="display: inline-block;">
                            <img src="{{asset('uploads/products/250x250/'.$p->file_name)}}" alt="Photo" id="{{$p->id}}" height="100%">
                            <div class="remove"><a href="#" id="{{$p->id}}" onclick="removeImage(this,event)" class="delete">Delete</a></div>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('chosen/chosen.jquery.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("select").chosen();
        });
        function removeImage(obj, evt) {
            evt.preventDefault();
           var id = $(obj).attr("id");
            var o = confirm('You want to delete?');
            if(o)
            {
                $.ajax({
                    type: "GET",
                    url: burl + "/admin/product/photo/delete/" + id,
                    success: function(sms){
                        var str = "img#"+id;
                        $(str).remove();
                        $(obj).remove();
                    }
                });
            }
        }
        function showEdit(evt) {
            evt.preventDefault();
            $("select").chosen("destroy");
            $("input").removeAttr("disabled");
            $("textarea").removeAttr("disabled");
            $("select").removeAttr("disabled");
            $("#box").removeClass("hide");
            $("select").chosen();
        }
        function cancelEdit() {
            location.href = "{{url('/admin/product/detail/'.$product->id)}}";
        }
    </script>
@endsection