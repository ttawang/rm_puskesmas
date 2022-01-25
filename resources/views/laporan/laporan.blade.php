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
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label  text-secondary">Tanggal Awal :</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date">
                                            {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                            <input type="text" class="form-control" name="tgl_awal">
                                                {{-- <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label  text-secondary">Tanggal Akhir :</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date">
                                            {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                            <input type="text" class="form-control" name="tgl_akhir">
                                                {{-- <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer">
                            <a href="{{url('laporan/laporan-sepuluhbesar')}}" type="button" class="btn btn-info">Lihat</a>
                            <button type="button" class="btn btn-warning"><i class="fa fa-print"></i>  Cetak</button>
                        </div>
                        </form>
                    </div>
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">PEMERIKSAAN LABORATORIUM</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label  text-secondary">Tanggal Awal :</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                                <input type="text" class="form-control" name="tgl_awal">
                                                    {{-- <div class="input-group-append">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label  text-secondary">Tanggal Akhir :</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                                <input type="text" class="form-control" name="tgl_akhir">
                                                    {{-- <div class="input-group-append">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div> --}}
                                            </div>
                                        </div>
                                    </div>
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
                        <h3 class="card-title font-weight-bold">HASIL PEMERIKSAAN PASIEN</h3>
                    </div>
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label  text-secondary">Tanggal Awal :</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date">
                                            {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                            <input type="text" class="form-control" name="tgl_awal">
                                                {{-- <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label  text-secondary">Tanggal Akhir :</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date">
                                            {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                            <input type="text" class="form-control" name="tgl_akhir">
                                                {{-- <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
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
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label  text-secondary">Tanggal Awal :</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date">
                                            {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                            <input type="text" class="form-control" name="tgl_awal">
                                                {{-- <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label  text-secondary">Tanggal Akhir :</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date">
                                            {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                            <input type="text" class="form-control" name="tgl_akhir">
                                                {{-- <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer">
                        <a href="{{url('laporan/laporankunjungan')}}" type="button" class="btn btn-info">Lihat</a>
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
