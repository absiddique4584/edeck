@extends('admin.components.layout')
@section('title')
    Edeck | Update AfterSlider
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Update AfterSlider</a></li>
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
                        <div class="col-sm-6"><h3> Update AfterSlider</h3></div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary pull-right" href="{{route('aftersliders.manage')}}">Manage AfterSlider</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <form class="form-horizontal" method="post" action="{{ route('aftersliders.update',$afterslider->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="money_back" class="col-sm-3 control-label">Money Back</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="money_back" name="money_back" value="{{ $afterslider->money_back }}" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="free_shipping" class="col-sm-3 control-label">Free Shipping</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="free_shipping" name="free_shipping" value="{{ $afterslider->free_shipping }}" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_time" class="col-sm-3 control-label">First Time</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="first_time" name="first_time" value="{{ $afterslider->first_time}}" required >
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary ">Update AfterSlider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
