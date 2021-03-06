<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/admin.js') }}" defer></script>
  {{--
  <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}

  <!-- Styles -->
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>

  <div id="admin"></div>

</body>

</html>