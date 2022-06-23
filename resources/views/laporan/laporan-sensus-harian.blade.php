<!DOCTYPE html>
<html>
<head>
    <title>LAPORAN SENSUS HARIAN - PERIODE {{$Periode}}</title>
    <style>
        @page{
            margin-top:30px;
            margin-bottom:0px;
            margin-left: 30px;
            margin-right: 30px;
        }
        body, #wrapper, #content {
            /* font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif; */
            /* font-family:sans-serif; */
            font-family:Helvetica;
            font-size: 12px;
            font-wight:500;
        }

        table.detail, table.detail > th, table.detail > td {
            border: 1px solid black;
            border-collapse: collapse;
            border-spacing: 0;
            text-align: left
        }

        td#last {
            border: none !important;
            /* text-align: right */
        }
        table.detail > td.text-center {
            border: 1px solid black;
            text-align: center
        }
        table.detail > td.text-right {
            border: 1px solid black;
            text-align: right
        }

        a:link, a:visited {
        font-family:Helvetica;
        }

        p {
            font-family:Helvetica;
            font-size: 12px;
        }
        td.bold{
            font-weight: 700;
        }
        .bold{
            font-weight: 700;
        }
        .center{
            text-align:center;
        }
        .text-right{
            text-align:center;
        }
    </style>
</head>
<body>
    <h2 class="bold center" style="margin:0">LAPORAN SENSUS HARIAN</h2>
    <h3 class="bold center" style="margin:0">PERIODE : {{strtoupper($Periode)}}</h3>
    <p class="bold center" style="margin:0">PUSKESMAS KARANGPLOSO</p>
    <p class="bold center" style="margin:0">
        JL. PANGLIMA SUDIRMAN NO.65 , TELEPON : (0341) 461634
    </p>
    <br>
    <table class="detail" border="1px solid" width="100%">
        <tr>
            <th class="bold center" style="padding:5px 0;">NO</th>
            <th width="70px" class="bold center" style="padding:5px 0;">NO.REKAM MEDIS</th>
            <th class="bold center" style="padding:5px 0;">NAMA PASIEN</th>
            <th width="50px" class="bold center" style="padding:5px 0;">USIA</th>
            <th width="70px" class="bold center" style="padding:5px 3px;">KELOMPOK</th>
            <th class="bold center" style="padding:5px 0;">DIAGNOSA</th>
            <th class="bold center" style="padding:5px 0;">DOKTER</th>
        </tr>

    @if (count($Laporans))
        @php $no = 1; @endphp
        @foreach ($Laporans as $Lap)
        <tr>
            <td class="text-right" style="padding:10px 2px;">{{$no}}</td>
            <td style="padding:7px 3px;">{{$Lap->repNoRekam}}</td>
            <td style="padding:7px 3px;">{{$Lap->repPasien}}</td>
            <td class="center" style="padding:7px 3px;">{{hitung_umur($Lap->repPasienTglLahir)}}</td>
            <td class="center" style="padding:7px 3px;">{{$Lap->repKelompok}}</td>
            <td style="padding:7px 3px;">{{$Lap->repDiagnosa}}</td>
            <td style="padding:7px 3px;">{{$Lap->repDokter}}</td>
        </tr>
        @php $no++; @endphp
        @endforeach
    @else
        <tr>
            <td class="center" colspan="7" style="padding:7px 3px;" >DATA TIDAK DITEMUKAN</td>
        </tr>
    @endif
    </table>
    <div class="center" style="font-size: 10px; padding-top:10px">
        Dicetak pada {{date('Y-m-d_His')}}
    </div>
</body>
</html>
