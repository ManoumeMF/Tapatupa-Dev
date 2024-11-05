@extends('layouts.admin.template')
@section('content')

<script>
    //-------------------------------------------------------------------------------------------------
    //Ajax Form Detail Data
    //-------------------------------------------------------------------------------------------------
    $(document).on('click', '.detailBtn', function (e) {
        e.preventDefault();

        var st_id = $(this).val();

        $("#detailModal").modal('show');

        $.ajax({
            method: "GET",
            url: "{{ route('Pekerjaan.detail') }}",
            data: {
                id: st_id
            },
            success: function (response) {
                //console.log(response);
                if (response.status == 404) {
                    new Noty({
                        text: response.message,
                        type: 'warning',
                        modal: true
                    }).show();
                } else {
                    //console.log(response.fieldEducation.nama_bidang_pendidikan)
                    $('#d_nama_pekerjaan').text(response.pekerjaan.namaPekerjaan);
                    $('#d_keterangan').text(response.pekerjaan.keterangan);
                }
            }
        });
    });

    //-------------------------------------------------------------------------------------------------
    //Ajax Form Delete Data
    //-------------------------------------------------------------------------------------------------
    $(document).on('click', '.deleteBtn', function (e) {
        var st_id = $(this).val();

        $('#deleteModal').modal('show');
        $('#deleting_id').val(st_id);
    });

    //-------------------------------------------------------------------------------------------------
    //Ajax Delete Data
    //-------------------------------------------------------------------------------------------------
    $(document).on('click', '.delete_data', function (e) {
        e.preventDefault();

        var id = $('#deleting_id').val();

        var data = {
            'idPekerjaan': id,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "{{ route('Pekerjaan.delete') }}",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.status == 400) {
                    $.each(response.errors, function (key, err_value) {
                        $('.toast-delete-error').append(err_value);

                        const primarytoastDeleteError = document.getElementById('dangerDeleteToast')
                        const toast = new bootstrap.Toast(primarytoastDeleteError)
                        toast.show()
                    });
                    $('.delete_data').text('Ya');
                } else {
                    $('#deleteModal').modal('hide');
                    $('.toast-delete-success').append(response.message);

                    const primarytoastDeleteSuccess = document.getElementById('primaryDeleteToast')
                    const toast = new bootstrap.Toast(primarytoastDeleteSuccess)
                    toast.show()

                    setTimeout("window.location='{{ route('Pekerjaan.index') }}'", 2500);
                }
            }
        });
    });
</script>

<script>
    (function () {
        "use strict"

        let checkAll = document.querySelector('.check-all');
        checkAll.addEventListener('click', checkAllFn)

        function checkAllFn() {
            if (checkAll.checked) {
                document.querySelectorAll('.task-checkbox input').forEach(function (e) {
                    e.closest('.task-list').classList.add('selected');
                    e.checked = true;
                });
            }
            else {
                document.querySelectorAll('.task-checkbox input').forEach(function (e) {
                    e.closest('.task-list').classList.remove('selected');
                    e.checked = false;
                });
            }
        }

    })();
</script>

<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">Tagihan Sewa</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Tagihan Dan Pembayaran</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Tagihan Sewa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Tagihan Sewa</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start::row-1 -->
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Detail Tagihan Sewa
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input class="form-check-input check-all" type="checkbox" id="all-tasks" value=""
                                        aria-label="...">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Nomor Tagihan</th>
                                <th scope="col">Jatuh Tempo</th>
                                <th scope="col">Jumlah Tagihan</th>
                                <th scope="col">Jumlah Denda</th>
                                <th scope="col">Total Tagihan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($tagihanDetail) && count($tagihanDetail) > 0)
                                @foreach ($tagihanDetail as $indexKey => $tD)
                                    <tr class="task-list">
                                        <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                                aria-label="..."></td>
                                        <td>
                                            <span class="fw-medium">{{ ++$indexKey }}/{{ count($tagihanDetail) }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-medium">{{ $tD->nomorTagihan }}</span>
                                        </td>
                                        <td>
                                            {{ date('d F Y', strtotime($tD->tanggalJatuhTempo)) }}
                                        </td>
                                        <td>
                                            {{ $tD->jumlahTagihan }}
                                        </td>
                                        <td>
                                            {{ $tD->jumlahDenda }}
                                        </td>
                                        <td>
                                            {{ $tD->totalTagihan }}
                                        </td>
                                        <td>
                                            @if($tD->idStatus == 9)
                                                <span class="fw-medium text-warning">{{ $tD->namaStatus }}</span>
                                            @elseif($tD->idStatus == 10)
                                                <span class="fw-medium text-danger">{{ $tD->namaStatus }}</span>
                                            @elseif($tD->idStatus == 11)
                                                <span class="fw-medium text-success">{{ $tD->namaStatus }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($tD->idStatus == 11)
                                                <button class="btn btn-success-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-success" data-bs-placement="left"
                                                    data-bs-title="Detail"><i class="ri-eye-line"></i></button>
                                            @else
                                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="left"
                                                    data-bs-title="Bayar"><i class="ri-file-check-line"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End::row-1 -->

<!-- Start:: Delete Pekerjaan-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Hapus Data</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteJenisStatusForm">
                @csrf
                <div class="modal-body">
                    <div class="text-center px-5 pb-0 svg-danger">
                        <svg class="custom-alert-icon" xmlns="http://www.w3.org/2000/svg" height="3.5rem"
                            viewBox="0 0 24 24" width="3.5rem" fill="#000000">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM12 17.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3.72 0 1.3.58 1.3 1.3 0 .72-.58 1.3-1.3 1.3zm1-4.3h-2V7h2v6z" />
                        </svg>

                        <h5>Anda yakin untuk menghapus data?</h5>
                    </div>
                    <input type="hidden" id="deleting_id" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger delete_data">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End:: Delete Pekerjaan -->

@endsection