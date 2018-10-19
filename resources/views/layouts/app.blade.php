<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/custom.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Madena</title>
</head>
<body>
    
    @include('inc.navbar')
    @if(count($errors) > 0)
    <div class="container mt-5">
    
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
        </div>
    @endif
    
    @if(session('failed'))
    <div class="container mt-5">
        <div class="alert alert-danger">
            {{session('failed')}}
        </div>
    </div>
    @endif
    
    @if(!Auth::check())
        @include('inc.LoginSignupModals')
    @endif
    @include('inc.AddstoreModal')
    @yield('content')
    @include('inc.footer')
    <script src="/js/app.js"></script>
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5bc0cb74ddd60400116045cf&product=inline-share-buttons' async='async'></script>
    <script src="/js/slick.js"></script>
    <script src="/js/custom.js"></script>

</body>
</html>