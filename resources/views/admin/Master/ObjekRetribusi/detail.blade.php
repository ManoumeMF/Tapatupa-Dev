@extends('layouts.admin.template')
@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        /* map with markers */
        var latitude = {!! json_encode($objekRetribusi->latitute) !!};
        var longitude = {!! json_encode($objekRetribusi->longitude) !!};
        var namaObjek = {!! json_encode($objekRetribusi->objekRetribusi) !!};

        var map3 = new GMaps({
            el: '#map-markers',
            lat: latitude,
            lng: longitude
        });
        map3.addMarker({
            lat: latitude,
            lng: longitude,
            title: namaObjek,
            infoWindow: {
                content: '<p>HTML Content</p>'
            }
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
                    <li class="breadcrumb-item active" aria-current="page">Detail Objek Retribusi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Detail Objek Retribusi
                </div>
            </div>
            <div class="card-body detail-objek-retribusi p-0">
                <div class="p-4">
                    <div class="row gx-5">
                        <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                            <div class="card custom-card shadow-none mb-0 border-0">
                                <div class="card-body p-0">
                                    <div class="row gy-3">
                                        <div class="col-xl-4">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Kode Objek Retribusi</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->kodeObjekRetribusi }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Jenis Objek Retribusi</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->jenisObjekRetribusi }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Nomor Bangunan</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->noBangunan }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Nama Objek Retribusi</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->objekRetribusi }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Lokasi Objek Retribusi</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->noBangunan }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Alamat Objek Retribusi</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->alamatLengkap }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 product-documents-container" >
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                <p class="fw-medium mb-2 fs-14">Gambar Denah Tanah :</p>
                                                    <div id="map-markers"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                            <div class="card custom-card shadow-none mb-0 border-0">
                                <div class="card-body p-0">
                                    <div class="row gy-3">
                                        <div class="col-xl-3">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Panjang Tanah (m)</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->panjangTanah }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Lebar Tanah (m)</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->lebarTanah }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Luas Tanah (m<sup>2</sup>)</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->luasTanah }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Panjang Bangunan (m)</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->panjangBangunan }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Lebar Bangunan (m)</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->lebarBangunan }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Luas Bangunan (m<sup>2</sup>)</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->luasBangunan }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Jumlah Lantai</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $objekRetribusi->jumlahLantai }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Jangka Waktu Sewa</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $tarifRetribusi->jenisJangkaWaktu }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Tarif Sewa Objek Retribusi</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $tarifRetribusi->nominalTarif }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Keterangan Tarif Sewa Objek Retribusi</h6>
                                                    <span
                                                        class="d-block fs-13 text-muted fw-normal">{{ $tarifRetribusi->keterangan }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="d-flex gap-3">
                                                <div class="flex-fill">
                                                    <h6 class="mb-1 fs-13">Keterangan Tarif Sewa Objek Retribusi</h6>
                                                    
                                                    <img src="{{asset('storage/images/objekRetribusi/353353-Denah Tanah-1723715195.png') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection