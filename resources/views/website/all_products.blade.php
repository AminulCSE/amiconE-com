@extends('layouts.website')

@section('website_content')
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder"> 

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

                      <div class="tab-pane active " id="grid-container">
                        <div class="category-product">
                            <div class="row">
                          @foreach($all_productss as $all_products)
                                <div class="col-sm-12 col-md-3 wow fadeInUp">
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
                                                        </li>

                                                        <li class="lnk wishlist">
                                                            <a class="add-to-cart" href="#" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action -->
                                            </div>
                                            <!-- /.cart -->
                                    </div>
                                    <!-- /.products -->
                                </div>
                                <!-- /.item -->
                      @endforeach
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.category-product -->
                        {{ $all_productss->links() }}
                    </div>

                    
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
@endsection
