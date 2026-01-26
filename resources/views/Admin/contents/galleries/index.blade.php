@extends('Admin.layout.main')

@section('content')
<div class="container-fluid pt-4 px-4 min-vh-100">
    <div class="card shadow mb-4 bg-white">
        
        <div class="card-header py-3 d-flex justify-content-end">  
            @include('Admin.contents.galleries.modal-create')
        </div>

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
                            <!-- PERULANGAN DISINI -->
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class=" flex-shrink-0" src="{{asset('darkpan-1.0.0')}}/img/user.jpg" alt="" style="width: 130px; height: 130px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <!-- <h6 class="mb-0">Nama Foto</h6> -->
                                         <span>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum aspernatur sint sequi dicta vitae, placeat tenetur incidunt reiciendis hic soluta! Pariatur quam sint ipsa corrupti quod vero cumque reiciendis. Enim.
                                        </span>
                                    </div>  
                                    <div class="d-flex">
                                        <div>
                                            <button type="button" class="btn btn-secondary btn-icon-split mt-2" data-toggle="modal" data-target="#editVendorModal">
                                                <span class="icon text-white">
                                                    <i class="far fa-edit text-warning"></i>
                                                </span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-secondary btn-icon-split mt-2">
                                            <span class="icon text-primary-50">
                                                <i class="fas fa-trash text-primary"></i>
                                            </span>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection