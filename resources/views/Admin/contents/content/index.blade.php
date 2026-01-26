@extends('Admin.layout.main')

@section('content')
<div class="container-fluid pt-4 px-4 min-vh-100">
    <div class="card shadow mb-4 bg-white">
        
        <div class="card-header py-3 d-flex justify-content-end">
            
            @include('Admin.contents.content.modal-create')
        </div>

        <div class="card-body">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded p-4">
                        <h2>Daftar Konten</h2>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 text-white">
                                <thead>
                                    <tr>
                                        <th>Tipe</th>
                                        <th>Judul</th>
                                        <th>Isi</th>  
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $content)
                                    <tr>
                                       
                                        <td>{{ $content->tipe }}</td>
                                        <td>{{ $content->judul }}</td>
                                        <td>{{ $content->isi }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    @include('Admin.contents.content.modal-edit', ['content' => $content])
                                                </div>
                                                <div class="ms-2">
                                                    <form action="{{ route('admin.contents.destroy', $content->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-secondary btn-icon-split">
                                                            <span class="icon text-primary-50">
                                                                <i class="fas fa-trash text-primary"></i>
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