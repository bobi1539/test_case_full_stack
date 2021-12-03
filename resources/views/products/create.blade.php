@extends('layouts.dashboard')

@section('container-dashboard')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Produk</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="/products" class="btn btn-sm btn-outline-secondary">
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <form action="/products" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Category" name="category_id" id="category_id">
                        <option value="choice">-Pilih-</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <input type="hidden" class="form-control" id="description" name="description">
                    <trix-editor input="description"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@endsection
