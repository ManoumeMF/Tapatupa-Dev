@extends('layouts.admin.template')
@section('content')

<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">Perioditas</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pengatusan & Konfigurasi</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Penyewaan Aset</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Perioditas</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xl-12">
    @if (isset($JangkaWaktuType))
        <form action="{{ route('JenisJangkaWaktu.update', $JangkaWaktuType->idJenisJangkaWaktu) }}" method="post" class="row g-3 needs-validation" novalidate>
        {{ csrf_field() }}    
        <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Ubah Perioditas
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Perioditas</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Masukkan Perioditas" name="jenisJangkaWaktu" value="{{ $JangkaWaktuType->jenisJangkaWaktu }}" required>
                        <div class="invalid-feedback">
                        Perioditas Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="validationTextarea" placeholder="Masukkan Keterangan" rows="4" name="keterangan">{{ $JangkaWaktuType->keterangan }}</textarea>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-danger m-1" type="reset">Batal<i class="bi bi-x-square ms-2 align-middle d-inline-block"></i></button>
                    <button class="btn btn-primary m-1" type="submit">Simpan <i class="bi bi-floppy ms-2 ms-1 align-middle d-inline-block"></i></button>
                </div>
        </form>
        @endif
    </div>
</div>
</div>
@endsection
