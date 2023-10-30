<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\picture;
use Illuminate\Http\Request;



class sellController extends Controller
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
    public function update(Request $request, $da_id)
    {
        //
        print_r($_POST);
        print_r($_FILES);

 // print_r($data);
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
            // "\inertia-svelte\publicimage\pictureImg\.$new_name"
            $file_name = $_FILES['files']['name'];
            $new_name = rand(0, microtime(true)) . '-' . $file_name[$key];
            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], public_path('image/pictureImg/.') . $new_name)) {

                $addpicture = new picture();
                $addpicture->da_id = $request->get('da_id');
                $addpicture->picture_file = $new_name;
                $addpicture->da_flag = 4;
                $addpicture->save();
            }
        }
        DB::update('update'.env('PREFIX').'tb_durable_articles set da_flag=? 
        where da_id = ?',
        [4,$da_id]);


        $da_id = $request->input('da_id');

        $data = DB::table(env('PREFIX').'pictures')->where('da_id', $da_id)->get();
      
       $array = json_decode(json_encode($data), true);
       foreach( $array as $row ) {
           echo $row["picture_file"];
           $delete = $row["picture_file"];
           unlink("image/pictureImg/.$row[picture_file]"); 
       } 

       DB::table(env('PREFIX').'pictures')->where('da_flag', '!=', 4)
       ->where('da_id', $da_id)
       ->delete();



        // return redirect('tableneo/show'); 
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
    public function showSellForm($da_id) {
        return view('admin.sell', ['da_id' => $da_id]);
    }
}
