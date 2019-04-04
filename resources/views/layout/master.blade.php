<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>      
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@if(!empty($title)){{ $title }}@else Idan Admin Panel @endif</title>
        <link rel="icon" href="{{asset('images/logo.png')}}"/>        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <!-- toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

        <link rel="stylesheet" href="{{ asset('css/admin-cp.css') }}"/>        
    </head>
    <body style="padding-top: 100px;padding-bottom: 50px;background: whitesmoke">
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-info" dir="rtl">
            @include('inc.mainNav')
        </nav>
        @yield('content')
        <footer>            
            @include('inc.footerContent')
        </footer>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        @if(Session::has('sm'))
        <script>
toastr.options.positionClass = 'toast-top-center';
toastr.options.progressBar = true;
toastr.options.closeButton = true;
toastr.success("{{ Session::get('sm') }}");

        </script>
        @endif
        @yield('js')
    </body>
</html>