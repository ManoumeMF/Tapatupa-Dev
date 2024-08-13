@extends('layouts.admin.template')

@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        /* single select with placeholder */
        $(".js-example-placeholder-single").select2({
            placeholder: "Pilih Jenis Dokumen",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".js-example-placeholder-single-provinsi").select2({
            placeholder: "Pilih Provinsi",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".js-example-placeholder-single-kabupaten").select2({
            placeholder: "Pilih Kabupaten",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".js-example-placeholder-single-kecamatan").select2({
            placeholder: "Pilih Kecamatan",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".js-example-placeholder-single-kelurahan").select2({
            placeholder: "Pilih Kelurahan",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });
    });

    function updateKabupaten(provinsiId) {
        // Fetch Kabupaten based on Provinsi
        // Use AJAX to fetch data
        // Example:
        $.ajax({
            url: '/get-kabupaten/' + provinsiId,
            method: 'GET',
            success: function(data) {
                let kabupatenSelect = $('#kabupaten');
                kabupatenSelect.empty();
                kabupatenSelect.append('<option value="">Pilih Kabupaten</option>');
                data.forEach(function(kabupaten) {
                    kabupatenSelect.append('<option value="' + kabupaten.id + '">' + kabupaten.nama + '</option>');
                });
                kabupatenSelect.trigger('change');
            }
        });
    }

    function updateKecamatan(kabupatenId) {
        // Fetch Kecamatan based on Kabupaten
        // Use AJAX to fetch data
        $.ajax({
            url: '/get-kecamatan/' + kabupatenId,
            method: 'GET',
            success: function(data) {
                let kecamatanSelect = $('#kecamatan');
                kecamatanSelect.empty();
                kecamatanSelect.append('<option value="">Pilih Kecamatan</option>');
                data.forEach(function(kecamatan) {
                    kecamatanSelect.append('<option value="' + kecamatan.id + '">' + kecamatan.nama + '</option>');
                });
                kecamatanSelect.trigger('change');
            }
        });
    }

    function updateKelurahan(kecamatanId) {
        // Fetch Kelurahan based on Kecamatan
        // Use AJAX to fetch data
        $.ajax({
            url: '/get-kelurahan/' + kecamatanId,
            method: 'GET',
            success: function(data) {
                let kelurahanSelect = $('#kelurahan');
                kelurahanSelect.empty();
                kelurahanSelect.append('<option value="">Pilih Kelurahan</option>');
                data.forEach(function(kelurahan) {
                    kelurahanSelect.append('<option value="' + kelurahan.id + '">' + kelurahan.nama + '</option>');
                });
            }
        });
    }
</script>

<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">Tambah Pegawai</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pegawai</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xl-12">
        <form class="row g-3 needs-validation" action="{{ route('pegawai.store') }}" method="post" novalidate>
            {{ csrf_field() }}
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Tambah Pegawai
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                        <div class="invalid-feedback">
                            NIK Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                        <div class="invalid-feedback">
                            Nama Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <select class="js-example-placeholder-single form-control" id="pekerjaan" name="idPekerjaan" required>
                            <option></option>
                            @foreach ($pekerjaans as $pekerjaan)
                                <option value="{{ $pekerjaan->idPekerjaan }}">{{ $pekerjaan->namaPekerjaan }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Pekerjaan Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="js-example-placeholder-single-provinsi form-control" id="provinsi" name="idProvinsi" onchange="updateKabupaten(this.value)" required>
                            <option></option>
                            @foreach ($provinsis as $provinsi)
                                <option value="{{ $provinsi->idProvinsi }}">{{ $provinsi->namaProvinsi }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Provinsi Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="kabupaten" class="form-label">Kabupaten</label>
                        <select class="js-example-placeholder-single-kabupaten form-control" id="kabupaten" name="idKabupaten" onchange="updateKecamatan(this.value)" required>
                            <option></option>
                        </select>
                        <div class="invalid-feedback">
                            Kabupaten Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="js-example-placeholder-single-kecamatan form-control" id="kecamatan" name="idKecamatan" onchange="updateKelurahan(this.value)" required>
                            <option></option>
                        </select>
                        <div class="invalid-feedback">
                            Kecamatan Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <select class="js-example-placeholder-single-kelurahan form-control" id="kelurahan" name="idKelurahan" required>
                            <option></option>
                        </select>
                        <div class="invalid-feedback">
                            Kelurahan Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                        <div class="invalid-feedback">
                            Alamat Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nomorPonsel" class="form-label">Nomor Ponsel</label>
                        <input type="text" class="form-control" id="nomorPonsel" name="nomorPonsel" placeholder="Masukkan Nomor Ponsel" required>
                        <div class="invalid-feedback">
                            Nomor Ponsel Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nomorWhatsapp" class="form-label">Nomor WA</label>
                        <input type="text" class="form-control" id="nomorWhatsapp" name="nomorWhatsapp" placeholder="Masukkan Nomor WA" required>
                        <div class="invalid-feedback">
                            Nomor WA Tidak Boleh Kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                        <div class="invalid-feedback">
                            Email Tidak Boleh Kosong
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-danger m-1" type="reset">Batal<i class="bi bi-x-square ms-2 align-middle d-inline-block"></i></button>
                    <button class="btn btn-primary m-1" type="submit">Simpan <i class="bi bi-floppy ms-2 ms-1 align-middle d-inline-block"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
