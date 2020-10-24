@extends('admin.components.layout')
@section('title')
    Edeck | Manage Review
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="{{route('manage.review')}}">Manage Review</a></li>
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
                        <div class="col-sm-6"><h3>Review</h3></div>

                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SI No</th>
                                <th>Customer Email</th>
                                <th>Product Name</th>
                                <th>Message</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $review)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $review->customer->email }}</td>
                                    <td>{{ substr($review->product->name,0,18) }}</td>
                                    <td>{{ substr($review->message,0,29) }}...</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>
                                        <input type="checkbox" {{ $review->status =='visible' ? 'checked':'' }} id="reviewStatus" data-id="{{ $review->id }}" data-toggle="toggle" data-on="visible" data-off="hidden" data-size="mini">
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{ route('review.show',base64_encode($review->id))}}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('review.delete',base64_encode($review->id))}}"><i class="fa fa-trash-o"></i></a>
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


