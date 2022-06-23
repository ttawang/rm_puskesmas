@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <!-- general form elements -->
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">LAPORAN SENSUS HARIAN</h3>
                        </div>
                        <form id="form_cetak1">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label  text-secondary">Periode :</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <input type="date" class="form-control" name="tgl_awal">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row"> --}}
                                        {{-- <label class="col-sm-4 col-form-label  text-secondary">Tanggal Akhir :</label> --}}
                                        {{-- <div class="col-sm-8"> --}}
                                            {{-- <div class="input-group date"> --}}
                                                {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                                {{-- <input type="date" class="form-control" name="tgl_akhir"> --}}
                                                    {{-- <div class="input-group-append">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div> --}}
                                            {{-- </div> --}}
                                        {{-- </div> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="modal-footer">
                                {{-- <button type="button" id="lihat1" class="btn btn-info"><i class="fa fa-print"></i>  Lihat</button> --}}
                                <button type="button" id="cetak1" class="btn btn-warning"><i class="fa fa-print"></i>  Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Forn Report Builder Bulanan -->
                <div class="col-8">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">LAPORAN SENSUS BULANAN</h3>
                        </div>
                        <form id="form_cetak_bulanan">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label  text-secondary">Periode Awal:</label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                                <input type="date" class="form-control" name="periode_awal">
                                            </div>
                                        </div>
                                        <label class="col-sm-1 col-form-label  text-secondary text-center">s.d </label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                                <input type="date" class="form-control" name="periode_akhir">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cetakReportBulanan" class="btn btn-warning">
                                    <i class="fa fa-print"></i>  Cetak
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('laporan.laporan-script')
@endsection
