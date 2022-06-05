<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
            <x-sidebar></x-sidebar>
            <div class="col-10 p-4 ps-2 content">
                <span class="fs-5 fw-bold">{{ Route::currentRouteName() }}</span>
                <div class="vr"></div>
                {{ Auth::user()->name }}
                <div class="float-end">
                    <div class="input-group gap-4">
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                            @csrf
                            <a href="#" onclick="document.getElementById('logoutForm').submit();" class="text-decoration-none link-danger">Logout</a>
                        </form>
                    </div>
                </div>
                <hr>
                @yield('content')
            </div>
    </div>
</body>
@yield('javascript')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</html>