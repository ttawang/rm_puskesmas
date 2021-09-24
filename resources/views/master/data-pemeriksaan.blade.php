@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Data Pemeriksaan
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button>
                        <p>
                        <table id="tabel_pasien" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Jenis Pemeriksaan</th>
                                    <th>Kode Unit</th>
                                    <th>Kode Pemeriksaan</th>
                                    <th>Nama Pemeriksaan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pemeriksaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Kode Jenis Pemeriksaan</label>
                            <div class="col-sm-8">
                                <select class="custom-select rounded-0  text-secondary">
                                    <option selected>Pilih Kode</option>
                                    <option value="poli">Poli</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Kode Unit</label>
                            <div class="col-sm-8">
                                <select class="custom-select rounded-0  text-secondary">
                                    <option selected>Pilih Kode</option>
                                    <option value="poli">Poli</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Kode Pemeriksaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_pemeriksaan" placeholder="Kode Pemeriksaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Nama Pemeriksaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_pemeriksaan" placeholder="Nama Pemeriksaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Keterangan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.2/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/date-1.1.1/fc-3.3.3/fh-3.1.9/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.1/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>

@endsection