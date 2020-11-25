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
                <div class="col-md-8 col-sm-8 already-registered-login">
                    <h4 class="checkout-subtitle">All Orders</h4>


                     <table id="new-cons" class="table table-striped table-bordered nowrap">
                        <div class="col-md-8">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Product name</th>
                                <th>Product Price</th>
                                <th>Category Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($data as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $row->product_name }}</td>
                                <td>{{ $row->total_price }}</td>
                                <td>

                                    <!-- @if($row->status == 1) 
                                    <div class="label-main">
                                        <label class="label label-success">Active</label>
                                    </div>
                                    @else
                                    <div class="label-main">
                                        <label class="label label-danger">Inactive</label>
                                    </div>
                                    @endif -->

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>




                    
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
                    <li><a href="{{ url('payment') }}">Payment Verification</a></li>
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
