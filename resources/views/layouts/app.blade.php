<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <title>Web archive</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark text-white">
    <section class="container">
        <div>
            <a href="{{route('home')}}" class="navbar-brand">WEB ARCHIVE</a>
            @if(Route::currentRouteName() == 'home')
            <a href="{{route('wardobecreate')}}" class="text-white">Добавить шкаф <i class="fas fa-plus"></i></a>
            @endif
        </div>
        <form class="form-inline" method="get" action="{{route('search')}}">
            <input class="form-control mr-sm-2" type="search" name="text" placeholder="Поиск" aria-label="Search" required>
            <button class="btn btn btn-outline-light my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </section>
</nav>
<hr class="my-3">
<section class="container">
    @yield('content')
</section>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('main.js')}}"></script>
</body>
</html>