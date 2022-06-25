<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class LaboratoriumController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Laboratorium';
        $data['petugas'] = DB::table('users')->where('role','admin_laboratorium')->get();

        return view('laboratorium.pemeriksaan-lab',$data);
    }

    public function get_data(Request $request)
    {
        $data = DB::table('request_lab as rl')
        ->join('users as u','rl.id_user_petugas','u.id')
        ->join('registrasi_pasien as rp','rl.id_registrasi','rp.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->selectRaw('
            rl.id,
            dp.kode_pasien as no_rekammedis,
            dp.nama nama_pasien,
            rl.tgl_request,
            rl.keterangan,
            rl.id_pemeriksaan
        ')
        ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl_request', function($row){
                    $tanggal = Carbon::createFromFormat('Y-m-d', $row->tgl_request)->format('d/m/Y');

                    return $tanggal;
                })
                ->addColumn('pemeriksaan', function($row){
                    if($row){
                        $_d = explode(",",$row->id_pemeriksaan);
                        $temp = [];
                        foreach($_d as $i){
                            $txt = DB::table('pemeriksaan')->where('id',$i)->first();
                            $temp[] = $txt->nama;
                        }
                        $hasil = join(', ', $temp);

                        return $hasil;
                    }else{
                        $hasil = '';

                        return $hasil;
                    }

                })
                ->addColumn('nilai', function($row){
                    if($row){
                        $_d = explode(",",$row->id_pemeriksaan);
                        $temp = [];
                        foreach($_d as $i){
                            $txt = DB::table('pemeriksaan')->where('id',$i)->first();
                            $temp[] = $txt->keterangan;
                        }
                        $hasil = join(', ', $temp);

                        return $hasil;
                    }else{
                        $hasil = '';

                        return $hasil;
                    }

                })
                ->addColumn('hasil', function($row){
                    $hasil = 'hasil';

                    return $hasil;
                })
                ->addColumn('status', function($row){
                    $hasil = 'status';

                    return $hasil;
                })
                ->addColumn('action', function($row){
                    $cek = DB::table('tindakan_lab')->where('id_request_lab',$row->id)->count();
                    //$actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm ">Delete</a>';
                    $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'">Tindak</button>';
                    if($cek >0){
                        $actionBtn .= '<button type="button" class="edit btn btn-info  btn-sm" id="btn_cetak" data-id="'.$row->id.'">Cetak</button>';
                    }

                    return $actionBtn;


                })
                ->rawColumns(['action','pemeriksaan','tgl_request','nilai','hasil','status'])
                ->make(true);

    }

    public function simpan(Request $request)
    {
        dd($request->all());
        $id = $request->get('id');
        $data['hasil'] = $request->get('hasil');

        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = Carbon::now();
                DB::table('tindakan_lab')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('tindakan_lab')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}
        //return redirect()->to('master/data-dokter');
        return response()->json($arr);
    }

    public function edit($id){
        $data = DB::table('request_lab as rl')
        ->join('users as u','rl.id_user_petugas','u.id')
        ->join('registrasi_pasien as rp','rl.id_registrasi','rp.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('dokter as d','d.id','rl.id_dokter')
        ->selectRaw('
            rl.id,
            rl.tgl_request,
            d.nama nama_dokter,
            dp.nama nama_pasien,
            dp.tgl_lahir
        ')
        ->where('rl.id',$id)
        ->first();



        return response()->json($data);

    }

    // public function hapus($id){
    //     $data = DB::table('tindakan_lab')->delete($id);
    //     DB::commit();
    //     return response()->json($data);

    // }
}
