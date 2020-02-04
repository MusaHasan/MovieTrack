<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>
<body>
    @section('sidebar')
    <div class="sidenav">
        <a href="/user/home">home</a>
        <a href="/user/profileid">Profile</a>
        <a href="/user/wishlist">Wishlist</a>
        <a href="/user/reviews">Your Reviews</a>
        {{-- <a href="/user/manage">Manage Your Reviews</a> --}}
        <a href="/user/manage">Browse By </a>
    </div>
    
    @endsection
</body>
</html>