@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Edit Product</h1>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <small>Current: <img src="{{ asset('storage/' . $product->image) }}" width="50"></small>
        </div>
        <div class="form-group">
            <label>3D Model (GLB/GLTF)</label>
            <input type="file" name="model" class="form-control">
            <small>Current: {{ $product->model }}</small>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
