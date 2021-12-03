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
                                        <img width="100" class="img-thumbnail" src="{{ asset('storage/' . $product->image) }}" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal"
                                            onclick="handleEditButton({{ $product->id }})">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal"
                                            onclick="handleEditButton({{ $product->id }})">
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

@endsection
