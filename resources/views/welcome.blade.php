<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Best Book</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@700&family=Open+Sans:ital,wght@0,400;0,500;1,300&family=Raleway:wght@100;700&family=Roboto:wght@100;300;400;500&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <div class="order-section">
        <div class="image-container">
            <img src="{{asset('storage/images/my-best-book.jpeg')}}" alt="background-image">
        </div>
        <div class="order-form">
            <div class="logo-container">
                <img class="logo" src="{{asset('storage/images/logo.png')}}" alt="logo">
            </div>
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
