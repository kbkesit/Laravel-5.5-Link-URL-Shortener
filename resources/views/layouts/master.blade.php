<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('css/bulma.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">
</head>
<body>

@include('includes.top-navbar')

<section class="section">
    <div class="container">
        @yield('main-content')
    </div>
</section>

@include('includes.footer')

<script>
    var shorten_link = '{{  Session::has('shorten_link') ? Session::get('shorten_link') : '' }}';
    if(shorten_link != '')
    {
        document.getElementById('result').style.display = 'block';
        document.getElementById('shorten_link_result').innerHTML = '<a href="{{ URL::to('/') }}/'+ shorten_link +'">' + '{{ URL::to('/') }}/' + shorten_link + '</a>';
    }
</script>

</body>
</html>