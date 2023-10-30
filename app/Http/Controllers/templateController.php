<?php

namespace App\Http\Controllers;

use App\Models\building;
use App\Models\tb_template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class templateController extends Controller
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
        echo "แก้ไขเมนู";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show()
    {
        //
        $data_building = DB::table(env('PREFIX') . 'buildings')->get();
        return view('admin.edit_template.show_edit_template', compact('data_building'));
    }

    public function show_building($GetStr)
    {
        //
        $status = $GetStr;
        $data = DB::table(env('PREFIX') . 'buildings')->orderBy('building_name', 'asc')->get();
        return view('admin.edit_template.show_edit_building', compact('status', 'data'));
    }

    public function show_cargivers($GetStr)
    {
        //
        $status = $GetStr;


        $data = DB::table(env('PREFIX') . 'tb_cargivers')
            ->join(env('PREFIX') . 'user_statuses', env('PREFIX') . 'tb_cargivers.user_statuses', '=', env('PREFIX') . 'user_statuses.id')
            ->get();
        return view('admin.edit_template.show_edit_cargivers', compact('status', 'data'));
    }



    public function DeleteIdcargivers(Request $request)
    {
        //

        // $data = DB::table('tb_cargivers')->get();

        $cargiver_id  = $request->input('cargiver_id');

        print_r($_POST);
        // DB::update('update tb_cargivers set username = ?, password= ? where cargiver_id = ?',
        // [$username,$password,$cargiver_id]);


        DB::table(env('PREFIX') . 'tb_cargivers')->where('cargiver_id', $cargiver_id)->update([
            'user_statuses' => '3',
            'cargiver_username' => NULL,
            'cargiver_password' => NULL,
        ]);


        // DB::table('tb_cargivers')
        // ->where('cargiver_id', $cargiver_id)
        // ->update(['username' => 1]);


        return redirect()->to('/templateController/show_cargivers/add')->send();
    }


    public function change_name(Request $request)
    {
        //

        // $data = DB::table('tb_cargivers')->get();

        $cargiver_id  = $request->input('cargiver_id');
        $caregiver_name = $request->input('caregiver_name');
        print_r($_POST);



        // DB::update('update tb_cargivers set username = ?, password= ? where cargiver_id = ?',
        // [$username,$password,$cargiver_id]);


        DB::table(env('PREFIX') . 'tb_cargivers')->where('cargiver_id', $cargiver_id)->update([
            'caregiver_name' => $caregiver_name,
        ]);


        // DB::table('tb_cargivers')
        // ->where('cargiver_id', $cargiver_id)
        // ->update(['username' => 1]);


        return redirect()->to('/templateController/show_cargivers/add')->send();
    }


    public function AddIdcargivers(Request $request)
    {
        //

        // $data = DB::table('tb_cargivers')->get();

        $cargiver_id  = $request->input('cargiver_id');
        $username = $request->input('username');
        $password = $request->input('password');
        $user_statuses = $request->input('user_statuses');
        print_r($_POST);



        // DB::update('update tb_cargivers set username = ?, password= ? where cargiver_id = ?',
        // [$username,$password,$cargiver_id]);


        DB::table(env('PREFIX') . 'tb_cargivers')->where('cargiver_id', $cargiver_id)->update([
            'user_statuses' => $user_statuses,
            'cargiver_username' => $username,
            'cargiver_password' => $password,
        ]);


        // DB::table('tb_cargivers')
        // ->where('cargiver_id', $cargiver_id)
        // ->update(['username' => 1]);


        return redirect()->to('/templateController/show_cargivers/add')->send();
    }

    public function show_room($GetStr, $Getbuild = null,$building_id = null)
    {
        //
        $building_id = $building_id;
        $status = $GetStr;

        if ($Getbuild !== null) {
            // กระทำเมื่อ $Getbuild ไม่ใช่ค่า null
            
            $data = DB::table(env('PREFIX') . 'rooms')
                ->when($Getbuild, function ($query, $Getbuild) {
                    return $query->where('building_id', $Getbuild);
                })
                ->orderBy('room_name', 'asc')
                ->get();
        } else {
            // กระทำเมื่อ $Getbuild เป็นค่า null
            
            $data = DB::table(env('PREFIX') . 'rooms')
                ->orderBy('room_name', 'asc')->get();
        }



        $data_buildings = DB::table(env('PREFIX') . 'buildings')
            ->orderBy('building_name', 'asc')
            ->get();

        return view('admin.edit_template.show_edit_room', compact('data', 'status', 'data_buildings','building_id'));
    }

    public function show_types($GetStr)
    {
        //
        $status = $GetStr;
        $data = DB::table(env('PREFIX') . 'tb_types')->get();
        return view('admin.edit_template.show_edit_types', compact('status', 'data'));
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
        echo "อัพ";
        // $update_template = tb_template::find(['id_template' => $id]);
        // $update_template->template_data = $request->input('template_data');
        // $update_template->template_spec = $request->input('template_spec');
        // $update_template->save();


        if ($id == 2) {


            foreach ($_FILES['files']['tmp_name'] as $key => $value) {
                // "\inertia-svelte\publicimage\pictureImg\.$new_name"
                $file_name = $_FILES['files']['name'];
                $new_name = rand(0, microtime(true)) . '-' . $file_name[$key];
                if (move_uploaded_file($_FILES['files']['tmp_name'][$key], public_path('image/.') . $new_name)) {

                    DB::update(
                        'update ' . env('PREFIX') . 'tb_templates set template_data = ?,template_spec=? 
                    where id_template = ?',
                        [$new_name, "banner", $id]
                    );
                }
            }
        } else {
            DB::update(
                'update ' . env('PREFIX') . 'tb_templates set template_data = ?,template_spec=? 
            where id_template = ?',
                [$request->input('template_data'), "title", $id]
            );
        }


        return redirect('/templateController/show');
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
