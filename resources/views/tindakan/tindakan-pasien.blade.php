@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Tindakan Pasien
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>
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
                                    {{-- <th>DOKTER</th> --}}
                                    {{-- <th>ANAMNESIS</th>
                                    <th>TINDAKAN</th>
                                    <th>DIAGNOSIS</th>
                                    <th>OBAT</th> --}}
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

<!--div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"-->
<div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <select class="form-control select-cari-modal" name="no_registrasi_tambah" id="id_no_registrasi">
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
                            <label class="col-sm-4 col-form-label text-secondary">Dokter</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="dokter" id="dokter">
                                    <option value="0" selected>Pilih Dokter</option>
                                    @foreach ($dokter as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Anamnesis</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" name="anamnesis" placeholder="Anamnesis"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Tindakan</label>
                            <div class="col-sm-8">
                                <select value="0" class="form-control select-cari-modal" name="tindakan" id="tindakan">
                                    <option value="0" selected>Pilih Tindakan</option>
                                    @foreach ($tindakan as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Diagnosis</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="diagnosa" id="diagnosa">
                                    <option value="0" selected>Pilih Diagnosa</option>
                                    @foreach ($diagnosa as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Terapi Obat</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="obat" id="obat">
                                    <option value="0" selected>Pilih Obat</option>
                                    @foreach ($obat as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
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
                <h5 class="modal-title" id="modal_tambah_dataLabel">Form Rujukan Pasien</h5>
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
                                <input type="text" class="form-control" id="rujuk_no_registrasi" disabled placeholder="Nama Pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">No Rekam Medis</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rujuk_no_rekam_medis" disabled placeholder="Nama Pasien">
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
                                <select class="form-control select-cari-modal" name="rujuk_kriteria">
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
                <button type="button" id="btn_simpan_rujuk" class="btn btn-primary">Simpan Rujuk</button>
            </div>
            {{-- </form> --}}
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
    var tb = $('#tabel_registrasi_pasien').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('tindakan/tindakan-pasien/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'tgl_registrasi', name: 'tgl_registrasi'},
            {data: 'no_registrasi', name: 'no_registrasi'},
            {data: 'no_redis', name: 'no_redis'},
            {data: 'nama_pasien', name: 'nama_pasien'},
            {data: 'keluhan', name: 'keluhan'},
            {data: 'nama_poli', name: 'nama_poli'},
            // {data: 'nama_dokter', name: 'nama_dokter'},
            // {data: 'anamnesis', name: 'anamnesis'},
            // {data: 'nama_pemeriksaan', name: 'nama_pemeriksaan'},
            // {data: 'nama_diagnosa', name: 'nama_diagnosa'},
            // {data: 'nama_obat', name: 'nama_obat'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ],
        columnDefs: [
            { className: 'text-right', targets: [] },
            { className: 'text-center', targets: [7] },
            { width:80, targets:[7]},
	    ],

    });
    $('#id_no_registrasi').on('change', function() {
        if ( this.value > 0){
            var id = $('[name=no_registrasi_tambah]').val();
            $("#formalitasajalah").show();
            $("#toket").show();

            $.get("{{ url('tindakan/tindakan-pasien/get_data_pasien') }}"+'/'+id, function (data) {
                $("#modal_tambah_data").modal("show");
                $('#tgl_kunjungan').html(formattanggal(data.tgl_kunjungan));
                $('#nama_pasien').html(data.nama_pasien);
                $('#no_redis').html(data.no_redis);
                $('#nama_unit').html(data.nama_unit);
            })
        }
        else{
            $("#formalitasajalah").hide();
            $("#toket").hide();
        }
    });
    //SHOW MODAL/FORM
    $("#btn_tambah").click(function(){
        $("#modal_tambah_data").modal("show");
        $("#div_no_regis").show();
        $("#formalitasajalah").hide();
    })
    $('body').on('click', '#btn_rujuk', function () {
        $("#modal_tambah_rujukan").modal("show");
        var id = $(this).data('id');
        $.get("{{ url('tindakan/tindakan-pasien/rujuk') }}"+'/'+id, function (data) {
            $("#modal_tambah_rujuk").modal("show");
            $('[name=rujuk_id_tindakan]').val(data.id_tindakan);
            $('[name=rujuk_id_rujukan]').val(data.id_rujukan);
            $('[name=rujuk_no_rujukan]').val(no_regisrujuk(data.no_registrasi));
            $('#rujuk_no_rekam_medis').val(data.no_rekam_medis);
            $('#rujuk_no_registrasi').val(data.no_registrasi);
            $('#rujuk_anamnesis').val(data.anamnesis);
            $('#rujuk_usia').val(umur(data.tgl_lahir));
            $('#rujuk_diagnosa').val(data.nama_diagnosa);
            $('#rujuk_obat').val(data.nama_obat);
            $('#rujuk_nama_pasien').val(data.nama_pasien);
            $('#rujuk_jenis_kelamin').val(data.jenis_kelamin);
            $('#rujuk_kasta').val(data.kasta);
        });
    })

    //ShOW MODAL/FORM DENGAN GETTING DATA BERDASARKAN ID
    $('body').on('click', '#btn_edit', function () {
        var id = $(this).data('id');
        $("#toket").show();
        $("#div_no_regis").hide();
        $("#formalitasajalah").hide();

        $.get("{{ url('tindakan/tindakan-pasien/edit') }}"+'/'+id, function (data) {
            $("#modal_tambah_data").modal("show");
            $('#tgl_kunjungan').html(formattanggal(data.tgl_kunjungan));
            $('#nama_pasien').html(data.nama_pasien);
            $('#no_redis').html(data.no_redis);
            $('#nama_unit').html(data.nama_unit);
            $('[name=id]').val(data.id);
            $('[name=no_registrasi_edit]').val(data.id_registrasi);
            $('[name=dokter]').val(data.id_dokter).trigger('change');
            $('[name=anamnesis]').val(data.anamnesis);
            $('[name=tindakan]').val(data.id_pemeriksaan).trigger('change');
            $('[name=diagnosa]').val(data.id_diagnosa).trigger('change');
            $('[name=obat]').val(data.id_obat).trigger('change');
        });
    });

    //MELAKUKAN CONTROLLER SIMPAN
    $("#btn_simpan").click(function(){
        $.ajax({
            url: "{{ url('tindakan/tindakan-pasien/simpan')}} ",
            type:'POST',
            data: $("#form_tambah").serialize(),
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(respon){
				if(respon.status == 1 || respon.status == "1"){
					$("#modal_tambah_data").modal('hide');
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil diperbarui.',
                        type: "success"
                    }).then((result) => {
                        tb.ajax.reload();
                    })
                }else{
                    $("#modal_tambah_data").modal('hide');
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Data gagal diperbarui.',
                        type: "error"
                    }).then((result) => {
                        tb.ajax.reload();
                    })
				}
			}

        });
        // location.reload();
    })
    $("#btn_simpan_rujuk").click(function(){
        $.ajax({
            url: "{{ url('tindakan/tindakan-pasien/simpanrujuk')}} ",
            type:'POST',
            data: $("#form_rujuk").serialize(),
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(respon){
				if(respon.status == 1 || respon.status == "1"){
					$("#modal_tambah_rujukan").modal('hide');
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil diperbarui.',
                        type: "success"
                    }).then((result) => {
                        tb.ajax.reload();
                    })
                }else{
                    $("#modal_tambah_rujukan").modal('hide');
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Data gagal diperbarui.',
                        type: "error"
                    }).then((result) => {
                        tb.ajax.reload();
                    })
				}
			}

        });
    })
    $('body').on('click', '#btn_edit_rujuk', function () {
        var id = $(this).data('id');

        $.get("{{ url('tindakan/tindakan-pasien/editrujuk') }}"+'/'+id, function (data) {
            $("#modal_tambah_rujukan").modal("show");
            $('[name=rujuk_id_tindakan]').val(data.id_tindakan);
            $('[name=rujuk_id_rujukan]').val(data.id_rujukan);
            $('[name=rujuk_no_rujukan]').val(data.no_rujuk);
            $('[name=rujuk_poli]').val(data.poli_tujuan);
            $('[name=rujuk_rumah_sakit]').val(data.rs_tujuan);
            $('[name=rujuk_alasan]').val(data.alasan);
            $('[name=rujuk_kriteria]').val(data.kriteria).trigger('change');
            $('#rujuk_no_rekam_medis').val(data.no_rekam_medis);
            $('#rujuk_no_registrasi').val(data.no_registrasi);
            $('#rujuk_anamnesis').val(data.anamnesis);
            $('#rujuk_usia').val(umur(data.tgl_lahir));
            $('#rujuk_diagnosa').val(data.nama_diagnosa);
            $('#rujuk_obat').val(data.nama_obat);
            $('#rujuk_nama_pasien').val(data.nama_pasien);
            $('#rujuk_jenis_kelamin').val(data.jenis_kelamin);
            $('#rujuk_kasta').val(data.kasta);
        });
    })

    $('body').on('click', '#btn_hapus', function () {
        Swal.fire({
        title: 'Data akan dihapus !',
        text: "Data yang telah dihapus tidak dapat dikembalikan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).data('id');
                $.get("{{ url('tindakan/tindakan-pasien/hapus') }}"+'/'+id);
                Swal.fire(
                'Deleted!',
                'Data telah dihapus',
                'success'
                )
                tb.ajax.reload();
            }
        })
    });

});

</script>

@endsection
