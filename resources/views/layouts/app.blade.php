<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="asset({{'css/app.css'}})" />
    <title>{{ config('app.name', 'Laravel') }}</title>

  
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-200">
@yield('content')
</body>
</html>
