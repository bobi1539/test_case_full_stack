@extends('layouts.dashboard')

@section('container-dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori Produk</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
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
                                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal">
                                            edit
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="/categories/delete" class="btn btn-sm btn-danger">
                                            hapus
                                        </a>
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

    <!-- Modal Tambah Data-->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/categories" method="POST" id="form-update-group">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        {{-- <div class="mb-3">
                            <label for="job_class" class="form-label">Golongan</label>
                            <input name="job_class" type="text" class="form-control" id="job_class_update"
                                value="{{ old('job_class') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="basic_salary" class="form-label">Gaji Pokok</label>
                            <input name="basic_salary" type="text" class="form-control" id="basic_salary_update"
                                value="{{ old('basic_salary') }}" required>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
