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
                                <h5>All Sub Category</h5>
                                <a class="btn btn-primary float-right" href="{{ url('subcategory/create_sub_cat') }}">Add Sub Category</a>
                                
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
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach($sub_cat_data as $sub_cat_row)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $sub_cat_row->sub_cat_name }}</td>
                                                <td>{{ $sub_cat_row->cat_name }}</td>
                                                <td>

                                                    @if($sub_cat_row->status == '1') 
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
                                                    <a href="{{ url('subcategory/edit_sub_cat/'.$sub_cat_row->id) }}">
                                                        <i style="font-size: 22px;" class="ti ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="">
                                                        <i style="font-size: 22px;margin-left: 10px;" class="ti ti-eye"></i>
                                                    </a>
                                                    <a onclick="return confirm('Are you sure to delete Sub Category?')" href="{{ url('subcategory/delete_sub_cat/'.$sub_cat_row->id) }}">
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
