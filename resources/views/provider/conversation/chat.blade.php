@extends('layout.provider.app')
@section('content')
    @vite('resources/js/app.js')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Chat App</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('provider.index') }}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Chat</li>
                            <li class="breadcrumb-item active"> Chat App</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div id="provider_app">
            <provider-app :current_id="{{ json_encode($currentId) }}"></provider-app>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
