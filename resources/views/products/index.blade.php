@extends('layouts.dashboard')

@section('container-dashboard')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Produk</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="/products/create" class="btn btn-sm btn-outline-secondary">
                    Tambah Produk
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('messageSuccess'))
                <div id="flash-data-success" data-flashdata="{{ session('messageSuccess') }}"></div>
            @endif
            @error('name')
                <div id="flash-data-error" data-flashdata="{{ $message }}"></div>
            @enderror
            <div class="table">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th class="text-center">No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Image</th>
                            <th colspan="3" class="text-center">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <th class="text-center">{{ $products->firstItem() + $key }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{!! $product->description !!}</td>
                                    <td class="text-right">{{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>
                                        <img width="100" class="img-thumbnail"
                                            src="{{ asset('storage/' . $product->image) }}" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#detailProductModal"
                                            onclick="handleDetailButton({{ $product->id }})">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="/products/{{ $product->id }}/edit"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <form action="/products/{{ $product->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Yakin data ingin dihapus?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="my-3 d-flex justify-content-end">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <!-- Modal detail Product-->
    <div class="modal fade" id="detailProductModal" tabindex="-1" aria-labelledby="detailProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailProductModalLabel">Detail Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Nama Produk</td>
                                <td>:</td>
                                <td id="detailProductName"></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td id="detailCategoryName"></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td id="detailProductDescription"></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td id="detailProductPrice"></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td>:</td>
                                <td>
                                    <img id="detailProductImage" width="100" class="img-thumbnail">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        const detailProductName = document.getElementById('detailProductName');
        const detailCategoryName = document.getElementById('detailCategoryName');
        const detailProductDescription = document.getElementById('detailProductDescription');
        const detailProductPrice = document.getElementById('detailProductPrice');
        const detailProductImage = document.getElementById('detailProductImage');

        function handleDetailButton(id) {
            fetch('/products/' + id)
                .then(response => response.json())
                .then(data => {
                    detailProductName.innerHTML = data.product.name,
                        detailCategoryName.innerHTML = data.product.category.name,
                        detailProductDescription.innerHTML = data.product.description,
                        detailProductPrice.innerHTML = data.product.price,
                        detailProductImage.src = "storage/" + data.product.image
                });
        }
    </script>
@endsection
