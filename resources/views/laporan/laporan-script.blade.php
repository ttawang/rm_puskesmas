<script type="text/javascript">
$(document).ready(function () {
    $("#cetak1").click(function(){
        tgl1 = $('[name=tgl_awal]').val();
        tgl2 = $('[name=tgl_akhir]').val();

        url = '{{ url('laporan/cetak1') }}'+'/'+tgl1+'/'+tgl2;

        if(tgl1 == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tanggal harus diisi',
            })
        }else if(tgl2 == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tanggal harus diisi',
            })
        }else{
            window.open(url, '_blank');
        }

    })
})

</script>
