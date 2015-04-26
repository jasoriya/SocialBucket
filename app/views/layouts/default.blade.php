<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SocialBucket</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />

</head>
<body>

@include('layouts.partials.nav')

<div class="container">
    @include('flash::message')

    @yield('content')
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
    $('#flash-overlay-modal').modal();

    $('.comments__create-form').on('keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            $(this).submit();
        }
    });

</script>
<!--<script>$('#flash-message-thing').delay(5000).fadeOut(300);</script>-->
</body>
</html>

