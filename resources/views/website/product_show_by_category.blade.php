@extends('layouts.website')

@section('website_content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      @include('includes.sidebar')
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        

        <!-- Slider section -->
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            @php $slider  = DB::table('sliders')->where('status', '1')->get();  @endphp

            @foreach($slider as $slider_row)
            <div class="item" style="background-image: url({{ asset($slider_row->image) }});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">{{ $slider_row->title }}</div>
                  <div class="big-text fadeInDown-1"> ertrewtertert </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider_row->description }}</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="#" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        






       


        <!-- About us section -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left">About us</h3>
              <!-- /.nav-tabs --> 
          </div>

          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="">
                  

                    <div class="category-product">
                            <div class="row">
                          @foreach($all_productss as $all_products)
                                <div class="col-sm-6 col-md-3 wow fadeInUp">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"><a href="{{ url('product_details/'.$all_products->id) }}"><img src="{{ asset($all_products->image1) }}" alt=""></a></div>
                                                <!-- /.image -->
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{ url('product_details/'.$all_products->id) }}">{{ $all_products->product_name }}</a></h3>
                                                <div class="description">
                                                  {{ $all_products->description }}
                                                </div>
                                                <div class="product-price"><span class="price">৳ {{ $all_products->price }} /- </span></div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">

                                                    <li>
                                                        <a href="{{ url('product_details/'.$all_products->id) }}" class="btn btn-primary icon"  type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    </li>



                                                        <li class="lnk wishlist"><a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a></li>
                                                        <li class="lnk"><a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a></li>
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
                      @endforeach

                            </div>
                            <span class="d-flex justify-content-center">{{ $all_productss->links() }}</span>
                            <!-- /.row -->
                        </d>



















                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
          </div>
        </div>
        
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
