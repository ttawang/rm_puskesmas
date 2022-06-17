<script type="text/javascript">
$(document).ready(function () {
    $("#toket").hide();
    $('select').select2().on('select2:open', function() {
    var container = $('.select2-container').last();
  /*Add some css-class to container or reposition it*/
    });
    // $('.modal').css('overflow-y', 'auto');
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
            { width:100, targets:[7]},
	    ],

    });

    var tb = $('#tabel_permintaan_lab').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('tindakan/tindakan-pasien/lab/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ]
    });

    // var tb2 = $('#tabel_permintaan_lab').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ url('tindakan/tindakan-pasien/get_data_lab') }}",
    //     columns: [
    //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //         {data: 'nama_pasien', name: 'nama_pasien'},
    //         {data: 'action', name: 'action', orderable: true, searchable: true
    //         },
    //     ],
    //     // columnDefs: [
    //     //     { className: 'text-right', targets: [] },
    //     //     { className: 'text-center', targets: [7] },
    //     //     { width:100, targets:[7]},
	//     // ],

    // });
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
        var id = $(this).data('id');
        $('#id_pilih_rujukan').val(id);
        $("#modal_pilih_rujukan").modal("show");
        // $("#modal_tambah_rujukan").modal("show");
        // var id = $(this).data('id');
        // $.get("{{ url('tindakan/tindakan-pasien/rujuk') }}"+'/'+id, function (data) {
        //     $("#modal_tambah_rujuk").modal("show");
        //     $('[name=rujuk_id_tindakan]').val(data.id_tindakan);
        //     $('[name=rujuk_id_rujukan]').val(data.id_rujukan);
        //     $('[name=rujuk_no_rujukan]').val(no_regisrujuk(data.no_registrasi));
        //     $('#rujuk_no_rekam_medis').val(data.no_rekam_medis);
        //     $('#rujuk_no_registrasi').val(data.no_registrasi);
        //     $('#rujuk_anamnesis').val(data.anamnesis);
        //     $('#rujuk_usia').val(umur(data.tgl_lahir));
        //     $('#rujuk_diagnosa').val(data.nama_diagnosa);
        //     $('#rujuk_obat').val(data.nama_obat);
        //     $('#rujuk_nama_pasien').val(data.nama_pasien);
        //     $('#rujuk_jenis_kelamin').val(data.jenis_kelamin);
        //     $('#rujuk_kasta').val(data.kasta);
        // });
    })

    $('body').on('click', '#btn_pilih_rujukan', function () {
        var id = $('#id_pilih_rujukan').val();
        var pilih = $('#pilih_rujukan').val();
        if(pilih == 'eksternal'){
            $("#modal_pilih_rujukan").modal("hide");
            $("#modal_tambah_rujukan").modal("show");

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
        }else{
            $("#modal_pilih_rujukan").modal("hide");
            $("#modal_tambah_rujukan_internal").modal("show");

            $.get("{{ url('tindakan/tindakan-pasien/rujuk_internal') }}"+'/'+id, function (data) {
                $("#modal_tambah_rujuk").modal("show");
                $('[name=rujuk_internal_id_tindakan]').val(data.id_tindakan);
                $('#rujuk_internal_poli_pengirim').val(data.poli_pengirim);
                $('#rujuk_internal_nama_pasien').val(data.nama_pasien);
                $('#rujuk_internal_usia').val(umur(data.tgl_lahir));
                $('#rujuk_internal_jenis_kelamin').val(data.jenis_kelamin);
                $('#rujuk_internal_alamat').val(data.alamat);
            });
        }
    })

    $('body').on('click', '#btn_lab', function () {
        $("#modal_tambah_labo").modal("show");
        var id = $(this).data('id');
        $.get("{{ url('tindakan/tindakan-pasien/lab') }}"+'/'+id, function (data) {
            $("#modal_tambah_lab").modal("show");
            $('[name=lab_id_tindakan]').val(data.id_tindakan);
            $('[name=lab_id_permintaan]').val(data.id_permintaan);
            $('#lab_no_registrasi').val(data.no_registrasi);
            $('#lab_tgl_kunjungan').html(formattanggal(data.tgl_kunjungan));
            $('#lab_no_rekam_medis').val(data.no_rekam_medis);
            $('#lab_nama_pasien').val(data.nama_pasien);
            $('#lab_usia').val(umur(data.tgl_lahir));
            $('#lab_jenis_kelamin').val(data.jenis_kelamin);
            $('#lab_unit').val(data.nama_unit);
            $('#lab_dokter').val(data.nama_dokter);
        });
    })

    $("#btn_tambah_labo").click(function(){
        $("#modal_tambah_labo").modal("show");
        $('[name=tgl_registrasi]').val(now_date());

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
            $('[name=jumlah_obat]').val(data.jumlah_obat);
            // $('[name=aturan_pakai]').val(data.id_aturanpakai).trigger('change');
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

    $('body').on('click', '#btn_edit_rujuk', function () {
        var id = $(this).data('id');
        console.log(id);
        var tipe = $(this).data('tipe');

        if(tipe == 'eksternal'){
            $.get("{{ url('tindakan/tindakan-pasien/editrujuk') }}"+'/'+id+'/'+tipe, function (data) {
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
        }else if(tipe == 'internal'){
            $.get("{{ url('tindakan/tindakan-pasien/editrujuk') }}"+'/'+id+'/'+tipe, function (data) {
                $("#modal_tambah_rujukan_internal").modal("show");
                $('[name=rujuk_internal_id_rujukan]').val(data.id_rujukan);
                $('[name=rujuk_internal_id_tindakan]').val(data.id_tindakan);
                $('#rujuk_internal_poli_pengirim').val(data.poli_pengirim);
                $('#rujuk_internal_nama_pasien').val(data.nama_pasien);
                $('#rujuk_internal_usia').val(umur(data.tgl_lahir));
                $('#rujuk_internal_jenis_kelamin').val(data.jenis_kelamin);
                $('#rujuk_internal_alamat').val(data.alamat);
                $('[name=rujuk_internal_pemeriksaan]').val(data.pemeriksaan);
                $('[name=rujuk_internal_poli_tujuan]').val(data.poli_tujuan).trigger('change');
                $('[name=rujuk_internal_petugas]').val(data.id_user_petugas).trigger('change');
            });
        }
    })

    $("#btn_simpan_rujuk_internal").click(function(){
        $.ajax({
            url: "{{ url('tindakan/tindakan-pasien/simpanrujukinternal')}} ",
            type:'POST',
            data: $("#form_rujuk_internal").serialize(),
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(respon){
				if(respon.status == 1 || respon.status == "1"){
					$("#modal_tambah_rujukan_internal").modal('hide');
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil diperbarui.',
                        type: "success"
                    }).then((result) => {
                        tb.ajax.reload();
                    })
                }else{
                    $("#modal_tambah_rujukan_internal").modal('hide');
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



    $('body').on('click', '#btn_edit_lab', function () {
        var id = $(this).data('id');

        $.get("{{ url('tindakan/tindakan-pasien/editlab') }}"+'/'+id, function (data) {
            $("#modal_tambah_labo").modal("show");
            $('[name=lab_id_tindakan]').val(data.id_tindakan);
            $('[name=lab_id_permintaan]').val(data.id_permintaan);
            $('[name=lab_pemeriksaan]').val(data.nama_pemeriksaan);
            $('[name=lab_keterangan]').val(data.keterangan);
            $('[name=lab_petugas]').val(data.nama_petugas);
            $('#lab_no_registrasi').val(data.no_registrasi);
            $('#lab_tgl_kunjungan').html(formattanggal(data.tgl_kunjungan));
            $('#lab_no_rekam_medis').val(data.no_rekam_medis);
            $('#lab_nama_pasien').val(data.nama_pasien);
            $('#lab_usia').val(umur(data.tgl_lahir));
            $('#lab_jenis_kelamin').val(data.jenis_kelamin);
            $('#lab_unit').val(data.nama_unit);
            $('#lab_dokter').val(data.nama_dokter);
        });
    })

    $("#btn_simpan_lab").click(function(){
        $.ajax({
            url: "{{ url('tindakan/tindakan-pasien/simpanlab')}} ",
            type:'POST',
            data: $("#form_lab").serialize(),
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(respon){
				if(respon.status == 1 || respon.status == "1"){
					$("#modal_tambah_labo").modal('hide');
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil diperbarui.',
                        type: "success"
                    }).then((result) => {
                        tb.ajax.reload();
                    })
                }else{
                    $("#modal_tambah_labo").modal('hide');
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
    $('.no_registrasi').select2({
	    theme: 'bootstrap4',
	    dropdownParent : $('#modal_tambah_data'),
    });
    $('.obat').select2({
	    theme: 'bootstrap4',
	    dropdownParent : $('#modal_tambah_data'),
    });
    $('.diagnosa').select2({
	    theme: 'bootstrap4',
	    dropdownParent : $('#modal_tambah_data'),
    });
    $('.tindakan').select2({
	    theme: 'bootstrap4',
	    dropdownParent : $('#modal_tambah_data'),
    });
    $('.dokter').select2({
	    theme: 'bootstrap4',
	    dropdownParent : $('#modal_tambah_data'),
    });
    $('.rujuk_kriteria').select2({
	    theme: 'bootstrap4',
	    dropdownParent : $('#modal_tambah_rujukan'),
    });
    $('.rujuk_internal_poli_tujuan').select2({
	    theme: 'bootstrap4',
	    dropdownParent : $('#modal_tambah_rujukan_internal'),
    });
    $('.rujuk_internal_petugas').select2({
	    theme: 'bootstrap4',
	    dropdownParent : $('#modal_tambah_rujukan_internal'),
    });
    $("#modal_tambah_data").on("hidden.bs.modal", function(){
        $(this).find("input,textarea").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
        $(".no_registrasi").val(0).trigger('change') ;
    });
    totalInputs = 0;
    $("#tambah_obat").click(function(){
        $("#inilo").append(`
        <div class="form-group row" id="row_obat[]">
            <div class="col">
                <select class="form-control obat" name="obat[]" id="obat">
                    <option value="0" selected>Pilih Obat</option>
                    @foreach ($obat as $i)
                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="jumlah_obat[]" placeholder="Jumlah Obat">
            </div>
            <div class="col">
                <select class="form-control" name="aturan_pakai[]" id="aturan_pakai">
                    <option value="0" selected>Pilih</option>
                </select>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="ket_obat[]" placeholder="Keterangan">
            </div>
        </div>
        `);
        totalInputs++;
    })
    console.log(totalInputs);
    $("#kurang_obat").click(function(){
        // $("#div1").remove();
        // $('#calling-pad > span:last-child').remove();
        $("#inilo").contents().last().remove();
        // $('#inilo img').last().remove();
    });
    console.log($('#row_obat').last);
});

</script>
