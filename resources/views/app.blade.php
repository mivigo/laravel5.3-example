<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Document </title>
    {{--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">--}}
    {{--<link rel="stylesheet" href="css/sweetalert2.min.css">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"/>--}}
    <link rel="stylesheet" href="/css/all.css"/>
    </head>
{{--@if(session()->has('message.level'))--}}
    {{--<div class="alert alert-{{ session('message.level') }}">--}}
        {{--{!! session('message.content') !!}--}}
    {{--</div>--}}
{{--@endif--}}

{{--<script type="application/javascript">--}}
    {{--/** After windod Load */--}}
    {{--$(window).bind("load", function() {--}}
        {{--window.setTimeout(function() {--}}
            {{--$(".alert").fadeTo(500, 0).slideUp(500, function(){--}}
                {{--$(this).remove();--}}
            {{--});--}}
        {{--}, 4000);--}}
    {{--});--}}
{{--</script>--}}

<body>
    @include ('partials.nav')

    <div class="container">
        {{--@include('partials.flash')--}}
        @include('flash::message')
        {{--<script src ="js/sweetalert2.min.js"></script>--}}
        @yield('content')
    </div>

    <script src ="/js/output.js"></script>
    {{--<script src="//code.jquery.com/jquery.js" ></script>--}}
    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>--}}

    <script>
            $('#flash-overlay-modal').modal();
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>

        @yield('footer')

</body>
</html>