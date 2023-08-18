<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!--SITE BASLIK-->
    <title>Todolarım</title>
    
    <!--DATATABLES CSS-->
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}"> 
    <!--W3 CSS-->
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}"> 
</head>
<body>
    <div class="w3-bar w3-black">
        @guest
            <a href="/login" class="w3-bar-item w3-button w3-mobile">Giriş Yap</a>
            <a href="/register" class="w3-bar-item w3-button w3-mobile">Kayıt Ol</a>
                
        @else
            <a href="/" class="w3-bar-item w3-button w3-mobile">Anasayfa</a>
            <a href="/todo-ekle" class="w3-bar-item w3-button w3-mobile">Todo Ekle</a>
            <a class="w3-bar-item w3-button w3-mobile" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Çıkış Yap
            </a> 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest  
      </div>

    @yield('content')
    <!--JQUERY JS-->
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <!--DATATABLES JS--> 
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script> new DataTable('#example'); </script>
    
</body>
</html>
 
