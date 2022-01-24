@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>LAPORAN KUNJUNGAN PASIEN
                        </div>
                    </div>
                    <div class="card-body">
                        <p>
                        <table id="tabel_laporan_kunjungan" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Unit</th>
                                    <th>Jumlah Kunjungan</th>
                                    <th>Pasien Lama</th>
                                    <th>Pasien Baru</th>
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

{{-- <script type="text/javascript">
    $(document).ready(function () {
        //MENAMPILKAN DATA DENGAN DATATABLES
        var tb = $('#tabel_laporan_kunjungan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('pasien/data-pasien/get_data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: true, searchable: true
                },
            ]
        });
</script> --}}
@endsection
