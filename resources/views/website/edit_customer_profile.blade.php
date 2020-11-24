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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




        <!-- panel-body  -->
        <div class="panel-body">
            <div class="row">
                <!-- already-registered-login -->
                <div class="col-md-8 col-sm-8 already-registered-login">
                    <h4 class="checkout-subtitle">Change Password</h4>
                    <form class="register-form" role="form" action="{{ url('update_customer_profile_by_img/'.$get_user->id) }}" method="post" enctype = multipart/form-data>
                        @csrf
                        <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                        <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ $get_user->name }}">
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                        <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ $get_user->email }}">
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Mobile<span>*</span></label>
                        <input type="text" name="mobile" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ $get_user->mobile }}">
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Address<span>*</span></label>
                        <input type="text" name="address" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ $get_user->address }}">
                      </div>


                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Profile Pic<span>*</span></label><br>

                        <img src="{{ asset($get_user->image) }}" alt="Profile image" style="height: 120px; width:  auto;">


                        <input type="file" name="image" class="form-control unicase-form-control text-input" id="exampleInputEmail1">

                         <input type="hidden" name="oldimage" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ $get_user->image }}">
                      </div>


                      <div class="form-group">
                         <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Change</button>
                      </div>


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
                                            <li><a href="{{ url('dashboard') }}">My Profile</a></li>
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
</div><!-- /.container -->
</div><!-- /.body-content -->
    @endsection
