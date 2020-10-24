@extends('admin.components.layout')
@section('title')
    Edeck | Show Review
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Manage Show</a></li>
            </ul>
        </div>
    </div><br/><br/>

    <div class="row animated fadeInRight">
        <div class="col-sm-12">

            @includeIf('message.message')

            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6"><h3>Review Details</h3></div>

                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="table-responsive">
                        <table id="basic-table" class="table table-bordered" cellspacing="0" width="100%">

                            <thead>
                                <tr>
                                    <td style="text-align: center;"><span><strong>Data</strong></span></td>
                                    <td style="text-align: center;">Value</td>
                                </tr>
                            </thead>
                            <tbody class="table_body">
                            <tr>
                                <td><span><strong>Customer Phone :</strong></span></td>
                                <td>{{ $review_show->customer->phone }}</td>
                            </tr>

                            <tr>
                                <td> <span><strong>Customer Email :</strong></span></td>
                                <td>  {{ $review_show->customer->email }}</td>
                            </tr>

                            <tr>
                                <td> <span><strong>Product Name :</strong></span></td>
                                <td>  {{ $review_show->product->name }}</td>
                            </tr>

                            <tr>
                                <td> <span><strong>Product Selling-Price :</strong></span></td>
                                <td>  {{ $review_show->product->selling_price }} &#2547;</td>
                            </tr>

                            <tr>
                                <td> <span><strong>Product Ratings :</strong></span></td>
                                <td>  {{ $review_show->rating }}</td>
                            </tr>

                            <tr>
                                <td> <span><strong>Rating Message :</strong></span></td>
                                <td>  {{ $review_show->message }}</td>
                            </tr>

                            <tr>
                                <td> <span><strong>Rating Status :</strong></span></td>
                                <td>  {{ $review_show->status }}</td>
                            </tr>

                            <tr>
                                <td> <span><strong>Product Photo :</strong></span></td>
                                <td><img style="width: 70px; height: 70px;" src="{{ asset('uploads/product/'.$review_show->product->thumbnail) }}" alt=""></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .table_body{
       padding-left: 30px;
    }
</style>
