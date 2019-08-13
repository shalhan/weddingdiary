<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">

        <title>Wedding Diary</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Favicon and Touch Icons -->
        <link href="{{ url('resources/favicon.ico') }}" rel="shortcut icon" type="image/png">
        <link href="{{ url('resources/apple-touch-icon.png') }}" rel="apple-touch-icon">
        <link href="{{ url('resources/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
        <link href="{{ url('resources/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
        <link href="{{ url('resources/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">

        <!-- Icon fonts -->
        <link href="{{ url('/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ url('/css/flaticon.css') }}" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- CUSTOM CSS -->
        @stack("style")
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        @yield("content")
        <script src="{{ url('/js/jquery.min.js') }}"></script>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>
        @stack("script")
    </body>
</html>