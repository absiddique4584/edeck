@extends('website.components.layout')

@section('title')
    Edeck | Show Cart
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Shopping Cart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.breadcrumb -->
    <div class="row ">
        @if(Cart::isEmpty())
            <div class="shopping-cart">
                <h2 class="text-center">You Have Already Removed All Of Your Choosable Products</h2>
                <h5 class="text-center"><a class="btn btn-info" href="{{route('index')}}">Click</a> Here For More Shopping  </h5>
            </div>
        @else
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="cart-romove item">Remove</th>
                                <th class="cart-description item">Image</th>
                                <th class="cart-product-name item">Product Name</th>
                                <th class="cart-qty item">Quantity</th>
                                <th class="cart-sub-total item">Price</th>
                                <th class="cart-total last-item">Grandtotal</th>
                            </tr>
                            </thead><!-- /thead -->
                            <tbody>
                            @foreach( Cart::getContent() as $item )
                                <tr>
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit">Remove</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('product', $item->attributes->slug) }}">
                                            <img style="width: 50px" src="{{ asset('uploads/product/'.$item->attributes->thumbnail) }}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('product', $item->attributes->slug) }}">{{ $item->name }}</a>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input class="form-control" type="number" value="{{ $item->quantity }}" name="quantity">
                                                <br><br>
                                                <button  type="submit">Update</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>&#2547;{{ $item->price }}</td>
                                    <td>&#2547;{{ $item->price * $item->quantity }}</td>
                                </tr>
                            @endforeach
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->


                <div class="col-md-4 col-sm-12 col-md-offset-8 cart-shopping-total">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">&#2547;{{ Cart::getTotal() }}</span>
                                </div>
                            </th>
                        </tr>
                        </thead><!-- /thead -->
                        <tbody>
                        <tr>
                            <td>
                                <div class="cart-checkout-btn pull-right">
                                    <a href="{{ route('site.checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                    <span class="">Checkout with multiples address!</span>
                                </div>
                            </td>
                        </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->
            </div><!-- /.shopping-cart -->
        @endif
    </div>
    <br>

@endsection
