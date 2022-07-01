@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Daftar Pemeriksaan Laboratorium
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button-->
                        {{-- <button type="button" class="btn btn-primary" id="btn_tambah">Tambah Pemeriksaan</button> --}}
                        <p>
                        <table id="tabel_pemeriksaan_lab" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TGL-REG</th>
                                    <th>NAMA PASIEN</th>
                                    <th>PEMERIKSAAN</th>
                                    <th>HASIL</th>
                                    <th>NILAI NORMAL</th>
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
<div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Form Pemeriksaan Laboratorium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_x">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_tambah">
                @csrf
                    <input type="hidden" name="id_request_lab" id="id_request_lab">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-3 text-secondary"><b>Tanggal: </b></div>
                            <div class="col-sm-3" id="tgl_registrasi"></div>
                            <label class="col-sm-3 text-secondary">Nama Pasien: </label>
                            <div class="col-sm-3" id="nama_pasien"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 text-secondary"><b>Dokter Pengirim: </b></div>
                            <div class="col-sm-3" id="dokter_pengirim"></div>
                            <label class="col-sm-3 text-secondary">Usia: </label>
                            <div class="col-sm-3" id="nama_usia"></div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-secondary">Pemeriksa</label>
                            <div class="col-sm-4">
                                <select class="form-control dokter select2-container" name="pemeriksa" id="pemeriksa">
                                    <option value="0" selected>Pilih</option>
                                    @foreach ($petugas as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div id="var">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btn_simpan" class="btn btn-primary">Save</button>
                    </div>
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
    var tb = $('#tabel_pemeriksaan_lab').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('laboratorium/pemeriksaan-lab/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'tgl_request', name: 'tgl_request'},
            {data: 'nama_pasien', name: 'nama_pasien'},
            {data: 'pemeriksaan', name: 'pemeriksaan'},
            {data: 'hasil', name: 'hasil'},
            {data: 'nilai', name: 'nilai'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ]
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
        $.get("{{ url('laboratorium/pemeriksaan-lab/edit') }}"+'/'+id, function (data) {
            $('#id_request_lab').val(data.id);
            $("#modal_tambah_data").modal("show");
            $('#nama_pasien').html(data.nama_pasien);
            $('#tgl_registrasi').html(formattanggal(data.tgl_request));
            $('#dokter_pengirim').html(data.nama_dokter);
            $('#nama_usia').html(umur(data.tgl_lahir));
            id_pemeriksaan = data.id_pemeriksaan.split(',');
            $.each(id_pemeriksaan, function( index, value ) {
                $.get("{{ url('laboratorium/pemeriksaan-lab/pemeriksaan') }}"+'/'+value+'/'+id, function (d) {
                    $('[name=pemeriksa]').val(d.id_user_petugas).trigger('change');
                    $("#var").append(`
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-secondary">Pemeriksaan</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pemeriksaan[]" disabled placeholder="Pemeriksaan" value="`+d.nama+`">
                                    <input type="hidden" class="form-" name="id_pemeriksaan[]" value="`+d.id+`">
                            </div>
                            <label class="col-sm-2 col-form-label text-secondary">Hasil</label>
                            <div class="col">
                                <input type="text" class="form-control" name="hasil[]" placeholder="Hasil Pemeriksaan" value="`+d.hasil+`">
                            </div>
                        </div>
                    `);
                });
            });
        })
    });
    $("#btn_close").click(function(){
        $("#modal_tambah_data").modal("hide");
        $("#var").contents().remove();
    });
    $("#btn_x").click(function(){
        $("#modal_tambah_data").modal("hide");
        $("#var").contents().remove();
    });

    //MELAKUKAN CONTROLLER SIMPAN
    $("#btn_simpan").click(function(){
        $.ajax({
            url: "{{ url('laboratorium/pemeriksaan-lab/simpan')}} ",
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
                    });
                    $("#var").contents().remove();
                }else{
                    $("#modal_tambah_data").modal('hide');
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Data gagal diperbarui.',
                        type: "error"
                    }).then((result) => {
                        tb.ajax.reload();
                    });
                    $("#var").contents().remove();
				}
			}

        });

        // location.reload();

    });
    $('body').on('click', '#btn_cetak', function () {
            var id = $(this).data('id');
            console.log(id);
            url = '{{ url('laboratorium/pemeriksaan-lab/cetak') }}'+'/'+id;
            window.open(url, '_blank');

        })

});

</script>

@endsection
