@extends('layouts.admin.template')

@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $(".js-example-placeholder-single").select2({
            placeholder: "Pilih Jabatan Bidang...",
            allowClear: true,
            width: '100%',
        });
        $(".js-example-placeholder-single-region").select2({
            placeholder: "Pilih Region...",
            allowClear: true,
            width: '100%',
        });

        $('#provinsi').change(function() {
            var prov_id = $(this).val();
            $('#kota').prop('disabled', true);
            $('#kecamatan').prop('disabled', true);
            $('#kelurahan').prop('disabled', true);

            if (prov_id) {
                $.ajax({
                    url: '/api/cities/' + prov_id,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option></option>';
                        $.each(data.cities, function(index, city) {
                            options += '<option value="' + city.id + '">' + city.name + '</option>';
                        });
                        $('#kota').html(options).prop('disabled', false);
                    }
                });
            } else {
                $('#kota').html('<option></option>').prop('disabled', true);
                $('#kecamatan').html('<option></option>').prop('disabled', true);
                $('#kelurahan').html('<option></option>').prop('disabled', true);
            }
        });

        $('#kota').change(function() {
            var city_id = $(this).val();
            $('#kecamatan').prop('disabled', true);
            $('#kelurahan').prop('disabled', true);

            if (city_id) {
                $.ajax({
                    url: '/api/districts/' + city_id,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option></option>';
                        $.each(data.districts, function(index, district) {
                            options += '<option value="' + district.id + '">' + district.name + '</option>';
                        });
                        $('#kecamatan').html(options).prop('disabled', false);
                    }
                });
            } else {
                $('#kecamatan').html('<option></option>').prop('disabled', true);
                $('#kelurahan').html('<option></option>').prop('disabled', true);
            }
        });

        $('#kecamatan').change(function() {
            var dis_id = $(this).val();

            if (dis_id) {
                $.ajax({
                    url: '/api/subdistricts/' + dis_id,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option></option>';
                        $.each(data.subdistricts, function(index, subdistrict) {
                            options += '<option value="' + subdistrict.id + '">' + subdistrict.name + '</option>';
                        });
                        $('#kelurahan').html(options).prop('disabled', false);
                    }
                });
            } else {
                $('#kelurahan').html('<option></option>').prop('disabled', true);
            }
        });
    });
</script>

<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">Tambah Pegawai</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
                    <li class="breadcrumb-item"><a href="#">Tambah Pegawai</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xl-12">
        <form class="row g-3 needs-validation" action="{{ route('Pegawai.store') }}" method="post" novalidate>
            {{ csrf_field() }}
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Tambah Pegawai
                    </div>
                </div>
                <div class="card-body">
                    <!-- NIP -->
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
                        <div class="invalid-feedback">
                            NIP Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Nama Pegawai -->
                    <div class="mb-3">
                        <label for="namaPegawai" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control" id="namaPegawai" name="namaPegawai" placeholder="Masukkan Nama Pegawai" required>
                        <div class="invalid-feedback">
                            Nama Pegawai Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Golongan -->
                    <div class="mb-3">
                        <label for="golongan" class="form-label">Golongan</label>
                        <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Masukkan Golongan" required>
                        <div class="invalid-feedback">
                            Golongan Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Jabatan Bidang -->
                    <div class="mb-3">
                        <label for="jabatanBidang" class="form-label">Jabatan Bidang</label>
                        <div class="input-group">
                            <select class="js-example-placeholder-single form-control" id="jabatanBidang" name="jabatanBidang" required>
                                <option></option>
                                @foreach ($jabatanBidang as $sT)
                                    <option value="{{ $sT->idJabatanBidang }}">{{ $sT->namaJabatanBidang }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback">
                            Jabatan Bidang Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Provinsi -->
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <div class="input-group">
                            <select class="js-example-placeholder-single-region form-control" id="provinsi" name="provinsi" required>
                                <option></option>
                                @foreach ($provinsi as $sT)
                                    <option value="{{ $sT->prov_id }}">{{ $sT->prov_name }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback">
                            Provinsi Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Kota -->
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota/Kabupaten</label>
                        <div class="input-group">
                            <select class="form-control" id="kota" name="kota" required disabled>
                                <option></option>
                            </select>
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback">
                            Kota/Kabupaten Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Kecamatan -->
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <div class="input-group">
                            <select class="form-control" id="kecamatan" name="kecamatan" required disabled>
                                <option></option>
                            </select>
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback">
                            Kecamatan Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Kelurahan -->
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <div class="input-group">
                            <select class="form-control" id="kelurahan" name="kelurahan" required disabled>
                                <option></option>
                            </select>
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback">
                            Kelurahan Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Alamat Detail -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Detail</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Detail (Cth: Jalan, Blok, Nomor Rumah, dll)" required>
                        <div class="invalid-feedback">
                            Alamat Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Nomor Ponsel -->
                    <div class="mb-3">
                        <label for="nomorPonsel" class="form-label">Nomor Ponsel</label>
                        <input type="text" class="form-control" id="nomorPonsel" name="nomorPonsel" placeholder="Masukkan Nomor Ponsel" required>
                        <div class="invalid-feedback">
                            Nomor Ponsel Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Nomor Whatsapp -->
                    <div class="mb-3">
                        <label for="nomorWhatsapp" class="form-label">Nomor Whatsapp</label>
                        <input type="text" class="form-control" id="nomorWhatsapp" name="nomorWhatsapp" placeholder="Masukkan Nomor Whatsapp" required>
                        <div class="invalid-feedback">
                            Nomor Whatsapp Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- File Foto -->
                    <div class="mb-3">
                        <label for="fileFoto" class="form-label">File Foto</label>
                        <input type="file" class="form-control" id="fileFoto" name="fileFoto" required>
                        <div class="invalid-feedback">
                            File Foto Tidak Boleh Kosong
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
<!-- End:: row-1 -->
@endsection
