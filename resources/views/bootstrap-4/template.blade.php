<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Yoachum.net</title>

    <link rel="icon" href="/favicon.ico" type="image/png" sizes="16x16" />

    <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous" />

    <link rel="stylesheet" href="/styles/site.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @if(0)
    <!-- Google Analytics -->
    <script>
        (function(y,o,a,c,h,u,m){y['GoogleAnalyticsObject']=h;y[h]=y[h]||function(){
            (y[h].q=y[h].q||[]).push(arguments)},y[h].l=1*new Date();u=o.createElement(a),
            m=o.getElementsByTagName(a)[0];u.async=1;u.src=c;m.parentNode.insertBefore(u,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-62832421-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->
    @endif
    @yield('style')
</head>
<body>
<div class="sy-wrap">
    @include('bootstrap-4.header')

    <div class="sy-content">
        @yield('content')
    </div>
    @include('bootstrap-4.footer')
</div>
</body>

<script defer src="/scripts/fontawesome-all.min.js"></script>

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="/scripts/holder.js"></script>


@yield('script')

</html>