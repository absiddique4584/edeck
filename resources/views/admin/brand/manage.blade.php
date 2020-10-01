@extends('admin.components.layout')
@section('title')
    Edeck | Manage Brand
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="{{route('brand.manage')}}">Manage Brands</a></li>
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
                        <div class="col-sm-6"><h3>Brands</h3></div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary pull-right" href="{{route('brand.create')}}">Add Brand</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>Brand Name</th>
                                    <th>Top Menu</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>
                                            <input type="checkbox" {{ $brand->top_brand =='active' ? 'checked':'' }} id="topbrandStatus" data-id="{{ $brand->id }}" data-toggle="toggle" data-on="SET" data-off="UNSET" data-size="mini">
                                        </td>
                                        <td>
                                            <input type="checkbox" {{ $brand->status ==='active' ? 'checked':'' }} id="brandStatus" data-id="{{ $brand->id }}" data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="mini">
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-xs" href="{{ route('brand.edit',base64_encode($brand->id))}}"><i class="fa fa-pencil"></i>Edit</a>
                                            <a class="btn btn-danger btn-xs" href="{{ route('brand.delete',base64_encode($brand->id))}}"><i class="fa fa-trash-o"></i>Delete</a>
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

