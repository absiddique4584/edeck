@extends('admin.components.layout')
@section('title')
    Edeck | Add New AfterSlider
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="{{route('aftersliders.manage')}}">Add New AfterSlider</a></li>
            </ul>
        </div>
    </div><br/><br/><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated shake">
        <div class="col-sm-8 col-sm-offset-2">

            @includeIf('message.message')

            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6"><h3> Add New AfterSlider</h3></div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary pull-right" href="{{route('aftersliders.manage')}}">Manage AfterSlider</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <form class="form-horizontal" method="post" action="{{ route('aftersliders.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="money_back" class="col-sm-3 control-label">Money Back</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="money_back" name="money_back" value="{{ old('money_back') }}" required placeholder=" 30 Days">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="free_shipping" class="col-sm-3 control-label">Free Shipping</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="free_shipping" name="free_shipping" value="{{ old('free_shipping') }}" required placeholder="100 &#2547">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_time" class="col-sm-3 control-label">First Time</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="first_time" name="first_time" value="{{ old('first_time') }}" required placeholder="50 &#2547">
                            </div>
                        </div>

                        <div  style="margin-left: 65px;" class="col-md-12  form-group">
                            <label   for="status" class=" control-label">STATUS : </label>

                            <div style="margin-left: 20px;" class="radio radio-custom radio-inline radio-primary">
                                <input type="radio" id="status1" name="status" value="active">
                                <label for="status1"> Active</label>
                            </div>
                            <div class="radio radio-custom radio-inline radio-danger">
                                <input type="radio" id="status2" name="status" value="inactive">
                                <label for="status2">Inactive</label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary ">Add AfterSlider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
