<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class RequestCeklabController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Permintaan Cek Laboratorium';
        $data['pasien'] = DB::table('data_pasien')->get();

        return view('tindakan.request-ceklab',$data);
    }

    public function get_data(Request $request)
    {
            $data = DB::table('req_ceklab as rc')
            ->join('data_pasien as dp','rc.id_pasien','dp.id')
            ->select(DB::raw('
                rc.id as id,
                rc.no_registrasi no_registrasi,
                rc.tgl_kunjungan as tgl_kunjungan,
                rc.keterangan as keterangan,
                rc.id_pasien as id_pasien,
                dp.nama as nama_pasien,
                dp.kode_pasien as no_rekammedis
            '))
            ->orderBy('rc.id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl_registrasi', function($row){
                    $tanggal = Carbon::createFromFormat('Y-m-d', $row->tgl_kunjungan)->format('d/m/Y');

                    return $tanggal;
                })

                ->addColumn('action', function($row){
                    //$actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm ">Delete</a>';
                    $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'">Edit</button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'">Hapus</button>';
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
        $data['keterangan'] = $request->get('keterangan');
        $data['id_pasien'] = $request->get('id_pasien');

        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = Carbon::now();
                DB::table('req_ceklab')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('req_ceklab')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}
        //return redirect()->to('master/satuan-obat');
        return response()->json($arr);
    }

    public function edit($id){
        $data = DB::table('req_ceklab as rc')
            ->join('data_pasien as dp','rc.id_pasien','dp.id')
            ->select(DB::raw('
                rc.id as id,
                rc.no_registrasi no_registrasi,
                rc.tgl_kunjungan as tgl_kunjungan,
                rc.keterangan as keterangan,
                rc.id_pasien as id_pasien,
                dp.nama as nama_pasien,
                dp.kode_pasien as no_rekammedis
            '))

        ->where('rc.id','=',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        $data = DB::table('req_ceklab')->delete($id);
        DB::commit();
        return response()->json($data);

    }
    public function get_norekammedis($id)
    {
        $data = DB::table('data_pasien')->where('kode_pasien',$id)->first();
        return response()->json($data);
    }
}
