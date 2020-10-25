@extends('website.components.layout')

@section('title')
    Product Details | Edeck
@endsection

@section('content')

    <div class='row single-product'>
        <div class='col-md-3 sidebar'>
            <div class="sidebar-module-container">

                <!-- ============================================== SPECIAL OFFER ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">New Products</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


                            @php($sl=1)
                            @php($total = count($newProducts))
                            @foreach($newProducts as $newProduct)

                                @if(($sl % 3) == 1)
                                    <div class="item">
                                        <div class="products special-product">
                                            @endif


                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a href="#">
                                                                        <img src="{{asset('uploads/product/'.$newProduct->thumbnail)}}" alt="">
                                                                    </a>
                                                                </div><!-- /.image -->


                                                            </div><!-- /.product-image -->
                                                        </div><!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 style="overflow: hidden; height: 30px;" class="name"><a href="#">{{$newProduct->name}}</a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price">
                                                                    <span class="price">&#2547;{{$newProduct->selling_price}} </span>

                                                                </div><!-- /.product-price -->

                                                            </div>
                                                        </div><!-- /.col -->
                                                    </div><!-- /.product-micro-row -->
                                                </div><!-- /.product-micro -->

                                            </div>
                                            @if(($sl % 3) == 0 || $sl == $total)

                                        </div>
                                    </div>
                                @endif
                                @php($sl++)
                            @endforeach

                        </div>
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== NEWSLETTER ============================================== -->
                <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                    <h3 class="section-title">Newsletters</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <p>Sign Up for Our Newsletter!</p>
                        <form role="form">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                            </div>
                            <button class="btn btn-primary">Subscribe</button>
                        </form>
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->
                <!-- ============================================== NEWSLETTER: END ============================================== -->


            </div>
        </div><!-- /.sidebar -->
        <div class='col-md-9'>
            <div class="detail-block">
                <div class="row  wow fadeInUp">

                    <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            <div id="owl-single-product">
                                <div class="single-product-gallery-item" id="slide1">
                                    <a data-lightbox="image-1" data-title="Gallery" href="{{asset('uploads/product/'.$product->thumbnail)}}">
                                        <img class="img-responsive" alt="" src="{{asset('uploads/product/'.$product->thumbnail)}}" data-echo="{{asset('uploads/product/'.$product->thumbnail)}}" />
                                    </a>
                                </div><!-- /.single-product-gallery-item -->
                            </div><!-- /.single-product-slider -->


                            <div class="single-product-gallery-thumbs gallery-thumbs">
                                <div id="owl-single-product-thumbnails">

                                    @if($product_detail->gallery > 0)
                                        @foreach($product_detail as $gallery)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                                    <img class="img-responsive" width="85" alt="" src="{{ asset('uploads/product/'.$gallery->gallery) }}" />
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif

                                </div><!-- /#owl-single-product-thumbnails -->

                            </div><!-- /.gallery-thumbs -->

                        </div><!-- /.single-product-gallery -->
                    </div><!-- /.gallery-holder -->
                    <div class='col-sm-6 col-md-7 product-info-block'>
                        <div class="product-info">
                            <h4 class="name">{{$product->name}}</h4>

                            <div class="rating-reviews m-t-20">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="rating rateit-small"></div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="reviews">
                                            <a href="#" class="lnk">(13 Reviews)</a>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.rating-reviews -->

                            <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="stock-box">
                                            <span class="label">Availability :</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="stock-box">
                                            <span class="value">In Stock</span>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.stock-container -->

                            <div class="description-container m-t-20">
                                {!! $product->description !!}
                            </div><!-- /.description-container -->

                            <div class="price-container info-container m-t-20">
                                <div class="row">

                                    @php($price = false)
                                    @if($product->special_start <= date('Y-m-d') && $product->special_end >= date('Y-m-d') )
                                        @php($price = true)
                                    @endif
                                    <div class="col-sm-6">
                                        <div class="price-box">
                                            <span class="price"> &#2547;{{ $price ? $product->special_price:$product->selling_price}} </span>
                                            @if($price)
                                                <span class="price-strike"> &#2547;{{$product->selling_price}}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="favorite-button m-t-10">
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                <i class="fa fa-signal"></i>
                                            </a>
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div><!-- /.row -->
                            </div><!-- /.price-container -->

                            <div class="quantity-container info-container">
                                <div class="row">

                                    <div class="col-sm-2">
                                        <span class="label">Qty :</span>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="cart-quantity">
                                            <div class="quant-input">
                                                <div class="arrows">
                                                    <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                    <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                </div>
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                    </div>


                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->






                        </div><!-- /.product-info -->
                    </div><!-- /.col-sm-7 -->
                </div><!-- /.row -->
            </div>

            <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                <div class="row">
                    <div class="col-sm-3">
                        <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                            <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                            <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                        </ul><!-- /.nav-tabs #product-tabs -->
                    </div>
                    <div class="col-sm-9">

                        <div class="tab-content">

                            <div id="description" class="tab-pane in active">
                                <div class="product-tab">
                                    <p class="text">{!! $product->long_description !!}</p>
                                </div>
                            </div><!-- /.tab-pane -->

                            <div id="review" class="tab-pane">
                                <div class="product-tab">

                                    <div class="product-reviews">
                                        <h4 class="title">Customer Reviews</h4>

                                        <div class="reviews">
                                            <div class="review">
                                                <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                            </div>

                                        </div><!-- /.reviews -->
                                    </div><!-- /.product-reviews -->



                                    <div class="product-add-review">
                                        <h4 class="title">Write your own review</h4>
                                        <div class="review-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="cell-label">&nbsp;</th>
                                                        <th>1 star</th>
                                                        <th>2 stars</th>
                                                        <th>3 stars</th>
                                                        <th>4 stars</th>
                                                        <th>5 stars</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="cell-label">Quality</td>
                                                        <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cell-label">Price</td>
                                                        <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cell-label">Value</td>
                                                        <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                        <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                    </tr>
                                                    </tbody>
                                                </table><!-- /.table .table-bordered -->
                                            </div><!-- /.table-responsive -->
                                        </div><!-- /.review-table -->

                                        <div class="review-form">
                                            <div class="form-container">
                                                <form role="form" class="cnt-form">

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                            </div><!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                            </div><!-- /.form-group -->
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                            </div><!-- /.form-group -->
                                                        </div>
                                                    </div><!-- /.row -->

                                                    <div class="action text-right">
                                                        <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                    </div><!-- /.action -->

                                                </form><!-- /.cnt-form -->
                                            </div><!-- /.form-container -->
                                        </div><!-- /.review-form -->

                                    </div><!-- /.product-add-review -->

                                </div><!-- /.product-tab -->
                            </div><!-- /.tab-pane -->



                        </div><!-- /.tab-content -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.product-tabs -->

            <!-- ============================================== UPSELL PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">Related products</h3>
                <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                    @foreach($relatedProducts as $relatedProduct)
                        <div class="item item-carousel">
                            <div class="products">

                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="#"><img  src="{{asset('uploads/product/'.$relatedProduct->thumbnail)}}" alt=""></a>
                                        </div><!-- /.image -->

                                        <div class="tag sale"><span>sale</span></div>
                                    </div><!-- /.product-image -->


                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="#">{{$relatedProduct->name}}</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        <div class="product-price">


                                            <span class="price">{{$relatedProduct->special_price}}</span>
                                            <span class="price-before-discount">{{$relatedProduct->selling_price}}</span>

                                        </div><!-- /.product-price -->

                                    </div><!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                </li>

                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>

                                                <li class="lnk">
                                                    <a class="add-to-cart" href="#" title="Compare">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.action -->
                                    </div><!-- /.cart -->
                                </div><!-- /.product -->

                            </div><!-- /.products -->
                        </div><!-- /.item -->
                    @endforeach
                </div><!-- /.home-owl-carousel -->
            </section><!-- /.section -->
            <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

        </div><!-- /.col -->
        <div class="clearfix"></div>
    </div><!-- /.row -->
    <br><br>
@endsection


