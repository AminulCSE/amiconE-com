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
                                <h5>Draft Customer</h5>                                
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
                                                <th>Role</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Signup Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach($all_data as $all_row)


                                            @php
                                                $created = new Carbon\Carbon($all_row->created_at);
                                                $now = Carbon\Carbon::now();
                                                $difference = ($created->diff($now)->days<1)?'today':$created->diffForHumans($now);

                                            @endphp
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $all_row->usertype }}</td>
                                                <td>{{ $all_row->name }}</td>
                                                <td>{{ $all_row->email }}</td>
                                                <td>{{ $all_row->mobile }}</td>
                                                <td>{{ $difference }}</td>
                                                <td>
                                                    <a onclick="return confirm('Are you sure to delete Slider?')" href="{{ url('customer/delete_draft_customer/'.$all_row->id) }}">
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
