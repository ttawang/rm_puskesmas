@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="no_rekammedis" value="{{ $data->kode_pasien }}">
                        <div class="form-group row">
                            <div class="col-sm-3 text-secondary"><b>Nama</b></div>
                            <div class="col-sm-3">: {{ $data->nama }}</div>
                            <div class="col-sm-3 text-secondary"><b>Nama</b></div>
                            <div class="col-sm-3">: {{ $data->nama }}</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 text-secondary"><b>Nama</b></div>
                            <div class="col-sm-3">: {{ $data->nama }}</div>
                            <div class="col-sm-3 text-secondary"><b>Nama</b></div>
                            <div class="col-sm-3">: {{ $data->nama }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Daftar Pasien
                        </div>
                    </div>
                    <div class="card-body">
                            <table id="table_riwayat" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TGL-REG</th>
                                        <th>NO-REG</th>
                                        <th>NAMA PASIEN</th>
                                        <th>POLI</th>
                                        <th>DOKTER</th>
                                        <th>ANAMNESIS</th>
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
<div class="modal fade" id="modal_pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Tambah Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_tambah">
                @csrf
                    <input type="hidden" name="id">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">tgl</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tgl" placeholder="No Rekam Medis">
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
    var id = $('[name=id]').val();
    var no_rekammedis = $('[name=no_rekammedis]').val();
    var tb = $('#table_riwayat').DataTable({
        dom: 'Bfrtip',
        info: true,
        LengthChange: true,
        ordering:false,
        processing: true,
        serverSide: true,
        ajax: "{{ url('pasien/data-pasien/get_data_riwayat') }}"+'/'+id,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'tgl_kunjungan', name: 'tgl_kunjungan'},
            {data: 'diagnosa', name: 'diagnosa'},
            {data: 'nama_pemeriksaan', name: 'nama_pemeriksaan'},
            {data: 'nama_obat', name: 'nama_obat'},
            {data: 'nama_dokter', name: 'nama_dokter'},
            {data: 'anamnesis', name: 'anamnesis'},
        ],
        // "buttons": ['pdf']
        buttons : [
            {
            extend: 'pdf',
            text: 'Cetak',
            title: 'Riwayat Rekam Medis',
            filename: 'Riwayat Rekam Medis - '+no_rekammedis
            // action: function (){
            //     window.location = "{{ url('pasien/data-pasien/lihatriwayat') }}"+'/'+id;
            // }
        },
        // {
        //     text: 'pdf test',
        //     action: function (){
        //         $("#modal_pdf").modal("show");
        //     }
        // }
        ]
    });
});

</script>
@endsection
