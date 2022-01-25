<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class PemeriksaanController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Tindakan Puskesmas';
        $data['jenis_tindakan'] = DB::table('jenis_pemeriksaan')->get();
        $data['poli'] = DB::table('unit')->get();

        return view('master.data-pemeriksaan',$data);
    }

    public function get_data(Request $request)
    {

            $data = DB::table('pemeriksaan as p')
            ->join('jenis_pemeriksaan as jp','p.id_jenis_pemeriksaan','jp.id')
            ->join('unit as u','p.id_unit','u.id')
            ->select(DB::raw('
                p.id as id,
                p.kode_pemeriksaan as kode_pemeriksaan,
                p.nama as nama,
                p.keterangan as keterangan,
                p.id_jenis_pemeriksaan as id_jenis_pemeriksaan,
                p.id_unit as id_unit,
                jp.nama as nama_jenis_tindakan,
                u.nama as nama_poli
            '))
            ->orderBy('p.id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function($row){
                    //$actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm ">Delete</a>';
                    $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'">Edit</button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'">Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);

    }
    public function simpan(Request $request)
    {
        $id = $request->get('id');
        $data['kode_pemeriksaan'] = $request->get('kode_pemeriksaan');
        $data['nama'] = $request->get('nama');
        $data['keterangan'] = $request->get('keterangan');
        $data['id_jenis_pemeriksaan'] = $request->get('jenistindakan');
        $data['id_unit'] = $request->get('poli');

        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = Carbon::now();
                DB::table('pemeriksaan')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('pemeriksaan')->where('id', $id)->update($data);
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
        $data = DB::table('pemeriksaan as p')
            ->join('jenis_pemeriksaan as jp','p.id_jenis_pemeriksaan','jp.id')
            ->select(DB::raw('
                p.*,
                jp.nama as nama_jenis_pemeriksaan
            '))
        ->where('p.id','=',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        $data = DB::table('pemeriksaan')->delete($id);
        DB::commit();
        return response()->json($data);

    }
}
