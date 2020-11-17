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
                                                <h5>All Category</h5>
                                                <a class="btn btn-primary float-right" href="{{ url('category/create_cat') }}">Add Category</a>
                                                
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
                                                                <th>Category name</th>
                                                                <th>Category Slug</th>
                                                                <th>Status</th>
                                                                <th>Created</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $i=1; @endphp
                                                            @foreach($cat_data as $cat_row)
                                                            <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{ $cat_row->cat_name }}</td>
                                                                <td>{{ $cat_row->cat_slug }}</td>
                                                                <td>

                                                                    @if($cat_row->status == 1) 
                                                                    <div class="label-main">
                                                                        <label class="label label-success">Active</label>
                                                                    </div>
                                                                    @else
                                                                    <div class="label-main">
                                                                        <label class="label label-danger">Inactive</label>
                                                                    </div>
                                                                    @endif

                                                                </td>
                                                                <td>{{ $cat_row->created_at }}</td>
                                                                <td>
                                                                    <a href="{{ url('category/edit_cat/'.$cat_row->id) }}">
                                                                        <i style="font-size: 22px;" class="ti ti-pencil-alt"></i>
                                                                    </a>
                                                                    <a href="">
                                                                        <i style="font-size: 22px;margin-left: 10px;" class="ti ti-eye"></i>
                                                                    </a>
                                                                    <a onclick="return confirm('Are you sure to delete Category?')" href="{{ url('category/delete_cat/'.$cat_row->id) }}">
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
