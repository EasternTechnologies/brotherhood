<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}

  <!-- Styles -->
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body class="admin">
  <header class="page-header">
    @yield('header')
  </header>

  <div class="page-content">
    <aside class="page-aside">
      @yield('aside')
    </aside>
    <main class="page-main">
      @yield('content')
    </main>
  </div>

  <footer class="page-footer">
    @yield('footer')
  </footer>

</body>

</html>