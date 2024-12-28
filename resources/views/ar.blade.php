@extends('layouts.app')

@section('title', 'AR Detection - Wheel')

@section('content')
<script>
    AFRAME.registerComponent('dynamic-model-loader', {
        schema: {
        src: {type: 'string'},  
        scale: {type: 'string', default: '1 1 1'}, 
        position: {type: 'string', default: '0 0 0'}, 
        rotation: {type: 'string', default: '0 0 0'} 
        },
        init: function () {
        const el = this.el;
        const data = this.data;

        el.setAttribute('gltf-model', data.src);
        el.setAttribute('scale', data.scale);
        el.setAttribute('position', data.position);
        el.setAttribute('rotation', data.rotation);

        el.addEventListener('model-loaded', function () {
            console.log('Model loaded successfully:', data.src);
        });

        el.addEventListener('model-error', function (error) {
            console.error('Failed to load model:', data.src, error);
        });
        }
  });
</script>
<style>
    body {
        overflow: hidden;
        margin: 0;
    }
</style>
<div class="container text-center mt-5">
    <!-- Header -->
    <h1 class="mb-4">AR Rims</h1>
    <!-- Kontainer untuk video -->
    <a-scene renderer="highRefreshRate: true;">
        <!-- Preload assets -->
        <a-assets>
            @if($product->model_glb)
                <a-asset-item id="modelGLB" src="{{ asset('storage/' . $product->model_glb) }}"></a-asset-item>
            @elseif($product->scene_gltf)
                <a-asset-item id="modelGLTF" src="{{ asset('storage/' . $product->scene_gltf) }}"></a-asset-item>
            @endif
        </a-assets>
        <!-- Marker-based AR (using Hiro marker) -->
        <a-marker preset="hiro">
            @if($product->model_glb)
                <a-entity 
                    dynamic-model-loader="src: #modelGLB; scale: 1 1 1; position: 0 0 -1.5; rotation: 0 0 100;"
                    id="wheel"
                ></a-entity>
            @elseif($product->scene_gltf)
                <a-entity 
                    dynamic-model-loader="src: #modelGLTF; scale: 1 1 1; position: 0 0 0; rotation: 281 0 0;"
                    id="wheel"
                ></a-entity>
            @endif
        </a-marker>
    </a-scene>
</div>
<script>
    // Fungsi untuk memulai deteksi objek menggunakan kamera A-Frame
    function startObjectDetection(cameraElement) {
        // Ambil stream video dari kamera A-Frame
        const videoElement = cameraElement.querySelector('video');
        // Pastikan video tersedia sebelum melanjutkan
        if (!videoElement) {
            console.error('Video element not found in the camera');
            return;
        }
        // Memulai deteksi objek
        cocoSsd.load().then(model => {
            setInterval(() => {
                model.detect(videoElement).then(predictions => {
                    predictions.forEach(prediction => {
                        if (prediction.class === "wheel") {
                            console.log('Wheel detected!');
                            // Menampilkan model AR ketika roda terdeteksi
                            document.getElementById('wheel').setAttribute('visible', 'true');
                        } else {
                            // Menyembunyikan model AR jika roda tidak terdeteksi
                            document.getElementById('wheel').setAttribute('visible', 'false');
                        }
                    });
                });
            }, 100); // Deteksi setiap 100ms
        });
    }

    // Menyiapkan kamera A-Frame dan memulai deteksi objek setelah scene dimuat
    window.onload = async () => {
        const scene = document.querySelector('a-scene');
        
        // Pastikan scene ada
        if (scene) {
            const cameraElement = scene.querySelector('a-camera');
            
            // Pastikan elemen kamera ada
            if (cameraElement) {
                // Mulai deteksi objek setelah video dimuat
                cameraElement.addEventListener('loadeddata', () => {
                    startObjectDetection(cameraElement);
                });
            } else {
                console.error('No camera element found in the scene');
            }
        } else {
            console.error('No a-scene element found');
        }
    };
</script>

@endsection
