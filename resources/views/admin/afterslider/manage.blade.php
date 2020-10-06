@extends('admin.components.layout')
@section('title')
    Edeck | Manage AfterSlider
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Manage AfterSlider</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">

            @includeIf('message.message')

            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6"><h3>AfterSlider</h3></div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary pull-right" href="{{route('aftersliders.create')}}">Add AfterSlider</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>Money Back</th>
                                    <th>Free Shipping</th>
                                    <th>First Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aftersliders as $afterslider)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $afterslider->money_back }} Days</td>
                                        <td>{{ $afterslider->free_shipping }} &#2547;</td>
                                        <td>{{ $afterslider->first_time }} &#2547;</td>
                                        <td>
                                            <input type="checkbox" {{ $afterslider->status ==='active' ? 'checked':'' }} id="AfterSliderStatus" data-id="{{ $afterslider->id }}" data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="mini">
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-xs" href="{{ route('aftersliders.edit',base64_encode($afterslider->id))}}"><i class="fa fa-pencil"></i>Edit</a>
                                            <a class="btn btn-danger btn-xs" href="{{ route('aftersliders.delete',base64_encode($afterslider->id))}}"><i class="fa fa-trash-o"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

