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
    <link href="./dist/css/tabler.min.css?1668287865" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css?1668287865" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css?1668287865" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1668287865" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css?1668287865" rel="stylesheet"/>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>
<body @if(\Illuminate\Support\Facades\Route::is("dashboard.login")) style="background-color:#14314d" @endif>
<div class="page">
    @auth
        @include("dashboard::layouts.header")
        @include("dashboard::layouts.navbar")
    @endauth
    <div class="page-wrapper">
        <div class="page-body">
            @yield("content")
        </div>
        @auth
            @include("dashboard::layouts.footer")
        @endauth
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="./dist/js/tabler.min.js?1668287865" defer></script>
</body>
</html>
