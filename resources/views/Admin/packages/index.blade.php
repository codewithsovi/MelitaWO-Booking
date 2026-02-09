@extends('Admin.layout.main')

@section('content')
<div class="container-fluid pt-4 px-4 min-vh-100">
    <div class="card shadow mb-4 bg-white">
        
        <div class="card-header py-3 d-flex justify-content-between">
            <h2>Daftar Paket</h2>
            @include('Admin.packages.modal-create')
        </div>

        <div class="card-body">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-white rounded p-4">
                        
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 text-white">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Paket</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $package->jenis }}</td>
                                        <td>{{ $package->deskripsi }}</td>
                                        <td> Rp.{{ $package->harga }}</td>
                                        <td>
                                            <span class="fw-bold 
                                                {{ $package->status === 'aktif' ? 'text-success' : 'text-danger' }}">
                                                {{ $package->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    @include('Admin.packages.modal-edit', ['package' => $package])
                                                </div>
                                                <div class="ms-2">
                                                    <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST"
                                                     onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-icon-split">
                                                            <span class="icon text-primary-50">
                                                                <i class="fas fa-trash text-danger"></i>
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection