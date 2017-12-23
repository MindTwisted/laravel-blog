<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="csrf-token"
        content="{{ csrf_token() }}">
  
  <title>{{ config('app.name', 'Laravel') }}</title>
  
  <!-- Styles -->
  <link href="{{ asset('css/home.css') }}"
        rel="stylesheet">
</head>
<body>
<div id="app">
  
  @if(session('status'))
    @component('home.components.notification.notification',
              ['messages' => session('status'),
               'className' => 'success'])
    @endcomponent
  @endif
  
  @if ($errors->any())
    @component('home.components.notification.notification',
              ['messages' => $errors->getMessages(),
               'className' => 'danger'])
    @endcomponent
  @endif
  
  @component('home.components.navbar.navbar')
  @endcomponent
  
  <div class="layout-master__main">
    <div class="layout-master__sidebar">
      @component('home.components.sidebar.sidebar')
      @endcomponent
    </div>
    
    <div class="layout-master__content">
      @yield('content')
    </div>
  </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
