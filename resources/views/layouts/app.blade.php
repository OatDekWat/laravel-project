<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LandLadDa') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        nav {
            
            height: 65px; /* ปรับความสูงของ navbar */
            
        }
    
        img {
            height: 80px; /* ให้โลโก้มีความสูงเต็มที่ของ navbar */
            width: auto; /* ให้กว้างอัตโนมัติตามสัดส่วน */
        
        }
        .navbar-toggler{
            margin-top: -21px;
        }
    </style>

</head>
<body>

    <div id="app">
        <nav class="navbar navbar-dark bg-dark fixed-top  ">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('home') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" width="10"  class="d-inline-block align-text-top" style="margin: 0; padding: 0;  margin-top: -21px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" ></span>
                </button>
                
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">เพิ่มเติม</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <!-- ใส่ลิงค์ที่คุณต้องการ -->
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('home') }}">Back To Home</a>
                            </li>
                            @if(Auth::check() && Auth::user()->email === 'admin@example.com')
                            <!-- แสดงเมนู More เฉพาะ Admin ที่มีอีเมล admin@example.com เท่านั้น -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    More
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="{{ route('posts.index') }}">Add Post</a></li>
                                    <hr class="dropdown-divider">
                              
                                    {{-- <li>
                                        
                                        <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Edit Data</a>
                                    </li> --}}
                                    {{-- <hr class="dropdown-divider"> --}}
                                    {{-- <li><a class="dropdown-item" href="#">Edit Data User</a></li>
                                    <li> --}}
                                        {{-- <hr class="dropdown-divider"> --}}
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('members.index') }}">View Data Members</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    {{-- <li><a class="dropdown-item" href="#">ดูข้อมูล</a></li> --}}
                                    
                                </ul>
                            </li>

                            @endif

                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                @yield('login_p')
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
                        
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                        
                                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                            {{-- <form class="d-flex mt-3" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-success" type="submit">Search</button>
                            </form>
                        </ul>
                        <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form> --}}
                    </div>
                </div>
            </div>
            
        </nav>
        

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <style>
        body {
            padding-top: 56px; /* ปรับให้เข้ากับความสูงของ navbar */
        }
    </style>
</body>
</html>
