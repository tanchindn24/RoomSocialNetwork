@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="txt-primary">Danh sách dịch vụ</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('provider.index') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
                            <li class="breadcrumb-item active">Danh sách dịch vụ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                @if(session('notification'))
                    <div class="alert alert-danger">
                        {{ session('notification') }}
                    </div>
                @endif
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-sm btn-success" href="#">Thêm dịch vụ</a>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table" style="text-align: center">
                                        <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Tên</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>abcd123</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Individual column searching (text inputs) Ends-->
                </div>
            </div>
        </div>
        {{--links--}}
        <!-- Container-fluid Ends-->
    </div>
@endsection
