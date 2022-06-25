<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use PDF;

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
                    $hasil = [];
                    $temp = DB::table('tindakan_lab')->where('id_request_lab',$row->id)->get();
                    if($temp){
                        foreach($temp as $i){
                            $hasil[] = $i->hasil;
                        }
                    }

                    return join(', ',$hasil);
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
        // dd($request->all());
        $id = $request->get('id_request_lab');
        $data['id_request_lab'] = $request->get('id_request_lab');
        $data['id_user_petugas'] = $request->get('pemeriksa');
        $pemeriksaan = $request->get('id_pemeriksaan');
        $hasil = $request->get('hasil');

        // dd($pemeriksaan);

        $cek = DB::table('tindakan_lab')->where('id_request_lab',$id)->first();

        DB::beginTransaction();
        try{
            if(!$cek){
                $data['created_at'] = Carbon::now();
                $data['updated_at'] = Carbon::now();
                $pemeriksaan = $request->get('id_pemeriksaan');
                foreach($pemeriksaan as $i => $val){
                    $data['id_pemeriksaan'] = $val;
                    $data['hasil'] = $hasil[$i];
                    DB::table('tindakan_lab')->insert($data);
                }
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                foreach($pemeriksaan as $i => $val){
                    $data['id_pemeriksaan'] = $val;
                    $data['hasil'] = $hasil[$i];
                    DB::table('tindakan_lab')->where([['id_request_lab',$id],['id_pemeriksaan',$val]])->update($data);
                }
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
            dd($e);
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
            rl.id_pemeriksaan,
            rl.tgl_request,
            d.nama nama_dokter,
            dp.nama nama_pasien,
            dp.tgl_lahir
        ')
        ->where('rl.id',$id)
        ->first();

        $d = [
            'id' => $data->id,
            'id_pemeriksaan' => $data->id_pemeriksaan,
            'tgl_request' => $data->tgl_request,
            'nama_dokter' => $data->nama_dokter,
            'nama_pasien' => $data->nama_pasien,
            'tgl_lahir' => $data->tgl_lahir,
        ];

        return response()->json($d);

    }
    public function pemeriksaan($id,$id_req)
    {
        $cek = DB::table('tindakan_lab')->where('id_request_lab',$id_req)->first();
        $pemeriksaan = DB::table('pemeriksaan')->where('id',$id)->first();
        $temp = DB::table('tindakan_lab')->where([['id_pemeriksaan',$id],['id_request_lab',$id_req]])->first();
        if($cek){
            $hasil = $temp->hasil;
            $pemeriksa = $temp->id_user_petugas;
        }else{
            $hasil = '';
            $pemeriksa = 0;
        }

        $data = [
            'id' => $pemeriksaan->id,
            'nama' => $pemeriksaan->nama,
            'id_user_petugas' => $pemeriksa,
            'hasil' => $hasil
        ];

        return response()->json($data);
    }
    public function cetak($id)
    {
        $u = DB::table('request_lab as rl')
        ->join('registrasi_pasien as rp','rl.id_registrasi','rp.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('dokter as d','rl.id_dokter','d.id')
        ->join('users as u','rl.id_user_petugas','u.id')
        ->selectRaw('
        dp.nama nama_pasien,
        dp.jenis_kelamin,
        dp.tgl_lahir,
        dp.alamat,
        d.nama nama_dokter,
        rl.tgl_request,
        u.name as nama_petugas
        ')
        ->where('rl.id',$id)
        ->first();

        $data = DB::table('tindakan_lab as tl')->where('tl.id_request_lab',$id)
        ->join('pemeriksaan as p','p.id','tl.id_pemeriksaan')
        ->selectRaw('
        p.nama nama_pemeriksaan,
        tl.hasil,
        p.keterangan
        ')->get();
        $d['user'] = $u;
        $d['data'] = $data;

        $pdf = PDF::loadView('laporan.cetak-tindakan-lab', $d);

        return $pdf->stream('LapSensusHarian - Periode '.'.pdf');
    }
}
