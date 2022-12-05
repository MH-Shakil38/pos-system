<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamspos.dreamguystech.com/laravel/template/public/addproduct by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Oct 2022 17:48:10 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
          content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') | Multi-vendor POS</title>
    @yield('css')
    @include('admin.layouts.include.template-css')

</head>
<body>
{{--<div id="global-loader">--}}
{{--    <div class="whirly-loader"></div>--}}
{{--</div>--}}
<div class="main-wrapper">
    @include('admin.layouts.include.top-header')
    @include('admin.layouts.include.side-nav')
    <div class="page-wrapper">
        <div class="content">
            @yield('content')
        </div>
    </div>

</div>

@include('admin.layouts.include.template-js')
@yield('js')
</body>

</html>






