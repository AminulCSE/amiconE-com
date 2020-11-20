@extends('layouts.website')

@section('website_content')
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
      @include('includes.sidebar')
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product_details->image1) }}">
                                                <img class="img-responsive" alt="" src="{{ asset($product_details->image1) }}" data-echo="{{ asset($product_details->image1) }}"/>
                                            </a>
                                        </div>

                                        <div class="single-product-gallery-item" id="slide2">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product_details->image2) }}">
                                                <img class="img-responsive" alt="" src="{{ asset($product_details->image2) }}" data-echo="{{ asset($product_details->image2) }}"/>
                                            </a>
                                        </div>


                                        <div class="single-product-gallery-item" id="slide3">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product_details->image3) }}">
                                                <img class="img-responsive" alt="" src="{{ asset($product_details->image3) }}" data-echo="{{ asset($product_details->image3) }}"/>
                                            </a>
                                        </div>

                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                                    <img class="img-responsive" width="820px" alt="" src="{{ asset($product_details->image1) }}" data-echo="{{ asset($product_details->image1) }}"/>
                                                </a>
                                            </div>

                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                                                    <img class="img-responsive" width="820px" alt="" src="{{ asset($product_details->image2) }}" data-echo="{{ asset($product_details->image2) }}"/>
                                                </a>
                                            </div>

                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide3">
                                                    <img class="img-responsive" width="820px" alt="" src="{{ asset($product_details->image3) }}" data-echo="{{ asset($product_details->image3) }}"/>
                                                </a>
                                            </div>
                                        </div><!-- /#owl-single-product-thumbnails -->
                                    </div><!-- /.gallery-thumbs -->
                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->

<!-- ==============Product image sliding============== -->


                            
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{ $product_details->product_name }}</h1>

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
                                        {{ $product_details->description }}
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    <span class="price">৳ {{ $product_details->price }} /-</span>
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
                                                        <input type="number" value="1" min="1">
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

                    

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Related products</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">


                        @php $related_product = DB::table('products')->where('cat_id', $product_details->cat_id)->get(); @endphp


                        @foreach($related_product as $related_pro_row)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{ url('product_details/'.$related_pro_row->id) }}"><img src="{{ asset($related_pro_row->image1) }}" data-echo="{{ asset($related_pro_row->image1) }}" alt=""></a>
                                            </div><!-- /.image -->
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{ url('product_details/'.$related_pro_row->id) }}">{{ $related_pro_row->product_name }}</a></h3>
                                            <div class="description">
                                                {{ Str::words($related_pro_row->description, 5)}}
                                            </div>

                                            <div class="product-price">
                                                <span class="price">৳ {{ $related_pro_row->price }} /-</span>
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
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
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















                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
    </div><!-- /.body-content -->

        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    
    <!-- === BRANDS CAROUSEL : END ===== --> 
  </div>
  <!-- /.container --> 
</div>
@endsection
