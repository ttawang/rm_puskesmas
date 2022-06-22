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
    public function cetak1($tgl1, $tgl2)
    {

        $data = [
            'nama' => 'titan',
            'nama_perusahaan' => 'tawang',
            'nilai' => 'ilal',
            'tgl_mulai' => $tgl1,
            'tgl_selesai' => $tgl2

        ];
        $pdf = PDF::loadView('laporan.cetak1',['data'=>$data]);

        return $pdf->stream('Judul Cetak1 - cetak1'.'.pdf');
    }

}
