@extends('layouts.app')

@section('title', 'AR')

@section('content')

    <!-- Container -->
    <div class="container text-center mt-5">

        <!-- Main Image -->
        <div class="main-imageVideo mb-4">
            <video id="camera-stream" class="videoCamera img-fluid shadow rounded" autoplay   style="width: 100vw; height: 80vh; object-fit: cover;"></video>
            <button id="switch-camera" class="btn btn-secondary mt-2 mb-5">Ganti Kamera</button>
        </div>
        
        
        </div>



    <!-- Bootstrap JS Bundle -->
    
    <script>
        const video = document.getElementById('camera-stream');
const switchCameraBtn = document.getElementById('switch-camera');
let currentFacingMode = "user"; // Default: Kamera depan

async function openCamera(facingMode) {
    try {
        // Hentikan stream sebelumnya jika ada
        if (video.srcObject) {
            video.srcObject.getTracks().forEach(track => track.stop());
        }

        // Buka kamera dengan parameter facingMode
        const stream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: facingMode }
        });
        video.srcObject = stream;
    } catch (error) {
        alert('Tidak dapat membuka kamera: ' + error.message);
    }
}

// Tombol untuk mengganti kamera
switchCameraBtn.addEventListener('click', () => {
    currentFacingMode = currentFacingMode === "user" ? "environment" : "user";
    openCamera(currentFacingMode);
});

// Buka kamera saat halaman dimuat
openCamera(currentFacingMode);

    </script>

@endsection