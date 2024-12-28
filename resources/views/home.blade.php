@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Header -->
    @include('layouts.navbar')

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
                <div class="" id="scroll-left" style="position: absolute; left: 10px; z-index: 10;">
                    <i class="bi bi-caret-left-fill" style="font-size: 2rem; background: linear-gradient(to left, #CD73F7, #2265DA); -webkit-background-clip: text; color: transparent;"></i>
                </div>
                
                <!-- Wrapper untuk scroll horizontal -->
                <div class="d-flex overflow-auto" style="white-space: nowrap; position: relative;">
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
                <div class="" id="scroll-right" style="position: absolute; right: 10px; z-index: 10;">
                    <i class="bi bi-caret-right-fill" style="font-size: 2rem; background: linear-gradient(to right, #CD73F7, #2265DA); -webkit-background-clip: text; color: transparent;"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Pilihan Section -->
    <div class="container my-4">
        <h4 class="fw-bold mb-3">Pilihan</h4>
        <div class="row g-4" style="margin-bottom: 25%;">
            @foreach ($products as $product)
                <!-- Product Card -->
                <div class="col-6 col-md-3">
                    <a href="{{ route('ar.show', $product->id) }}">
                        <div class="card shadow-sm border-0">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <p class="card-title mb-1 fw-bold text-start">{{ $product->title }}</p>
                                <p class="card-text text-muted mb-0 text-start">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

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
@endsection
