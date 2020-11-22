@extends('layouts.website')

@section('website_content')



<div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                	Customer Dashboard   

                	{{ Auth::user()->name }}        
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    @endsection
