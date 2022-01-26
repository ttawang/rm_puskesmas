@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Tindakan Medical
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" id="btn_tambah">Buat Rujukan</button>
                        <p>
                        <table id="tabel_medical_record" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TGL-REG</th>
                                    <th>NO-REG</th>
                                    <th>NAMA PASIEN</th>
                                    <th>NO. REKAM MEDIS</th>
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

<!--div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"-->
<div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Form Rujukan Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form class="form-horizontal" action="{{url('tindakan/medical-record/simpan')}}" method="POST"-->
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
                            <label class="col-sm-4 col-form-label text-secondary">Kepada Yth. Poli</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tujuan" placeholder="Tujuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Rumah sakit</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="rumah_sakit" placeholder="Rumah Sakit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">No. Rekam Medis</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="no_rekammedis" id="id_no_rekammedis">
                                    <option selected>Cari No. Rekam Medis</option>
                                    {{-- @foreach ($pasien as $i)
                                        <option value="{{ $i->kode_pasien }}">{{ $i->kode_pasien }}</option>
                                    @endforeach --}}
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
                            <label class="col-sm-4 col-form-label  text-secondary">Usia</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="usia" disabled placeholder="Usia">
                                <input type="hidden" class="form-" name="usia_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jenis_kelamin" disabled placeholder="Jenis Kelamin">
                                <input type="hidden" class="form-" name="jk_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Status Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="status_pasien" disabled placeholder="Status Pasien">
                                <input type="hidden" class="form-" name="status_pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Anamnesa</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="anamnesa" placeholder="Anamnesa"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Diagnosa Sementara</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="diagnosa" placeholder="Diagnosa Sementara">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Telah diberikan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="obat" placeholder="Tindakan/ Obat"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Kriteria</label>
                            <div class="col-sm-8">
                                <select class="custom-select rounded-0  text-secondary">
                                    <option selected>Pilih</option>
                                    <option value="EMERGENCY">EMERGENCY</option>
                                    <option value="LANJUTAN">PEMERIKSAAN LANJUTAN</option>
                                </select>
                            </div>
                        </div>
                    </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--button type="submit" class="btn btn-primary">Save</button-->
                <button type="submit" id="btn_simpan" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    //MENAMPILKAN DATA DENGAN DATATABLES
    var tb = $('#tabel_medical_record').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('tindakan/medical-record/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nama', name: 'nama'},
            {data: 'nama', name: 'nama'},
            {data: 'nama', name: 'nama'},
            {data: 'nama', name: 'nama'},
            {data: 'nama', name: 'nama'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ]
    });

    //SHOW MODAL/FORM
    $("#btn_tambah").click(function(){
        $("#modal_tambah_data").modal("show");
        $('[name=no_registrasi]').val(no_regisrujuk());
    })

    //ShOW MODAL/FORM DENGAN GETTING DATA BERDASARKAN ID
    $('body').on('click', '#btn_edit', function () {
        var id = $(this).data('id');
        $.get("{{ url('tindakan/medical-record/edit') }}"+'/'+id, function (data) {
            $("#modal_tambah_data").modal("show");
            $('[name=id]').val(data.id);
            $('[name=nama]').val(data.nama);
        })
    });

    //MELAKUKAN CONTROLLER SIMPAN
    $("#btn_simpan").click(function(){
        $.ajax({
            url: "{{ url('tindakan/medical-record/simpan')}} ",
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
                $.get("{{ url('tindakan/medical-record/hapus') }}"+'/'+id);
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
