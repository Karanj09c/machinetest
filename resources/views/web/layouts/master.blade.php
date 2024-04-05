<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bouncy House</title>
</head>
<body>
    <!-- header code starts here  -->
    @include('web.layouts.header');

    <!-- middlecontent starts here -->
    @yield('content')

    <!-- footer code starts here -->
    @include('web.layouts.footer');
</body>
</html>