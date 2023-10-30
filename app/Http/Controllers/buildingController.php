<?php

namespace App\Http\Controllers;

use App\Models\building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class buildingController extends Controller
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
    public function store(Request $request)
    {
        //
    // ทำการเเก้ใน Models 
        $add_Building = new building;
        $add_Building->building_name = $request->get('building_name');




        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
            // "\inertia-svelte\publicimage\pictureImg\.$new_name"
            $file_name = $_FILES['files']['name'];
            $new_name = rand(0, microtime(true)) . '-' . $file_name[$key];
            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], public_path('image/buildingImg/.') . $new_name)) {

                $add_Building->building_picture = $new_name;
                $add_Building->save();
            }



        }

        // $data_building = DB::table('buildings')->get();
        // return view('admin.edit_template',compact('data_building'));
        return redirect('/templateController/show_building/add');
    }


    public function change_building(Request $request)
    {
        //
      
        $get_building_id_old= $request->get('building_id_old');
        $get_building_id= $request->get('building_id');
        $get_building_name= $request->get('building_name');



        $data = DB::table(env('PREFIX').'buildings')->where('building_id', $get_building_id)->get();

        // print_r($data);
        $array = json_decode(json_encode($data), true);
        foreach ($array as $row) {
            echo $row["building_picture"];
            $delete = $row["building_picture"];
            unlink(public_path('/image/buildingImg/.'.$row['building_picture']));
        }



        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
            // "\inertia-svelte\publicimage\pictureImg\.$new_name"
            $file_name = $_FILES['files']['name'];
            $new_name = rand(0, microtime(true)) . '-' . $file_name[$key];
            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], public_path('image/buildingImg/.') . $new_name)) {

                $get_building_picture = $new_name;
              
            }
        }

        DB::table(env('PREFIX').'buildings')->where('building_id', $get_building_id)->update([
            'building_name' => $get_building_name,
            'building_picture' => $get_building_picture,
        ]);

        // $data_building = DB::table('buildings')->get();
        // return view('admin.edit_template',compact('data_building'));
        return redirect('/templateController/show_building/add');
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
