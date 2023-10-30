<?php

namespace App\Http\Controllers;

use App\Models\building;
use App\Models\room;
use App\Models\tb_cargiver;
use App\Models\tb_durable_articles;
use App\Models\tb_flag;
use App\Models\tb_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Export_ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
    }


    public function show_survey()

    {
        //

        $tb_durable_articles = DB::table(env('PREFIX') . 'tb_durable_articles')
            ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
            ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
            ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
            ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
            ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')
            ->select(
                env('PREFIX') . 'tb_durable_articles.*',
                env('PREFIX') . 'tb_cargivers.cargiver_id',
                env('PREFIX') . 'tb_cargivers.caregiver_name',
                env('PREFIX') . 'tb_cargivers.user_statuses',
                env('PREFIX') . 'tb_cargivers.cargiver_username',
                env('PREFIX') . 'tb_cargivers.cargiver_password',
                env('PREFIX') . 'rooms.room_id',
                env('PREFIX') . 'rooms.room_picture',
                env('PREFIX') . 'rooms.room_name',
                env('PREFIX') . 'rooms.building_id',

                env('PREFIX') . 'tb_flag.da_flag',
                env('PREFIX') . 'tb_flag.da_status',
                env('PREFIX') . 'tb_types.id_type',
                env('PREFIX') . 'tb_types.da_type',
                env('PREFIX') . 'buildings.building_id',
                env('PREFIX') . 'buildings.building_name',
                env('PREFIX') . 'buildings.building_picture'
            )
            ->get();

        $tb_types = tb_type::all();
        $tb_flag = tb_flag::all();
        $tb_cargivers = tb_cargiver::all();
        $get_dateget = tb_durable_articles::selectRaw('YEAR(date_get) as year')
            ->groupByRaw('YEAR(date_get)')
            ->get();

        $room = Room::orderBy('room_name', 'asc')->get();
        $buildings =  building::orderBy('building_name', 'asc')->get();


        // $expired =  DB::table(env('PREFIX') . 'tb_durable_articles')
        //     ->select(env('PREFIX') . 'tb_durable_articles.expired')
        //     ->where( 'da_flag', 4)
        //     ->groupBy('expired')
        //     ->get();

        $expired = DB::table(env('PREFIX') .'tb_durable_articles')
        ->selectRaw('YEAR(expired) as year')
        ->where( 'da_flag', 4)
        ->groupByRaw('YEAR(expired)')
        ->get();


        // $created_at =  DB::table(env('PREFIX') . 'tb_durable_articles')
        //     ->select(env('PREFIX') . 'tb_durable_articles.created_at')
        //     ->groupBy('created_at')
        //     ->get();

        $created_at = DB::table(env('PREFIX') .'tb_durable_articles')
        ->selectRaw('YEAR(created_at) as year')
        ->groupByRaw('YEAR(created_at)')
        ->get();





        return view('admin.show_Export', compact(
            'tb_durable_articles',
            'tb_types',
            'tb_flag',
            'tb_cargivers',
            'get_dateget',
            'room',
            'buildings',
            'expired',
            'created_at',






        ));
    }



    public function Export_survey($status_like,$like_data)

    {
        //
        $output = '';


        if($status_like == "created_at"){

            $data = DB::table(env('PREFIX') . 'tb_durable_articles')
            ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
            ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
            ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
            ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
            ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')
            ->select(
                env('PREFIX') . 'tb_durable_articles.*',
                env('PREFIX') . 'tb_cargivers.cargiver_id',
                env('PREFIX') . 'tb_cargivers.caregiver_name',
                env('PREFIX') . 'tb_cargivers.user_statuses',
                env('PREFIX') . 'tb_cargivers.cargiver_username',
                env('PREFIX') . 'tb_cargivers.cargiver_password',
                env('PREFIX') . 'rooms.room_id',
                env('PREFIX') . 'rooms.room_picture',
                env('PREFIX') . 'rooms.room_name',
                env('PREFIX') . 'rooms.building_id',
    
                env('PREFIX') . 'tb_flag.da_flag',
                env('PREFIX') . 'tb_flag.da_status',
                env('PREFIX') . 'tb_types.id_type',
                env('PREFIX') . 'tb_types.da_type',
                env('PREFIX') . 'buildings.building_id',
                env('PREFIX') . 'buildings.building_name',
                env('PREFIX') . 'buildings.building_picture'
            )
            ->whereYear( env('PREFIX') . 'tb_durable_articles.'.$status_like, '=' ,$like_data)
            ->get();

            
        }
        if($status_like == "expired"){

            $data = DB::table(env('PREFIX') . 'tb_durable_articles')
            ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
            ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
            ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
            ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
            ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')
            ->select(
                env('PREFIX') . 'tb_durable_articles.*',
                env('PREFIX') . 'tb_cargivers.cargiver_id',
                env('PREFIX') . 'tb_cargivers.caregiver_name',
                env('PREFIX') . 'tb_cargivers.user_statuses',
                env('PREFIX') . 'tb_cargivers.cargiver_username',
                env('PREFIX') . 'tb_cargivers.cargiver_password',
                env('PREFIX') . 'rooms.room_id',
                env('PREFIX') . 'rooms.room_picture',
                env('PREFIX') . 'rooms.room_name',
                env('PREFIX') . 'rooms.building_id',
    
                env('PREFIX') . 'tb_flag.da_flag',
                env('PREFIX') . 'tb_flag.da_status',
                env('PREFIX') . 'tb_types.id_type',
                env('PREFIX') . 'tb_types.da_type',
                env('PREFIX') . 'buildings.building_id',
                env('PREFIX') . 'buildings.building_name',
                env('PREFIX') . 'buildings.building_picture'
            )
            ->whereYear( env('PREFIX') . 'tb_durable_articles.'.$status_like, '=' ,$like_data)
            ->get();

            
        }
        if($status_like == "date_get"){

            $data = DB::table(env('PREFIX') . 'tb_durable_articles')
            ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
            ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
            ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
            ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
            ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')
            ->select(
                env('PREFIX') . 'tb_durable_articles.*',
                env('PREFIX') . 'tb_cargivers.cargiver_id',
                env('PREFIX') . 'tb_cargivers.caregiver_name',
                env('PREFIX') . 'tb_cargivers.user_statuses',
                env('PREFIX') . 'tb_cargivers.cargiver_username',
                env('PREFIX') . 'tb_cargivers.cargiver_password',
                env('PREFIX') . 'rooms.room_id',
                env('PREFIX') . 'rooms.room_picture',
                env('PREFIX') . 'rooms.room_name',
                env('PREFIX') . 'rooms.building_id',
    
                env('PREFIX') . 'tb_flag.da_flag',
                env('PREFIX') . 'tb_flag.da_status',
                env('PREFIX') . 'tb_types.id_type',
                env('PREFIX') . 'tb_types.da_type',
                env('PREFIX') . 'buildings.building_id',
                env('PREFIX') . 'buildings.building_name',
                env('PREFIX') . 'buildings.building_picture'
            )
            ->whereYear( env('PREFIX') . 'tb_durable_articles.'.$status_like, '=' ,$like_data)
            ->get();

            
        }

        if($status_like == "building_id"){

            $data = DB::table(env('PREFIX') . 'tb_durable_articles')
            ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
            ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
            ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
            ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
            ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')
            ->select(
                env('PREFIX') . 'tb_durable_articles.*',
                env('PREFIX') . 'tb_cargivers.cargiver_id',
                env('PREFIX') . 'tb_cargivers.caregiver_name',
                env('PREFIX') . 'tb_cargivers.user_statuses',
                env('PREFIX') . 'tb_cargivers.cargiver_username',
                env('PREFIX') . 'tb_cargivers.cargiver_password',
                env('PREFIX') . 'rooms.room_id',
                env('PREFIX') . 'rooms.room_picture',
                env('PREFIX') . 'rooms.room_name',
                env('PREFIX') . 'rooms.building_id',
    
                env('PREFIX') . 'tb_flag.da_flag',
                env('PREFIX') . 'tb_flag.da_status',
                env('PREFIX') . 'tb_types.id_type',
                env('PREFIX') . 'tb_types.da_type',
                env('PREFIX') . 'buildings.building_id',
                env('PREFIX') . 'buildings.building_name',
                env('PREFIX') . 'buildings.building_picture'
            )
            ->where( env('PREFIX') . 'buildings.'.$status_like, $like_data)
            ->get();

        }


        if($status_like != "date_get" && $status_like != "building_id"&& $status_like != "expired"&& $status_like != "created_at" ){

            $data = DB::table(env('PREFIX') . 'tb_durable_articles')
            ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
            ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
            ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
            ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
            ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')
            ->select(
                env('PREFIX') . 'tb_durable_articles.*',
                env('PREFIX') . 'tb_cargivers.cargiver_id',
                env('PREFIX') . 'tb_cargivers.caregiver_name',
                env('PREFIX') . 'tb_cargivers.user_statuses',
                env('PREFIX') . 'tb_cargivers.cargiver_username',
                env('PREFIX') . 'tb_cargivers.cargiver_password',
                env('PREFIX') . 'rooms.room_id',
                env('PREFIX') . 'rooms.room_picture',
                env('PREFIX') . 'rooms.room_name',
                env('PREFIX') . 'rooms.building_id',
    
                env('PREFIX') . 'tb_flag.da_flag',
                env('PREFIX') . 'tb_flag.da_status',
                env('PREFIX') . 'tb_types.id_type',
                env('PREFIX') . 'tb_types.da_type',
                env('PREFIX') . 'buildings.building_id',
                env('PREFIX') . 'buildings.building_name',
                env('PREFIX') . 'buildings.building_picture'
            )
            ->where( env('PREFIX') . 'tb_durable_articles.'.$status_like, $like_data)
            ->get();

        }
      


    
        $output = '
                    <table border="1" class="table table-hover">
					<thead>
                    <tr>
                    <th>รหัสครุภัณฑ์</th>
                    <th>ชื่อ</th>
                    <th>ประเภท</th>
                    <th>ชื่อผู้ดูแล</th>
                    <th>วันที่ได้รับ</th>
                    <th>ระยะเวลาใช้งาน</th>
                    <th>ราคา</th>
                    <th>สถานะ</th>
                    <th>วันที่ตรวจเช็ค</th>
                    <th>ตึก</th>
                    <th>ห้องเรียน</th>
                    <th>จำนวนแจ้งเสีย</th>
                    <th>วันที่จำหน่าย</th>
                  </tr>
					</thead>
                    
                    ';



        $output .= '<tbody>';

        foreach ($data as $row) {

            date_default_timezone_set('Asia/Bangkok');
            $time = time();
            $stored_time = '2022-12-15';
            $current_time = date('Y-m-d');
            $u_y = date("Y", $time) - date("20y", strtotime($row->date_get)); //เอาจากที่ได้จาก sql มาใส่เเทน 2022
            if (date("m", $time) >= date("m", strtotime($row->date_get))) {
              $u_m = date("m", $time) - date("m", strtotime($row->date_get));
            }
            if (date("m", $time) <= date("m", strtotime($row->date_get))) {
              $u_m =  date("m", strtotime($row->date_get)) - date("m", $time);
            }
            if (date("d", $time) >= date("d", strtotime($row->date_get))) {
              $u_d =  date("d", $time) - date("d", strtotime($row->date_get));
            }
            if (date("d", $time) <= date("d", strtotime($row->date_get))) {
              $u_d =  date("d", strtotime($row->date_get)) - date("d", $time);
            }



            if($row->expired != null){
                $if_expired  = date('d-m-Y', strtotime($row->expired));
            }
            if($row->expired == null){
                $if_expired  = "";
            }
            

            $output .= '

                    <tr>
                        <td>' . $row->da_id . '</td>
                        <td>' . $row->da_name . '</td>
                        <td>' . $row->da_type . '</td>
                        <td>' . $row->caregiver_name . '</td>
                        <td>' . $row->date_get . '</td>
                        <td>' . $u_y . 'ปี' . $u_m .'เดือน'. $u_d. 'วัน' . '</td>
                        <td>' . number_format($row->da_price) . '</td>
                        <td>' . $row->da_status . '</td>
                        <td>' . date('d-m-Y', strtotime($row->created_at)). '</td>
                        <td>' . $row->building_name . '</td>
                        <td>' . $row->room_name . '</td>
                        <td>' . $row->count_report . '</td>
                        <td>' . $if_expired . '</td>
                    </tr>';
        }

        $output .= '
                    
                    </tbody>
                    </table>';

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=export_survey.xls");
        echo $output;





        // return view('admin.template_admin.Export_broken',compact('data'));
    }

    public function show_broken()

    {
        //




        $data = DB::table(env('PREFIX') . 'tb_durable_articles')
            ->where(env('PREFIX') . 'da_flag', 2)
            ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
            ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
            ->select(env('PREFIX') . 'tb_durable_articles.*', env('PREFIX') . 'tb_cargivers.*', env('PREFIX') . 'rooms.*')
            ->get();





        return view('admin.template_admin.Export_broken', compact('data'));
    }


    public function Export_broken()

    {
        //
        $output = '';
        $data = DB::table(env('PREFIX') . 'tb_durable_articles')
            ->where(env('PREFIX') . 'da_flag', 2)
            ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
            ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
            ->select(env('PREFIX') . 'tb_durable_articles.*', env('PREFIX') . 'tb_cargivers.*', env('PREFIX') . 'rooms.*')
            ->get();
        $output = '
                    <table border="1" class="table table-hover">
					<thead>
						<tr class="info">
							<th>หมายเลขครุภัณฑ์</th>
							<th>รายการ</th>
							<th>ชื่อห้อง</th>
							<th>ตำเเหน่ง</th>
							<th>ผู้รับผิดชอบ</th>
						</tr>
					</thead>
                    
                    ';



        $output .= '<tbody>';

        foreach ($data as $row) {
            $output .= '

                    <tr>
                        <td>' . $row->da_id . '</td>
                        <td>' . $row->da_name . '</td>
                        <td>' . $row->room_name . '</td>
                        <td>' . $row->address . '</td>
                        <td>' . $row->caregiver_name . '</td>
                    </tr>';
        }

        $output .= '
                    
                    </tbody>
                    </table>';

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=export.xls");
        echo $output;





        // return view('admin.template_admin.Export_broken',compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
