<?php

namespace App\Http\Controllers;

use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class roomController extends Controller
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
     

        $add_room = new room;
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
            // "\inertia-svelte\publicimage\pictureImg\.$new_name"
            $file_name = $_FILES['files']['name'];
            $new_name = rand(0, microtime(true)) . '-' . $file_name[$key];
            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], public_path('image/roomImg/.') . $new_name)) {

                $add_room->room_picture = $new_name;
                
            }
        }


        $add_room->room_name = $request->get('room_name');
        $add_room->building_id = $request->get('building_id');
        $add_room->save();
        return redirect('/templateController/show_room/add');
    }

    

    public function change_room(Request $request)
    {
        //
     
        $Get_room_id = $request->get('room_id');
        $Get_room_name = $request->get('room_name');
        $Get_building_id = $request->get('building_id');


        $data = DB::table(env('PREFIX').'rooms')->where('room_id', $Get_room_id)->get();

        // print_r($data);
        $array = json_decode(json_encode($data), true);
        foreach ($array as $row) {
            echo $row["room_picture"];
            $delete = $row["room_picture"];
            $pasl= 'image/roomImg';
            unlink(public_path('/image/roomImg/.'.$row['room_picture']));
        }

       
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
            // "\inertia-svelte\publicimage\pictureImg\.$new_name"
            $file_name = $_FILES['files']['name'];
            $new_name = rand(0, microtime(true)) . '-' . $file_name[$key];
            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], public_path('image/roomImg/.') . $new_name)) {

                $Get_picture = $new_name;
                
            }
        }

  
       


        DB::table(env('PREFIX').'rooms')->where('room_id', $Get_room_id)->update([
            'room_picture' => $Get_picture,
            'room_name' => $Get_room_name,
            'building_id' => $Get_building_id,
            
        ]);

        return redirect('/templateController/show_room/add');
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
