@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Permintaan Cek Laboratorium
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>
                        <p>
                        <table id="tabel_req_ceklab" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TGL-REG</th>
                                    <th>NO-REG</th>
                                    <th>NAMA PASIEN</th>
                                    <th>NO. REKAM MEDIS</th>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Registrasi Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form class="form-horizontal" action="{{url('tindakan/req-ceklab/simpan')}}" method="POST"-->
                <form class="form-horizontal" id="form_tambah">
                @csrf
                    <input type="hidden" name="id">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">No Registrasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_registrasi" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Tanggal</label>
                            <div class="col-sm-8">
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
                            <label class="col-sm-4 col-form-label text-secondary">No Rekam Medis</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="no_rekammedis" id="id_no_rekammedis">
                                <option selected>Cari No. Rekam Medis</option>
                                @foreach ($pasien as $i)
                                    <option value="{{ $i->kode_pasien }}">{{ $i->kode_pasien }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Nama Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" disabled placeholder="Nama Pasien">
                                <input type="hidden" class="form-" name="id_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Permintaan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="permintaan" placeholder="Permintaan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Keterangan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
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

        // HAPUS FIELD SETELAH DIGUNAKAN
        $("#modal_tambah_data").on("hidden.bs.modal", function(){
            $(this).find("input,textarea").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
            $(".select-cari-modal").val(0).trigger('change') ;
        });

        //MENAMPILKAN DATA DENGAN DATATABLES
    var tb = $('#tabel_req_ceklab').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('tindakan/request-ceklab/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'tgl_registrasi', name: 'tgl_registrasi'},
            {data: 'no_registrasi', name: 'no_registrasi'},
            {data: 'nama_pasien', name: 'nama_pasien'},
            {data: 'no_rekammedis', name: 'no_rekammedis'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ]
    });

    //SHOW MODAL/FORM
    $("#btn_tambah").click(function(){
        $("#modal_tambah_data").modal("show");
        $('[name=no_registrasi]').val(no_regislab());
        $('[name=tgl_registrasi]').val(now_date());
    })

    //ShOW MODAL/FORM DENGAN GETTING DATA BERDASARKAN ID
    $('body').on('click', '#btn_edit', function () {
        var id = $(this).data('id');
        $.get("{{ url('tindakan/request-ceklab/edit') }}"+'/'+id, function (data) {
            $("#modal_tambah_data").modal("show");
            $('[name=id]').val(data.id);

            $('[name=no_rekammedis]').val(data.kode_pasien).trigger('change');
            $('[name=tgl_registrasi]').val(formattanggal(data.tgl_kunjungan));
            $('[name=keterangan]').val(data.keterangan);
            $('[name=nama]').val(data.nama_pasien);
            $('[name=id_pasien]').val(data.id_pasien);

        })
    });

    //MELAKUKAN CONTROLLER SIMPAN
    $("#btn_simpan").click(function(){
        $.ajax({
            url: "{{ url('tindakan/request-ceklab/simpan')}} ",
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
    });

    //BUTTON HAPUS
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
                $.get("{{ url('tindakan/request-ceklab/hapus') }}"+'/'+id);
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Data telah dihapus.',
                    type: "success"
                }).then((result) => {
                    tb.ajax.reload();
                })
            }
        })
    });
    $('select[name="no_rekammedis"]').on('change',function(){
		var no_rekammedis = $(this).val();
		$.get("{{ url('tindakan/request-ceklab/get_norekammedis') }}"+'/'+no_rekammedis, function (data) {
            $('[name=nama]').val(data.nama);
            $('[name=id_pasien]').val(data.id);
        })
	});
});

</script>
@endsection
