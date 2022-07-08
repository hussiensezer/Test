@if(App::getLocale() == 'ar' && LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <!-- loader-->
    <link href="{{URL::asset('assets/rtl-css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{URL::asset('assets/js/pace.min.js')}}"></script>

    <!--plugins-->
    <link href="{{URL::asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{URL::asset('assets/rtl-css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/rtl-css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/rtl-css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/rtl-css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="{{URL::asset('assets/rtl-css/dark-theme.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/rtl-css/semi-dark.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/rtl-css/header-colors.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/rtl-css/custom.css')}}" rel="stylesheet" />
@else
    <!-- loader-->
    <link href="{{URL::asset('assets/ltr-css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{URL::asset('assets/js/pace.min.js')}}"></script>

    <!--plugins-->
    <link href="{{URL::asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{URL::asset('assets/ltr-css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/ltr-css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/ltr-css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/ltr-css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="{{URL::asset('assets/ltr-css/dark-theme.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/ltr-css/semi-dark.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/ltr-css/header-colors.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/ltr-css/custom.css')}}" rel="stylesheet" />
@endif
