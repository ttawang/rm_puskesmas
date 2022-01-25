@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Pemeriksaan Laboratorium
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>
                        <p>
                        <table id="tabel_pemeriksaan_lab" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TGL-REG</th>
                                    <th>NO-REG</th>
                                    <th>NAMA PASIEN</th>
                                    <th>JENIS PEMERIKSAAN</th>
                                    <th>HASIL</th>
                                    <th>NILAI NORMAL</th>
                                    <th>KETERANGAN PENUNJANG</th>
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
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Tambah Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form class="form-horizontal" action="{{url('laboratorium/pemeriksaan-lab/simpan')}}" method="POST"-->
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
                            <label class="col-sm-4 col-form-label text-secondary">Penanggung Jawab</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="dokter" id="dokter">
                                    <option value="0" selected>Pilih Dokter</option>
                                    {{-- @foreach ($dokter as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Jenis Pemeriksaan</label>
                            <div class="col-sm-8">
                                <select value="0" class="form-control select-cari-modal" name="tindakan" id="tindakan">
                                    <option value="0" selected>Pilih</option>
                                    {{-- @foreach ($tindakan as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Hasil</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" name="hasil" placeholder="Hasil"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Nilai Normal</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" name="nilai_normal" placeholder="Nilai Normal"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Diagnosis</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="diagnosa" id="diagnosa">
                                    <option value="0" selected>Pilih Diagnosa</option>
                                    {{-- @foreach ($diagnosa as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach --}}
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
            {data: 'nama_pasien', name: 'nama_pasien'},
            {data: 'nama_poli', name: 'nama_poli'},
            {data: 'nama_dokter', name: 'nama_dokter'},
            {data: 'anamnesis', name: 'anamnesis'},
            {data: 'nama_pemeriksaan', name: 'nama_pemeriksaan'},
            {data: 'nama_diagnosa', name: 'nama_diagnosa'},
            {data: 'nama_obat', name: 'nama_obat'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ]
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
