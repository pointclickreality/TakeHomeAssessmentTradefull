<!DOCTYPE html>
<!--
Author: Jardarrius Hawkins
Product Name: LARAVEL 9 Take Home Assestment
Contact: itssimplescience@gmail.com
-->
<html lang="en">
<!--begin::Head-->
@livewireStyles
<head>

    {{-- SEO START --}}
    <title>@yield('title')</title>

    <!-- AI SEO  -->
    {{-- GOOGLE MARKUP --}}
    <meta charset="utf-8" />
    <meta name="description" content="@yield('metadescription')" />
    <meta name="keywords" content="@yield('metakeyword')" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Jardarrius Hawkins">


    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="JD Hawkins | Take Home Assestment" />

    {{-- <base href=""> --}}
    <link rel="canonical" href="{{\Illuminate\Support\Facades\URL::to('/')}}" />

    {{-- SEO END --}}
    <link rel="shortcut icon" href="{{ asset('/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Stylesheets Bundle-->
    <!--end::Head-->
    {{-- </base> --}}
    @yield('style')
</head>
<!--begin::Body-->

<body data-kt-name="" id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
    data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

    @yield('header')
    @yield('leftsidebar')
    @include('dashboard.layout.partials._page-loader')
    @yield('body')
    @yield('footer')

    <!-- scroll to top widget -->
    @include('dashboard.partials._scrolltop')
    @yield('script')
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{asset('/assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('/assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->

    <!-- dismiss alerts -->
    <script>
        $(function() {
            var timeout = 3000;
            $('.alert').delay(timeout).fadeOut(300);
        });
    </script>
    @livewireScripts


</body>
<!--end::Body-->

</html>
