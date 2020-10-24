@extends('admin.components.layout')
@section('title')
    Edeck | Manage Orders
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="{{route('checkout.orders.manage')}}">Manage Orders</a></li>
            </ul>
        </div>
    </div><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row ">
        <div class="col-md-12 ">
            <br>
            @includeIf('message.message')

            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6"><h3>Orders</h3></div>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SI No</th>
                                <th>Order Id</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Total</th>
                                <th>Order Status</th>
                                <th>Pay Status</th>
                                <th>Pay Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ ucwords(substr($order->customer->name,0,21)) }}</td>
                                    <td>{{ $order->customer->phone }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td><span class="text-capitalize badge badge-xs {{ randomColor($order->status) }}">{{ $order->status }}</span></td>
                                    <td><span class="text-capitalize badge badge-xs {{ randomColor($order->p_status) }}">{{ $order->p_status }}</span></td>
                                    <td>{{ $order->p_type }}</td>
                                    <td>
                                        <a href="{{ route('checkout.orders.view', base64_encode($order->id)) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('checkout.orders.invoice', base64_encode($order->id)) }}" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a>
                                        <a class="btn btn-warning btn-xs " id="editOrder" data-id="{{ $order->id }}" data-order-status="{{ $order->status }}" data-payment-status="{{ $order->p_status }}" data-toggle="modal" data-target="#updateOrder"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('checkout.orders.delete', base64_encode($order->id)) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure delete this order?')" ><i class="fa fa-trash-o"></i></a>
                                    </td>
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

    <!-- Modal -->
    <div class="modal fade" id="updateOrder" tabindex="-1" role="dialog" aria-labelledby="modal-default-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('checkout.orders.update') }}" method="POST" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="id" id="order_id">
                <div class="modal-header state modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-default-label">Edit Order And Payment Status</h4>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label for="order_status" class="col-sm-4 control-label">Order Status</label>
                        <div class="col-sm-5">
                            <select name="order_status" id="viewOrderStatus" class="form-control">
                                @foreach(orderStatus() as $status)
                                <option value="{{ $status }}">{{ ucwords($status) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="payment_status" class="col-sm-4 control-label">Payment Status</label>
                        <div class="col-sm-5">
                            <select name="payment_status" id="viewPaymentStatus" class="form-control">
                                <option value="pending">Pending</option>
                                <option value="success">Success</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" >Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection


