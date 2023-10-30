<?php

namespace App\Http\Controllers;

use App\Models\reporting_statistics;
use App\Models\report_da;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportingStatisticsController extends Controller
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
    public function store(Request $request ,$id)
    {
        //
        
        $report_das = DB::table(env('PREFIX').'report_das')->where('da_id', '=', $id)->get();
        foreach($report_das as $row)
        {
            $addreporting_statistics = new reporting_statistics;
            $addreporting_statistics->id = null;
            $addreporting_statistics->da_id = $row->da_id;
            $addreporting_statistics->da_name = $row->da_name;
            $addreporting_statistics->caregiver_name = $row->caregiver_name;
            $addreporting_statistics->date_get =  $row->date_get;
            $addreporting_statistics->time_of_use = $row->time_of_use;
            $addreporting_statistics->da_price = $row->da_price;
            $addreporting_statistics->da_flag = "2"; //ชำรุด
            $addreporting_statistics->da_recheck_year = $row->da_recheck_year;
            $addreporting_statistics->room_id = $row->room_id;
            $addreporting_statistics->phone_number = $row->phone_number;
            $addreporting_statistics->note = $row->note;
            $addreporting_statistics->report_state = "ตรวจสอบเเล้ว";
            $count = DB::table(env('PREFIX').'reporting_statistics')->where('da_id', '=', $id)->count();
            $addreporting_statistics->count_report =$count+1;
            $addreporting_statistics->save();    
        }

        $data = DB::table(env('PREFIX').'report_das')->where('report_state', '=','แจ้งเสีย')->get();
        return view('admin.tableReport',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reporting_statistics  $reporting_statistics
     * @return \Illuminate\Http\Response
     */
    public function show(reporting_statistics $reporting_statistics)
    {
        //
        $data = DB::table(env('PREFIX').'reporting_statistics')->get();
        
        // return view('admin.template_admin.showreportstatistics',compact('data'));
        return view('admin.tableReportStatistics',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reporting_statistics  $reporting_statistics
     * @return \Illuminate\Http\Response
     */
    public function edit(reporting_statistics $reporting_statistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reporting_statistics  $reporting_statistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reporting_statistics $reporting_statistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reporting_statistics  $reporting_statistics
     * @return \Illuminate\Http\Response
     */
    public function destroy(reporting_statistics $reporting_statistics)
    {
        //
    }
}
