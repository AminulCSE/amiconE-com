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
                  <p style="padding-right: 25px; padding-bottom: 25px; text-align: justify; font-size: 17px; line-height: 30px;">
                    Amecon plus a name of the widely recognize brand gift items manufacturer in Bangladesh. Now a days, so many organizations have been working in ountry's creative field. But Amecon (Artist, Mechanic, Erection & consultant) is completely different from those organizations because of its innovative excellence. It is different in quality works, excellent service and business commitment to our clients.
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
              <h3 class="new-product-title pull-left">About us</h3>
              <!-- /.nav-tabs --> 
          </div>

          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="">
                  <p style="padding-right: 25px; padding-bottom: 25px; text-align: justify; font-size: 17px; line-height: 30px;">
                    Its worldwide recognition & fame have inspired its artist, mechanic & consultant to keep up to date with the present world regarding the use of the best technology available in this sector. Amicon plus is fully different in serving its clients according to their demand & taste through its full fledged effort to serve the best across the world.
                    Amicon plus produces all Type Signees, Wooden and Steel Fabrication works, Gold and Silver Plating, Handicrafts, Leather Products, Interior Decoration, Crystal goods.
                    Amicon plus is supplying metallic Gift items to Prime Minister’s office Bangladesh, Defence forces organizations and other organizations at home and abroad e.g. American Embassy, British Aid Workshop, ASEAN, Embassy of Qatar, Brunei, Danish, Norway, Malaysia and also Kuwait, Saudi Arabia, Bosnia, East Timor, Sieraleon, Haiti (U.S.A), Japan, Australia and other Countries where the UN forces, Saudi Arabia Defence were employed and worked.
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
