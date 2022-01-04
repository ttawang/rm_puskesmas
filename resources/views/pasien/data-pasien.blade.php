@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Data Pasien
                        </div>
                    </div>
                    <div class="card-body">
                        <!--button class="btn btn-primary" id="tambah_data">Tambah</button-->
                        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_data">Tambah</button-->
                        <button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>
                        <p>
                        <table id="tabel_data_pasien" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Rekam Medis</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>tanggal lahir</th>
                                    <th>Kelompok Pasien</th>
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
                <h5 class="modal-title" id="modal_tambah_dataLabel">Tambah Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form class="form-horizontal" action="{{url('pasien/data-pasien/simpan')}}" method="POST"-->
                <form class="form-horizontal" id="form_tambah">
                @csrf
                    <input type="hidden" name="id">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">No Rekam Medis</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_rekam_medis" placeholder="No Rekam Medis">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Tahun Rekam Medis</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tahun_rekam_medis" placeholder="Tahun Rekam Medis">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">No Identitas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_identitas" placeholder="No Identitas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Nama Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Pasien">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <div class="input-group date">
                                    {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" value="{{date('d/m/Y')}}"> --}}
                                    <input type="text" class="form-control" name="tgl_lahir">
                                        {{-- <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Usia</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="usia" placeholder="Usia">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Agama</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="agama">
                                    <option selected>Pilih</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katholik">Katholik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                    <option value="konghucu">Konghucu</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="jenis_kelamin">
                                    <option selected>Pilih</option>
                                    <option value="laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Golongan Darah</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="gol_darah">
                                    <option selected>Pilih</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Status Menikah</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="status_menikah">
                                    <option selected>Pilih</option>
                                    <option value="sudah">Sudah Menikah</option>
                                    <option value="belum">Belum Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Pekerjaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Alamat</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Kecamatan</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="kecamatan">
                                    <option selected>Pilih</option>
                                    <option value="a">kecamatan A</option>
                                    <option value="b">kecamatan B</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Desa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="desa" placeholder="Desa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Alergi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="alergi" placeholder="Alergi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">No BPJS/Jamkesmas</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="no_askes" placeholder="Nomor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Nama Keluarga</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="nama_keluarga" placeholder="Nama Keluarga">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Kelompok Pasien</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="kel_pasien">
                                    <option selected>Pilih</option>
                                    <option value="umum">UMUM</option>
                                    <option value="bpjs">BPJS</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Status Pasien</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="status_pasien">
                                    <option selected>Pilih</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Non-aktif</option>
                                </select>
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
    //MENAMPILKAN DATA DENGAN DATATABLES
    var tb = $('#tabel_data_pasien').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('pasien/data-pasien/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'kode_pasien', name: 'kode_pasien'},
            {data: 'nama', name: 'nama'},
            {data: 'jenis_kelamin', name: 'jenis_kelamin'},
            {data: 'alamat', name: 'alamat'},
            {data: 'tanggal_lahir', name: 'tanggal_lahir'},
            {data: 'kelompok', name: 'kelompok'},
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
        $.get("{{ url('pasien/data-pasien/edit') }}"+'/'+id, function (data) {
            $("#modal_tambah_data").modal("show");
            $('[name=id]').val(data.id);
            $('[name=no_rekam_medis]').val(data.kode_pasien);
            $('[name=tahun_rekam_medis]').val(data.tahun_rm);
            $('[name=no_identitas]').val(data.no_identitas);
            $('[name=nama]').val(data.nama);
            $('[name=tgl_lahir]').val(formattanggal(data.tgl_lahir));
            $('[name=usia]').val(data.usia);
            $('[name=agama]').val(data.agama).trigger('change');
            $('[name=jenis_kelamin]').val(data.jenis_kelamin).trigger('change');
            $('[name=gol_darah]').val(data.gol_darah).trigger('change');
            $('[name=status_menikah]').val(data.status_menikah).trigger('change');
            $('[name=pekerjaan]').val(data.pekerjaan);
            $('[name=alamat]').val(data.alamat);
            $('[name=kecamatan]').val(data.kecamatan).trigger('change');
            $('[name=desa]').val(data.desa);
            $('[name=alergi]').val(data.alergi);
            $('[name=no_askes]').val(data.no_askes);
            $('[name=nama_keluarga]').val(data.nama_keluarga);
            $('[name=kel_pasien]').val(data.kelompok).trigger('change');
            $('[name=status_pasien]').val(data.status_pasien).trigger('change');

        })
    });

    //MELAKUKAN CONTROLLER SIMPAN
    $("#btn_simpan").click(function(){
        $.ajax({
            url: "{{ url('pasien/data-pasien/simpan')}} ",
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
                $.get("{{ url('pasien/data-pasien/hapus') }}"+'/'+id);
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
