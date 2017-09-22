<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

    <!-- link icon -->
    <link rel="shortcut icon" href="admin_asset/img/icon.ico" type="image/x-icon">
    <base href="{{asset('')}}" target="_parent">
    <!-- Css Bootstrap 4 beta -->
    <link rel="stylesheet" href="admin_asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_asset/css/style.css">
</head>
<body> 
    <div class="container">    
        <form class="form-signin border border-info bg-light"  method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h2 class="form-signin-heading text-center">Please sign in</h2>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email address" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me" {{ old('remember') ? 'checked' : '' }}> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
        </form>   
    </div> <!-- /container -->
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="admin_asset/js/bootstrap.min.js"></script>
</html>