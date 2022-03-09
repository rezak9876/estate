@php
$pages = [];
@endphp
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from emadrajabi.com/templates/html/findeo/listings-list-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Nov 2021 07:46:29 GMT -->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>{{$setting->title}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="{{$setting->meta_description}}">
    <link rel="shortcut icon" href="{{asset(Modules\Setting\Entities\Setting::PATH_UPLOAD).'/'.$setting->faIco}}" type="image/x-icon"/>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/findeo/css/style.css">

    <link rel="stylesheet" href="/findeo/css/color.css">
    <style>
        :root {
            --maincolor: {{$setting->themColor}};
        }

        .left-float-btn {
            float: left !important;
        }

        /*Auth */
        .mobile_device {
            display: none;
        }

        .desktop_device .header-widget {
            float: left;
        }

        /*social media*/
        .socialmedia-icons {
            list-style: none;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .socialmedia-icons li a {
            padding: 0.5rem;
            color: #444;
        }

        .socialmedia-icons li a:hover {
            background: white;
            color: blue;
        }

        .right-side {
            width: auto;
        }

        /*footer-socialmedia-icons*/
        .footer-socialmedia-icons {
            list-style: none;
            display: flex;
            align-items: center;
            padding-right: 0rem;
        }

        .footer-socialmedia-icons li {
            border: 2px solid var(--maincolor);
            border-radius: 5px;
            margin: 0 0.5rem;
        }

        .footer-socialmedia-icons li a {
            padding: 0px 0.5rem;
            color: var(--maincolor);
        }

        .footer-socialmedia-icons li a:hover {
            background: var(--maincolor);
            color: white;
        }


        .pb-3 {
            padding-bottom: 4rem !important;
        }



        /*footer*/
        #footer {
            position: unset !important;
        }
        .footer-shadow {
            margin-bottom: auto !important;
        }





    </style>


    <style>



        .d-flex {
            display: -ms-flexbox !important;
            display: flex !important;
        }

        .justify-content-start {
            -ms-flex-pack: start !important;
            justify-content: flex-start !important;
        }

        .justify-content-end {
            -ms-flex-pack: end !important;
            justify-content: flex-end !important;
        }

        .justify-content-center {
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }

        .justify-content-between {
            -ms-flex-pack: justify !important;
            justify-content: space-between !important;
        }

        .justify-content-around {
            -ms-flex-pack: distribute !important;
            justify-content: space-around !important;
        }

        .align-items-start {
            -ms-flex-align: start !important;
            align-items: flex-start !important;
        }

        .align-items-end {
            -ms-flex-align: end !important;
            align-items: flex-end !important;
        }

        .align-items-center {
            -ms-flex-align: center !important;
            align-items: center !important;
        }

        .align-items-baseline {
            -ms-flex-align: baseline !important;
            align-items: baseline !important;
        }

        .align-items-stretch {
            -ms-flex-align: stretch !important;
            align-items: stretch !important;
        }

        .d-none {
            display: none !important;
        }



        @media (min-width: 576px) {
            .d-sm-none {
                display: none !important;
            }
            .d-sm-inline {
                display: inline !important;
            }
            .d-sm-inline-block {
                display: inline-block !important;
            }
            .d-sm-block {
                display: block !important;
            }
            .d-sm-table {
                display: table !important;
            }
            .d-sm-table-row {
                display: table-row !important;
            }
            .d-sm-table-cell {
                display: table-cell !important;
            }
            .d-sm-flex {
                display: -ms-flexbox !important;
                display: flex !important;
            }
            .d-sm-inline-flex {
                display: -ms-inline-flexbox !important;
                display: inline-flex !important;
            }
        }


        @media (min-width: 768px) {
            .d-md-none {
                display: none !important;
            }
            .d-md-inline {
                display: inline !important;
            }
            .d-md-inline-block {
                display: inline-block !important;
            }
            .d-md-block {
                display: block !important;
            }
            .d-md-table {
                display: table !important;
            }
            .d-md-table-row {
                display: table-row !important;
            }
            .d-md-table-cell {
                display: table-cell !important;
            }
            .d-md-flex {
                display: -ms-flexbox !important;
                display: flex !important;
            }
            .d-md-inline-flex {
                display: -ms-inline-flexbox !important;
                display: inline-flex !important;
            }
        }


        @media (min-width: 992px) {
            .d-lg-none {
                display: none !important;
            }
            .d-lg-inline {
                display: inline !important;
            }
            .d-lg-inline-block {
                display: inline-block !important;
            }
            .d-lg-block {
                display: block !important;
            }
            .d-lg-table {
                display: table !important;
            }
            .d-lg-table-row {
                display: table-row !important;
            }
            .d-lg-table-cell {
                display: table-cell !important;
            }
            .d-lg-flex {
                display: -ms-flexbox !important;
                display: flex !important;
            }
            .d-lg-inline-flex {
                display: -ms-inline-flexbox !important;
                display: inline-flex !important;
            }
        }


        @media (min-width: 1200px) {
            .d-xl-none {
                display: none !important;
            }
            .d-xl-inline {
                display: inline !important;
            }
            .d-xl-inline-block {
                display: inline-block !important;
            }
            .d-xl-block {
                display: block !important;
            }
            .d-xl-table {
                display: table !important;
            }
            .d-xl-table-row {
                display: table-row !important;
            }
            .d-xl-table-cell {
                display: table-cell !important;
            }
            .d-xl-flex {
                display: -ms-flexbox !important;
                display: flex !important;
            }
            .d-xl-inline-flex {
                display: -ms-inline-flexbox !important;
                display: inline-flex !important;
            }
        }


        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }


        .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
        .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
        .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
        .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
        .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
        .col-xl-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%;
        }

        .col-auto {
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto;
            max-width: none;
        }

        .col-1 {
            -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
            max-width: 8.333333%;
        }

        .col-2 {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%;
        }

        .col-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }

        .col-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }

        .col-5 {
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%;
        }

        .col-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-7 {
            -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
            max-width: 58.333333%;
        }

        .col-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%;
        }

        .col-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%;
        }

        .col-10 {
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%;
        }

        .col-11 {
            -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
            max-width: 91.666667%;
        }

        .col-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }









        @media (min-width: 576px) {
            .col-sm {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%;
            }
            .col-sm-auto {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto;
                max-width: none;
            }
            .col-sm-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%;
            }
            .col-sm-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%;
            }
            .col-sm-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
            }
            .col-sm-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
            .col-sm-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%;
            }
            .col-sm-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
            .col-sm-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%;
            }
            .col-sm-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }
            .col-sm-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%;
            }
            .col-sm-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%;
            }
            .col-sm-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%;
            }
            .col-sm-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
            .order-sm-first {
                -ms-flex-order: -1;
                order: -1;
            }
            .order-sm-last {
                -ms-flex-order: 13;
                order: 13;
            }
            .order-sm-0 {
                -ms-flex-order: 0;
                order: 0;
            }
            .order-sm-1 {
                -ms-flex-order: 1;
                order: 1;
            }
            .order-sm-2 {
                -ms-flex-order: 2;
                order: 2;
            }
            .order-sm-3 {
                -ms-flex-order: 3;
                order: 3;
            }
            .order-sm-4 {
                -ms-flex-order: 4;
                order: 4;
            }
            .order-sm-5 {
                -ms-flex-order: 5;
                order: 5;
            }
            .order-sm-6 {
                -ms-flex-order: 6;
                order: 6;
            }
            .order-sm-7 {
                -ms-flex-order: 7;
                order: 7;
            }
            .order-sm-8 {
                -ms-flex-order: 8;
                order: 8;
            }
            .order-sm-9 {
                -ms-flex-order: 9;
                order: 9;
            }
            .order-sm-10 {
                -ms-flex-order: 10;
                order: 10;
            }
            .order-sm-11 {
                -ms-flex-order: 11;
                order: 11;
            }
            .order-sm-12 {
                -ms-flex-order: 12;
                order: 12;
            }
            .offset-sm-0 {
                margin-left: 0;
            }
            .offset-sm-1 {
                margin-left: 8.333333%;
            }
            .offset-sm-2 {
                margin-left: 16.666667%;
            }
            .offset-sm-3 {
                margin-left: 25%;
            }
            .offset-sm-4 {
                margin-left: 33.333333%;
            }
            .offset-sm-5 {
                margin-left: 41.666667%;
            }
            .offset-sm-6 {
                margin-left: 50%;
            }
            .offset-sm-7 {
                margin-left: 58.333333%;
            }
            .offset-sm-8 {
                margin-left: 66.666667%;
            }
            .offset-sm-9 {
                margin-left: 75%;
            }
            .offset-sm-10 {
                margin-left: 83.333333%;
            }
            .offset-sm-11 {
                margin-left: 91.666667%;
            }
        }

        @media (min-width: 768px) {
            .col-md {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%;
            }
            .col-md-auto {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto;
                max-width: none;
            }
            .col-md-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%;
            }
            .col-md-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%;
            }
            .col-md-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
            }
            .col-md-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
            .col-md-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%;
            }
            .col-md-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
            .col-md-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%;
            }
            .col-md-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }
            .col-md-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%;
            }
            .col-md-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%;
            }
            .col-md-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%;
            }
            .col-md-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
            .order-md-first {
                -ms-flex-order: -1;
                order: -1;
            }
            .order-md-last {
                -ms-flex-order: 13;
                order: 13;
            }
            .order-md-0 {
                -ms-flex-order: 0;
                order: 0;
            }
            .order-md-1 {
                -ms-flex-order: 1;
                order: 1;
            }
            .order-md-2 {
                -ms-flex-order: 2;
                order: 2;
            }
            .order-md-3 {
                -ms-flex-order: 3;
                order: 3;
            }
            .order-md-4 {
                -ms-flex-order: 4;
                order: 4;
            }
            .order-md-5 {
                -ms-flex-order: 5;
                order: 5;
            }
            .order-md-6 {
                -ms-flex-order: 6;
                order: 6;
            }
            .order-md-7 {
                -ms-flex-order: 7;
                order: 7;
            }
            .order-md-8 {
                -ms-flex-order: 8;
                order: 8;
            }
            .order-md-9 {
                -ms-flex-order: 9;
                order: 9;
            }
            .order-md-10 {
                -ms-flex-order: 10;
                order: 10;
            }
            .order-md-11 {
                -ms-flex-order: 11;
                order: 11;
            }
            .order-md-12 {
                -ms-flex-order: 12;
                order: 12;
            }
            .offset-md-0 {
                margin-left: 0;
            }
            .offset-md-1 {
                margin-left: 8.333333%;
            }
            .offset-md-2 {
                margin-left: 16.666667%;
            }
            .offset-md-3 {
                margin-left: 25%;
            }
            .offset-md-4 {
                margin-left: 33.333333%;
            }
            .offset-md-5 {
                margin-left: 41.666667%;
            }
            .offset-md-6 {
                margin-left: 50%;
            }
            .offset-md-7 {
                margin-left: 58.333333%;
            }
            .offset-md-8 {
                margin-left: 66.666667%;
            }
            .offset-md-9 {
                margin-left: 75%;
            }
            .offset-md-10 {
                margin-left: 83.333333%;
            }
            .offset-md-11 {
                margin-left: 91.666667%;
            }
        }

        @media (min-width: 992px) {
            .col-lg {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%;
            }
            .col-lg-auto {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto;
                max-width: none;
            }
            .col-lg-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%;
            }
            .col-lg-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%;
            }
            .col-lg-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
            }
            .col-lg-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
            .col-lg-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%;
            }
            .col-lg-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
            .col-lg-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%;
            }
            .col-lg-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }
            .col-lg-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%;
            }
            .col-lg-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%;
            }
            .col-lg-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%;
            }
            .col-lg-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
            .order-lg-first {
                -ms-flex-order: -1;
                order: -1;
            }
            .order-lg-last {
                -ms-flex-order: 13;
                order: 13;
            }
            .order-lg-0 {
                -ms-flex-order: 0;
                order: 0;
            }
            .order-lg-1 {
                -ms-flex-order: 1;
                order: 1;
            }
            .order-lg-2 {
                -ms-flex-order: 2;
                order: 2;
            }
            .order-lg-3 {
                -ms-flex-order: 3;
                order: 3;
            }
            .order-lg-4 {
                -ms-flex-order: 4;
                order: 4;
            }
            .order-lg-5 {
                -ms-flex-order: 5;
                order: 5;
            }
            .order-lg-6 {
                -ms-flex-order: 6;
                order: 6;
            }
            .order-lg-7 {
                -ms-flex-order: 7;
                order: 7;
            }
            .order-lg-8 {
                -ms-flex-order: 8;
                order: 8;
            }
            .order-lg-9 {
                -ms-flex-order: 9;
                order: 9;
            }
            .order-lg-10 {
                -ms-flex-order: 10;
                order: 10;
            }
            .order-lg-11 {
                -ms-flex-order: 11;
                order: 11;
            }
            .order-lg-12 {
                -ms-flex-order: 12;
                order: 12;
            }
            .offset-lg-0 {
                margin-left: 0;
            }
            .offset-lg-1 {
                margin-left: 8.333333%;
            }
            .offset-lg-2 {
                margin-left: 16.666667%;
            }
            .offset-lg-3 {
                margin-left: 25%;
            }
            .offset-lg-4 {
                margin-left: 33.333333%;
            }
            .offset-lg-5 {
                margin-left: 41.666667%;
            }
            .offset-lg-6 {
                margin-left: 50%;
            }
            .offset-lg-7 {
                margin-left: 58.333333%;
            }
            .offset-lg-8 {
                margin-left: 66.666667%;
            }
            .offset-lg-9 {
                margin-left: 75%;
            }
            .offset-lg-10 {
                margin-left: 83.333333%;
            }
            .offset-lg-11 {
                margin-left: 91.666667%;
            }
        }

        @media (min-width: 1200px) {
            .col-xl {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%;
            }
            .col-xl-auto {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto;
                max-width: none;
            }
            .col-xl-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%;
            }
            .col-xl-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%;
            }
            .col-xl-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
            }
            .col-xl-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
            .col-xl-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%;
            }
            .col-xl-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
            .col-xl-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%;
            }
            .col-xl-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }
            .col-xl-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%;
            }
            .col-xl-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%;
            }
            .col-xl-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%;
            }
            .col-xl-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
            .order-xl-first {
                -ms-flex-order: -1;
                order: -1;
            }
            .order-xl-last {
                -ms-flex-order: 13;
                order: 13;
            }
            .order-xl-0 {
                -ms-flex-order: 0;
                order: 0;
            }
            .order-xl-1 {
                -ms-flex-order: 1;
                order: 1;
            }
            .order-xl-2 {
                -ms-flex-order: 2;
                order: 2;
            }
            .order-xl-3 {
                -ms-flex-order: 3;
                order: 3;
            }
            .order-xl-4 {
                -ms-flex-order: 4;
                order: 4;
            }
            .order-xl-5 {
                -ms-flex-order: 5;
                order: 5;
            }
            .order-xl-6 {
                -ms-flex-order: 6;
                order: 6;
            }
            .order-xl-7 {
                -ms-flex-order: 7;
                order: 7;
            }
            .order-xl-8 {
                -ms-flex-order: 8;
                order: 8;
            }
            .order-xl-9 {
                -ms-flex-order: 9;
                order: 9;
            }
            .order-xl-10 {
                -ms-flex-order: 10;
                order: 10;
            }
            .order-xl-11 {
                -ms-flex-order: 11;
                order: 11;
            }
            .order-xl-12 {
                -ms-flex-order: 12;
                order: 12;
            }
            .offset-xl-0 {
                margin-left: 0;
            }
            .offset-xl-1 {
                margin-left: 8.333333%;
            }
            .offset-xl-2 {
                margin-left: 16.666667%;
            }
            .offset-xl-3 {
                margin-left: 25%;
            }
            .offset-xl-4 {
                margin-left: 33.333333%;
            }
            .offset-xl-5 {
                margin-left: 41.666667%;
            }
            .offset-xl-6 {
                margin-left: 50%;
            }
            .offset-xl-7 {
                margin-left: 58.333333%;
            }
            .offset-xl-8 {
                margin-left: 66.666667%;
            }
            .offset-xl-9 {
                margin-left: 75%;
            }
            .offset-xl-10 {
                margin-left: 83.333333%;
            }
            .offset-xl-11 {
                margin-left: 91.666667%;
            }
        }



        .text-center {
            text-align: center !important;
        }

        .text-right {
            text-align: right !important;
        }
    </style>


    <style>
        ul.chosen-choices{
            overflow-x: hidden !important;
            overflow-y: auto !important;
            font-size: 1.1rem;
        }
    </style>
    @yield('style')

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">
    <!-- Header Container
    ================================================== -->
    <header id="header-container">


        <div class="clearfix"></div>
        <!-- Topbar / End -->


        <!-- Header -->
        <div  class="d-lg-none">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side" style="padding-top: 20px;">


                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                        </button>
                    </div>


                    <!-- Logo -->
                    <div id="logo" style="margin-right: 10px;left: auto;right: auto;">
                        <a href="/">
                        <img src="{{'/'.\Modules\Setting\Entities\Setting::PATH_UPLOAD.$setting->logo}}" alt=""
                             width="128px" height="43px">
                        </a>
                    </div>




                    <!-- Social Icons -->
                    <ul class="socialmedia-icons float-left" style="padding: unset;">
                        @if($setting->socialTelegram)
                            <li><a rel="nofollow" href="{{$setting->socialTelegram}}"><i
                                            class="fab fa-telegram"></i></a>
                            </li>
                        @endif
                        @if($setting->socialInstagram)
                            <li><a rel="nofollow" href="{{$setting->socialInstagram}}"><i class="fab fa-instagram"></i></a>
                            </li>
                        @endif
                        @if($setting->socialFacebook)
                            <li><a rel="nofollow" href="{{$setting->socialFacebook}}"><i
                                            class="fab fa-facebook"></i></a>
                            </li>
                        @endif
                        @if($setting->socialTwitter)
                            <li><a rel="nofollow" href="{{$setting->socialTwitter}}"><i class="fab fa-twitter"></i></a>
                            </li>
                        @endif
                        @if($setting->socialWhatsapp)
                            <li><a rel="nofollow" href="{{$setting->socialWhatsapp}}"><i
                                            class="fab fa-whatsapp"></i></a>
                            </li>
                        @endif
                        {{--@if($setting->socialAparat)--}}
                        {{--<li><a href="{{$setting->socialAparat}}"><i class="fab fa-aparat"></i></a>--}}
                        {{--</li>--}}
                        {{--@endif--}}
                    </ul>

                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">

                            @if(\Illuminate\Support\Facades\Auth::check())
                                <li class="mobile_device"><a rel="nofollow"
                                                             href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                    <ul>
                                        <li><a rel="nofollow" href="{{route('admin.estates.index')}}">پنل
                                                کاربری</a></li>
                                        <li><a rel="nofollow" href="{{route('logout')}}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a></li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @else
                                <li class="mobile_device"><a rel="nofollow" href="{{route('login')}}">ورود</a>
                                </li>
                            @endif
                            <li><a rel="nofollow" href="/">صفحه اصلی</a></li>


                            <li><a rel="nofollow" href="{{route('contact_us')}}">تماس با ما</a></li>
                            <li><a rel="nofollow" href="{{route('about_us')}}">درباره ما</a></li>
                            @foreach($pages as $page)
                                <li><a rel="nofollow" href="{{route('frontend.page.show',$page->slug)}}">{{$page->title}}</a></li>
                            @endforeach

                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->



                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End auth -->
                <div class="right-side desktop_device">
                    <!-- Header Widget -->
                    <div class="header-widget">
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">

                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li><a rel="nofollow"
                                           href="#">{{\Illuminate\Support\Facades\Auth::user()->name}} <i
                                                    class="fa fa-user"></i></a>
                                        <ul>
                                            <li><a rel="nofollow"
                                                   href="{{route('admin.estates.index')}}">پنل کاربری</a></li>
                                            <li><a rel="nofollow" href="{{route('logout')}}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a></li>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @else


                                    <li><a rel="nofollow" href="{{route('login')}}">ورود<i class="fa fa-user"></i></a>
                                    </li>
                                @endif

                            </ul>
                        </nav>

                    </div>
                    <!-- Header Widget / End -->

                    <!-- Left Side Content -->
                    <div class="right-side">




                    </div>
                    <!-- Left Side Content / End -->
                </div>
                <!-- Right Side Content / End -->
            </div>
        </div>
        <!-- Header / End -->


        <!-- Header -->
        <div  class="d-none d-lg-block" >
            <div class="container" style="padding-top: 10px;">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="/">
                            <img src="{{'/'.\Modules\Setting\Entities\Setting::PATH_UPLOAD.$setting->logo}}" alt=""
                                 width="128px" height="43px">
                        </a>
                    </div>


                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                        </button>
                    </div>


                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">

                            @if(\Illuminate\Support\Facades\Auth::check())
                                <li class="mobile_device"><a rel="nofollow"
                                                             href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                    <ul>
                                        <li><a rel="nofollow" href="{{route('admin.estates.index')}}">پنل
                                                کاربری</a></li>
                                        <li><a rel="nofollow" href="{{route('logout')}}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a></li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @else
                                <li class="mobile_device"><a rel="nofollow" href="{{route('login')}}">ورود</a>
                                </li>
                            @endif
                            <li><a rel="nofollow" href="/">صفحه اصلی</a></li>


                            <li><a rel="nofollow" href="{{route('contact_us')}}">تماس با ما</a></li>
                            <li><a rel="nofollow" href="{{route('about_us')}}">درباره ما</a></li>
                            @foreach($pages as $page)
                                <li><a rel="nofollow" href="{{route('frontend.page.show',$page->slug)}}">{{$page->title}}</a></li>
                            @endforeach

                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End auth -->
                <div class="right-side desktop_device">
                    <!-- Header Widget -->
                    <div class="header-widget">
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">

                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li><a rel="nofollow"
                                           href="#">{{\Illuminate\Support\Facades\Auth::user()->name}} <i
                                                    class="fa fa-user"></i></a>
                                        <ul>
                                            <li><a rel="nofollow"
                                                   href="{{route('admin.estates.index')}}">پنل کاربری</a></li>
                                            <li><a rel="nofollow" href="{{route('logout')}}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a></li>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @else


                                    <li><a rel="nofollow" href="{{route('login')}}">ورود<i class="fa fa-user"></i></a>
                                    </li>
                                @endif

                            </ul>
                        </nav>

                    </div>
                    <!-- Header Widget / End -->

                    <!-- Left Side Content -->
                    <div class="right-side">


                        <!-- Social Icons -->
                        <ul class="socialmedia-icons float-left">
                            @if($setting->socialTelegram)
                                <li><a rel="nofollow" href="{{$setting->socialTelegram}}"><i
                                                class="fab fa-telegram"></i></a>
                                </li>
                            @endif
                            @if($setting->socialInstagram)
                                <li><a rel="nofollow" href="{{$setting->socialInstagram}}"><i class="fab fa-instagram"></i></a>
                                </li>
                            @endif
                            @if($setting->socialFacebook)
                                <li><a rel="nofollow" href="{{$setting->socialFacebook}}"><i
                                                class="fab fa-facebook"></i></a>
                                </li>
                            @endif
                            @if($setting->socialTwitter)
                                <li><a rel="nofollow" href="{{$setting->socialTwitter}}"><i class="fab fa-twitter"></i></a>
                                </li>
                            @endif
                            @if($setting->socialWhatsapp)
                                <li><a rel="nofollow" href="{{$setting->socialWhatsapp}}"><i
                                                class="fab fa-whatsapp"></i></a>
                                </li>
                            @endif
                            {{--@if($setting->socialAparat)--}}
                            {{--<li><a href="{{$setting->socialAparat}}"><i class="fab fa-aparat"></i></a>--}}
                            {{--</li>--}}
                            {{--@endif--}}
                        </ul>

                    </div>
                    <!-- Left Side Content / End -->
                </div>
                <!-- Right Side Content / End -->
            </div>
        </div>
        <!-- Header / End -->
    </header>

    @yield('content')
    <div id="footer" class="sticky-footer pb-3">
        <!-- Main -->
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-sm-6">
                    <img class="footer-logo" src="{{'/'.\Modules\Setting\Entities\Setting::PATH_UPLOAD.$setting->logo}}" alt="" width="128px"
                         height="43px">
                    <br><br>
                    <p>{{$setting->description}}</p>
                </div>

                <div class="col-md-3 col-sm-6 ">
                    <h4>پیوندهای مفید</h4>
                    <div class="text-center">
                        <ul class="footer-links" style="padding-right: 3rem">
                            <li><a rel="nofollow" href="{{route('contact_us')}}">تماس با ما</a></li>
                            <li><a rel="nofollow" href="{{route('about_us')}}">درباره ما</a></li>

                        </ul>

                        <ul class="footer-links" style="padding-right: 3rem">
                            <li><a rel="nofollow" href="/">صفحه اصلی</a></li>

                        </ul>
                    </div>

                    <div class="clearfix"></div>
                </div>

                <div class="col-md-3  col-sm-12">
                    <h4>تماس با ما</h4>
                    <div class="text-widget">

                        <span>{{$setting->address}}</span> <br>
                        تلفن:<span> <a rel="nofollow" href="tel:{{$setting->phone}}">{{$setting->phone}}</a> </span><br>
                        ایمیل:<span> <a rel="nofollow" href="mailto:{{$setting->email}}">{{$setting->email}}</a> </span><br>
                        <!-- Social Icons -->
                        <ul class="footer-socialmedia-icons d-flex justify-content-center">
                            @if($setting->socialTelegram)
                                <li><a rel="nofollow" href="{{$setting->socialTelegram}}"><i
                                                class="fab fa-telegram"></i></a>
                                </li>
                            @endif
                            @if($setting->socialInstagram)
                                <li><a rel="nofollow" href="{{$setting->socialInstagram}}"><i
                                                class="fab fa-instagram"></i></a>
                                </li>
                            @endif
                            @if($setting->socialFacebook)
                                <li><a rel="nofollow" href="{{$setting->socialFacebook}}"><i
                                                class="fab fa-facebook"></i></a>
                                </li>
                            @endif
                            @if($setting->socialTwitter)
                                <li><a rel="nofollow" href="{{$setting->socialTwitter}}"><i class="fab fa-twitter"></i></a>
                                </li>
                            @endif
                            @if($setting->socialWhatsapp)
                                <li><a rel="nofollow" href="{{$setting->socialWhatsapp}}"><i
                                                class="fab fa-whatsapp"></i></a>
                                </li>
                            @endif
                            {{--@if($setting->socialAparat)--}}
                            {{--<li><a href="{{$setting->socialAparat}}"><i class="fab fa-aparat"></i></a>--}}
                            {{--</li>--}}
                            {{--@endif--}}
                        </ul>
                    </div>


                </div>
                <div class="col-md-3  col-sm-12">
                    <div>
                        {!! $setting->enamad !!}
                    </div>
                </div>

            </div>


        </div>

    </div>
    <!-- Footer / End -->


    <!-- Back To Top Button -->
    <div id="backtotop"><a rel="nofollow" href="#"></a></div>




</div>
<!-- Wrapper / End -->

<!-- Scripts
    ================================================== -->
<script type="text/javascript" src="/findeo/scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/chosen.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/rangeSlider.js"></script>
<script type="text/javascript" src="/findeo/scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/slick.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/masonry.min.js"></script>
<script type="text/javascript" src="/findeo/scripts/custom.js"></script>
@yield('script')

</body>

<!-- Mirrored from emadrajabi.com/templates/html/findeo/listings-list-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Nov 2021 07:46:29 GMT -->
</html>
