@extends('admin.components.layout')

@section('title')
    Edeck | Add New Category
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Category > Add </a></li>
            </ul>
        </div>
    </div><br/><br/><br/>

    <div class="row animated slideInUp">
        <div class="col-sm-8 col-sm-offset-2">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Add New Category</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('categories.manage') }}" class="btn btn-primary pull-right">Manage Category</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Category Name">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="icon" class="col-sm-3 control-label">Category Icon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon') }}" required placeholder="fa fa-home">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
