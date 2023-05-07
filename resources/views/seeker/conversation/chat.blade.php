@extends('layout.seeker.app')
@section('content')
    @vite('resources/js/app.js')
    <section class="content-main">
        <!-- char-area -->
        <div id="seeker_app">
            <seeker-app :current_id="{{ json_encode($currentId) }}"></seeker-app>
        </div>
        <!-- char-area -->
    </section>
@endsection
