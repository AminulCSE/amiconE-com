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
                    <h4 style="font-size: 25px; color: green;" class="checkout-subtitle">Confirm your Payment here! </h4>
                    <h4 class="checkout-subtitle"style="font-size: 20px; color: red;">* Only Bkash</h4>

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form class="register-form" role="form" action="{{ url('payment_store') }}" method="post">
                        @csrf
                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Bkash Number<span>*</span></label>
                        <input type="text" name="bkash_number" class="form-control unicase-form-control text-input" placeholder="Whice number are use to sent Payment" id="exampleInputEmail1">
                      </div>

                     <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Transaction code <span>*</span></label>
                        <input type="text" name="payment_bkash_code" class="form-control unicase-form-control text-input" placeholder="Transaction code here" id="exampleInputEmail1">
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Amount Paid Taka <span>*</span></label>
                        <input type="text" name="amount_paid" class="form-control unicase-form-control text-input" placeholder="Amount Paid Taka  here" id="exampleInputEmail1">
                      </div>

                      <input type="hidden" name="user_id" value="{{ @Auth::user()->id }}">


                      <div class="form-group">
                         <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send</button>
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
