@extends('layouts.admin.template')
@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        /* single select with placeholder */
        $(".js-example-placeholder-single").select2({
            placeholder: "Pilih Jenis Kegiatan...",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });
    });

</script>

<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">Peruntukan Sewa</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pengatusan & Konfigurasi</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Penyewaan Aset</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Peruntukan Sewa</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xl-12">
        <form class="row g-3 needs-validation" action="{{route('PeruntukanSewa.store')}}" method="post" novalidate>
            {{ csrf_field() }}
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Tambah Peruntukan Sewa
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Jenis Kegiatan</label>
                        <select class="js-example-placeholder-single form-control" name="jenisKegiatan" required>
                            <option></option>
                            @foreach ($peruntukanSewaCombo as $sT)
                                <option value="{{ $sT->idjenisKegiatan }}">{{ $sT->jenisKegiatan }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Jenis Kegiatan Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Peruntukan Sewa</label>
                        <input type="text" class="form-control" id="validationCustom01" name="peruntukanSewa"
                            placeholder="Masukkan Peruntukan Sewa" required>
                        <div class="invalid-feedback">
                            Peruntukan Sewa Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="validationTextarea" name="keterangan"
                            placeholder="Masukkan Keterangan" rows="4"></textarea>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-danger m-1" type="reset">Batal<i
                            class="bi bi-x-square ms-2 align-middle d-inline-block"></i></button>
                    <button class="btn btn-primary m-1" type="submit">Simpan <i
                            class="bi bi-floppy ms-2 ms-1 align-middle d-inline-block"></i></button>
                </div>
        </form>
    </div>
</div>
</div>
@endsection