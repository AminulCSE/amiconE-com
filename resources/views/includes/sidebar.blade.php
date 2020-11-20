 <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              @php $category = DB::table('categories')->where('status', '1')->get(); @endphp
              @foreach($category as $cat_row)
              <li class="dropdown menu-item">
                <a href="#" data-toggle="dropdown">
                  <i class="icon fa fa-shopping-bag"></i>
                  {{ $cat_row->cat_name }}
                </a>
                <!-- /.dropdown-menu -->
              </li>
              @endforeach
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        
        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
            @php
              $pro_cat = DB::table('products')
                        ->inRandomOrder()
                        ->where('status', '1')
                        ->get();
            @endphp

            @foreach($pro_cat as $pro_cat_row)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image">
                    <a href="{{ url('product_details/'.$pro_cat_row->id) }}">
                      <img src="{{ asset($pro_cat_row->image1) }}" alt="">
                    </a>
                  </div>
                  
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="{{ url('product_details/'.$pro_cat_row->id) }}">{{ $pro_cat_row->product_name }}</a></h3>
                  <div class="product-price"> <span class="price">৳ {{ $pro_cat_row->price }} /- </span></div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
            @endforeach




            <!-- End item -->
          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ========== HOT DEALS: END == --> 
        
        <!-- ========= SPECIAL OFFER ========= -->
        

        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
@php
$all_crest = DB::table('products')
                  ->join('categories', 'products.cat_id', 'categories.id')
                  ->select('products.*', 'categories.cat_name')
                  ->where('categories.cat_name', 'crest')
                  ->get();
 @endphp

          @foreach($all_crest as $ccc)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> <a href="{{ url('product_details/'.$ccc->id) }}">
                    <img src="{{ asset($ccc->image1) }}" alt="">
                  </a> </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="detail.html">{{ $ccc->product_name }}</a></h3>
                  <div class="product-price"> <span class="price"> ৳ {{ $ccc->price }} /- </span></div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
            @endforeach
            <!-- End item -->
          </div>
          <!-- /.sidebar-widget --> 
        </div>





        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend/images/testimonials/member1.png') }}" alt="Image"></div>
              <div class="testimonials"><em>"</em>Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Aminul islam peal <span>Graphics Designer</span><span>Phone: +8801787377982</span>  </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
          </div>
          <!-- /.owl-carousel --> 
        </div>
      </div>