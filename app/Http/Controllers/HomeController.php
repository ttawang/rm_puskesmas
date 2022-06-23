<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = "Home";
        // Widget Box
        $countRuangan = DB::table('unit')->count();
        $countDokter = DB::table('dokter')->count();
        $countObat = DB::table('obat')->count();
        $countPoli = DB::table('spesialis')->count();
        $data['widget_box'] = [
            [ 'itemBg' =>'bg-info', 'itemIcon' => 'fa-home','itemDesc' => 'RUANGAN', 'itemCount' => $countRuangan, ],
            [ 'itemBg' =>'bg-success', 'itemIcon' => 'fa-users','itemDesc' => 'DOKTER', 'itemCount' => $countDokter, ],
            [ 'itemBg' =>'bg-primary', 'itemIcon' => 'fa-capsules','itemDesc' => 'OBAT', 'itemCount' => $countObat, ],
            [ 'itemBg' =>'bg-warning', 'itemIcon' => 'fa-clinic-medical','itemDesc' => 'POLI', 'itemCount' => $countPoli, ],
        ];
        // Widget List Top 5 Diagnosis
        $data['topDiagnosis'] = DB::table('tindakan_pasien as tp')
            ->select('d.nama',DB::RAW('COUNT(tp.id_diagnosa) counter'),'d.deskripsi')
            ->leftJoin('diagnosa as d','d.id','=','tp.id_diagnosa')
            ->groupBy('tp.id_diagnosa')
            ->orderBy(DB::RAW('COUNT(tp.id_diagnosa)'),'DESC')
            ->limit(5)
            ->get();
        // Chart Widget
        $selectMonth = DB::raw('(SELECT 1 AS m UNION SELECT 2 AS m UNION SELECT 3 AS m UNION SELECT 4 AS m UNION SELECT 5 AS m UNION SELECT 6 AS m UNION SELECT 7 AS m UNION SELECT 8 AS m UNION SELECT 9 AS m UNION SELECT 10 AS m UNION SELECT 11 AS m UNION SELECT 12 AS m)');
        $charts = DB::table(DB::raw($selectMonth." as ym"))
            ->select('ym.m',DB::raw('COALESCE(count(reg.tgl_kunjungan)) as counter'))
            ->leftJoin('registrasi_pasien as reg','ym.m','=',DB::raw('MONTH(reg.tgl_kunjungan)'))
            ->groupBy('ym.m');

        $visitor = [];
        foreach ($charts->get() as $chart) {
            $visitor['chartLabel'][] = medium_bulan($chart->m);
            $visitor['chartCounterVisitor'][] = $chart->counter;
        }
        $data['chartPengunjung'] = $visitor;
        // Chart Dataset Pengunjung UMUM
        $dataSetPengunjungUmum = $this->getVisitorPasienKelompok('chartCounterVisitorUmum');
        $data['chartPengunjungUmum'] = $dataSetPengunjungUmum;
        // Chart Dataset Pengunjung BPJS
        $dataSetPengunjungBpjs = $this->getVisitorPasienKelompok('chartCounterVisitorBpjs',2);
        $data['chartPengunjungBpjs'] = $dataSetPengunjungBpjs;
        return view('admin.home',$data);
    }

    private function getVisitorPasienKelompok($define,$type = 1){
        $define = (empty($define)) ? 'chartCounter' : $define ;
        $selectMonth = DB::raw('(SELECT 1 AS m UNION SELECT 2 AS m UNION SELECT 3 AS m UNION SELECT 4 AS m UNION SELECT 5 AS m UNION SELECT 6 AS m UNION SELECT 7 AS m UNION SELECT 8 AS m UNION SELECT 9 AS m UNION SELECT 10 AS m UNION SELECT 11 AS m UNION SELECT 12 AS m)');
        $charts = DB::table(DB::raw($selectMonth." as ym"))
            ->select(
                'ym.m',
                DB::raw('COALESCE(count(reg.tgl_kunjungan),0) as counter'),

            )
            ->leftJoin('registrasi_pasien as reg','ym.m','=',DB::raw('MONTH(reg.tgl_kunjungan)'))
            ->rightJoin('data_pasien as dp','dp.id','=','reg.id_pasien')
            ->groupBy('ym.m');
        $charts = $charts->where('dp.id_kelompok_pasien',$type);
        $sqlCharts = Str::replaceArray('?', $charts->getBindings(), $charts->toSql());
        $compiledChart = DB::table(DB::raw($selectMonth." as bulan"))
            ->select('bulan.m',DB::raw('COALESCE(a.counter,0) as counter'))
            ->leftJoin(DB::raw('('.$sqlCharts.') as a'),'a.m','=','bulan.m')
            ->get();

        $visitor = [];
        foreach ($compiledChart as $chart) {
            $visitor['chartLabel'][] = medium_bulan($chart->m);
            $visitor[$define][] = $chart->counter;
        }
        return $visitor;
    }


    public function get_data(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('students')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

//     select bulan.m,COALESCE(a.counter,0) from
// (
// 		SELECT
// 			1 AS m
// 		UNION
// 			SELECT
// 				2 AS m
// 			UNION
// 				SELECT
// 					3 AS m
// 				UNION
// 					SELECT
// 						4 AS m
// 					UNION
// 						SELECT
// 							5 AS m
// 						UNION
// 							SELECT
// 								6 AS m
// 							UNION
// 								SELECT
// 									7 AS m
// 								UNION
// 									SELECT
// 										8 AS m
// 									UNION
// 										SELECT
// 											9 AS m
// 										UNION
// 											SELECT
// 												10 AS m
// 											UNION
// 												SELECT
// 													11 AS m
// 												UNION
// 													SELECT
// 														12 AS m
// 	) as bulan LEFT JOIN (SELECT
// 	`ym`.`m`,
// 	COALESCE(count(reg.tgl_kunjungan),0) AS counter
// -- 	COALESCE(count(dp.id_kelompok_pasien),0) AS counterKelompok
// FROM
// 	(
// 		SELECT
// 			1 AS m
// 		UNION
// 			SELECT
// 				2 AS m
// 			UNION
// 				SELECT
// 					3 AS m
// 				UNION
// 					SELECT
// 						4 AS m
// 					UNION
// 						SELECT
// 							5 AS m
// 						UNION
// 							SELECT
// 								6 AS m
// 							UNION
// 								SELECT
// 									7 AS m
// 								UNION
// 									SELECT
// 										8 AS m
// 									UNION
// 										SELECT
// 											9 AS m
// 										UNION
// 											SELECT
// 												10 AS m
// 											UNION
// 												SELECT
// 													11 AS m
// 												UNION
// 													SELECT
// 														12 AS m
// 	) AS ym
// LEFT JOIN `registrasi_pasien` AS `reg` ON `ym`.`m` = MONTH (reg.tgl_kunjungan)
// LEFT JOIN data_pasien as dp on dp.id = reg.id_pasien
// where dp.id_kelompok_pasien = 1
// GROUP BY
// 	ym.m) a on a.m = bulan.m

}
