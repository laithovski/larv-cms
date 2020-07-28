<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ config('app.name', 'CSS') }}</title>

      <!-- Ajax POST CALL XCSS Removal -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Laravel Assets -->
  
      <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  
       <!-- Main JS File -->
      <script src="{{ asset('js/app.js') }}"></script> 
      
      <!-- Setup Headers -->
      <script>
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('inc.navbar')
        @include('inc.messages')
         @include('inc.modal')
        <div class="container-fluid">
            <div class="row">
                @yield('main-row')
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    
    </div>
</body>
</html>
