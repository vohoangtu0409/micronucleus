@php
if(!isset($page)){
    $page = new stdClass();
    $page->title = "Dashboard";
}
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ $page->title }}</title>

    <!-- CSS files -->
    <link href="{{ asset('assets/dashboard/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dashboard/dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dashboard/dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dashboard/dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>
<body @if(\Illuminate\Support\Facades\Route::is("dashboard.login")) style="background-color:#14314d" @endif>
<div class="page">
    @if(\Illuminate\Support\Facades\Auth::check() || \Illuminate\Support\Facades\Route::is('dashboard.blank'))
        @include("dashboard::layouts.header")
        @include("dashboard::layouts.navbar")
    @endif
    <div class="page-wrapper">
        <div class="page-body">
            @yield("content")
        </div>
        @if(\Illuminate\Support\Facades\Auth::check() || \Illuminate\Support\Facades\Route::is('dashboard.blank'))
            @include("dashboard::layouts.footer")
        @endif
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="{{ asset('assets/dashboard/dist/js/tabler.min.js') }}" defer></script>
</body>
</html>
