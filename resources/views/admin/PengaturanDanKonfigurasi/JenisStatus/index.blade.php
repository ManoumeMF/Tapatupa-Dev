@extends('layouts.admin.template')
@section('content')


<!-- Page Header -->
<div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">Jenis Status</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb breadcrumb-example1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pengatusan & Konfigurasi</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">General</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jenis Status</li>
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
                    Daftar Jenis Status
                </div>
                <div class="prism-toggle">
                    <button type="button" class="btn btn-primary btn-wave waves-effect waves-light">
                        <i class="ri-add-line align-middle me-1 fw-medium"></i> Tambah Jenis Status
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>Jenis Status</th>
                            <th>Keterangan</th>
                            <th class="text-center" style="width: 10px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bella</td>
                            <td>Chloe</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Donna</td>
                            <td>Bond</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Harry</td>
                            <td>Carr</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Lucas</td>
                            <td>Dyer</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Karen</td>
                            <td>Hill</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Dominic</td>
                            <td>Hudson</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Herrod</td>
                            <td>Chandler</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jonathan</td>
                            <td>Ince</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Leonard</td>
                            <td>Ellison</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Madeleine</td>
                            <td>Lee</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Karen</td>
                            <td>Miller</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Lisa</td>
                            <td>Smith</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Morgan</td>
                            <td>Keith</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nathan</td>
                            <td>Mills</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Ruth</td>
                            <td>May</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Penelope</td>
                            <td>Ogden</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sean</td>
                            <td>Piper</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Trevor</td>
                            <td>Ross</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Vanessa</td>
                            <td>Robertson</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Una</td>
                            <td>Richard</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Justin</td>
                            <td>Peters</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Adrian</td>
                            <td>Terry</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li>
                                            <button type="button" value="" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#detail-jenis-status">
                                                <i class="ri-eye-line me-1 align-middle d-inline-block"></i>Detail
                                            </button>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Hapus</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Ubah</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Cameron</td>
                            <td>Watson</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Evan</td>
                            <td>Terry</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Angelica</td>
                            <td>Ramos</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Connor</td>
                            <td>Johne</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jennifer</td>
                            <td>Chang</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Brenden</td>
                            <td>Wagner</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Fiona</td>
                            <td>Green</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Shou</td>
                            <td>Itou</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Michelle</td>
                            <td>House</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki</td>
                            <td>Burks</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Prescott</td>
                            <td>Bartlett</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Gavin</td>
                            <td>Cortez</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Martena</td>
                            <td>Mccray</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Unity</td>
                            <td>Butler</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Howard</td>
                            <td>Hatfield</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Hope</td>
                            <td>Fuentes</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Vivian</td>
                            <td>Harrell</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Timothy</td>
                            <td>Mooney</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jackson</td>
                            <td>Bradshaw</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Olivia</td>
                            <td>Liang</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Bruno</td>
                            <td>Nash</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sakura</td>
                            <td>Yamamoto</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Thor</td>
                            <td>Walton</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Finn</td>
                            <td>Camacho</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Serge</td>
                            <td>Baldwin</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Zenaida</td>
                            <td>Frank</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Zorita</td>
                            <td>Serrano</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jennifer</td>
                            <td>Acosta</td>
                            <td>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-align-justify"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Hapus</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Ubah</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--End::row-1 -->

<!-- Start:: Create Contact -->
<div class="modal fade" id="detail-jenis-status" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Detail Jenis Status</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                <div class="d-flex gap-3">
                    <div class="flex-fill">
                        <h6 class="mb-1 fs-13">Jenis Status</h6>
                        <span class="d-block fs-13 text-muted fw-normal">Jenis Status 1.</span>
                    </div>
                </div>
            </div>
            <div class="modal-body px-4">
                <div class="d-flex gap-3">
                    <div class="flex-fill">
                        <h6 class="mb-1 fs-13">Keterangan</h6>
                        <span class="d-block fs-13 text-muted fw-normal">Keterangan Jenis Status 1.</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Create Contact -->

@endsection