<!DOCTYPE html>
<html lang= "en">
    <title></title>
     <head>
            <meta charset = "UTF-8">
            <title>@yield('title')</title>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <link rel="stylesheet" href="{{URL::asset('src/css/main.css')}}" type="text/css" />
             
              <!-- 最新編譯和最佳化的 CSS -->
            <link rel="stylesheet" href="{{URL::asset('src/css/bootstrap.min.css')}}">

                <!-- 選擇性佈景主題 -->
            <link rel="stylesheet" href="{{URL::asset('src/css/bootstrap-theme.css')}}">

                <!-- 最新編譯和最佳化的 JavaScript -->
            <script src="{{URL::asset('src/css/bootstrap.min.js')}}"></script>
            
           
             @yield('styles')
            </style>
    </head>
   
    <body>
       
        @include('includes.header')
        <p></p>
        <p></p>
        <div class="main">
            @yield('content')
        </div>
         
         @yield('scripts')
        
    </body>
</html>