@extends('layouts.admin.template')
@section('content')

<div class="page">
    <!-- include header.html"-->
    <!-- include sidebar.html"-->

    <!-- Start::app-content -->
    <div class="main-content">
        <div class="container-fluid">

            <!-- Start::page-header -->
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h1 class="page-title fw-medium fs-18 mb-2">Invoice Details</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">
                                Pages
                            </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Invoice</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
                    </ol>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-white btn-wave border-0 me-0 fw-normal waves-effect waves-light">
                        <i class="ri-filter-3-fill me-2"></i>Filter
                    </button>
                    <button type="button" class="btn btn-primary btn-wave waves-effect waves-light">
                        <i class="ri-upload-2-line me-2"></i> Export report
                    </button>
                </div>
            </div>
            <!-- End::page-header -->

            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="h5 mb-0 d-sm-flex d-bllock align-items-center">
                                            <div class="">
                                                <img src="{{ asset('admin_resources/assets/images/user-general/logo_kab_taput.jpg') }}"
                                                    alt="" height="106px" width="100px">
                                            </div>
                                            <div class="ms-sm-2 ms-0 mt-sm-0 mt-6">
                                                <p class="fs-15 mb-1">PERERINTAH KABUPATEN TAPANULI UTARA</p>
                                                <div class="h5 fw-bold mb-1">BADAN KEUANGAN DAN ASET DAERAH</div>
                                                <p class="fs-12 mb-1">Jl. Let. Jend. Soeprapto No.1</p>
                                                <p class="fs-14 mb-1">TARUTUNG</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div style="text-align: center;">
                                            <p class="mb-5"></p>
                                            <p class="h5 fw-bold mb-1">
                                                KETETAPAN RETRIBUSI DAERAH SEWA TANAH
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-xl-2">
                                        <div style="text-align: center;">
                                            <p class="mb-4"></p>
                                            <p class="h6 fw-medium mb-1">
                                                No. Urut
                                            </p>
                                            <p class="h6 fw-bold mb-1">
                                            {{ $headTagihanDetail->noUrut }}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <p class="text-muted mb-2">
                                                Ditagihkan Kepada:
                                            </p>
                                            <p class="mb-1 text-muted">
                                                #{{ $headTagihanDetail->npwrd }}
                                            </p>
                                            <p class="mb-1 fw-bold">
                                                {{ $headTagihanDetail->namaWajibRetribusi }}
                                            </p>
                                            <p class="mb-1 text-muted">
                                                Alamat
                                            </p>
                                            <p class="mb-1 text-muted">
                                                Email
                                            </p>
                                            <p class="mb-1 text-muted">
                                                Nomor Telepon WhatsApp
                                            </p>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-3">
                                            <p class="text-muted mb-2">
                                                Atas Objek Retribusi :
                                            </p>
                                            <p class="text-muted mb-1">
                                                #{{ $headTagihanDetail->kodeObjekRetribusi }}
                                            </p>
                                            <p class="fw-bold mb-1">
                                                {{ $headTagihanDetail->objekRetribusi }}
                                            </p>
                                            <p class="text-muted mb-1">
                                                {{ $headTagihanDetail->alamatLengkap }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <p class="fw-medium text-muted mb-1">Nomor Billing :</p>
                                    <p class="fs-15 mb-1">#1216.2.23.1.{{ $headTagihanDetail->kodeBilling }}</p>
                                </div>
                                <div class="col-xl-3">
                                    <p class="fw-medium text-muted mb-1">Tanggal Cetak :</p>
                                    <p class="fs-15 mb-1">{{ date('d F Y')}} - <span
                                            class="text-muted fs-12">{{ date('h:i:s')}}</span>
                                    </p>
                                </div>
                                <div class="col-xl-3">
                                    <p class="fw-medium text-muted mb-1">Jatuh Tempo :</p>
                                    <p class="fs-15 mb-1">29,Oct 2024</p>
                                </div>
                                <div class="col-xl-3">
                                    <p class="fw-medium text-muted mb-1">Total Bayar :</p>
                                    <p class="fs-16 mb-1 fw-medium"></p>
                                </div>
                                <div class="col-xl-12">
                                    <div class="table-responsive">
                                        <table class="table nowrap text-nowrap border mt-4">
                                            <thead>
                                                <tr>
                                                    <th>NOMOR TAGIHAN</th>
                                                    <th>TAHUN</th>
                                                    <th>BIAYA ADMINISTRASI</th>
                                                    <th>JUMLAH TAGIHAN</th>
                                                    <th>JUMLAH DENDA</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($checkoutDetail) && count($checkoutDetail) > 0)
                                                    {{ $total = 0 }}
                                                    @foreach ($checkoutDetail as $indexKey => $tD)
                                                        <tr>
                                                            <td>
                                                                <div class="text-muted">
                                                                    {{ $tD->nomorTagihan }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-muted">
                                                                    {{ $tD->tahun }}
                                                                </div>
                                                            </td>
                                                            <td class="text-muted">
                                                                0
                                                            </td>
                                                            <td>
                                                                <div class="text-muted">
                                                                    @currency($tD->jumlahTagihan)
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-muted">
                                                                    @currency($tD->jumlahDenda)
                                                                </div>
                                                            </td>
                                                            <td width="200px">
                                                                <div class="product-quantity-container">
                                                                    @currency($tD->totalTagihan)
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        {{ $total = $total + $tD->totalTagihan }}
                                                    @endforeach
                                                @endif
                                                <tr>
                                                    <td colspan="4"></td>
                                                    <td colspan="2">
                                                        <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">
                                                                        <p class="mb-0 fs-14">Total :</p>
                                                                    </th>
                                                                    <td width="170px">
                                                                        <p class="mb-0 fw-medium fs-16 text-primary">
                                                                            @currency($total)
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div>
                                        <p>
                                            <span class="mb-1 fw-medium">Dengan Huruf: </span><span class="text-muted">{{ Riskihajar\Terbilang\Facades\Terbilang::make($total) }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div>
                                        <label for="invoice-note" class="form-label">Note:</label>
                                        <textarea class="form-control form-control-light" id="invoice-note"
                                            rows="3">Once the invoice has been verified by the accounts payable team and recorded, 
                                            the only task left is to send it for approval before releasing the payment</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary">Download <i
                                    class="ri-download-2-line ms-1 align-middle"></i></button>
                        </div>
                    </div>
                </div>
                <!--<div class="col-xl-3">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    Mode Of Payment
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <p class="fs-14 fw-medium">
                                            Credit/Debit Card
                                        </p>
                                        <p>
                                            <span class="fw-medium text-muted fs-12">Name On Card :</span> Luna Park
                                        </p>
                                        <p>
                                            <span class="fw-medium text-muted fs-12">Card Number :</span> 1234 5678 9087 XXXX
                                        </p>
                                        <p>
                                            <span class="fw-medium text-muted fs-12">Total Amount :</span> <span class="text-primary fw-medium fs-14">$12,260.25</span>
                                        </p>
                                        <p>
                                            <span class="fw-medium text-muted fs-12">Due Date :</span> 29,Oct 2024 - <span class="text-danger fs-12 fw-medium">30 days due</span>
                                        </p>
                                        <p>
                                            <span class="fw-medium text-muted fs-12">Invoice Status : <span class="badge bg-primary-transparent">Pending</span></span>
                                        </p>
                                        <div class="alert alert-primary" role="alert">
                                            Please Make sure to pay the invoice bill within 30 days.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
            </div>
            <!--End::row-1 -->

        </div>
    </div>
    <!-- End::app-content -->


    <!-- include footer.html"-->
    <!-- include responsive-search-modal.html"-->

</div>

<!-- include commonjs.html"-->

<!-- include custom_switcherjs.html"-->

<!-- Custom JS -->
<script src="../assets/js/custom.js"></script>

<script>
    function PrintMe() {
        window.print();
    }
</script>

</body>

@endsection