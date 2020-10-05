@extends('admin.components.layout')

@section('title')
    Edeck | Add New Slider
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)"> Slider > Add</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated shake">
        <div class="col-sm-8 col-sm-offset-2">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Add New Slider</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('sliders.manage') }}" class="btn btn-primary pull-right">Manage Slider</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('sliders.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="Slider Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sub_title" class="col-sm-3 control-label">Sub Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title') }}" required placeholder="Sub Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url" class="col-sm-3 control-label">URL</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="url" name="url" value="{{ old('url') }}" required placeholder="URL">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-9">

                                <input style="display:none;" type="file" class="" id="image" data-id="image" onChange="previewImage(this)" name="image" value="{{ old('image') }}" required >
                                <input type="button" data-id="image" class="btn btn-info fileClick" value="Select Image"/> <br>
                                <a href=""class="image">
                                    <img style=" height:100px;" src=""  id="preview_image" alt=""/>
                                </a>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Add Slider</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
