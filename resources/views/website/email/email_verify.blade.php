@extends('layouts.website')
@section('website_content')
<div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in --><br><br>
                    <div class="col-md-3"></div>

                    <div class="col-md-6 col-sm-6 sign-in flex">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @if ($errors->any())
         @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
     @endif


    <h4 class="">Verify option</h4>
     


    
                        <form action="{{ url('verify_store') }}" method="POST" class="register-form outer-top-xs" role="form">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Verify code <span>*</span></label>
                                <input type="text" name="code" class="form-control unicase-form-control text-input" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Verify</button>
                        </form>
                    </div></div><br><br><br><br>
                    <div class="col-md-3">
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    @endsection
