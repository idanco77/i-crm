<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- favicon -->
        <link rel="icon" href="{{asset('images/logo.png')}}"/>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/sign-in/signin.css"/>

        <!-- toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

        <!-- custom css -->
        <link rel="stylesheet" href="{{ asset('css/admin-cp.css') }}"/>
        <title>{{ $title }}</title>

    </head>
    <body class="text-center">

        <form action="" method="POST" class="form-signin" novalidate="novalidate">
            @csrf
            <img class="mb-2" src="{{asset('images/logo.png')}}" alt="logo" width="72">
            <h1 class="h3 font-weight-normal">I-CRM</h1>
            <p class="h5 font-weight-normal">Please sign in</p>
            <label for="inputUserName" class="sr-only">User name</label>
            <input type="text" name="userName" id="inputUserName" class="form-control" value="{{ old('userName') }}" placeholder="User name" required autofocus>
            <span class="text-danger">{{ $errors->first('userName') }}</span>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <span class="text-danger">{{ $errors->first('password') }}</span>
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" name="submit">Sign in</button>
            <span class="text-danger">{{ $errors->first('wrong_login') }}</span>
            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
        </form>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        @if(Session::has('sm'))
        <script>
toastr.options.positionClass = 'toast-top-center';
toastr.options.progressBar = true;
toastr.warning("{{ Session::get('sm') }}");

        </script>
        @endif
        <!-- custom script -->
        <script src="{{ asset('js/admin-cp.js') }}"></script>
    </body>
</html>