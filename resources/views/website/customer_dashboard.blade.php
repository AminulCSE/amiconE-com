@extends('layouts.website')

@section('website_content')

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

    <!-- panel-heading -->
    <div class="panel-heading">
        <h4 class="">
            <a href="#">
              <span>Your profile</span>
            </a>
         </h4>
    </div>


        <!-- panel-body  -->
        <div class="panel-body">
            <div class="row">       

                <!-- guest-login -->            
                <div class="col-md-6 col-sm-6 guest-login">
                    <h4 class="checkout-subtitle">Name: {{ @Auth::user()->name }}</h4>
                    <p class="text title-tag-line">Email: {{ @Auth::user()->email }}</p>
                    <p class="text title-tag-line">Mobile: {{ @Auth::user()->mobile }}</p>

                    <!-- radio-form  -->
                    <form class="register-form" role="form">
                        <div class="radio radio-checkout-unicase">  
                            <input id="guest" type="radio" name="text" value="guest"
                            @if(@Auth::user()->status == 1) checked="" @endif
                            >  
                            <label class="radio-button guest-check" for="guest">Verified</label>  
                              <br>
                            <input id="register" type="radio" name="text" value="register"
                            @if(@Auth::user()->status == 0) checked="" @endif
                            >  
                            <label class="radio-button" for="register">No Verified</label>  
                        </div>  
                    </form>
                    <!-- radio-form  -->
                </div>
                <!-- guest-login -->
<div class="col-md-5">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div>



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



                <!-- already-registered-login -->
                <div class="col-md-6 col-sm-6 already-registered-login">
                    <h4 class="checkout-subtitle">Change Password</h4>
                    <form class="register-form" method="post" action="{{ url('customer_password_update/'.@Auth::user()->id) }}" role="form">
                        @csrf
                      <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Current password <span>*</span></label>
                        <input type="password" name="cureent_password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Enter your Old Password">
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">New password <span>*</span></label>
                        <input type="password" name="new_password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Enter your New password">
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Again new password <span>*</span></label>
                        <input type="password" name="again_new_password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Again Enter your New password">
                      </div>

                      <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Change</button>
                    </form>
                </div>  
                <!-- already-registered-login -->       

            </div>          
        </div>
        <!-- panel-body  -->
    </div><!-- row -->
    </div><!-- /.checkout-steps -->
</div>


<div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="unicase-checkout-title">Your action</h4>
            </div>
            <div class="">
                <ul class="nav nav-checkout-progress list-unstyled">
                    <li><a href="#">My orders</a></li>
                    <li><a href="{{ url('customer_edit_profile/'.@Auth::user()->id) }}">Edit Profile</a></li>
                    <li><a href="#">Order Tracking</a></li>
                </ul>       
            </div>
        </div>
    </div>
</div> 
<!-- checkout-progress-sidebar -->             
</div>
</div><!-- /.row -->
</div><!-- /.checkout-box -->




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
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->   
</div><!-- /.container -->
</div><!-- /.body-content -->
    @endsection
