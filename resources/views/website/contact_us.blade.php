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
        <!-- <div id="hero">
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
         -->



         <!-- Welcome us section -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left">Welcome To Our Website</h3>
              <!-- /.nav-tabs --> 
          </div>

          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="">
                    <div class="contact" style="margin: 44px; padding-bottom: 44px;">
                      <h2>LOCATION:</h2>
                      <p>H-79, Block-L, Chairman Bari
                      Banani, Dhaka-1213, Bangladesh</p>
                      
                      <p>Phone: +8801711708105
                      Email: amiconplus20@gmail.com</p>


                       <form action="#" method="post" class="register-form outer-top-xs" role="form">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="email" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Name <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Message <span>*</span></label>
                                <textarea rows="5" class="form-control unicase-form-control text-input">
                                  
                                </textarea>
                            </div>



                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send</button>
                        </form>

                    </div>


                </div>



                </div>
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
@endsection
