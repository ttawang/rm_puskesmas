<script type="text/javascript">
$(document).ready(function () {
    $("#cetak1").click(function(){
        tgl1 = $('[name=tgl_awal]').val();

        url = '{{ url('laporan/cetak/daily') }}'+'/'+tgl1;

        if(tgl1 == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tanggal harus diisi',
            })
        }else{
            window.open(url, '_blank');
        }
    })

    $("#cetakReportBulanan").click(function(){
        let tgl1 = $('input[name=periode_awal]').val();
        let tgl2 = $('input[name=periode_akhir]').val();

        url = '{{ url('laporan/cetak/monthly') }}'+'/'+tgl1+'/'+tgl2;

        if((tgl1 == '') || tgl2 == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Isikan Kolom Periode',
            })
        }else{
            window.open(url, '_blank');
        }

    })
})

</script>
