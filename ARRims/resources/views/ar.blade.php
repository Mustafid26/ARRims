<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velg Showcase</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <style>
        


    </style>
</head>
<body>

    <!-- Container -->
    <div class="container text-center mt-5">

        <!-- Main Image -->
        <div class="main-imageVideo mb-4">
            <video id="camera-stream" class="videoCamera img-fluid shadow rounded" autoplay   style="width: 100vw; height: 80vh; object-fit: cover;"></video>
            <button id="switch-camera" class="btn btn-secondary mt-2 mb-5">Ganti Kamera</button>
        </div>
        
        
        </div>


        <!-- Footer Icon -->
        <nav class="navbar fixed-bottom bg-white  rounded-top-5" style="box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.2); margin: 0; padding: 0; margin-top: 50px;">
            <div class="container d-flex justify-content-around rounded-top-5">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="text-center">
                        <img src="img/home.png" alt="Home" style="width: 30px;">
                        <p class="small m-0">Home</p>
                    </div>
                </a>
                
                <a href="#" class="text-decoration-none text-dark">
                    <div class="text-center">
                        <img src="img/profile.png" alt="Profile" style="width: 30px;">
                        <p class="small m-0">Profile</p>
                    </div>
                </a>
            </div>
        </nav>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
