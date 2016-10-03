<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{URL::to('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">



</head>
<body>
@include('includes.header')
<div class="container" id="main2">
    @yield('content')
</div>

<script src="src/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery.js"></script>
<script>window.jQuery || document.write('<script src="src/js/jquery-1.8.2.min.js"><\/script>')</script>
<script src="src/js/bootstrap.min.js"></script>
<script src="{{URL::to('src/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('src/js/script.js')}}"></script>
<script src="{{ URL::to('src/js/modernizr-2.6.2.min.js') }}"></script>
<script src="src/js/modernizr-2.6.2.min.js"></script>



</body>
</html>