@extends('layouts.app')

@section('content')
<style>

</style>


<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Daftar Tindakan Pasien
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" id="btn_tambah">Tambah Tindakan</button>
                        <p>
                        <table id="tabel_registrasi_pasien" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TGL-REG</th>
                                    <th>NO-REG</th>
                                    <th>NO. REKAM MEDIS</th>
                                    <th>NAMA PASIEN</th>
                                    <th>KELUHAN</th>
                                    <th>POLI</th>
                                    <th>ACTION</th>
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
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Daftar Permintaan Cek Laboratorium
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" id="btn_tambah_labo">Tambah Permintaan</button>
                        <p>
                        <table id="tabel_permintaan_lab" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TGL-REG</th>
                                    <th>NO. REKAM MEDIS</th>
                                    <th>NAMA PASIEN</th>
                                    <th>PEMERIKSAAN</th>
                                    <th>KETERANGAN</th>
                                    <th>ACTION</th>
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
{{-- <div class="modal fade" id="modal_tambah_data"> --}}
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Tindak Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form class="form-horizontal" action="{{url('tindakan/tindakan-pasien/simpan')}}" method="POST"-->
                <form class="form-horizontal" id="form_tambah">
                @csrf
                    <input type="hidden" name="id">

                    <div class="card-body">
                        <div class="form-group row"  id="div_no_regis">
                            <label class="col-sm-4 col-form-label text-secondary">No. Registrasi</label>
                            <div class="col-sm-8">
                                <select class="form-control no_registrasi" name="no_registrasi_tambah" id="id_no_registrasi">
                                    <option value="0" selected>Pilih No. Registrasi</option>
                                    @foreach ($no_registrasi as $i)
                                        <option value="{{ $i->id }}">{{ $i->no_registrasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="formalitasajalah">
                            <br>
                            <hr>
                            <br>
                        </div>
                    <div id="toket">
                        <input type="hidden" name="no_registrasi_edit">
                        <div class="form-group row">
                            <div class="col-sm-3 text-secondary"><b>Tanggal Registrasi: </b></div>
                            <div class="col-sm-3" id="tgl_kunjungan"></div>
                            <input type="hidden" name="tgl_kunjungan">
                            <label class="col-sm-3 text-secondary">Nama Pasien: </label>
                            <div class="col-sm-3" id="nama_pasien"></div>
                            <input type="hidden" name="nama_pasien">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 text-secondary"><b>No. Rekam Medis: </b></div>
                            <div class="col-sm-3" id="no_redis"></div>
                            <input type="hidden" name="no_redis">
                            <label class="col-sm-3 text-secondary">Poli: </label>
                            <div class="col-sm-3" id="nama_unit"></div>
                            <input type="hidden" name="nama_unit">
                        </div>

                        <hr>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-secondary">Dokter</label>
                            <div class="col">
                                <select class="form-control dokter select2-container" name="dokter" id="dokter">
                                    <option value="0" selected>Pilih Dokter</option>
                                    @foreach ($dokter as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label text-secondary">Tindakan</label>
                            <div class="col">
                                <select value="0" class="form-control tindakan" name="tindakan" id="tindakan">
                                    <option value="0" selected>Pilih Tindakan</option>
                                    @foreach ($tindakan as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label  text-secondary">Anamnesis</label>
                            <div class="col">
                                <textarea type="text" class="form-control" name="anamnesis" placeholder="Anamnesis"></textarea>
                            </div>
                            <label class="col-sm-2 col-form-label text-secondary">Diagnosis</label>
                            <div class="col">
                                <select class="form-control diagnosa" name="diagnosa" id="diagnosa">
                                    <option value="0" selected>Pilih Diagnosa</option>
                                    @foreach ($diagnosa as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col col-form-label  text-secondary">Terapi Obat</label>
                            <label class="col col-form-label text-secondary">Jumlah Obat</label>
                            <label class="col col-form-label  text-secondary">Aturan Pakai</label>
                            <label class="col col-form-label  text-secondary">Keterangan</label>
                        </div>
                        <div id="inilo">
                        <div class="form-group row" id="row_obat[]">
                            <div class="col">
                                <select class="form-control obat" name="obat[]" id="obat">
                                    <option value="0" selected>Pilih Obat</option>
                                    @foreach ($obat as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="jumlah_obat[]" placeholder="Jumlah Obat">
                            </div>
                            <div class="col">
                                <select class="form-control" name="aturan_pakai[]" id="aturan_pakai">
                                    <option value="0" selected>Pilih</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="ket_obat[]" placeholder="Keterangan">
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <button type="button"  class="btn btn-success btn-sm" id="tambah_obat">+</button>
                                <button type="button"  class="btn btn-warning btn-sm" id="kurang_obat">-</button>
                            </div>

                        </div>
                    </div>
                    {{-- api bumi air udara, avatar menghilang --}}
                    </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--button type="submit" class="btn btn-primary">Save</button-->
                <button type="button" id="btn_simpan" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_tambah_rujukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Form Rujukan Eksternal Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_rujuk">
                @csrf
                    <input type="hidden" name="rujuk_id_rujukan">
                    <input type="hidden" name="rujuk_id_tindakan">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">No Rujukan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="rujuk_no_rujukan" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Kepada Yth. Poli</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="rujuk_poli" placeholder="Tujuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Rumah sakit</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="rujuk_rumah_sakit" placeholder="Rumah Sakit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">No Registrasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_no_registrasi" disabled placeholder="No. Registrasi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">No Rekam Medis</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_no_rekam_medis" disabled placeholder="No. Rekam Medis">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Nama Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_nama_pasien" disabled placeholder="Nama Pasien">
                                <input type="hidden" class="form-" name="id_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Usia</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_usia" disabled placeholder="Usia">
                                <input type="hidden" class="form-" name="usia_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_jenis_kelamin" disabled placeholder="Jenis Kelamin">
                                <input type="hidden" class="form-" name="jk_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Status Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_kasta" disabled placeholder="Status Pasien">
                                <input type="hidden" class="form-" name="status_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Anamnesa</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="rujuk_anamnesis" disabled placeholder="Anamnesa"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Diagnosa Sementara</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_diagnosa" disabled placeholder="Diagnosa Sementara">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Telah diberikan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="rujuk_obat" disabled placeholder="Tindakan/ Obat"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Alasan Dirujuk</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" name="rujuk_alasan" placeholder="Alasan dirujuk"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Kriteria</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="rujuk_kriteria">
                                    <option selected>Pilih</option>
                                    <option value="EMERGENCY">EMERGENCY</option>
                                    <option value="LANJUTAN">PEMERIKSAAN LANJUTAN</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--button type="submit" class="btn btn-primary">Save</button-->
                <button type="button" id="" class="btn btn-success">Simpan & Cetak</button>
                <button type="button" id="btn_simpan_rujuk" class="btn btn-primary">Simpan Rujuk</button>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
<div class="modal fade" id="modal_tambah_rujukan_internal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Form Rujukan Internal Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_rujuk_internal">
                @csrf
                    <input type="hidden" name="rujuk_internal_id_rujukan">
                    <input type="hidden" name="rujuk_internal_id_tindakan">
                    <input type="hidden" name="rujuk_internal_tipe" value="internal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Poli Pengirim</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_internal_poli_pengirim" disabled placeholder="Poli Pengirim">
                                <input type="hidden" class="form-" name="in_rujuk_internal_poli_pengirim">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Poli yang dituju</label>
                            <div class="col-sm-8">
                                <select class="form-control rujuk_internal_poli_tujuan" name="rujuk_internal_poli_tujuan">
                                    <option value="0" selected>Pilih Poli Tujuan</option>
                                    @foreach ($rujuk_internal_poli_tujuan as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Nama Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_internal_nama_pasien" disabled placeholder="Nama Pasien">
                                <input type="hidden" class="form-" name="in_rujuk_internal_id_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Usia</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_internal_usia" disabled placeholder="Usia">
                                <input type="hidden" class="form-" name="in_rujuk_internal_usia_usia">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_internal_jenis_kelamin" disabled placeholder="Jenis Kelamin">
                                <input type="hidden" class="form-" name="in_rujuk_internal_jenis_kelamin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_internal_alamat" disabled placeholder="Alamat">
                                <input type="hidden" class="form-" name="in_rujuk_internal_alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Lakukan Pemeriksaan</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" name="rujuk_internal_pemeriksaan" placeholder="Lakukan Pemeriksaan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Petugas</label>
                            <div class="col-sm-8">
                                <select class="form-control rujuk_internal_petugas" name="rujuk_internal_petugas">
                                    @foreach ($rujuk_internal_petugas as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--button type="submit" class="btn btn-primary">Save</button-->
                <button type="button" id="" class="btn btn-success">Simpan & Cetak</button>
                <button type="button" id="btn_simpan_rujuk_internal" class="btn btn-primary">Simpan Rujuk</button>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
<div class="modal fade" id="modal_tambah_labo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Form Permintaan Cek Laboratorium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_lab">
                @csrf
                    <input type="hidden" name="lab_id_tindakan">
                    <input type="hidden" name="lab_id_permintaan">
                    <div class="card-body">
                        {{-- <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">No Registrasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lab_no_registrasi" disabled placeholder="No. Registrasi">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label  text-secondary">Tanggal</label>
                            <div class="col-sm-10">
                                <div class="input-group date">
                                    {{-- <input type="text" class="form-control datetimepicker-input" value="{{date('d/m/Y')}}" readonly> --}}
                                    <input type="text" class="form-control" name="tgl_registrasi" readonly>
                                        {{-- <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-secondary">No Rekam Medis</label>
                            <div class="col">
                                <select class="form-control select-cari-modal" name="no_rekammedis" id="id_no_rekammedis">
                                    <option value="0" selected>Cari No. Rekam Medis</option>
                                {{-- @foreach ($pasien as $i)
                                    <option value="{{ $i->kode_pasien }}">{{ $i->kode_pasien }}</option>
                                @endforeach --}}
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label text-secondary">Tindakan</label>
                            <div class="col">
                                <input type="text" class="form-control" id="lab_nama_pasien" disabled placeholder="Nama Pasien">
                                <input type="hidden" class="form-" name="id_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label  text-secondary">Dokter</label>
                            <div class="col">
                                <select class="form-control labo_dokter_pengirim" name="labo_dokter_pengirim">
                                    <option value="0" selected>Cari Dokter</option>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label  text-secondary">Petugas</label>
                            <div class="col">
                                <select class="form-control labo_permintaan_petugas" name="labo_permintaan_petugas">
                                    <option value="0" selected>Cari Petugas</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label  text-secondary">Pemeriksaan</label>
                            <div class="col-sm-10">
                                <select class="form-control select-cari-modal" name="lab_pemeriksaan" id="pemeriksaan">
                                    <option value="0" selected>Pilih</option>
                                    {{-- @foreach ($jenis as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <button type="button"  class="btn btn-success btn-sm" id="tambah_pemeriksaan">+</button>
                                <button type="button"  class="btn btn-warning btn-sm" id="kurang_pemeriksaan">-</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label  text-secondary">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--button type="submit" class="btn btn-primary">Save</button-->
                <button type="button" id="btn_simpan_lab" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_pilih_rujukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Rujukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_pilih_rujukan">
                @csrf
                    <input type="hidden" id="id_pilih_rujukan">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Pilih Rujukan</label>
                            <div class="col-sm-8">
                                <select class="form-control select_pilih_rujukan" name="pilih_rujukan" id="pilih_rujukan">
                                    <option value="internal" selected>Rujukan Internal</option>
                                    <option value="eksternal">Rujukan Eksternal</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--button type="submit" class="btn btn-primary">Save</button-->
                <button type="button" id="btn_pilih_rujukan" class="btn btn-primary">Pilih</button>
            </div>
            </form>
        </div>
    </div>
</div>


@include('tindakan.tindakan-pasien-script')

@endsection
