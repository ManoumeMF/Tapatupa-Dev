@extends('layouts.admin.template')
@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        /* single select with placeholder */
        $(".pekerjaan").select2({
            placeholder: "Pilih Pekerjaan",
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

        // for product images upload
        const MultipleElement1 = document.querySelector('.foto-wajib-retribusi');
        FilePond.create(MultipleElement1,);
    });

</script>

<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">Wajib Retribusi</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Wajib Retribusi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Wajib Retribusi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xl-12">

        <form class="row g-3 needs-validation" action="{{route('WajibRetribusi.store')}}" method="post" novalidate>
            {{ csrf_field() }}
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Tambah Wajib Retribusi
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
                                                <label for="nik" class="form-label">Nomor Induk Kependudukan
                                                    (NIK)</label>
                                                <input type="text" class="form-control" id="nik"
                                                    placeholder="Masukkan Nomor Induk Kependudukan (NIK)" required>
                                                <div class="invalid-feedback">
                                                    Nomor Induk Kependudukan (NIK) Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="nama-wajib-retribusi" class="form-label">Nama Wajib
                                                    Retribusi</label>
                                                <input type="text" class="form-control" id="nik" name="nik"
                                                    placeholder="Masukkan Nama Wajib Retribusi Sesuai KTP" required>
                                                <div class="invalid-feedback">
                                                    Nama Wajib Retribusi Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                <select class="pekerjaan form-control" name="pekerjaan" required>
                                                    <option></option>
                                                    @foreach ($perkerjaan as $pk)
                                                        <option value="{{ $pk->idPekerjaan }}">
                                                            {{ $pk->namaPekerjaan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Pekerjaan Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="provinsi" class="form-label">Provinsi</label>
                                                <select class="provinsi form-control" name="provinsi" required>
                                                    <option></option>
                                                    @foreach ($perkerjaan as $pk)
                                                        <option value="{{ $pk->idPekerjaan }}">
                                                            {{ $pk->namaPekerjaan }}
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
                                                    @foreach ($perkerjaan as $pk)
                                                        <option value="{{ $pk->idPekerjaan }}">
                                                            {{ $pk->namaPekerjaan }}
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
                                                    @foreach ($perkerjaan as $pk)
                                                        <option value="{{ $pk->idPekerjaan }}">
                                                            {{ $pk->namaPekerjaan }}
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
                                                    @foreach ($perkerjaan as $pk)
                                                        <option value="{{ $pk->idPekerjaan }}">
                                                            {{ $pk->namaPekerjaan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Kelurahan/Desa Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="alamat-wajib-retribusi" class="form-label">Alamat Wajib
                                                    Retribusi</label>
                                                <textarea class="form-control" id="alamat-wajib" rows="2"
                                                    name="alamatWajibRetribusi"
                                                    placeholder="Masukkan Alamat Wajib Retribusi"></textarea>
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
                                                <label for="no-ponsel" class="form-label">Nomor Ponsel</label>
                                                <input type="text" class="form-control" id="nomor-ponsel"
                                                    name="nomorPonsel" placeholder="Masukkan Nomor Ponsel">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="nomor-whatsapp" class="form-label">Nomor WhatsApp</label>
                                                <input type="text" class="form-control" id="nomor-whatsapp"
                                                    name="nomorWhatsapp" placeholder="Masukkan Nomor Whatsapp">
                                            </div>
                                            <div class="col-xl-14">
                                                <label for="wmail" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="Masukkan email">
                                            </div>
                                            <div class="col-xl-12 product-documents-container">
                                                <p class="fw-medium mb-2 fs-14">Product Images :</p>
                                                <input type="file" class="foto-wajib-retribusi" name="filepond" multiple
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