@extends('layouts.dashboard')

@section('container-dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori Produk</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="#" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                    data-bs-target="#createCategoryModal">
                    Tambah Kategori
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
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
                            <th>Nama Kategori</th>
                            <th colspan="2" class="text-center">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <th class="text-center">{{ $categories->firstItem() + $key }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal"
                                            onclick="handleEditButton({{ $category->id }})">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <form action="/categories/{{ $category->id }}" method="POST" class="d-inline">
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
                {{ $categories->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Edit Kategori-->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/categories" method="POST" id="form-update-category">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input name="name" type="text" class="form-control" id="name_update"
                                value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kategori-->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/categories" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const nameUpdate = document.getElementById('name_update');
        const formUpdateCategory = document.getElementById('form-update-category');

        function handleEditButton(id) {
            fetch('/categories/' + id + '/edit')
                .then(response => response.json())
                .then(data => {
                    nameUpdate.value = data.category.name
                });

            // mengganti action form update
            formUpdateCategory.action = "/categories/" + id;
        }
    </script>
@endsection
