@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="card-body">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card bg-light">
                        <div class="card-header">
                        <h3 class="card-title font-weight-bold">SEPULUH BESAR PENYAKIT</h3>
                        </div>
                        <form>
                        <div class="card-body">
                            <div class="form-group">
                            <label>Date range:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation">
                            </div>
                            <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info">Lihat</button>
                            <button type="button" class="btn btn-warning"><i class="fa fa-print"></i>  Cetak</button>
                        </div>
                        </form>
                    </div>

                    <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">PEMAKAIAN OBAT</h3>
                        </div>
                        <form>
                            <div class="card-body">
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                            </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-info">Lihat</button>
                            <button type="button" class="btn btn-warning"><i class="fa fa-print"></i>  Cetak</button>
                            </div>
                        </form>
                        </div>
                </div>
            </div>

            <div class="card-body">
                <div class="col-md-12">
                        <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">KUNJUNGAN PASIEN</h3>
                        </div>
                        <form>
                            <div class="card-body">
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                            </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-info">Lihat</button>
                            <button type="button" class="btn btn-warning"><i class="fa fa-print"></i>  Cetak</button>
                            </div>
                        </form>
                        </div>

                        <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">HASIL PEMERIKSAAN PASIEN</h3>
                        </div>
                        <form>
                            <div class="card-body">
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                            </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-info">Lihat</button>
                            <button type="button" class="btn btn-warning"><i class="fa fa-print"></i>  Cetak</button>
                            </div>
                        </form>
                        </div>
                </div>
            </div>




                            <thead>

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
</div>
@endsection
