@extends('Admin.layout.main')

@section('content')
<div class="container-fluid pt-4 px-4 min-vh-100">
    <div class="card shadow mb-4 bg-white">

        <div class="card-header py-3 d-flex justify-content-end">
        </div>
        <!-- konten -->
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-white rounded p-4">
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

        <!-- gambar -->
        @error('foto')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="card-body ">
            <div class="row g-4">
                <div class="col-12">
                    <!-- Widgets Start -->
                    <div class="container-fluid pt-4 px-4 ">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div class="h-100 bg-secondary rounded p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h4 class="mb-0">Daftar Foto</h4>
                                    </div>
                                    
                                    @foreach($galleries as $gallery)
                                    <div class="d-flex align-items-center border-bottom py-3">
                                        <img class=" flex-shrink-0" src="{{ asset('storage/' . $gallery->foto) }}"
                                            alt="" style="width: 130px; height: 130px;">
                                        <div class="w-100 ms-3">
                                            <div class="d-flex w-100 justify-content-between">
                                                <!-- <h6 class="mb-0">Nama Foto</h6> -->
                                                <span>
                                                    {{ $gallery->deskripsi ?? 'Tidak ada deskripsi' }}
                                                </span>
                                            </div>
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    @include('Admin.contents.galleries.modal-edit', ['gallery' => $gallery])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Widgets End -->
                </div>
            </div>
        </div>
        <!-- faq -->
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
                                                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-secondary btn-icon-split">
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
</div>
@endsection