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

                                <h5>Edit Sub Category</h5>
                                <a class="btn btn-primary float-right" href="{{ url('subcategory/all_sub_cat') }}">All Sub Category</a>
                            </div>

                            <div class="card-block">
                                <form action="{{ url('subcategory/update_sub_cat/'. $edit_sub_cat->id) }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Select Category</label>
                                        <div class="col-sm-8">
                                            <select name="cat_id" class="form-control">
                                                @foreach($all_category as $all_cat_row)
                                                <option {{ $all_cat_row->id == $edit_sub_cat->cat_id ? "selected" : " " }} value="{{ $all_cat_row->id }}">

                                                    {{ ucwords($all_cat_row->cat_name) }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Sub Category Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="sub_cat_name" class="form-control" value="{{ $edit_sub_cat->sub_cat_name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Select Status</label>
                                        <div class="col-sm-8">
                                            <select name="status" class="form-control">
                                                <option {{ $edit_sub_cat->status == "1" ? "selected" : " " }} value="1">Active</option>
                                                <option {{ $edit_sub_cat->status == "0" ? "selected" : " " }} value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-primary">Update Sub Cat</button>
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
