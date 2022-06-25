<!DOCTYPE html>
<html>
<head>
    <title>HASIL PEMERIKSAAN LABORATORIUM</title>
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
    <h2 class="bold center" style="margin:0">HASIL PEMERIKSAAN LABORATORIUM</h2>
    <p class="bold center" style="margin:0">PUSKESMAS KARANGPLOSO</p>
    <p class="bold center" style="margin:0">
        JL. PANGLIMA SUDIRMAN NO.65 , TELEPON : (0341) 461634
    </p>
    <br><br><br>
    <table>
        <tr>
            <td width="100px">NAMA</td>
            <td width="10px">:</td>
            <td width="252.5px">{{ $user->nama_pasien }}</td>
            <td width="100px">USIA</td>
            <td width="10px">:</td>
            <td width="252.5px">{{ umur($user->tgl_lahir) }}</td>
        </tr>
        <tr>
            <td width="100px">JENIS KELAMIN</td>
            <td width="10px">:</td>
            <td width="252.5px">{{ $user->jenis_kelamin }}</td>
            <td width="100px">TANGGAL</td>
            <td width="10px">:</td>
            <td width="252.5px">{{ $user->tgl_request }}</td>
        </tr>
        <tr>
            <td width="100px">DOKTER</td>
            <td width="10px">:</td>
            <td width="252.5px">{{ $user->nama_dokter }}</td>
            <td width="100px">ALAMAT</td>
            <td width="10px">:</td>
            <td width="252.5px">{{ $user->alamat }}</td>
        </tr>

    </table>
    <br><br>
    <table class="detail" border="1px solid" width="100%">
        <tr>
            <th width="30px" class="bold center" style="padding:5px 0;">NO</th>
            <th width="70px" class="bold center" style="padding:5px 0;">PEMERIKSAAN</th>
            <th width="70px" class="bold center" style="padding:5px 0;">HASIL</th>
            <th width="70px" class="bold center" style="padding:5px 0;">NILAI RUJUKAN</th>
        </tr>

    @if ($data)
        @php $no = 1; @endphp
        @foreach ($data as $i)
        <tr>
            <td width="30px" class="center" style="padding:10px 10;">{{ $no }}</td>
            <td width="70px" class="left" style="padding:10px 10;">{{ $i->nama_pemeriksaan }}</td>
            <td width="70px" class="left" style="padding:10px 10;">{{ $i->hasil }}</td>
            <td width="70px" class="left" style="padding:10px 10;">{{ $i->keterangan }}</td>
        </tr>
        @php $no++; @endphp
        @endforeach
    @else
        <tr>
            <td class="center" colspan="4" style="padding:7px 3px;" >DATA TIDAK DITEMUKAN</td>
        </tr>
    @endif
    </table>
    <br><br><br>
    <div class="left" style="font-size: 10px; padding-top:10px">
        PEMERIKSA : {{ $user->nama_petugas }}
        <br>
        Tanggal Cetak : {{date('d-m-Y')}}
    </div>
</body>
</html>
