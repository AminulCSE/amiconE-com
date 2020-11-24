@extends('layouts.website')

@section('website_content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      @include('includes.sidebar')
      <!-- /.sidemenu-holder -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery" href=" {{ asset($product_details->image1) }}">
                                                <img class="img-responsive" alt="" src="{{ asset($product_details->image1) }}" data-echo="{{ asset($product_details->image1) }}"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide2">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product_details->image2) }}">
                                                <img class="img-responsive" alt="" src="{{ asset($product_details->image2) }}" data-echo="{{ asset($product_details->image2) }}"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide3">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product_details->image3) }}">
                                                <img class="img-responsive" alt="" src="{{ asset($product_details->image3) }}" data-echo="{{ asset($product_details->image3) }}"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="8" href="#slide1">
                                                    <img class="img-responsive" width="85" alt="" src="{{ asset($product_details->image1) }}" data-echo="{{ asset($product_details->image1) }}"/>
                                                </a>
                                            </div>
                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="8" href="#slide2">
                                                    <img class="img-responsive" width="85" alt="" src="{{ asset($product_details->image2) }}" data-echo="{{ asset($product_details->image2) }}"/>
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="9" href="#slide3">
                                                    <img class="img-responsive" width="85" alt="" src="{{ asset($product_details->image3) }}" data-echo="{{ asset($product_details->image3) }}"/>
                                                </a>
                                            </div>
                                        </div><!-- /#owl-single-product-thumbnails -->
                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <form action="{{ url('add_cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product_details->id }}">



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
                                                        <input type="number" class="form-control" name="qty" min="1" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->
                                </div><!-- /.product-info -->
                            </form>
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Related Products</h3>
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
                                                
                                            </div>

                                            <div class="product-price">
                                                <span class="price">Tk {{ $related_pro_row->price }} /-</span>
                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <a href="{{ url('product_details/'.$related_pro_row->id) }}" class="btn btn-primary icon">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>

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
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
      </div>
      <!-- /.homebanner-holder --> 
    </div>
    <!-- /.row --> 
    
    <!-- === BRANDS CAROUSEL : END ===== --> 
  </div>
  <!-- /.container --> 
</div>
@endsection
