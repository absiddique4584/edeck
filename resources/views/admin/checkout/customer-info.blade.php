@extends('admin.components.layout')
@section('title')
     Edeck| Manage CustomerInfo
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="{{route('checkout.customers.manage')}}">Manage CustomerInfo</a></li>
            </ul>
        </div>
    </div><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-md-12 ">

            @includeIf('message.message');

            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6"><h3>Customer Informations</h3></div>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SI No</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customerinfo as $info)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->email }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>
                                        <a class="btn btn-danger btn-xs" onclick=" return confirm('Are you sure delete this order?')"  href="{{ route('checkout.customers.delete', base64_encode($info->id)) }}"><i class="fa fa-trash-o" ></i>Delete</a>
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


