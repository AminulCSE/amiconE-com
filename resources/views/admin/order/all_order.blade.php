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
                                <h5>All Order</h5>
                                <a class="btn btn-primary float-right" href="{{ url('order/create_order') }}">Add Order</a>
                                
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
                                                <th>Customer name</th>
                                                <th>Customer Phone</th>
                                                <th>Product name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach($data as $order_row)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $order_row->name }}</td>
                                                <td>{{ $order_row->product_name }}</td>
                                                <td>{{ $order_row->mobile }}</td>
                                                <td>{{ $order_row->qty }}</td>
                                                <td>{{ $order_row->price }}</td>
                                                <td>
                                                    @if($order_row->payment_status == 1) 
                                                    <div class="label-main">
                                                        <label class="label label-success">Active</label>
                                                    </div>
                                                    @else
                                                    <div class="label-main">
                                                        <label class="label label-danger">Inactive</label>
                                                    </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('order/edit_order/'.$order_row->id) }}">
                                                        <i style="font-size: 22px;" class="ti ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="">
                                                        <i style="font-size: 22px;margin-left: 10px;" class="ti ti-eye"></i>
                                                    </a>
                                                    <a onclick="return confirm('Are you sure to delete Slider?')" href="{{ url('logo/delete_logo/'.$order_row->id) }}">
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
