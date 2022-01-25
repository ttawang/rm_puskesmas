<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class RegistrasiPasienController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Registrasi Pasien';
        //tambahan
        $data['poli'] = DB::table('unit')->get();
        $data['pasien'] = DB::table('data_pasien')->get();


        return view('pasien.registrasi-pasien',$data);
    }

    public function get_data(Request $request)
    {

            $data = DB::table('registrasi_pasien as rp')
            ->join('unit as u','rp.id_unit','u.id')
            ->join('data_pasien as dp','rp.id_pasien','dp.id')
            ->select(DB::raw('
                rp.id as id,
                rp.no_registrasi no_registrasi,
                rp.tgl_kunjungan as tgl_kunjungan,
                rp.keluhan as keluhan,
                rp.id_unit as id_unit,
                rp.id_pasien as id_pasien,
                u.nama as nama_poli,
                dp.nama as nama_pasien,
                dp.kode_pasien as no_rekammedis
            '))
            ->orderBy('rp.id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl_registrasi', function($row){
                    $tanggal = Carbon::createFromFormat('Y-m-d', $row->tgl_kunjungan)->format('d/m/Y');

                    return $tanggal;
                })

                ->addColumn('action', function($row){
                    //$actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm ">Delete</a>';
                    $actionBtn = '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'">Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action','tgl_registrasi'])
                ->make(true);

    }
    public function simpan(Request $request)
    {
        $id = $request->get('id');
        $data['no_registrasi'] = $request->get('no_registrasi');
        $data['tgl_kunjungan'] = Carbon::createFromFormat('d/m/Y', $request->get('tgl_registrasi'))->format('Y-m-d');
        $data['keluhan'] = $request->get('keluhan');
        $data['id_pasien'] = $request->get('id_pasien');
        $data['id_unit'] = $request->get('poli');

        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = Carbon::now();
                DB::table('registrasi_pasien')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('registrasi_pasien')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}
        //return redirect()->to('kunjungan_pasien');
        return response()->json($arr);
    }
    public function edit($id){
        $data = DB::table('registrasi_pasien as rp')
            ->join('data_pasien as dp','rp.id_pasien','dp.id')
            ->join('unit as u', 'rp.id_unit', 'u.id')
            ->select(DB::raw('
                rp.*,
                dp.id as id_pasien,
                dp.nama as nama_pasien,
                dp.kode_pasien as kode_pasien,
                u.nama as nama_unit
            '))
        ->where('rp.id','=',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        $data = DB::table('registrasi_pasien')->delete($id);
        DB::commit();
        return response()->json($data);

    }
    public function get_norekammedis($id)
    {
        $data = DB::table('data_pasien')->where('kode_pasien',$id)->first();
        return response()->json($data);
    }
}
