@extends('layouts.admin.template')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $(document).ready(function() {
        // Memuat provinsi
        $.ajax({
            url: '/provinces',
            type: 'GET',
            success: function(data) {
                var options = '<option value="">Pilih Provinsi</option>';
                $.each(data.provinces, function(index, province) {
                    options += '<option value="' + province.prov_id + '">' + province.prov_name + '</option>';
                });
                $('#provinsi').html(options);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching provinces:', error);
            }
        });

        // Ketika provinsi berubah
        $('#provinsi').change(function() {
            var prov_id = $(this).val();
            $('#kota').prop('disabled', true);
            $('#kecamatan').prop('disabled', true);
            $('#kelurahan').prop('disabled', true);

            if (prov_id) {
                $.ajax({
                    url: '/cities/' + prov_id,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option value="">Pilih Kota</option>';
                        $.each(data.cities, function(index, city) {
                            options += '<option value="' + city.city_id + '">' + city.city_name + '</option>';
                        });
                        $('#kota').html(options).prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cities:', error);
                    }
                });
            } else {
                $('#kota').html('<option value="">Pilih Kota</option>').prop('disabled', true);
                $('#kecamatan').html('<option value="">Pilih Kecamatan</option>').prop('disabled', true);
                $('#kelurahan').html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
            }
        });

        // Ketika kota berubah
        $('#kota').change(function() {
            var city_id = $(this).val();
            $('#kecamatan').prop('disabled', true);
            $('#kelurahan').prop('disabled', true);

            if (city_id) {
                $.ajax({
                    url: '/districts/' + city_id,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option value="">Pilih Kecamatan</option>';
                        $.each(data.districts, function(index, district) {
                            options += '<option value="' + district.dis_id + '">' + district.dis_name + '</option>';
                        });
                        $('#kecamatan').html(options).prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching districts:', error);
                    }
                });
            } else {
                $('#kecamatan').html('<option value="">Pilih Kecamatan</option>').prop('disabled', true);
                $('#kelurahan').html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
            }
        });

        // Ketika kecamatan berubah
        $('#kecamatan').change(function() {
            var dis_id = $(this).val();

            if (dis_id) {
                $.ajax({
                    url: '/subdistricts/' + dis_id,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option value="">Pilih Kelurahan</option>';
                        $.each(data.subdistricts, function(index, subdistrict) {
                            options += '<option value="' + subdistrict.subdis_id + '">' + subdistrict.subdis_name + '</option>';
                        });
                        $('#kelurahan').html(options).prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching subdistricts:', error);
                    }
                });
            } else {
                $('#kelurahan').html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
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
                    <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
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
                        </div>
                        <div class="invalid-feedback">
                            Provinsi Tidak Boleh Kosong
                        </div>
                    </div>

                    <!-- Kota/Kabupaten -->
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota/Kabupaten</label>
                        <div class="input-group">
                            <select class="form-control" id="kota" name="kota" required disabled>
                                <option value="" selected disabled>Pilih Kota/Kabupaten</option>
                                <!-- Opsi akan diisi secara dinamis melalui AJAX -->
                            </select>
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
                                <option value="" selected disabled>Pilih Kecamatan</option>
                            </select>
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
                                <option value="" selected disabled>Pilih Kelurahan</option>
                            </select>
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

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                        <div class="invalid-feedback">
                            Email Tidak Boleh Kosong
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a class="btn btn-secondary" href="{{ route('Pegawai.index') }}">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End:: row-1 -->

@endsection
