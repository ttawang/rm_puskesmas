<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use Carbon\Carbon;

class DataPasienController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Pasien';
        return view('pasien.data-pasien',$data);
    }

    public function get_data(Request $request)
    {

            $data = DB::table('data_pasien')->orderBy('id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal_lahir', function($row){
                    $tanggal = Carbon::createFromFormat('Y-m-d', $row->tgl_lahir)->format('d/m/Y');

                    return $tanggal;
                })
                ->addColumn('action', function($row){
                    //$actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm ">Delete</a>';
                    $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'">Edit</button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'">Hapus</button>'.
                        '<input type="hidden" id="nama'.$row->id.'" value="'.$row->nama.'">';
                    return $actionBtn;
                })
                ->rawColumns(['action','tanggal_lahir'])
                ->make(true);

    }
    public function simpan(Request $request)
    {
        $id = $request->get('id');
        $data['kode_pasien'] = $request->get('no_rekam_medis');
        $data['tahun_rm'] = $request->get('tahun_rekam_medis');
        $data['no_identitas'] = $request->get('no_identitas');
        $data['nama'] = $request->get('nama');
        $data['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $request->get('tgl_lahir'))->format('Y-m-d');
        $data['usia'] = $request->get('usia');
        $data['agama'] = $request->get('agama');
        $data['jenis_kelamin'] = $request->get('jenis_kelamin');
        $data['gol_darah'] = $request->get('gol_darah');
        $data['status_menikah'] = $request->get('status_menikah');
        $data['pekerjaan'] = $request->get('pekerjaan');
        $data['alamat'] = $request->get('alamat');
        $data['kecamatan'] = $request->get('kecamatan');
        $data['desa'] = $request->get('desa');
        $data['alergi'] = $request->get('alergi');
        $data['no_askes'] = $request->get('no_askes');
        $data['nama_keluarga'] = $request->get('nama_keluarga');
        $data['kelompok'] = $request->get('kel_pasien');
        $data['status_pasien'] = $request->get('status_pasien');

        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = Carbon::now();
                DB::table('data_pasien')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('data_pasien')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}
        //return redirect()->to('pendaftaranpasien');
        return response()->json($arr);
    }
    public function edit($id){
        $data = DB::table('data_pasien')->where('id','=',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        $data = DB::table('data_pasien')->delete($id);
        DB::commit();
        return response()->json($data);

    }
}
