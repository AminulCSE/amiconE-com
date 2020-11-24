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
                        <div class="card">
                            <div class="card-header">
                                <h5>All Payment</h5>
                                <a class="btn btn-primary float-right" href="{{ url('logo/create_logo') }}">Add Payment</a>
                                
                            </div>

                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="new-cons" class="table table-striped table-bordered nowrap">
                                        <div class="col-md-5">
                                            @if(session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Customer Name</th>
                                                <th>BKahs Number</th>
                                                <th>Paid</th>
                                                <th>Transaction code</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach($data as $payment_row)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $payment_row->name }}</td>
                                                <td>{{ $payment_row->bkash_number }}</td>
                                                <td>{{ $payment_row->paid }}</td>
                                                <td>{{ $payment_row->payment_bkash_code }}</td>
                                                <td>

                                                    @if($payment_row->status == 1) 
                                                    <div class="label-main">
                                                        <label class="label label-success">Complete paid</label>
                                                    </div>
                                                    @else
                                                    <div class="label-main">
                                                        <label class="label label-danger">Pending</label>
                                                    </div>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ url('payment/edit_payment/'.$payment_row->id) }}">
                                                        <i style="font-size: 22px;" class="ti ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="">
                                                        <i style="font-size: 22px;margin-left: 10px;" class="ti ti-eye"></i>
                                                    </a>
                                                    <a onclick="return confirm('Are you sure to delete Slider?')" href="{{ url('logo/delete_logo/'.$payment_row->id) }}">
                                                        <i style="font-size: 22px;margin-left: 10px;" class="ti ti-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
