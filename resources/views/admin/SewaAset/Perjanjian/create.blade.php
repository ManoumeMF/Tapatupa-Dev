@extends('layouts.admin.template')
@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        /* single select with placeholder */
        $(".permohonan-sewa").select2({
            placeholder: "Pilih Nomor Permohonan",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".jangka-waktu-sewa").select2({
            placeholder: "Pilih Jangka Waktu Sewa",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        // for product images upload
        const MultipleElement1 = document.querySelector('.file-penilaian');
        FilePond.create(MultipleElement1,);

        /* For Human Friendly dates */
    flatpickr("#tanggalDinilai", {
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
        disableMobile: true
    });
    });

</script>

<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
    <h1 class="page-title fw-medium fs-18 mb-2">Perjanjian Sewa</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Sewa Aset</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Perjanjian Sewa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Perjanjian Sewa</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xl-12">

        <form class="row g-3 needs-validation" action="{{route('Perjanjian.store')}}" method="post" novalidate>
            {{ csrf_field() }}
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Tambah Perjanjian Sewa
                    </div>
                </div>
                <div class="card-body tambah-wajib-retribusi p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-12">
                                                <label for="permohonan-sewa" class="form-label">Nomor Permohonan Sewa</label>
                                                <select class="permohonan-sewa form-control" name="permohonanSewa" required>
                                                    <option></option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Objek Retribusi Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="nik" class="form-label">Nomor bangunan</label>
                                                <input type="text" class="form-control" id="noBangunan" disabled>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="kodeObjek" class="form-label">Kode Objek Retribusi</label>
                                                <input type="text" class="form-control" id="kodeObjek" disabled>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="nik" class="form-label">Nama Objek Retribusi</label>
                                                <input type="text" class="form-control" id="objekRetribusi" disabled>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="alamat-wajib-retribusi" class="form-label">Alamat Wajib
                                                    Retribusi</label>
                                                <textarea class="form-control" id="alamat-wajib" rows="2"
                                                    name="alamatWajibRetribusi" disabled></textarea>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="panajng-tanah" class="form-label">Panjang Tanah
                                                    (meter)</label>
                                                <input type="text" class="form-control" id="panjang-tanah"
                                                    name="panjangTanah" disabled>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="lebar-tanah" class="form-label">Lebar Tanah (meter)</label>
                                                <input type="text" class="form-control" id="panjang-tanah"
                                                    name="lebarTanah" disabled>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="luas-tanah" class="form-label">Luas Tanah (meter)</label>
                                                <input type="text" class="form-control" id="luas-tanah" name="luasTanah"
                                                   name="luasTanah" disabled>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="panjang-bangunan" class="form-label">Panjang Bangunan
                                                    (meter)</label>
                                                <input type="text" class="form-control" id="panjang-bangunan"
                                                    name="panjangBangunan" disabled>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="lebar-bangunan" class="form-label">Lebar Bangunan
                                                    (meter)</label>
                                                <input type="text" class="form-control" id="lebar-bangunan"
                                                   name="lebarBangunan" disabled>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="luas-bangunan" class="form-label">Luas Bangunan
                                                    (meter)</label>
                                                <input type="text" class="form-control" id="luas-bangunan"
                                                    name="luasBangunan" disabled>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="jumlah-lantai" class="form-label">Jumlah Lantai</label>
                                                <input type="text" class="form-control" id="jumlah-lantai"
                                                   name="jumlahLantai" disabled>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="kapasistas" class="form-label">Kapasitas</label>
                                                <input type="text" class="form-control" id="kapasitasi"
                                                   name="kapasitasi" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-6">
                                                <label for="jangka-waktu-sewa" class="form-label">Jenis Jangka
                                                    Waktu</label>
                                                <select class="jangka-waktu-sewa form-control" name="jangkaWaktu"
                                                    required>
                                                    <option></option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Jenis Jangka Waktu Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="nomor-whatsapp" class="form-label">Tanggal Dinilai</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-text text-muted"> <i
                                                                class="ri-calendar-line"></i> </div>
                                                        <input type="text" class="form-control" id="tanggalDinilai"
                                                            placeholder="Pilih Tanggal Penilaian">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="nama-penilai" class="form-label">Nama Penilai</label>
                                                <input type="text" class="form-control" id="nama-penilai" name="namaPenilai"
                                                    placeholder="Masukkan Nama  Penilai">
                                                <div class="invalid-feedback">
                                                    Nama Penilai Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="nama-penilai" class="form-label">Nominal Tarif Objek Retribusi</label>
                                                <input type="text" class="form-control" id="tarif-objek" name="tarifObjek"
                                                    placeholder="Masukkan Nominal Tarif Objek Retribusi">
                                                <div class="invalid-feedback">
                                                Nominal Tarif Objek Retribusi Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-12 product-documents-container">
                                                <p class="fw-medium mb-2 fs-14">Upload File Hasil Penilaian :</p>
                                                <input type="file" class="file-penilaian" name="filePenilaian" multiple
                                                    data-allow-reorder="true" data-max-file-size="3MB"
                                                    data-max-files="6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button class="btn btn-danger m-1" type="reset">Batal<i
                                class="bi bi-x-square ms-2 align-middle d-inline-block"></i></button>
                        <button class="btn btn-primary m-1" type="submit">Simpan <i
                                class="bi bi-floppy ms-2 ms-1 align-middle d-inline-block"></i></button>
                    </div>
                </div>
        </form>
    </div>
</div>
</div>
@endsection