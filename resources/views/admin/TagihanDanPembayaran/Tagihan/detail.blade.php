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
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>
                                <input class="form-check-input check-all" type="checkbox" id="all-tasks" value=""
                                    aria-label="...">
                            </th>
                            <th scope="col">Task</th>
                            <th scope="col">Task ID</th>
                            <th scope="col">Assigned Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Assigned To</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..."></td>
                            <td>
                                <span class="fw-medium">Design New Landing Page</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 01</span>
                            </td>
                            <td>
                                02-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-primary">New</span>
                            </td>
                            <td>
                                10-06-2024
                            </td>
                            <td>
                                <span class="badge bg-secondary-transparent">Medium</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/2.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/8.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/2.jpg" alt="img">
                                    </span>
                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white"
                                        href="javascript:void(0);">
                                        +2
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..." checked></td>
                            <td>
                                <span class="fw-medium">New Project Buleprint</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 04</span>
                            </td>
                            <td>
                                05-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-secondary">Inprogress</span>
                            </td>
                            <td>
                                15-06-2024
                            </td>
                            <td>
                                <span class="badge bg-danger-transparent">High</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/12.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/11.jpg" alt="img">
                                    </span>
                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white"
                                        href="javascript:void(0);">
                                        +4
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..."></td>
                            <td>
                                <span class="fw-medium">Server Side Validation</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 11</span>
                            </td>
                            <td>
                                12-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-warning">Pending</span>
                            </td>
                            <td>
                                16-06-2024
                            </td>
                            <td>
                                <span class="badge bg-success-transparent">Low</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/5.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/9.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/13.jpg" alt="img">
                                    </span>
                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white"
                                        href="javascript:void(0);">
                                        +5
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..."></td>
                            <td>
                                <span class="fw-medium">New Plugin Development</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 24</span>
                            </td>
                            <td>
                                08-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-success">Completed</span>
                            </td>
                            <td>
                                17-06-2024
                            </td>
                            <td>
                                <span class="badge bg-success-transparent">Low</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/2.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/8.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/2.jpg" alt="img">
                                    </span>
                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white"
                                        href="javascript:void(0);">
                                        +2
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..." checked></td>
                            <td>
                                <span class="fw-medium">Designing New Authentication Page</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 16</span>
                            </td>
                            <td>
                                03-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-secondary">Inprogress</span>
                            </td>
                            <td>
                                08-06-2024
                            </td>
                            <td>
                                <span class="badge bg-secondary-transparent">Medium</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/10.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/15.jpg" alt="img">
                                    </span>
                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white"
                                        href="javascript:void(0);">
                                        +3
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..." checked></td>
                            <td>
                                <span class="fw-medium">Documentation For New Template</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 07</span>
                            </td>
                            <td>
                                12-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-primary">New</span>
                            </td>
                            <td>
                                25-06-2024
                            </td>
                            <td>
                                <span class="badge bg-danger-transparent">High</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/12.jpg" alt="img">
                                    </span>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..."></td>
                            <td>
                                <span class="fw-medium">Updating Old UI</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 13</span>
                            </td>
                            <td>
                                06-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-success">Completed</span>
                            </td>
                            <td>
                                12-06-2024
                            </td>
                            <td>
                                <span class="badge bg-success-transparent">Low</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/11.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/1.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/10.jpg" alt="img">
                                    </span>
                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white"
                                        href="javascript:void(0);">
                                        +1
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..." checked></td>
                            <td>
                                <span class="fw-medium">Developing New Events In Plugins</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 20</span>
                            </td>
                            <td>
                                14-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-warning">Pending</span>
                            </td>
                            <td>
                                19-06-2024
                            </td>
                            <td>
                                <span class="badge bg-danger-transparent">High</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/9.jpg" alt="img">
                                    </span>
                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white"
                                        href="javascript:void(0);">
                                        +2
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..."></td>
                            <td>
                                <span class="fw-medium">Fixing Minor Ui Issues</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 26</span>
                            </td>
                            <td>
                                11-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-success">Completed</span>
                            </td>
                            <td>
                                18-06-2024
                            </td>
                            <td>
                                <span class="badge bg-secondary-transparent">Medium</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/5.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/14.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/12.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/3.jpg" alt="img">
                                    </span>
                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white"
                                        href="javascript:void(0);">
                                        +1
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                        <tr class="task-list">
                            <td class="task-checkbox"><input class="form-check-input" type="checkbox" value=""
                                    aria-label="..."></td>
                            <td>
                                <span class="fw-medium">Designing Of New Ecommerce Website</span>
                            </td>
                            <td>
                                <span class="fw-medium">SPK - 32</span>
                            </td>
                            <td>
                                03-06-2024
                            </td>
                            <td>
                                <span class="fw-medium text-secondary">Inprogress</span>
                            </td>
                            <td>
                                09-06-2024
                            </td>
                            <td>
                                <span class="badge bg-success-transparent">Low</span>
                            </td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/12.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                                        <img src="../assets/images/faces/6.jpg" alt="img">
                                    </span>
                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white"
                                        href="javascript:void(0);">
                                        +4
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"><i class="ri-edit-line"></i></button>
                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn"><i
                                        class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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