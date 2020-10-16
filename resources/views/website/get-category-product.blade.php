@if($products->isEmpty())
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="{{asset('assets/website/images/sliders/no-more.jpg')}}" alt="">
            </div>
            <div class="col-md-6 text-center">
                <h1 style="margin-top: 100px; margin-right: 100px;" class="text-center text-danger">No More Products !</h1>
            </div>
        </div>
    </div>
@else
    @php($i=0)
    @foreach($products as $product)
        <div class="col-sm-4 col-md-3">
            <div class="products">
                <div class="product">
                    <div class="product-image">
                        <div class="image"><a href="{{ route('product',$product->slug) }}"><img src="{{ asset('uploads/product/'.$product->thumbnail) }}" alt=""></a></div>
                    </div>
                    <!-- /.product-image -->
                    @php($sPrice = false)
                    @if($product->special_start <= date('Y-m-d') && $product->special_end >= date('Y-m-d'))
                        @php($sPrice = true)
                    @endif
                    <div class="product-info text-left">
                        <h3 class="name"><a href="{{ route('product',$product->slug) }}">{{ $product->name }}</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>
                        <div class="product-price">
                            <span class="price">&#2547;{{ $sPrice ? $product->special_price : $product->selling_price }} </span>

                            @if($sPrice)
                                <span class="off"> {{ sprintf('%.2f',(($product->selling_price-$product->special_price)/$product->selling_price)*100) }}% off </span>
                                <span class="price-before-discount pull-right">&#2547;{{ $product->selling_price }}</span>
                            @endif
                        </div>
                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">


                                    <form action="{{route('cart.add')}}" method="post" >
                                        @csrf
                                        <input type="hidden"  name="id" value="{{$product->id}}">
                                    <button class="btn btn-primary icon"  type="submit">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                    </form>



                                </li>
                                <li class="lnk wishlist"><a class="add-to-cart" href="{{ route('product',$product->slug) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a></li>
                                <li class="lnk"><a class="add-to-cart" href="{{ route('product',$product->slug) }}" title="Compare"> <i class="fa fa-eye"></i> </a></li>
                            </ul>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
                <!-- /.product -->
            </div>
            <!-- /.products -->
        </div>
        <!-- /.item -->
        @php($lastId = $product->id)
        @php($i++)
    @endforeach

    @if($i==8)
        <div class="load-more-button text-center">
            <button class="btn btn-info btn-lg" data-id="{{ $lastId }}" id="loadMoreButton">Load More</button>
        </div>
    @endif
@endif
