<?php

namespace App\Http\Controllers;

use App\Models\tb_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tb_typeController extends Controller
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
    public function change_type(Request $request)
    {
        //
        echo "tb_type";
        $get_id_type= $request->get('id_type');
        $get_change_type = $request->get('da_type');

        DB::table(env('PREFIX').'tb_types')->where('id_type',$get_id_type)->update([
            'da_type' => $get_change_type,

        ]);

        return redirect('/templateController/show_types/add');
    }

    public function store(Request $request)
    {
        //
        echo "tb_type";
        $add_tb_type = new tb_type;
        $add_tb_type->da_type = $request->get('da_type');
        $add_tb_type->save();
        return redirect('/templateController/show_types/add');
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
