<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#563d7c">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Dropify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
    
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap 4 Toggle -->
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- Laravel toastr -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

    <!-- Dashboard Styles -->
    <link rel="stylesheet" href="{{ asset('backend/css/dashboard.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope&display=swap');

        * {
            font-family: 'Manrope', sans-serif;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .fa-trash-alt {
            padding-right: 1.5px;
            padding-left: 1.5px;
        }

        .btn,
        .card,
        table,
        input,
        select,
        textarea {
            font-size: 12.5px !important;
        }

        table tr td {
            vertical-align: middle !important;
        }

        .card-header {
            padding: 0.55rem 1.25rem !important;
        }

        .card-ttl {
            font-size: 13px !important;
        }

        /* Custom Styling Sidebar */
        .sidebar-heading span {
            font-size: 12px;
        }

        .nav-link svg {
            display: inline-block;
            width: 20px;
            text-align: left;
        }

        .nav-link {
            font-size: 13px;
        }

        /* Custom Styling Sweet Alert 2 */
        .swal2-popup {
            font-size: 12.5px !important;
        }

        .swal2-styled.swal2-confirm {
            padding-right: 25px !important;
            padding-left: 25px !important;
        }

        .swal2-styled.swal2-cancel,
        .swal2-styled.swal2-confirm {
            box-shadow: none !important;
            outline: none !important;
            border-radius: 0 !important;
        }

        /* Styling Custom Bootstrap Button */
        .toggle.android { border-radius: 0px;}
        .toggle.android .toggle-handle { border-radius: 0px; }


        .toggle-group .btn-success{
            background: #2ecc71 !important;
            border-color: #27ad60 !important;
        }

        .toggle-group .btn-danger{
            background: #e74c3c !important;
            border-color: #c44133 !important;
        }

        /* Custom Styling Select 2 Single */
        .select-2{
            outline: none;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0;
        }

        /* Custom Styling Select 2 Multiple */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 26px;
        }

        .select2-container .select2-selection--multiple {
            min-height: 0px;
        }

        .select2-container--default .select2-selection--multiple {
            overflow: hidden;
            font-size: 10px;
            border: 1px solid #ced4da;
            border-radius: 0;
        }

        /* Styling Search */
        .btn:focus,
        .search-input:focus {
            box-shadow: none !important;
        }

        /* Custom Syling Pagination */
        .pagination {
            margin-bottom: 0;
        }

        .info-blk li {
            margin-bottom: 20px;
        }

        .info-blk li i {
            display: inline-block;
            width: 14px;
            margin-right: 5px;
        }

        .info-blk strong {
            display: inline-block;
            width: 100px;
        }

        .dropify-wrapper .dropify-message .file-icon p {
            font-size: 13.5px !important;
        }

        .bg-custom-dark {
            background-color: #3D464D;
        }

        .bg-custom-warning {
            background-color: #FFD333;
        }

        .text-custom-dark {
            color: #3D464D;
        }

        .text-custom-warning {
            color: #FFD333;
        }

        .brand-logo span.h4 {
            font-weight: 600;
        }

        .custom-fs-10{
            font-size: 10.5px;
        }

        .custom-fs-11 {
            font-size: 11px;
        }

        .custom-fs-12 {
            font-size: 12.5px;
        }

        .custom-fs-13 {
            font-size: 13px;
        }

        .custom-fw-600 {
            font-weight: 600;
        }

        .custom-mb-30{
            margin-bottom: 30px;
        }

        .badge{
            font-weight: 400;
        }

        .sidebar-active,
        .sidebar .nav-link.sidebar-active .feather {
            color: #Ed1C24 !important;
        }

        .widget {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        }

        .permission-badge{
            width: 125px;
            font-size: 11.5px;
            padding: 6.5px 0;
        }

        /* Styling Dropify */
        .dropify-wrapper {
            border-radius: 4.5px !important;
        }

        .dropify-wrapper .dropify-message p {
            font-size: initial !important;
        }

        /* Custom Styling Sweet Alert 2 */
        .swal2-popup {
            font-size: 11.5px !important;
        }

        .swal2-styled.swal2-confirm {
            padding-right: 25px !important;
            padding-left: 25px !important;
        }

        /* Styling Pagination */
        .pagination{
            border-radius: 0; 
        }

        .pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            color: #FFF;
            background-color: #1C1E1F !important;
            border-color: #1C1E1F !important;
        }

        .pagination > li > a, 
        .pagination > li > span {
           color: #1C1E1F !important;
        }
        
        .page-item:first-child .page-link,
        .page-item:last-child .page-link{
            border-radius: 0;
        }

        .page-item.active .page-link {
            color: #FFF !important;
            background-color: #1C1E1F !important;
            border-color: #1C1E1F !important;
        }

        /* Styling Personal Info Table */
        .personal-info-tbl span i{
            width: 24px;
            display: inline-block;
        }

        .personal-info-tbl tr td:first-child{
            width: 20%;
        }

        .personal-info-tbl tr td:nth-child(2) span{
            padding-left: 24px;
        }

        .personal-info-tbl tr:last-child td{
            padding-bottom: 0;
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
            left: 30% !important;
        }

        mark{
            background-color: yellow;
            padding: 0px !important;
        }

        @media screen and (max-width: 767px){
            div.dataTables_wrapper div.dataTables_length, 
            div.dataTables_wrapper div.dataTables_filter
            /* div.dataTables_wrapper div.dataTables_info,  */
            /* div.dataTables_wrapper div.dataTables_paginate  */
            {
                width: 100% !important;
                text-align: left;
            }

            div.dataTables_wrapper div.dataTables_filter input {
                margin-left: 0.5em;
                display: inline-block;
                width: auto;
                /* width: 80%; */
            }

            div.dataTables_wrapper div.dataTables_length select {
                margin-left: 16px;
                margin-right: 5px;
                width: auto;
                display: inline-block;
            }
        }

        .custom-mr-5{
            margin-right: 5px;
        }

        .custom-mb-12{
            margin-bottom: 12px;
        }

        .module-ttl{
            color: #Ed1C24;
        }

        .module-ttl-divider{
            border-top: 1px solid #Ed1C2480;
        }

        .permissions-list-blk label{
            cursor: pointer;
        }

        /* Employee Details */
        .socialBx a{ 
            color: #2d3038; text-decoration: none; 
        }
        
        .socialBx a i{ 
            font-size: 14px; 
        }
        
        .socialBx a:not(:last-child){ 
            padding-right: 10px; 
        }

        .infoBx ul{ 
            padding: 0; 
        }

        .infoBx ul li:first-child{ 
            padding-top: 5px; 
        }

        .infoBx ul li { 
            padding-bottom: 20px; 
        }

        .infoBx ul li label{
            display: inline-block;
            width: 100px;
        }

        .infoBx ul li b{
            display: inline-block;
            width: 20px;
        }

        .infoBx ul li i{ 
            padding-right: 5px; 
            color: #1C1E1F1;
        }
    </style>
    @yield('css')
</head>