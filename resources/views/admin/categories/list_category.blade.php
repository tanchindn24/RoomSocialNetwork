@extends('layout.admin.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>List Categories</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">List Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>List Categories Post</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive product-table">
                                <table class="display" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Count Posts</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $value)
                                        <tr>
                                            <td>
                                                <h6> {{$value->name}} </h6><span>{{$value->slug}}</span>
                                            </td>
                                            <td>10</td>
                                            @if($value->status == 1)
                                                <td class="font-success">Active</td>
                                            @else
                                                <td class="font-danger">Lock</td>
                                            @endif
                                            <td>
                                                <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
                                                <button class="btn btn-success btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Individual column searching (text inputs) Ends-->
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
