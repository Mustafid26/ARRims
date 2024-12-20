<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="css/custom.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-2">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                                <a class="nav-link" href="#">Profile</a>
                                <a class="nav-link" href="#">Setting</a>
                                <a class="nav-link" href="#">Cart</a>
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-9">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success gradient-btn-search" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        
    </nav>

    <!-- Banner -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <!-- Promo Section -->
    <div class="promo-section">
        <!-- Gambar Background -->
        <img src="{{ asset('img/banner.png') }}" alt="Promo" class="promo-img">

        <!-- Konten di Atas Gambar -->
        <div class="promo-text">
            <h6 class="mb-0">LIMITED TIME OFFER</h6>
            <h1 class="display-5 fw-bold mb-0">20% OFF</h1>
            <p class="mb-1">All Earrings And Necklace</p>
            <a href="#" class="btn-shop px-2 py-1 " style="text-decoration: none;">SHOP NOW</a>
        </div>
    </div>
    </div>

    <!-- Merk Section -->
    <div class="container my-4">
        <h4 class="fw-bold mb-3">Merk</h4>
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Tombol Scroll Kiri -->
                <div class="" id="scroll-left" style="position: absolute; left: 10px;   z-index: 10;">
                    <i class="bi bi-caret-left-fill" style="font-size: 2rem; background: linear-gradient(to left, #CD73F7, #2265DA); -webkit-background-clip: text; color: transparent;"></i>
                </div>
                
                <!-- Wrapper untuk scroll horizontal -->
                <div class="d-flex overflow-auto" style="white-space: nowrap;  position: relative; ">
                    <!-- Card 1 -->
                    <div class="border mx-1 d-flex align-items-center justify-content-center flex-shrink-0">
                        <img src="{{ asset('img/enkei.png') }}" alt="Emkei" class="img-fluid m-3">
                    </div>
                    <!-- Card 2 -->
                    <div class="border mx-1 d-flex align-items-center justify-content-center flex-shrink-0">
                        <img src="{{ asset('img/bbs.png') }}" alt="BBS" class="img-fluid m-3">
                    </div>
                    <!-- Card 3 -->
                    <div class="border mx-1 d-flex align-items-center justify-content-center flex-shrink-0">
                        <img src="{{ asset('img/rays.png') }}" alt="Rays" class="img-fluid m-3">
                    </div>
                    <!-- Card 4 -->
                    <div class="border mx-1 d-flex align-items-center justify-content-center flex-shrink-0">
                        <img src="{{ asset('img/hks.png') }}" alt="HKS" class="img-fluid m-3">
                    </div>
                    <!-- Card 5 -->
                    <div class="border mx-1 d-flex align-items-center justify-content-center flex-shrink-0">
                        <img src="{{ asset('img/oz.png') }}" alt="OZ" class="img-fluid m-3">
                    </div>
                </div>
                
                <!-- Tombol Scroll Kanan -->
                <div class="" id="scroll-right" style="position: absolute; right: 10px;   z-index: 10;">
                    <i class="bi bi-caret-right-fill" style="font-size: 2rem; background: linear-gradient(to right, #CD73F7, #2265DA); -webkit-background-clip: text; color: transparent;"></i>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Pilihan Section -->
    <div class="container my-4">
        <h4 class="fw-bold mb-3">Pilihan</h4>
        <div class="row g-4" style="margin-bottom: 25%;">
            <!-- Product Card -->
            <div class="col-6 col-md-3">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('img/velg-mobil.png') }}" class="card-img-top" alt="Product">
                    <div class="card-body text-center">
                        <p class="card-title mb-1 fw-bold text-start">Lorem ipsum dolor sit amet</p>
                        <p class="card-text text-muted mb-0 text-start ">Rp. 928.5</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('img/velg-mobil.png') }}" class="card-img-top" alt="Product">
                    <div class="card-body text-center">
                        <p class="card-title mb-1 fw-bold text-start">Lorem ipsum dolor sit amet</p>
                        <p class="card-text text-muted mb-0 text-start">Rp. 928.5</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('img/velg-mobil.png') }}" class="card-img-top" alt="Product">
                    <div class="card-body text-center">
                        <p class="card-title mb-1 fw-bold text-start">Lorem ipsum dolor sit amet</p>
                        <p class="card-text text-muted mb-0 text-start">Rp. 928.5</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('img/velg-mobil.png') }}" class="card-img-top" alt="Product">
                    <div class="card-body text-center">
                        <p class="card-title mb-1 fw-bold text-start">Lorem ipsum dolor sit amet</p>
                        <p class="card-text text-muted mb-0 text-start">Rp. 928.5</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('img/velg-mobil.png') }}" class="card-img-top" alt="Product">
                    <div class="card-body text-center">
                        <p class="card-title mb-1 fw-bold text-start">Lorem ipsum dolor sit amet</p>
                        <p class="card-text text-muted mb-0 text-start">Rp. 928.5</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Footer Navigation -->
    <nav class="navbar fixed-bottom bg-white  rounded-top-5" style="box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.2); margin: 0; padding: 0;">
        <div class="container d-flex justify-content-around rounded-top-5">
            <a href="#" class="text-decoration-none text-dark">
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
    <script>
         // Ambil elemen wrapper
    const wrapper = document.querySelector('.d-flex.overflow-auto');
    
    // Ambil tombol scroll kiri dan kanan
    const scrollLeftButton = document.getElementById('scroll-left');
    const scrollRightButton = document.getElementById('scroll-right');
    
    // Fungsi untuk scroll kiri
    scrollLeftButton.addEventListener('click', () => {
        wrapper.scrollBy({ left: -200, behavior: 'smooth' });
    });
    
    // Fungsi untuk scroll kanan
    scrollRightButton.addEventListener('click', () => {
        wrapper.scrollBy({ left: 200, behavior: 'smooth' });
    });
    </script>
</body>
</html>
