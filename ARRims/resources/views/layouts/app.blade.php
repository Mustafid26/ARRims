<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Main Menu')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="css/custom.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @yield('content')

    <!-- Footer Navigation -->
    <nav class="navbar fixed-bottom bg-white  rounded-top-5" style="box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.2); margin: 0; padding: 0;">
        <div class="container d-flex justify-content-around rounded-top-5">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">
                <div class="text-center">
                    <img src="{{ asset('img/home.png') }}" alt="Home" style="width: 30px;">
                    <p class="small m-0">Home</p>
                </div>
            </a>
            <a href="#" class="text-decoration-none">
                <div class="text-center">
                    <img src="{{ asset('img/wheel.png') }}" alt="Wheels" style="transform: translateY(-50%);" width="70px"  >
                </div>
            </a>
            <a href="#" class="text-decoration-none text-dark">
                <div class="text-center">
                    <img src="{{ asset('img/profile.png') }}" alt="Profile" style="width: 30px;">
                    <p class="small m-0">Profile</p>
                </div>
            </a>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
