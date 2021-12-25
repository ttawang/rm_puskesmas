@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Daftar Dokter
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button>
                        <p>
                        <table id="tabel_dokter" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
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

<!--div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"-->
<div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form class="form-horizontal" action="{{url('master/data-dokter/simpan')}}" method="POST"-->
                <form class="form-horizontal"  id="form_tambah">
                @csrf
                    <input type="hidden" name="id">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Kode</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_dokter" placeholder="Kode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <select class="custom-select rounded-0  text-secondary">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="poli">Laki-laki</option>
                                    <option value="poli">perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Spesialis</label>
                            <div class="col-sm-8">
                                <select class="custom-select rounded-0  text-secondary">
                                    <option selected>Pilih Spesialis</option>
                                    <option value="poli">UMUM</option>
                                    <option value="poli">GIGI</option>
                                    <option value="poli">KIA</option>
                                    <option value="poli">KB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <div class="input-group date">
                                    <input type="text" class="form-control datetimepicker-input" value="{{date('d/m/Y')}}">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Kode Poli</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_poli" placeholder="Kode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Nama Poli</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_poli" placeholder="Nama Poli">
                            </div>
                        </div>
                    </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--button type="submit" class="btn btn-primary">Save</button-->
                <button type="submit" id="btn_simpan" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.2/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/date-1.1.1/fc-3.3.3/fh-3.1.9/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.1/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
$(document).ready(function () { 
    //MENAMPILKAN DATA DENGAN DATATABLES
    var tb = $('#tabel_dokter').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('master/data-dokter/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nama', name: 'nama'},
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
        $.get("{{ url('master/data-dokter/edit') }}"+'/'+id, function (data) {
            $("#modal_tambah_data").modal("show");
            $('[name=id]').val(data.id);
            $('[name=nama]').val(data.nama);
        })
    });

    //MELAKUKAN CONTROLLER SIMPAN
    $("#btn_simpan").click(function(){
        $.ajax({
            url: "{{ url('master/data-dokter/simpan')}} ",
            type:'POST',
            data: $("#form_tambah").serialize(),
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
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
                $.get("{{ url('master/data-dokter/hapus') }}"+'/'+id);
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