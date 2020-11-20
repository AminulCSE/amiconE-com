@extends('layouts.website')

@section('website_content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder"> 
                <div class='col-md-12'>
                    <div class="clearfix filters-container m-t-10">
                        <div class="row">

                              <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"><span class="lbl"  style="font-size: 15px">Category</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" style="font-size: 15px" type="button" class="btn dropdown-toggle"> Category <span class="caret"></span></button>
                                                <ul role="menu" class="dropdown-menu">
                                                  @foreach($all_cat as $all_cat_row)
                                                    <li role="presentation"><a href="#">{{ $all_cat_row->cat_name }}</a></li>
                                                  @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->


                        </div>
                        <!-- /.row -->
                    </div>


                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
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
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i class="fa fa-shopping-cart"></i></button>
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
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane #list-container -->
                        </div>
                    </div>
                    <!-- /.search-result-container -->
                </div>
              </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
