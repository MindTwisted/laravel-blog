<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
  
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
  
  <!-- CSRF Token -->
  <meta name="csrf-token"
        content="{{ csrf_token() }}">
  
  <link rel="shortcut icon"
        href="/favicon.ico">
  
  <title>Expire | @yield('title')</title>
  
  <!-- Styles -->
  @if(env('APP_ENV') === 'production')
    <link href="{{ secure_asset('css/site.css') }}"
          rel="stylesheet">
  @else
    <link href="{{ asset('css/site.css') }}"
          rel="stylesheet">
  @endif

</head>
<body>
<div id="app">
  @component('site.components.notification.notification')
  @endcomponent
  
  @component('site.components.svgSprites.svgSprites')
  @endcomponent
  
  @yield('content')
</div>

@yield('scripts')

<!-- Scripts -->
@if(env('APP_ENV') === 'production')
  <script src="{{ secure_asset('js/site.js') }}"></script>
@else
  <script src="{{ asset('js/site.js') }}"></script>
@endif

</body>
</html>
