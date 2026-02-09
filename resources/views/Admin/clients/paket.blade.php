@extends('Admin.layout.main')

@section('content')
<div class="container-fluid pt-4 px-4 min-vh-100">
    <div class="card shadow mb-4 bg-white">      
        <div class="card-header py-3 d-flex justify-content-between">
            <h2>Daftar Paket</h2>
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
                                        <th>Paket</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $package->jenis }}</td>
                                        <td>
                                        <div class="d-flex">
                                            {{-- button show --}}
                                            <a href="{{ route('admin.clients.daftar', $package->id) }}" class="btn btn-icon-split me-2">
                                                <span class="icon text-primary-50">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </a>
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