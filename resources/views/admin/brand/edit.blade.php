@extends('admin.components.layout')
@section('title')
     Edeck | Update Brand
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Update Brand</a></li>
            </ul>
        </div>
    </div><br/><br/><br/><br/><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated shake">
        <div class="col-sm-8 col-sm-offset-2">

            @includeIf('message.message')

            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6"><h3> Update Brand</h3></div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary pull-right" href="{{route('brand.manage')}}">Manage Brand</a>
                        </div>
                    </div>

                    <form class="form-horizontal" method="post"action="{{ route('brand.update', $brand->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="brand_name" class="col-sm-3 control-label">Brand Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="brand_name" name="brand_name" value="{{ $brand->brand_name }}" required placeholder="Brand Name">
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary ">Update Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
