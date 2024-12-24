@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Dashboard Admin</h1>

    <!-- Informasi Umum Dashboard -->
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Produk</h5>
                    <p class="card-text">{{ $totalProducts }} Produk</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text">{{ $totalUsers }} Pengguna</p>
                </div>
            </div>
        </div>

        
    </div>

    <!-- Daftar Produk -->
    <div class="mt-5">
        <h3>Daftar Produk</h3>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Model 3D</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->title }}</td>
                        <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td><img src="{{ asset('storage/' . $product->image) }}" width="100" alt="Product Image"></td>
                        <td><a href="{{ asset('storage/' . $product->model) }}" target="_blank" class="btn btn-info btn-sm">Lihat Model</a></td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Apakah Anda yakin ingin menghapus produk ini?')) { this.closest('form').submit(); }">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
