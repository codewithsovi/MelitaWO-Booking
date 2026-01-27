@extends('Admin.layout.main')

@section('content')
<div class="container-fluid pt-4 px-4 min-vh-100 bg-netral">
    <div class="card shadow mb-4 bg-netral">
        
        <div class="card-header py-3 d-flex justify-content-end">
            @include('Admin.contents.FAQ.modal-create')
        </div>

        <div class="card-body">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-secondary rounded p-4">
                        <h2>Daftar FAQ</h2>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 text-white">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>  
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faq->pertanyaan }}</td>
                                        <td>{{ $faq->jawaban }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    @include('Admin.contents.FAQ.modal-edit', ['faq' => $faq])
                                                </div>
                                                <div class="ms-2">
                                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?');">
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