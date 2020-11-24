@extends('layouts.adminapp')
@section('admin_content')
    <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                
                                <!-- Page-header end -->
                                    
                                    <div class="page-body">
                                        <!-- Config. table start -->
                                        <div class="card col-md-10 m-auto">
                                            <div class="card-header">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <h5>All Category</h5>
                                                <a class="btn btn-primary float-right" href="{{ url('payment/all_payment') }}">All Payment</a>
                                            </div>

                                            <div class="card-block">
                                                <form action="{{ url('payment/update_payment/'.$data->id) }}" method="POST">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Bkash number</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="bkash_number" value="{{ $data->bkash_number }}" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">payment_bkash_code</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="payment_bkash_code" value="{{ $data->payment_bkash_code }}" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">paid</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="paid" value="{{ $data->paid }}" class="form-control">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Select Status</label>
                                                        <div class="col-sm-8">
                                                            <select name="status" class="form-control">
                                                                <option {{ $data->status == "1" ? "selected" : " " }} value="1">Active</option>
                                                                <option {{ $data->status == "0" ? "selected" : " " }} value="0">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"></label>
                                                        <div class="col-sm-8">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Config. table end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
