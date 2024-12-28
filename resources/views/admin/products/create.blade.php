@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create New Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Product Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="model_type">Model Type</label>
                <select name="model_type" id="model_type" class="form-control" required>
                    <option value="">Select Model Type</option>
                    <option value="glb">GLB</option>
                    <option value="gltf">GLTF</option>
                </select>
            </div>

            <!-- GLB Model Upload -->
            <div class="form-group model-glb d-none">
                <label for="model_glb">Upload GLB File</label>
                <input type="file" name="model_glb" id="model_glb" class="form-control">
            </div>

            <!-- GLTF Model Upload -->
            <div class="form-group model-gltf d-none">
                <label for="scene_gltf">Upload GLTF File</label>
                <input type="file" name="scene_gltf" id="scene_gltf" class="form-control">
            </div>
            <div class="form-group model-gltf d-none">
                <label for="scene_bin">Upload BIN File</label>
                <input type="file" name="scene_bin" id="scene_bin" class="form-control">
            </div>
            <div class="form-group model-gltf d-none">
                <label for="textures">Upload Textures</label>
                <input type="file" name="textures[]" id="textures" class="form-control" multiple>
                <small class="form-text text-muted">You can select multiple texture files.</small>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script>
        document.getElementById('model_type').addEventListener('change', function() {
            const selectedType = this.value;
            document.querySelectorAll('.model-glb').forEach(el => el.classList.add('d-none'));
            document.querySelectorAll('.model-gltf').forEach(el => el.classList.add('d-none'));
            
            if (selectedType === 'glb') {
                document.querySelectorAll('.model-glb').forEach(el => el.classList.remove('d-none'));
            } else if (selectedType === 'gltf') {
                document.querySelectorAll('.model-gltf').forEach(el => el.classList.remove('d-none'));
            }
        });
    </script>
@endsection

