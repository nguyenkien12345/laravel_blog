<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LARAVEL SYSTEM EMAIL</title>
</head>

<body>
    <h1 style="text-align: center">LARAVEL SYSTEM EMAIL</h1>
    <h3>Name: {{ $user->name }}</h3>
    <h3>Phone: {{ $user->mobile }}</h3>
    <h3>Email: {{ $user->email }}</h3>
    <h3>Is Admin: {{ $user->is_admin ? 'ADMIN' : '' }}</h3>
    <h3>{{asset('image/images/Thuy'.$file.'.jpg')}}</h3>
    <img src="{{asset('image/images/Thuy'.$file.'.jpg')}}">
</body>

</html>
