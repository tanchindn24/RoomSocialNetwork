@extends('layouts.home.master')
@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div id="appchat" name="auth" content="{{Auth::user()}}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </div>
@endsection
