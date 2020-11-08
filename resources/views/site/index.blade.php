<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- CSSs -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('SITE')) }}/css/reset.css"/>
    <!-- RESET STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('SITE')) }}/style.css"/>
    <!-- MAIN THEME STYLESHEET -->
    <link rel="stylesheet" id="max-width-1024-css" href="{{ asset(env('SITE')) }}/css/max-width-1024.css"
          type="text/css" media="screen and (max-width: 1240px)"/>
    <link rel="stylesheet" id="max-width-768-css" href="{{ asset(env('SITE')) }}/css/max-width-768.css" type="text/css"
          media="screen and (max-width: 987px)"/>
    <link rel="stylesheet" id="max-width-480-css" href="{{ asset(env('SITE')) }}/css/max-width-480.css" type="text/css"
          media="screen and (max-width: 480px)"/>
    <link rel="stylesheet" id="max-width-320-css" href="{{ asset(env('SITE')) }}/css/max-width-320.css" type="text/css"
          media="screen and (max-width: 320px)"/>
    <!-- CSSs Plugin -->
    <link rel="stylesheet" id="thickbox-css" href="{{ asset(env('SITE')) }}/css/thickbox.css" type="text/css"
          media="all"/>
    <link rel="stylesheet" id="styles-minified-css" href="{{ asset(env('SITE')) }}/css/style-minifield.css"
          type="text/css" media="all"/>
    <link rel="stylesheet" id="buttons" href="{{ asset(env('SITE')) }}/css/buttons.css" type="text/css" media="all"/>
    <link rel="stylesheet" id="cache-custom-css" href="{{ asset(env('SITE')) }}/css/cache-custom.css" type="text/css"
          media="all"/>
    <link rel="stylesheet" id="custom-css" href="{{ asset(env('SITE')) }}/css/custom.css" type="text/css" media="all"/>

    <!-- FONTs -->
    <link rel="stylesheet" id="google-fonts-css"
          href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2"
          type="text/css" media="all"/>
    <link rel='stylesheet' href='{{ asset(env('SITE')) }}/css/font-awesome.css' type='text/css' media='all'/>
</head>
<body>
@yield('navigation')
@yield('content')
@yield('footer')
</body>
</html>
