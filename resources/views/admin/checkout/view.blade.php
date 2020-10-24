@extends('admin.components.layout')
@section('title')
    Edeck | View Order
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="#">View Order</a></li>
            </ul>
        </div>
    </div>
<!---------------------------------------------->
    <br/><br/>
    <div class="row">
        @includeIf('message.message')
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                   <div class="row">
                       <div class="col-sm-4">
                           <form action="" method="POST" class="form-horizontal">

                               <div class="col-sm-12">
                                  <div class="form-group ">
                                      <div class="input-group" style="margin-bottom: 10px;">
                                          <label class="input-group-addon" for="order_status">Order Status</label>
                                          <select name="order_status" data-id="{{ $orders->id }}" id="order_status" class="form-control">
                                              @foreach(orderStatus() as $status)
                                                  <option value="{{ $status }}" {{ $status==$orders->status ? 'selected':'' }}>{{ ucwords($status) }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>


                               <div class="col-sm-12">
                                  <div class="form-group">
                                      <div class="input-group" style="margin-bottom: 10px;">
                                          <label class="input-group-addon" for="payment_status">Payment Status</label>
                                          <select name="payment_status" data-id="{{ $orders->id }}" id="PaymentViewStatus" class="form-control">
                                              <option value="pending" {{ $orders->payment->status == "pending" ? "selected":"" }}>Pending</option>
                                              <option value="success" {{ $orders->payment->status == "success" ? "selected":"" }}>Success</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>


                               <div class="col-sm-12">
                                  <div class="form-group">
                                      <div class="input-group">
                                          <label class="input-group-addon" for="shipping_charge">Shipping Charge</label>
                                          <input type="text" id="shipping_charge" data-id="{{ $orders->id }}" name="shipping_charge" class="form-control" value="{{ $orders->shipping->shipping_charge }}/=">
                                      </div>
                                  </div>
                              </div>

                           </form>
                       </div>
                       <div class="col-sm-8">
                           <div class="row">
                               <form action="">
                                   <div class="col-sm-9">
                                       <textarea class="form-control" name="" id="" cols="30" rows="5"> Hello My Name is Mr. sumon ,This message from Online ShopThis message from Online Shop This message from Online Shop.This message from Online Shop This message from Online Shop This message from Online Shop </textarea>
                                   </div>
                                   <div class="col-sm-3">
                                       <input class="btn btn-info" type="submit" value="Send Message">
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
<!---------------------------------------------->

   <div class="row">


       <div class="col-sm-6">
           <div class="panel">
               <div class="panel-header  panel-info">
                   <h3 class="panel-title">Customer Information</h3>
                   <div class="panel-actions">
                       <ul>
                           <li class="action toggle-panel panel-expand"><span></span></li>
                       </ul>
                   </div>
               </div>
               <div class="panel-content">
                  <table class="table table-bordered table-striped table-hover">
                      <tr>
                          <td>Name</td>
                          <td>{{ $orders->customer->name }}</td>
                      </tr>
                      <tr>
                          <td>Mobile</td>
                          <td>{{ $orders->customer->phone }}</td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td>{{ $orders->customer->email }}</td>
                      </tr>
                  </table>
               </div>
           </div>
       </div>

       <!---------------------------------------------->

       <div class="col-sm-6">
           <div class="panel">
               <div class="panel-header  panel-info">
                   <h3 class="panel-title">Order Information</h3>
                   <div class="panel-actions">
                       <ul>
                           <li class="action toggle-panel panel-expand"><span></span></li>
                       </ul>
                   </div>
               </div>
               <div class="panel-content">
                  <table class="table table-bordered table-striped table-hover">
                      <tr>
                          <td>Invoice Id</td>
                          <td>{{ $orders->id }}</td>
                      </tr>
                      <tr>
                          <td>Status</td>
                          <td>{{ $orders->status }}</td>
                      </tr>
                      <tr>
                          <td>Total</td>
                          <td>&#2547;{{ $orders->total }}/=</td>
                      </tr>
                  </table>
               </div>
           </div>
       </div>

       <!---------------------------------------------->
       <div class="col-sm-6">
           <div class="panel">
               <div class="panel-header  panel-info">
                   <h3 class="panel-title">Shipping Information</h3>
                   <div class="panel-actions">
                       <ul>
                           <li class="action toggle-panel panel-expand"><span></span></li>
                       </ul>
                   </div>
               </div>
               <div class="panel-content">
                   <table class="table table-bordered table-striped table-hover">
                       <tr>
                           <td>Name</td>
                           <td>{{ $orders->shipping->name }}</td>
                       </tr>
                       <tr>
                           <td>Mobile</td>
                           <td>{{ $orders->shipping->phone }}</td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td>{{ $orders->shipping->email }}</td>
                       </tr>
                       <tr>
                           <td>Address</td>
                           <td>{{ $orders->shipping->address }}</td>
                       </tr>
                   </table>
               </div>
           </div>
       </div>

       <!---------------------------------------------->
       <!---------------------------------------------->
       <div class="col-sm-6">
           <div class="panel">
               <div class="panel-header  panel-info">
                   <h3 class="panel-title">Payment Information</h3>
                   <div class="panel-actions">
                       <ul>
                           <li class="action toggle-panel panel-expand"><span></span></li>
                       </ul>
                   </div>
               </div>
               <div class="panel-content">
                   <table class="table table-bordered table-striped table-hover">
                       <tr>
                           <td>Type</td>
                           <td>{{ ucwords($orders->payment->type) }}</td>
                       </tr>
                       <tr>
                           <td>Status</td>
                           <td>{{ ucwords($orders->payment->status) }}</td>
                       </tr>

                   </table>
               </div>
           </div>
       </div>

       <!---------------------------------------------->
       <div class="col-sm-12">
           <div class="panel">
               <div class="panel-header  panel-info">
                   <h3 class="panel-title">Product Information</h3>
                   <div class="panel-actions">
                       <ul>
                           <li class="action toggle-panel panel-expand"><span></span></li>
                       </ul>
                   </div>
               </div>
               <div class="panel-content">
                   <table class="table table-bordered table-striped table-hover">
                          <tr>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>Unit Price</th>
                              <th>Total Price</th>
                          </tr>
                       @foreach($orders->order_info as $order)
                       <tr>

                           <td>{{ $order->product_name }}</td>
                           <td>{{ $order->product_qty }}</td>
                           <td>&#2547;{{ $order->product_price }}/=</td>
                           <td>&#2547;{{ $order->product_price*$order->product_qty }}/=</td>
                       </tr>
                       @endforeach

                   </table>
               </div>
           </div>
       </div>


   </div>


@endsection


