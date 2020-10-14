@extends('admin.components.layout')

@section('title')
    Edeck | Add New Product
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Product > Add Product</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated shake">
        <div class="col-md-12 ">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Add New Product</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('products.manage') }}" class="btn btn-primary pull-right">Manage Product</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">

                            <!------Category ------->
                            <div class="col-sm-6">
                                <label for="cat_id" class="control-label">Category</label>
                                <select name="cat_id" id="cat_id" class="form-control ">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $row)
                                    <option value="{{$row->id}}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!----------------->

                            <!------SubCategory ------->
                            <div class="col-sm-6">
                                <label for="subcat_id" class="control-label">SubCategory</label>
                                <select name="subcat_id" id="subcat_id" class="form-control ">
                                    <option value="">Select SubCategory</option>
                                </select>
                            </div>
                            <!----------------->

                            <!------Brand ------->
                            <div class="col-sm-6">
                                <label for="brand_id" class="control-label">Brand</label>
                                <select name="brand_id" id="brand_id" class="form-control ">
                                    <option value="">Select Brand</option>
                                    <option value="0">No Brand</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!----------------->

                        <!------NAME ------->
                            <div class="col-sm-6">
                                <label for="name" class="control-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Product Name">
                            </div>
                            <!------------------>
                            <!------MODEL ------->
                                <div class="col-sm-6">
                                    <label for="model" class=" control-label">Product Model</label>
                                    <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required placeholder="Product model">
                                </div>
                            <!------------------>

                            <!------Quantity------->
                            <div class="col-sm-6">
                                <label for="quantity" class=" control-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required placeholder="Enter Product Quantity">
                            </div>
                            <!------------------>

                            <!------Buying Price------->
                                <div class="col-sm-6">
                                    <label for="buying_price" class=" control-label">Buying Price</label>
                                    <input type="number" class="form-control" id="buying_price" name="buying_price" value="{{ old('buying_price') }}" required placeholder="0.00">
                                </div>
                            <!------------------>
                            <!-----Selling Price------->
                                <div class="col-sm-6">
                                    <label for="selling_price" class=" control-label">Selling Price</label>
                                    <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{ old('selling_price') }}" required placeholder="0.00">
                                </div>
                            <!------------------>
                            <!------special_price------->
                                <div class="col-sm-6">
                                    <label for="special_price" class=" control-label">Special Price</label>
                                    <input type="number" class="form-control" id="special_price" name="special_price" value="{{ old('special_price') }}"  placeholder="0.00">
                                </div>
                            <!------------------>


                            <!------Special Start------->
                                <div class="col-sm-6">
                                    <label for="special_start" class="control-label">Special Start</label>
                                    <input type="text" class="form-control datepicker" id="special_start" name="special_start" value="{{ old('special_start') }}"  placeholder="YYYY-MM-DD">
                                </div>
                            <!------------------>
                            <!------Special End ------->
                                <div class="col-sm-6">
                                    <label for="special_end" class=" control-label">Special End</label>
                                    <input type="text" class="form-control datepicker" id="special_end" name="special_end" value="{{ old('special_end') }}"  placeholder="YYYY-MM-DD">
                                </div>
                            <!------------------>

                            <!------Video Url ------->
                            <div class="col-sm-6">
                                <label for="video_url" class=" control-label">Video Url</label>
                                <input type="url" class="form-control " id="video_url" name="video_url" value="{{ old('video_url') }}"  placeholder="Enter Video Url">
                            </div>
                            <!------------------>
                            <!------Thumbnail------->
                            <div class="col-sm-6">
                                <label for="thumbnail" class=" control-label">Thumbnail</label>
								<br/>
                                <input style="display:none;" type="file" class="" id="thumbnail" data-id="thumbnail" onChange="previewImage(this)" name="thumbnail"  required >
								<input type="button" data-id="thumbnail" class="btn btn-info fileClick" value="Select Thumbnail"/>
								 <a href=""class="image">
								<img style=" height:100px;" src="" id="preview_thumbnail" alt=""/>
                                 </a>
                            </div>

                            <!------------------>


                            <!------Gallery------->
                            <div class="col-sm-6">
                                <label for="gallery" class=" control-label">Gallery</label>

                                <input id="files" type="file" name="gallery[]" multiple data-id="gallary" />
                                <div id="result" ></div>
                            </div>
                            <!------------------>

                            <!------Warranty ------->

                            <div class="col-md-6">
                                <label style="color: purple; " for="warranty" class=" control-label"><strong>WARRANTY</strong></label>
                                <br>
                                <div class="radio radio-custom radio-inline radio-primary">
                                    <input type="radio" id="warranty_yes" name="warranty" value="1">
                                    <label for="warranty_yes">Yes</label>
                                </div>
                                <div class="radio radio-custom radio-inline radio-danger">
                                    <input type="radio" id="warranty_no" name="warranty" value="0">
                                    <label for="warranty_no">No</label>
                                </div>
                            </div>

                            <!------------------>
                            <!------Warranty_duration------->
                        <div class="warranty_box" style="display: none;">
                            <div class="col-sm-6">
                                <label for="warranty_duration" class=" control-label">Warranty Duration</label>
                                <input  type="text" class="form-control " id="warranty_duration" name="warranty_duration" value="{{ old('warranty_duration') }}"  placeholder="Warranty Duration">
                            </div>
                            <!------------------>

                            <!------Warranty Condition------->
                            <div class="col-sm-12">
                                <label for="warranty_conditions" class=" control-label">Warranty Condition</label>
                                <textarea class="form-control summernote" id="warranty_conditions" name="warranty_conditions"></textarea>
                            </div>
                        </div>
                            <!------------------>

                            <!------Description------->
                            <div class="col-sm-12">
                                <label for="description" class=" control-label">Description</label>
                                <textarea class="form-control summernote" id="description" name="description"></textarea>
                            </div>
                            <!------------------>

                            <!------Long Description------->
                            <div class="col-sm-12">
                                <label for="long_description" class=" control-label">Long Description</label>
                                <textarea class="form-control summernote" id="long_description" name="long_description"></textarea>
                            </div>

                            <!------------------>

                            <!------hot_deals------->
                            <div class="col-sm-6">
                                <label for="hot_deals" class=" control-label">Please Inser 0 or 1 For Hot Deals (Also It Can Be Empty)</label>
                                <input type="number" class="form-control " id="hot_deals" name="hot_deals" >
                            </div>

                            <!------------------>

                            <!------f_products------->
                            <div class="col-sm-6">
                                <label for="f_products" class=" control-label">Please Inser 0 or 1 For Feature Products (Also It Can Be Empty)</label>
                                <input type="number" class="form-control " id="f_products" name="f_products" >
                            </div>

                            <!------------------>

                            <!------Status ------->

                            <div style="margin-top: 18px;" class="col-md-12 text-center ">
                                <label   for="status" class=" control-label">STATUS : </label>

                                <div class="radio radio-custom radio-inline radio-primary">
                                    <input type="radio" id="status1" name="status" value="active">
                                    <label for="status1"> Active</label>
                                </div>
                                <div class="radio radio-custom radio-inline radio-danger">
                                    <input type="radio" id="status2" name="status" value="inactive">
                                    <label for="status2">Inactive</label>
                                </div>
                            </div>

                            <!------------------>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
