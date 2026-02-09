@extends('Admin.layout.main')

@section('content')
<div class="container-fluid pt-4 px-4 min-vh-100">
    <div class="card shadow mb-4 bg-white">      
        <div class="card-header py-3 d-flex justify-content-between">
            <h2>Daftar Klien</h2>
            <a href="{{route('admin.clients.paket')}}" class="text-decoration-none text-danger">Back/Daftar Paket</a>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $client->nama }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->alamat }}</td>
                                        <td>
                                            show
                                        </td>
                                        <td>
                                            <span class="{{ 
                                                            $client->status === 'deal' 
                                                                ? 'text-success' 
                                                                : ($client->status === 'diproses' 
                                                                    ? 'text-warning' 
                                                                    : 'text-danger') }}
                                            ">{{ $client->status }}
                                            </span>
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