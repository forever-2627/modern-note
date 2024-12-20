<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @stack('title')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/assets/css/color/pink.css') }}" id="jssDefault" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/assets/css/switcher-style.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="icon" href="{{asset('upload/favicon.png')}}">
    @stack('styles')

</head>


<!-- page wrapper -->

<body>

<div class="boxed_wrapper">

@include('components.preloader')

@yield('main')

<!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-angle-up"></span>
    </button>
</div>


<!-- jequery plugins -->
<script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
{{--<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>--}}
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('frontend/assets/js/owl.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/assets/js/wow.js') }}"></script>--}}
<script src="{{ asset('frontend/assets/js/validation.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
{{--<script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/assets/js/jQuery.style.switcher.min.js') }}"></script>--}}
<script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/assets/js/nav-tool.js') }}"></script>

<!-- main-js -->
<script src="{{ asset('frontend/assets/js/script.js') }}"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
            @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>
