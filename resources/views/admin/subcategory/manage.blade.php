@extends('admin.components.layout')

@section('title')
    Edeck | Manage SubCategories
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Sub Categories</a></li>
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
                        <div class="col-sm-6">
                            <h3 style="color: #0b816a;">SubCategories Table</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('subcategories.create') }}" class="btn btn-primary pull-right">Add SubCategory</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Sl No</th>
                                    <th style="text-align: center;">Category <span style="color: orangered; "> => </span> SubCategory</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategories as $category)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td style="text-align: center;">{{ $category->category->name .' > '.$category->name }}</td>
                                        <td style="text-align: center;">
                                            <input type="checkbox" {{ $category->status === 'active' ? 'checked':'' }} id="subCategoryStatus" data-id="{{ $category->id }}" data-toggle="toggle" data-on="Active"
                                                   data-off="Inactive" data-size="mini">
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('subcategories.edit', base64_encode($category->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('subcategories.delete', base64_encode($category->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
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
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
