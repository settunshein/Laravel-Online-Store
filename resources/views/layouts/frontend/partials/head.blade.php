<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Home | E-Shopper')</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <style>
        .whishlist{
            position: absolute;
            top: 0;
            right: 0;
        }

        .breadcrumbs .breadcrumb {
            margin-bottom: 32px;
        }
        
        .breadcrumbs .breadcrumb li a {
            background: #FE980F;
            color: #FFFFFF;
            padding: 4px 10.5px;
        }

        .breadcrumbs .breadcrumb li a:after {
            content: "";
            height: auto;
            width: auto;
            border-width: 8px;
            border-style: solid;
            border-color: transparent transparent transparent #FE980F;
            position: absolute;
            top: 10.5px;
            left: 48px;
        }

        .product-price{
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .product-price small{
            margin-right: 5px;
        }

        .ri{
            position: relative;
            top: 1.65px;
        }

        #toast-container > div { 
            width: 340px !important; 
            opacity: 1 !important;
        }

        .custom-fs-12{
            font-size: 12px;
        }

        .custom-fs-13{
            font-size: 13px;
        }

        .custom-fs-14{
            font-size: 14px !important;
        }

        .custom-fs-15{
            font-size: 15px;
        }

        .custom-fs-16{
            font-size: 16px !important;
        }

        .custom-mb-10{
            margin-bottom: 10px;
        }

        .custom-mb-20{
            margin-bottom: 20px;
        }

        .custom-mt-24{
            margin-top: 24px;
        }

        /* Account Dropdown */
        .acc-dropdown:hover .acc-sub-menu li:first-child{
            padding-top: 15px !important;
        }

        .acc-dropdown:hover .acc-sub-menu li{
            display: block !important;
            padding: 0 15px 15px!important;
        }

        .sub-menu li a{
            font-size: 14px !important;
            background-color: inherit !important;
        }
    </style>
    @yield('css')
</head>