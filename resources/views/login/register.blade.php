
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
   <link href="{{url('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="">
        <main class="form-signin card shadow" style=" padding: 20px">
          <form method="POST" action="{{route('daftar')}}">
            @method('POST')
            @csrf
            <h1 style="font-weight: bold" class="text-center">Toko Kartini</h1>
            <h1 class="text-center">Register</h1>
            <label for="inputName" class="visually-hidden">Name</label>
            <input type="text" name="name" id="inputName" class="form-control mb-3"  value="{{old('name')}}" placeholder="Name" required autofocus>

            <label for="inputEmail" class="visually-hidden">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control mb-3 {{$errors->has('email')? 'is-invalid':''}}" value="{{old('email')}}" placeholder="Email address" required autofocus>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                  {{$errors->first('email')}}
                </div>
            @endif
            
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required>
            
            <label for="inputPassword" class="visually-hidden">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="inputPassword" class="form-control mb-3" placeholder="Password" required>
            <button class="w-100 btn btn-lg btn-primary " type="submit">Register</button> 
            <center><a href="{{route('users.index')}}"  style="text-decoration: none;" >Back</a></center>
            
          </form>
        </main>




    
  </body>
</html>