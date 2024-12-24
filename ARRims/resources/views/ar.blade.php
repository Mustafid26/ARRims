@extends('layouts.app')

@section('title', 'AR Detection - Wheel')

@section('content')
    <!-- Include A-Frame and AR.js -->
    <div class="container text-center mt-5">
        <!-- Header -->
        <h1 class="mb-4">AR Detection - Wheel</h1>

        <div class="arjs-loader">
            <div>Loading, please wait...</div>
        </div>
        <a-scene
            vr-mode-ui="enabled: false;"
            renderer="logarithmicDepthBuffer: true; precision: medium;"
            embedded
            arjs="trackingMethod: best; sourceType: webcam; debugUIEnabled: false;"
        >
            <!-- Marker-based AR (using a traditional marker) -->
            <a-marker type="pattern" url="{{ asset('marker/wheel.patt') }}">
                <a-entity
                    gltf-model="{{ asset('models/scene.gltf') }}"
                    scale="5 5 5"
                    position="150 300 -100"
                >
                </a-entity>
            </a-marker>

            <!-- Camera -->
            <a-entity camera></a-entity>
        </a-scene>
    </div>
@endsection
