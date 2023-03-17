<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cities</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
</head>
<body>
<div id="preloader" class="visually-hidden position-absolute w-100 h-100 bg-black bg-opacity-75 d-flex
 justify-content-center align-items-center left-0 top-0">
    <div class="spinner-border" role="status"></div>
</div>
<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                <use xlink:href="#bootstrap"></use>
            </svg>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>
            <li><a href="{{ route('city.index') }}" class="nav-link px-2 link-dark">Города</a></li>
            @if(auth()->user())
                <li>
                    <a href="{{ route('user.reviews.index', auth()->user()->id) }}" class="nav-link px-2 link-dark">
                        Мои отзывы
                    </a>
                </li>
            @endif
        </ul>
        @guest()
            <div class="col-md-3 text-end">
                <a href="{{ route('login') }}">
                    <button type="button" class="btn btn-outline-primary me-2">Войти</button>
                </a>
                <a href="{{ route('register') }}">
                    <button type="button" class="btn btn-primary">Регистрация</button>
                </a>
            </div>
        @endguest
        @auth()
            <div class="col-md-3 text-end">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Выйти</button>
                </form>
            </div>
        @endauth
    </header>
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        $('.select2').select2()
    })
</script>
<script src="{{ asset('assets/js/preloader.js') }}"></script>
</body>
</html>
