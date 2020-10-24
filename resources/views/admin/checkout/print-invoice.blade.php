
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Online Shop | Invoice </title>
    <link rel="icon" href="{{ asset('assets/admin/favicon/apple-icon-120x120.png') }}">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.css') }}">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/stylesheets/css/style.css') }}">

    <style>
        .print-area{
            with: 750px;
            height: 500px;
            background: #c3c3c3;
            margin: auto;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container print-area">
        <div  class="row">
            <div style="margin-top: 20px;" class="col-sm-12">
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <span class="pull-left">ORDER ID:#00{{ $orders->id }}</span>
                                <span class="pull-right">{{ date('d-M-Y') }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                @foreach($profiles as $profile)
                                    <h4><strong><u>Our Address</u></strong></h4>
                                    <h4>Online Shop</h4>
                                    <h4>Name : {{ $profile->name }}</h4>
                                    <h4>Address: {{ $profile->address }}</h4>
                                    <h4>Phone: {{ $profile->phone }}</h4>
                                    <h4>Email: {{ $profile->email }}</h4>
                                    <h4>website: {{ $profile->website_address }}</h4>
                                @endforeach
                            </div>


                            <div class="col-sm-6">
                                <h4><strong><u>Customer Address</u></strong></h4>
                                <h4>Name : {{ $orders->shipping->name }}</h4>
                                <h4>Address : {{ $orders->shipping->address }} </h4>
                                <h4>Phone : {{ $orders->shipping->phone }}</h4>
                                <h4>Email : {{ $orders->shipping->email }}</h4>
                            </div>
                        </div>

                        <hr>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>SI</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                            @foreach($orders->order_info as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $order->product_name }} </td>
                                    <td>{{ $order->product_qty }}</td>
                                    <td>&#2547;{{ $order->product_price }}.00/=</td>
                                    <td>&#2547;{{ $order->product_price*$order->product_qty }}.00/=</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total Amount</strong></td>
                                <td>&#2547; {{ $orders->total }}.00/=</td>
                            </tr>
                        </table>

                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-7">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <td>Total</td>
                                        <td>&#2547; {{ $orders->total }}.00/=</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge</td>
                                        <td>&#2547; {{ $orders->shipping->shipping_charge }}/=</td>
                                    </tr>
                                    <tr>
                                        <td>Sub-Total</td>
                                        <td>&#2547; {{ ($orders->total)+($orders->shipping->shipping_charge) }}.00/=</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, aspernatur at dicta dignissimos dolor eaque eius labore libero minima modi odit, optio quidem quis quisquam repudiandae sapiente sint sit tenetur!</p>

                    </div>

                </div>
            </div>
        </div>
    <script src="{{asset('assets/admin/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>


</body>
</html>
