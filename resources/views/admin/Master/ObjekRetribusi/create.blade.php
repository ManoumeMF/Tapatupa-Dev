@extends('layouts.admin.template')
@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        /* single select with placeholder */
        $(".jenis-objek-retribusi").select2({
            placeholder: "Pilih Jenis Objek Retribusi",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".lokasi-objek-retribusi").select2({
            placeholder: "Pilih Lokasi Objek Retribusi",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".provinsi").select2({
            placeholder: "Pilih Provinsi",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".kabupaten-kota").select2({
            placeholder: "Pilih Kabupaten/Kota",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".kecamatan").select2({
            placeholder: "Pilih Kecamatan",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".kelurahan-desa").select2({
            placeholder: "Pilih Kelurahan/Desa",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        $(".jangka-waktu-sewa").select2({
            placeholder: "Pilih Jangka Waktu Sewa",
            allowClear: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });

        // jQuery button click event to add Anggota Keluarga row
        $("#tambahFoto").on("click", function () {

            // Adding a row inside the tbody.
            $("#tblFoto tbody").append('<tr>' +
                '<td>' +
                '<input type="text" class="form-control" id="namaFoto[]"' +
                'placeholder="Masukkan Nama Foto" required>' +
                '</td>' +
                '<td>' +
                '<input type="file" class="foto-objek" name="fileFoto[]" multiple' +
                'data-allow-reorder="true" data-max-file-size="5MB"' +
                'data-max-files="1">' +
                '</td>' +
                '<td>' +
                '<textarea class="form-control" id="keterangan" rows="2" name="keteranganFoto"' +
                'placeholder="Masukkan Keterangan Foto"></textarea>' +
                '</td>' +
                '<td  style="text-align: center">' +
                '<button class="btn btn-icon btn-outline-secondary rounded-pill btn-wave" type="button" id="delFoto">' +
                '<i class="bi bi-x-lg"></i>' +
                '</button>' +
                '</td>' +
                '</tr>');
        });

        $(document).on('click', '#delFoto', function () {
            $(this).closest('tr').remove();
            return false;
        });
    });

</script>

<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">Objek Retribusi</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Objek Retribusi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Objek Retribusi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xl-12">

        <form class="row g-3 needs-validation" action="{{route('Pekerjaan.store')}}" method="post" novalidate>
            {{ csrf_field() }}
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Tambah Objek Retribusi
                    </div>
                </div>
                <div class="card-body tambah-objek-retribusi p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-6">
                                                <label for="validationCustom01" class="form-label">Jenis Objek
                                                    Retribusi</label>
                                                <select class="jenis-objek-retribusi form-control"
                                                    name="jenisObjekRetribusi" required>
                                                    <option></option>
                                                    @foreach ($objectType as $oT)
                                                        <option value="{{ $oT->idJenisObjekRetribusi }}">
                                                            {{ $oT->jenisObjekRetribusi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Jenis Objek Retribusi Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="kode-objek-retribusi" class="form-label">Kode Objek
                                                    Retribusi</label>
                                                <input type="text" class="form-control" id="kodeObjekRetribusi"
                                                    placeholder="Masukkan Kode Objek Retribusi" required>
                                                <div class="invalid-feedback">
                                                    Kode Objek Retribusi Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="nomor-bangunan" class="form-label">Nomor bangunan</label>
                                                <input type="text" class="form-control" id="nomorBangunan"
                                                    placeholder="Masukkan Nomor Bangunan">
                                            </div>
                                            <div class="col-xl-8">
                                                <label for="nama-objek-retribusi" class="form-label">Nama Objek
                                                    Retribusi</label>
                                                <input type="text" class="form-control" id="namaObjekRetribusi"
                                                    placeholder="Masukkan Nama Objek Retribusi" required>
                                                <div class="invalid-feedback">
                                                    Nama Objek Retribusi Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="lokasi-objek-retribusi" class="form-label">Lokasi Objek
                                                    Retribusi</label>
                                                <select class="lokasi-objek-retribusi form-control"
                                                    name="lokasiObjekRetribusi" required>
                                                    <option></option>
                                                    @foreach ($objectLocation as $oL)
                                                        <option value="{{ $oL->idLokasiObjekRetribusi }}">
                                                            {{ $oL->lokasiobjekretribusi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Lokasi Objek Retribusi Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="provinsi" class="form-label">Provinsi</label>
                                                <select class="provinsi form-control" name="provinsi" required>
                                                    <option></option>
                                                    @foreach ($objectLocation as $oL)
                                                        <option value="{{ $oL->idLokasiObjekRetribusi }}">
                                                            {{ $oL->lokasiobjekretribusi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Provinsi Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="kabupaten-kota" class="form-label">Kabupaten/Kota</label>
                                                <select class="kabupaten-kota form-control" name="kabupatenKota"
                                                    required>
                                                    <option></option>
                                                    @foreach ($objectLocation as $oL)
                                                        <option value="{{ $oL->idLokasiObjekRetribusi }}">
                                                            {{ $oL->lokasiobjekretribusi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Kabupaten/Kota Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <select class="kecamatan form-control" name="kecamatan" required>
                                                    <option></option>
                                                    @foreach ($objectLocation as $oL)
                                                        <option value="{{ $oL->idLokasiObjekRetribusi }}">
                                                            {{ $oL->lokasiobjekretribusi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Kecamatan Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="kelurahan-kota" class="form-label">Kelurahan/Desa</label>
                                                <select class="kelurahan-desa form-control" name="kelurahan" required>
                                                    <option></option>
                                                    @foreach ($objectLocation as $oL)
                                                        <option value="{{ $oL->idLokasiObjekRetribusi }}">
                                                            {{ $oL->lokasiobjekretribusi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Kelurahan/Desa Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="alamat-objek-retribusi" class="form-label">Alamat Objek
                                                    Retribusi</label>
                                                <textarea class="form-control" id="alamat-objek" rows="2"
                                                    name="alamatObjekRetribusi"
                                                    placeholder="Masukkan Alamat Objek Retribusi"></textarea>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="longitude" class="form-label">Longitude (Kordinat X)</label>
                                                <input type="text" class="form-control" id="longitudu-x"
                                                    placeholder="Masukkan Kordinat X">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="latitude" class="form-label">Latitude (Kordinat Y)</label>
                                                <input type="text" class="form-control" id="latitude-y"
                                                    placeholder="Masukkan Kordinat Y">
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea class="form-control" id="keterangan" rows="3"
                                                    placeholder="Masukkan Keterangan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-4">
                                                <label for="panajng-tanah" class="form-label">Panjang Tanah
                                                    (meter)</label>
                                                <input type="text" class="form-control" id="panjang-tanah"
                                                    name="panjangTanah" placeholder="Masukkan Panjang Tanah">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="lebar-tanah" class="form-label">Lebar Tanah (meter)</label>
                                                <input type="text" class="form-control" id="panjang-tanah"
                                                    name="lebarTanah" placeholder="Masukkan Lebar Tanah">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="luas-tanah" class="form-label">Luas Tanah (meter)</label>
                                                <input type="text" class="form-control" id="luas-tanah" name="luasTanah"
                                                    placeholder="Masukkan Luas Tanah" name="luasTanah">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="panjang-bangunan" class="form-label">Panjang Bangunan
                                                    (meter)</label>
                                                <input type="text" class="form-control" id="panjang-bangunan"
                                                    placeholder="Masukkan Panjang Bangunan" name="panjangBangunan">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="lebar-bangunan" class="form-label">Lebar Bangunan
                                                    (meter)</label>
                                                <input type="text" class="form-control" id="lebar-bangunan"
                                                    placeholder="Masukkan Lebar Bangunan" name="lebarBangunan">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="luas-bangunan" class="form-label">Luas Bangunan
                                                    (meter)</label>
                                                <input type="text" class="form-control" id="luas-bangunan"
                                                    placeholder="Masukkan Luas Bangunan" name="luasBangunan">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="jumlah-lantai" class="form-label">Jumlah Lantai</label>
                                                <input type="text" class="form-control" id="jumlah-lantai"
                                                    placeholder="Masukkan Jumlah lantai" name="jumlahLantai">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="jumlah-lantai" class="form-label">Jangka Waktu Sewa</label>
                                                <select class="jangka-waktu-sewa form-control" name="jangkaWaktuSewa"
                                                    required>
                                                    <option></option>
                                                    @foreach ($objectLocation as $oL)
                                                        <option value="{{ $oL->idLokasiObjekRetribusi }}">
                                                            {{ $oL->lokasiobjekretribusi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="jumlah-lantai" class="form-label">Tarif Sewa Objek
                                                    Retribusi</label>
                                                <input type="text" class="form-control" id="tarif-sewa"
                                                    placeholder="Masukkan Tarif Sewa" name="tarifSewa">
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea class="form-control" id="keteranganTarifSewa" rows="2"
                                                    placeholder="Masukkan Keterangan Tarif Sewa"></textarea>
                                            </div>
                                            <div class="col-xl-12 product-documents-container">
                                                <p class="fw-medium mb-2 fs-14">Gambar Denah Tanah :</p>
                                                <input type="file" class="product-Images" name="fileDenahTanah" multiple
                                                    data-allow-reorder="true" data-max-file-size="5MB"
                                                    data-max-files="1">
                                            </div>
                                            <label class="form-label text-muted mt-3">Maksimal ukuran gambar 5MB.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top">
                        <div class="d-sm-flex justify-content-end">
                            <button class="btn btn-primary m-1" id="tambahFoto" type="button"><span
                                    class="bi bi-plus-circle align-middle me-1 fw-medium"></span>
                                Tambah Foto
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap table-hover" id="tblFoto">
                                <thead>
                                    <tr>
                                        <th>Nama Foto</th>
                                        <th>File Foto</th>
                                        <th>Keterangan</th>
                                        <th width="20px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
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