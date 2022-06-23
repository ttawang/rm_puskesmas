<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use PDF;

class LaporanController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Laporan';
        return view('laporan.laporan',$data);
    }


    public function report($type,$tgl1, $tgl2 = null)
    {
        $type = ($type == 'daily') ? $type : 'monthly' ;
        // nama, no rekam medis, usia, kelompok pasien, diagnosa, nama
        $getDataPasienPeriod = DB::table('tindakan_pasien','tp')
            ->selectRaw('
                rp.tgl_kunjungan AS repHariKunjung,
                dp.nama AS repPasien,
                dp.tgl_lahir AS repPasienTglLahir,
                kp.nama AS repKelompok,
                dp.kode_pasien AS repNoRekam,
                d.nama AS repDiagnosa,
                dk.nama AS repDokter,
                dp.jenis_kelamin AS repPasienJk')
            ->join('registrasi_pasien AS rp','rp.id','=','tp.id_registrasi')
            ->join('data_pasien AS dp','dp.id','=','rp.id_pasien')
            ->join('kelompok_pasien AS kp','kp.id','=','dp.id_kelompok_pasien')
            ->join('diagnosa AS d','d.id','=','tp.id_diagnosa')
            ->join('dokter AS dk','dk.id','=','tp.id_dokter');


        if($type == 'monthly'){
            $periode = longdate_indo($tgl1).' s.d. '.longdate_indo($tgl2);
            $getDataPasienPeriod = $getDataPasienPeriod->whereBetween('rp.tgl_kunjungan',[$tgl1,$tgl2])->get();
        }else{
            $periode = longdate_indo($tgl1);
            $getDataPasienPeriod = $getDataPasienPeriod->where('rp.tgl_kunjungan',$tgl1)->get();
        }
        // dd($getDataPasienPeriod);
        $dataPasien['Periode'] = $periode;
        $dataPasien['Laporans'] = $getDataPasienPeriod;


        $pdf = PDF::loadView('laporan.laporan-sensus-harian', $dataPasien);

        return $pdf->stream('LapSensusHarian - Periode '.$periode.'.pdf');
    }

}
