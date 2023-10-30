<?php

namespace App\Http\Controllers;

use App\Models\tb_cargiver;
use App\Models\tb_durable_articles;
use App\Models\tb_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboard_Contronller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        //
         // $markers เเละ  $count  คือตัวเเปร ชื่ออะไรก็ได้
         $position = 0;
         $yearTotals = []; // สร้างตัวแปรอาร์เรย์เปล่า
         
         $totalTypes = [];
         $typesOfcount = []; 
         $durable= [[]];
         $count_durable = [[]];
         
         $i=0;
 
         $data = tb_durable_articles::all(); // ตารางที่ต้องการ'
         $broken = tb_durable_articles::where('da_flag', '2')->get();
         $lost = tb_durable_articles::where('da_flag', '3')->get();
         $dispose = tb_durable_articles::where('da_flag', '4')->get();
 
         $types = tb_type::select('id_type', 'da_type')->get();
 
         foreach ($types as $row) {
             if ($row->id_type !== null) {
             $count = tb_durable_articles::where('id_type', $row->id_type)->count();
             $name_durable = tb_durable_articles::select('da_name','id_type')->where('id_type', $row->id_type)->distinct()->get();
             foreach ($name_durable as $row2){
 
                 $durable[$i][] = $row2->da_name ;
 
                 $count_name_durable = tb_durable_articles::select('da_name','id_type')->where('da_name', $row2->da_name)->where('id_type', $row->id_type)->count();
                 $count_durable[$i][] = $count_name_durable;
                 
                 
 
             }
             // echo ("0000000000000000000000");
 
             $totalTypes[] = $count; // เพิ่มค่า $totalOfyear เข้าไปในตัวแปรอาร์เรย์ $yearTotals
             $typesOfcount[] = $row->da_type;
             // foreach ($row->id_type as $row2){
             //     $data = tb_durable_articles::where('id_type', $row->id_type)->count();
 
 
             // }
 
             $i++;
           
         }
            
         }
 
 
         // echo $cargivers;
         // echo json_encode($cargivers, JSON_UNESCAPED_UNICODE);
         // ดึงข้อมูลจากฐานข้อมูล
         $data_by_year = tb_durable_articles::selectRaw('YEAR(date_get) as year')
             ->groupBy('year')
             ->orderBy('year', 'ASC')
             ->get();
 
 
         foreach ($data_by_year as $row) {
             if ($row->year !== null) {
             $totalOfyear = tb_durable_articles::whereYear('date_get', $row->year)->count();
             $yearTotals[] = [strval($row->year),$totalOfyear]; // เพิ่มค่า $totalOfyear เข้าไปในตัวแปรอาร์เรย์ $yearTotals
         }
 
       
 
            
         }
     
 
 
         // สร้างตัวแปรสำหรับเก็บข้อมูลปีและจำนวนรายการทั้งหมด
         $years = $data->pluck('year');
         $totalItems = json_encode($yearTotals);
         $showTotalTypes = json_encode($totalTypes);
         $showTypesOfcount = json_encode($typesOfcount);
         $show_durable=json_encode($durable);
         $show_count_durable=json_encode($count_durable);
         // $caregiver_Totals = json_encode($caregiver_nameTotals, JSON_UNESCAPED_UNICODE);
         // echo $totalItems;
     
 
         $count = $data->count();
         $count_broken = $broken->count();
         $count_lost = $lost->count();
         $count_dispose = $dispose->count();
         $data_types = DB::table(env('PREFIX') . 'tb_types')->get();

        return view('user.template.show_dashboard', compact(
            'data',
            'count',
            'count_broken',
            'count_lost',
            'count_dispose',
            'years',
            'totalItems',
            'data_by_year',
            'showTotalTypes',
            'showTypesOfcount',
            'show_durable',
            'show_count_durable',
            'data_types'
        ));
    }




    public function admin()
    {
        //

        // $markers เเละ  $count  คือตัวเเปร ชื่ออะไรก็ได้
        $position = 0;
        $yearTotals = []; // สร้างตัวแปรอาร์เรย์เปล่า
        
        $totalTypes = [];
        $typesOfcount = []; 
        $durable= [[]];
        $count_durable = [[]];
        
        $i=0;

        $data = tb_durable_articles::all(); // ตารางที่ต้องการ'
        $broken = tb_durable_articles::where('da_flag', '2')->get();
        $lost = tb_durable_articles::where('da_flag', '3')->get();
        $dispose = tb_durable_articles::where('da_flag', '4')->get();

        $types = tb_type::select('id_type', 'da_type')->get();

        foreach ($types as $row) {
            if ($row->id_type !== null) {
            $count = tb_durable_articles::where('id_type', $row->id_type)->count();
            $name_durable = tb_durable_articles::select('da_name','id_type')->where('id_type', $row->id_type)->distinct()->get();
            foreach ($name_durable as $row2){

                $durable[$i][] = $row2->da_name ;

                $count_name_durable = tb_durable_articles::select('da_name','id_type')->where('da_name', $row2->da_name)->where('id_type', $row->id_type)->count();
                $count_durable[$i][] = $count_name_durable;
                
                

            }
            // echo ("0000000000000000000000");

            $totalTypes[] = $count; // เพิ่มค่า $totalOfyear เข้าไปในตัวแปรอาร์เรย์ $yearTotals
            $typesOfcount[] = $row->da_type;
            // foreach ($row->id_type as $row2){
            //     $data = tb_durable_articles::where('id_type', $row->id_type)->count();


            // }

            $i++;
          
        }
           
        }


        // echo $cargivers;
        // echo json_encode($cargivers, JSON_UNESCAPED_UNICODE);
        // ดึงข้อมูลจากฐานข้อมูล
        $data_by_year = tb_durable_articles::selectRaw('YEAR(date_get) as year')
            ->groupBy('year')
            ->orderBy('year', 'ASC')
            ->get();


        foreach ($data_by_year as $row) {
            if ($row->year !== null) {
            $totalOfyear = tb_durable_articles::whereYear('date_get', $row->year)->count();
            $yearTotals[] = [strval($row->year),$totalOfyear]; // เพิ่มค่า $totalOfyear เข้าไปในตัวแปรอาร์เรย์ $yearTotals
        }

      

           
        }
    


        // สร้างตัวแปรสำหรับเก็บข้อมูลปีและจำนวนรายการทั้งหมด
        $years = $data->pluck('year');
        $totalItems = json_encode($yearTotals);
        $showTotalTypes = json_encode($totalTypes);
        $showTypesOfcount = json_encode($typesOfcount);
        $show_durable=json_encode($durable);
        $show_count_durable=json_encode($count_durable);
        // $caregiver_Totals = json_encode($caregiver_nameTotals, JSON_UNESCAPED_UNICODE);
        // echo $totalItems;
    

        $count = $data->count();
        $count_broken = $broken->count();
        $count_lost = $lost->count();
        $count_dispose = $dispose->count();
        $data_types = DB::table(env('PREFIX') . 'tb_types')->get();

        return view('admin.template_admin.show_dashboard', compact(
            'data',
            'count',
            'count_broken',
            'count_lost',
            'count_dispose',
            'years',
            'totalItems',
            'data_by_year',
            'showTotalTypes',
            'showTypesOfcount',
            'show_durable',
            'show_count_durable',
            'data_types'
        ));
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
