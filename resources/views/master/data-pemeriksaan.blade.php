@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Data Tindakan
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>
                        <p>
                        <table id="tabel_pemeriksaan" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Tindakan</th>
                                    <th>Jenis</th>
                                    <th>Poli</th>
                                    <th>Action</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tindakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form class="form-horizontal" action="{{url('master/data-pemeriksaan/simpan')}}" method="POST"-->
                <form class="form-horizontal"  id="form_tambah">
                @csrf
                    <input type="hidden" name="id">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Kode Tindakan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_pemeriksaan" placeholder="Kode Pemeriksaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Nama Tindakan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Pemeriksaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Jenis Tindakan</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="jenistindakan">
                                    <option selected>Pilih Jenis Tindakan</option>
                                    @foreach ($jenis_tindakan as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Nama Unit</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="poli">
                                    <option selected>Pilih Poli</option>
                                    @foreach ($poli as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Keterangan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                            </div>
                        </div>
                    </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--button type="submit" class="btn btn-primary">Save</button-->
                <button type="button" id="btn_simpan" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    $("#modal_tambah_data").on("hidden.bs.modal", function(){
        $(this).find("input,textarea").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
        $(".select-cari-modal").val() ;
    });
    //MENAMPILKAN DATA DENGAN DATATABLES
    var tb = $('#tabel_pemeriksaan').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('master/data-pemeriksaan/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'kode_pemeriksaan', name: 'kode_pemeriksaan'},
            {data: 'nama', name: 'nama'},
            {data: 'nama_jenis_tindakan', name: 'nama_jenis_tindakan'},
            {data: 'nama_poli', name: 'nama_poli'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ]
    });

    //SHOW MODAL/FORM
    $("#btn_tambah").click(function(){
        $("#modal_tambah_data").modal("show");
    })

    //ShOW MODAL/FORM DENGAN GETTING DATA BERDASARKAN ID
    $('body').on('click', '#btn_edit', function () {
        var id = $(this).data('id');
        $.get("{{ url('master/data-pemeriksaan/edit') }}"+'/'+id, function (data) {
            $("#modal_tambah_data").modal("show");
            $('[name=id]').val(data.id);
            $('[name=kode_pemeriksaan]').val(data.kode_pemeriksaan);
            $('[name=nama]').val(data.nama);
            $('[name=keterangan]').val(data.keterangan);
            $('[name=jenistindakan]').val(data.id_jenis_pemeriksaan).trigger('change');
            $('[name=poli]').val(data.id_unit).trigger('change');
        })
    });

    $("#btn_simpan").click(function(){
        $.ajax({
            url: "{{ url('master/data-pemeriksaan/simpan')}} ",
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
                        icon: 'success',
                    }).then((result) => {
                        tb.ajax.reload();
                    })
                }else{
                    $("#modal_tambah_data").modal('hide');
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Data gagal diperbarui.',
                        icon: 'error',
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
                $.get("{{ url('master/data-pemeriksaan/hapus') }}"+'/'+id);
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
});
</script>

@endsection
