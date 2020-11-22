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
              <h3 class="new-product-title pull-left">Service</h3>
              <!-- /.nav-tabs --> 
          </div>

          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="">
                  <p style="padding-right: 25px; padding-bottom: 25px; text-align: justify; font-size: 17px; line-height: 30px;">
                    Amicon plus was founded as professional manufacturer of gift items all program Awards & all type Signe in Bangladesh. The wooden gift items contain badges and tie clips , bracelets, crystal goods, desk bells, gift boxes, golf balls & trophy, ID tags, key chain, medal, magnets, paper puzzle, plastic cards, PU foam toy silicon rings, and others. We design and manufacture all kinds of giftware to customers’ specific requirements, Please feel free to send your requests.
                  </p>
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
          </div>
        </div>







       


        <!-- About us section -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left">Services</h3>
              <!-- /.nav-tabs --> 
          </div>

          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="">
                  <p style="padding-right: 25px; padding-bottom: 25px; text-align: justify; font-size: 17px; line-height: 30px;">
                    <ul style="padding: 44px; font-size: 20px;">
                      <ol>1. Gift Item branding and Manufacturing</ol>
                      <ol>2. Laser Engraving</ol>
                      <ol>3. 2D & 3D Laser Engraving</ol>
                      <ol>4. Laser Cutting</ol>
                      <ol>5. Router Cutting</ol>
                      <ol>6. Sand Blasting</ol>
                      <ol>7. Sublimation</ol>
                      <ol>8. Etching</ol>
                      <ol>9. Pocket badge making</ol>
                      <ol>10. Mug Prating</ol>
                      <ol>11. Crystal Goods</ol>
                      <ol>12. All Type Sign</ol>
                      <ol>13. Wooden Gift Items</ol>
                    </ul>












                  </p>
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
