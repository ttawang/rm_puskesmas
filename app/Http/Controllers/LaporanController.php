<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class LaporanController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Laporan';
        return view('laporan.laporan',$data);

        // $data['judul'] = 'Laporan';
        // return view('laporan.laporankunjungan', $data);

        // $data['judul'] = 'Laporan';
        // return view('laporan.laporan-hasilpemeriksaan', $data);

        // $data['judul'] = 'Laporan';
        // return view('laporan.laporan-obat', $data);

        // $data['judul'] = 'Laporan';
        // return view('laporan-sepuluhbesar', $data);

        // $data['judul'] = 'Laporan';
        // return view('laporan.laporan-pemeriksaanpenunjang', $data);
    }

    public function get_data(Request $request)
    {

    }

    public function simpan(Request $request)
    {

    }

    public function edit($id){

    }

    public function hapus($id){


    }
}
