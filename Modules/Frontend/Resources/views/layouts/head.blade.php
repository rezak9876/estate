<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$setting->title}}</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="{{$setting->meta_description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    {{--<link rel="stylesheet" href="/quarter/css/choices.css">--}}
    <link rel="shortcut icon" href="{{asset(\App\Setting::PATH_UPLOAD).'/'.$setting->faIco}}" type="image/x-icon"/>
    <!-- Font Icons css -->
    <link rel="stylesheet" href="/quarter/css/font-icons.css">
    <!-- plugins css -->
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/quarter/css/plugins.css">
    <link rel="stylesheet" href="/quarter/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/quarter/css/responsive.css">

{{--//select2--}}

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <style>
        #map {
            /* configure the size of the map */
            width: 100%;
            height: 400px;
            z-index: 0;
        }
        :root {
            --ltn__secondary-color: {{$setting->themColor}};
        }

        .select2 [target="_blank"] {
            display:none;
        }

    </style>
    <link rel="stylesheet" href="/quarter/css/rtl.css">

</head>

<body>