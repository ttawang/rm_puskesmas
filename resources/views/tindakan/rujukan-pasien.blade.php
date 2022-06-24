@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Daftar Rujukan Pasien
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>
                        <p>
                        <table id="tabel_tindakan_rujukan" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TGL-REG</th>
                                    <th>NAMA PASIEN</th>
                                    <th>PEMERIKSAAN YANG DIINGINKAN</th>
                                    <th>ASAL POLI</th>
                                    <th>TINDAKAN</th>
                                    <th>AKSI</th>
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

<!--div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"-->
<div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    {{-- <div class="modal fade" id="modal_tambah_data"> --}}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_tambah_dataLabel">Tindakan Pasien Rujukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form_tambah">
                    @csrf
                        <input type="hidden" name="id">

                        <div class="card-body">
                            <div class="form-group row"  id="div_no_regis">
                                <label class="col-sm-4 col-form-label text-secondary">No. Registrasi</label>
                                <div class="col-sm-8">
                                    <select class="form-control no_registrasi" name="no_registrasi_tambah" id="id_no_registrasi">
                                        <option value="0" selected>Pilih No. Registrasi</option>
                                        {{-- @foreach ($no_registrasi as $i)
                                            <option value="{{ $i->id }}">{{ $i->no_registrasi }}</option>
                                        @endforeach --}}
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
                                        {{-- @foreach ($dokter as $i)
                                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label text-secondary">Tindakan</label>
                                <div class="col">
                                    <select value="0" class="form-control tindakan" name="tindakan" id="tindakan">
                                        <option value="0" selected>Pilih Tindakan</option>
                                        {{-- @foreach ($tindakan as $i)
                                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                        @endforeach --}}
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
                                        {{-- @foreach ($diagnosa as $i)
                                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                        @endforeach --}}
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
                                        {{-- @foreach ($obat as $i)
                                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                        @endforeach --}}
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



<script type="text/javascript">
$(document).ready(function () {
    $("#toket").hide();
    $("#modal_tambah_data").on("hidden.bs.modal", function(){
        $(this).find("input,textarea").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
        $(".select-cari-modal").val(0).trigger('change') ;
    });
    //MENAMPILKAN DATA DENGAN DATATABLES
    var tb = $('#tabel_rujukan_pasien').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('tindakan/rujukan-pasien/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'tgl_request', name: 'tgl_request'},
            // {data: 'nama_pasien', name: 'nama_pasien'},
            // {data: 'pemeriksaan', name: 'pemeriksaan'},
            // {data: 'hasil', name: 'hasil'},
            // {data: 'nilai', name: 'nilai'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ]
    });

    $("#btn_tambah").click(function(){
        $("#modal_tambah_data").modal("show");
    })

});

</script>

@endsection
