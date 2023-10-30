<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_durable_articles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\picture;
use App\Models\tb_cargiver;
use App\Models\tb_save_pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.table');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // caregiver_name}/{user_statuses
    public function show($caregiver_name, $user_statuses)
    {
        /**
         * ใช้ตรงนี้อะ.
         **/
        // $data_rooms = DB::table(env('PREFIX') . 'rooms')->get();
        // $data_tb_types = DB::table(env('PREFIX') . 'tb_types')->get();
        // $data_tb_cargivers = DB::table(env('PREFIX') . 'tb_cargivers')->get();
        // $data_tb_flag = DB::table(env('PREFIX') . 'tb_flag')->get();

        $Getcaregiver_name = $caregiver_name;
        $Getuser_statuses = $user_statuses;


        // if ($user_statuses == 1) {
        //     $tb_durable_articles = DB::table(env('PREFIX') . 'tb_durable_articles')
        //         ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
        //         ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
        //         ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
        //         ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
        //         ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')

        //         ->select(
        //             env('PREFIX') . 'tb_durable_articles.*',
        //             env('PREFIX') . 'tb_cargivers.cargiver_id',
        //             env('PREFIX') . 'tb_cargivers.caregiver_name',
        //             env('PREFIX') . 'rooms.room_id',
        //             env('PREFIX') . 'rooms.room_name',
        //             env('PREFIX') . 'rooms.building_id',
        //             env('PREFIX') . 'tb_flag.da_flag',
        //             env('PREFIX') . 'tb_flag.da_status',
        //             env('PREFIX') . 'tb_types.id_type',
        //             env('PREFIX') . 'tb_types.da_type',
        //             env('PREFIX') . 'buildings.building_id',
        //             env('PREFIX') . 'buildings.building_name',

        //         )

        //         ->get();
        // } else {

        //     $tb_durable_articles = DB::table(env('PREFIX') . 'tb_durable_articles')
        //         ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
        //         ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
        //         ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
        //         ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
        //         ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')

        //         ->where('caregiver_name', '=', $caregiver_name)
        //         ->select(
        //             env('PREFIX') . 'tb_durable_articles.*',
        //             env('PREFIX') . 'tb_cargivers.cargiver_id',
        //             env('PREFIX') . 'tb_cargivers.caregiver_name',
        //             env('PREFIX') . 'rooms.room_id',
        //             env('PREFIX') . 'rooms.room_name',
        //             env('PREFIX') . 'rooms.building_id',  
        //             env('PREFIX') . 'tb_flag.da_flag',
        //             env('PREFIX') . 'tb_flag.da_status',
        //             env('PREFIX') . 'tb_types.id_type',
        //             env('PREFIX') . 'tb_types.da_type',
        //             env('PREFIX') . 'buildings.building_id',
        //             env('PREFIX') . 'buildings.building_name',

        //         )
        //         ->get();
        // }




        return view('admin.template_admin.edit_table', compact(
            'Getcaregiver_name',
            'Getuser_statuses'
        ));

        /**
         * ถึงนี่
         **/
        //
    }

    public function deletePicture(Request $request)
    {
        $da_id = $request->input('da_id');
        $picture_file = $request->input('picture_file');

        // Log the variables to console
        echo "<script>console.log('id $da_id', 'filename $picture_file')</script>";

        $image_path = "image/pictureImg/.$picture_file";

        if (file_exists($image_path)) {
            // Delete the picture file from the file system
            unlink($image_path);

            // Delete the corresponding record from the database
            DB::table(env('PREFIX') . 'pictures')->where('picture_file', $picture_file)->delete();

            $response = array('status' => 'success', 'message' => 'Picture deleted successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Picture file not found');
        }

        // Return response as JSON
        return response()->json($response);
    }

    public function editPicture(Request $request)
    {
        // Get the parameters from the AJAX request
        $old_picture = $request->input('old_picture_file');
        $new_picture = $request->file('new_picture_file');
        $id = $request->input('id');
    
        // Check if a new picture was uploaded
        if ($new_picture) {
            // Delete the old file from the server
            $old_file_path = public_path('image/pictureImg') . '/' . $old_picture;
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
    
            // Generate a random name for the uploaded picture
            $random_name = Str::random(10) . '.' . $new_picture->getClientOriginalExtension();
    
            // Move the uploaded picture to the public/image/pictureImg directory
            $new_image = Image::make($new_picture);
            $new_image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            
            $new_image->save(public_path('image/pictureImg/.') . $random_name);
    
            // Update the picture file name in your database
            DB::table(env('PREFIX') . 'pictures')
                ->where('da_id', $id)
                ->where('picture_file', $old_picture)
                ->update(['picture_file' => $random_name]);
        }
    
        // Return a JSON response
        return response()->json([
            'success' => true,
            'picture_file' => $random_name ?? $old_picture,
            'id' => $id,
        ]);
    }
    public function addrealPicture(Request $request)
{
    if (!$request->hasFile('file')) {
        return response()->json(['success' => false, 'error' => 'No files uploaded.']);
    }

    $images = $request->file('file');
    $da_id = $request->input('da_id');
    $item_id = $request->input('item_id');
    $a = $request->input('a');
    $flag = $request->input('flag');
    $fileNames = [];

    try {
        foreach ($images as $image) {
            $randomName = Str::random(10) . '.' . $image->getClientOriginalExtension();

            // Load the image using Intervention Image
            $newImage = Image::make($image);

            // Resize the image to your desired dimensions
            $newImage->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Save the resized image to the folder
            $newImage->save(public_path('image/pictureImg/.') . $randomName);

            $fileNames[] = $randomName;

            // Insert the image information into the database
            DB::table(env('PREFIX') . 'pictures')->insert([
                'da_id' => $da_id,
                'picture_file' => $randomName,
                'da_flag' => $flag
            ]);
        }

        return response()->json([
            'success' => true,
            'pictures' => $fileNames,
            'da_id' => $da_id,
            'item_id' => $item_id,
            'a' => $a
        ]);
    } catch (\Throwable $th) {
        return response()->json(['success' => false, 'error' => $th->getMessage()]);
    }
}
    // public function show($id)
    // {
    //     $stateQR = 0;
    //     $data_id = 0; 
    //     $passname = 0;
    //     $passcare= 0;
    //     $passprice= 0;

    //     $conn = mysqli_connect("localhost", "admin", "Admin123", "durable_articlesdb") or die("Error: " . mysqli_error($conn));
    //     mysqli_query($conn, "SET NAMES 'utf8' ");

    //     $query3 = "
    //     SELECT DISTINCT  m.*,p.cargiver_id,r.room_picture,b.building_picture,r.room_name,b.building_name,x.picture_file,
    //     b.building_id,p.cargiver_id,x.da_id,p.caregiver_name,    t.da_status ,type.da_type
    //     FROM tb_durable_articles as m 

    //     INNER JOIN  tb_cargivers as p ON p.cargiver_id = m.cargiver_id
    //     INNER JOIN  rooms as r ON r.room_id = m.room_id
    //     INNER JOIN  buildings as b ON b.building_id = r.building_id
    //     INNER JOIN  pictures as x ON x.da_id = m.da_id

    //     INNER JOIN tb_flag as t  ON  t.da_flag = m.da_flag

    //     INNER JOIN tb_types as type  ON  type.id_type = m.id_type

    //     GROUP BY m.da_id HAVING count(m.da_id)>=1;";

    //     $query4 = "
    //     SELECT * FROM `tb_cargivers`;  ";
    //     $query5 = "
    //     SELECT * FROM `rooms`;  ";
    //     $query6 = "
    //     SELECT * FROM `tb_types`;  ";
    //     $query7 = "
    //     SELECT * FROM tb_flag WHERE da_flag IN (1, 2, 3); ";

    //         $data = mysqli_query($conn, $query3);
    //         $data_tb_cargivers = mysqli_query($conn, $query4);
    //         $data_rooms = mysqli_query($conn, $query5);
    //         $data_tb_types = mysqli_query($conn, $query6);
    //         $data_flag = mysqli_query($conn, $query7);



    //         return view('admin.table',compact('data','stateQR','data_id','data_rooms','data_tb_types',
    //         'data_tb_cargivers','data_flag','passname','passcare','passprice'));


    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }


    public function sell(Request $request)
    {


        $id = $request->input('da_id');
        $caregiver_name = $request->input('Getcaregiver_name');
        $user_statuses = $request->input('Getuser_statuses');
        $expired = $request->input('expired');
        print_r($_POST);



        // DB::table(env('PREFIX') . 'pictures')->where('da_id', $id)->delete();
        print_r($_FILES['files']['tmp_name']);
      /*   foreach ($_FILES['files']['tmp_name'] as $key => $value) {
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
        } */
        
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
            $file_name = $_FILES['files']['name'][$key];
            $new_name = rand(0, microtime(true)) . '-' . $file_name;
            // โหลดรูปภาพ
            $image = Image::make($_FILES['files']['tmp_name'][$key]);
            // ปรับคุณภาพและบีบอัดรูปภาพตามต้องการ
            $image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // บันทึกรูปภาพใหม่
            $image->save(public_path('image/pictureImg/.') . $new_name);
            // บันทึกข้อมูลภาพในฐานข้อมูล
            $addpicture = new picture();
            $addpicture->da_id = $request->get('da_id');
            $addpicture->picture_file = $new_name;
            $addpicture->da_flag = 4;
            $addpicture->save();
        }


        // "\inertia-svelte\publicimage\pictureImg\.$new_name"
        $file_name = $_FILES['file_input']['name'];
        $new_name = rand(0, microtime(true)) . '-' . $id . '-' . $file_name;
        if (move_uploaded_file($_FILES['file_input']['tmp_name'], public_path('pdf/.') . $new_name)) {

            $add_pdf = new tb_save_pdf();
            $add_pdf->da_id = $request->get('da_id');
            $add_pdf->pdf_file = $new_name;
            $add_pdf->save();
        }


        DB::update(
            'update ' . env('PREFIX') . 'tb_durable_articles set da_flag=? ,expired=?
            where da_id = ?',
            [4, $expired, $id]
        );

        // DB::table('pictures')->where('da_id',$id)->delete();

        return redirect()->to(url()->previous());

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
        // print_r($_POST);


        $stateQR = 0;
        $data_id = 0;


        $da_id = $request->input('da_id');
        $id = $request->input('id');
        $id_type = $request->input('id_type');
        $cargiver_id = $request->input('cargiver_id');
        $duracleidkeep = $request->input('duracleidkeep');
        $da_name = $request->input('da_name');
        $caregiver_name = $request->input('caregiver_name');
        $date_get = $request->input('dateget');
        $time_of_use = $request->input('time_of_use');
        $da_price = $request->input('da_price');
        $da_flag = $request->input('da_flag');
        $da_type = $request->input('da_type');
        $created_at = $request->input('created_at');
        $room_id = $request->input('room_id');

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');



        DB::update(
            'update ' . env('PREFIX') . 'tb_durable_articles set da_id = ?,da_name=?,cargiver_id=?,date_get=? 
        ,time_of_use = ?,da_price=?,da_flag=?,created_at=? ,room_id=? ,id_type=? ,latitude=? ,longitude=?
        where id = ?',
            [$da_id, $da_name, $cargiver_id, $date_get, $time_of_use, $da_price, $da_flag, $created_at, $room_id, $id_type, $latitude, $longitude, $id]
        );

        /*   DB::update('update tb_cargivers set caregiver_name=?,da_id=?
        where da_id = ?',
        [$caregiver_name,$da_id,$duracleidkeep]); */
        echo $duracleidkeep;
        echo $da_flag;
        DB::update(
            'update ' . env('PREFIX') . 'pictures set da_id=? ,da_flag=?
        where da_id = ?',
            [$da_id, $da_flag, $duracleidkeep]

        );

        // $update = new tb_durable_articles;

        // $update = tb_durable_articles::find($id);
        // $update->da_id = $request->get('da_id');
        // $update->da_name = $request->get('da_name');
        // $update->caregiver_name = $request->get('caregiver_name');
        // $update->date_get = $request->get('dateget');
        // $update->time_of_use = $request->get('time_of_use');
        // $update->da_price = $request->get('da_price');
        // $update->da_flag = $request->get('da_flag');
        // $update->da_recheck_year = $request->get('da_recheck_year');
        // $update->room_id = $request->get('room_id');
        // $update->save();





        //         $conn = mysqli_connect("localhost", "admin", "Admin123", "durable_articlesdb") or die("Error: " . mysqli_error($conn));
        //         mysqli_query($conn, "SET NAMES 'utf8' ");

        //         $query3 = "
        //  SELECT DISTINCT  m.*,p.cargiver_id,r.room_picture,b.building_picture,r.room_name,b.building_name,x.picture_file,
        //         b.building_id,p.cargiver_id,x.da_id,p.caregiver_name,    t.da_status ,type.da_type
        //         FROM tb_durable_articles as m 

        //         INNER JOIN  tb_cargivers as p ON p.cargiver_id = m.cargiver_id
        //         INNER JOIN  rooms as r ON r.room_id = m.room_id
        //         INNER JOIN  buildings as b ON b.building_id = r.building_id
        //         INNER JOIN  pictures as x ON x.da_id = m.da_id

        //         INNER JOIN tb_flag as t  ON  t.da_flag = m.da_flag

        //         INNER JOIN tb_types as type  ON  type.id_type = m.id_type

        //         GROUP BY m.da_id HAVING count(m.da_id)>=1;";



        // $data = mysqli_query($conn, $query3);
        // return view('admin.table',compact('data','stateQR','data_id'));

        $caregiver_name = $request->input('Getcaregiver_name');
        $user_statuses = $request->input('Getuser_statuses');

        return redirect()->to(url()->previous());

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $caregiver_name, $user_statuses)
    {
        // print_r($_POST);
        // echo '<pre>';
        // print_r($id);


        $stateQR = 0;
        $data_id = 0;
        // $data = DB::table(env('PREFIX') . 'pictures')->where('da_id', $id)->get();

        DB::table(env('PREFIX') . 'pictures')
            ->where('da_id', $id)
            ->update(['da_flag' => 5]);

        DB::table(env('PREFIX') . 'tb_durable_articles')
            ->where('da_id', $id)
            ->update(['da_flag' => 5]);


        // $count = $data->count();
        // print_r($data);

        // $post = tb_durable_articles::find($id);

        /* DB::table('tb_cargivers')->where('da_id', $id)->delete(); */

        // DB::table(env('PREFIX') . 'tb_durable_articles')->where('da_id', $id)->delete();
        // DB::table(env('PREFIX') . 'pictures')->where('da_id', $id)->delete();



        // $conn = mysqli_connect("localhost", "admin", "Admin123", "durable_articlesdb") or die("Error: " . mysqli_error($conn));
        // mysqli_query($conn, "SET NAMES 'utf8' ");

        // $query3 = "
        // SELECT DISTINCT  m.*,p.cargiver_id,r.room_picture,b.building_picture,r.room_name,b.building_name,x.picture_file,
        // b.building_id,p.cargiver_id,x.da_id,p.caregiver_name,    t.da_status ,type.da_type
        // FROM tb_durable_articles as m 

        // INNER JOIN  tb_cargivers as p ON p.cargiver_id = m.cargiver_id
        // INNER JOIN  rooms as r ON r.room_id = m.room_id
        // INNER JOIN  buildings as b ON b.building_id = r.building_id
        // INNER JOIN  pictures as x ON x.da_id = m.da_id

        // INNER JOIN tb_flag as t  ON  t.da_flag = m.da_flag

        // INNER JOIN tb_types as type  ON  type.id_type = m.id_type

        // GROUP BY m.da_id HAVING count(m.da_id)>=1;";



        // $data = mysqli_query($conn, $query3);




        return redirect()->to(url()->previous());//
        //
    }



    public function confirm_destroy($id, $caregiver_name, $user_statuses)
    {



        $stateQR = 0;
        $data_id = 0;
        $data = DB::table(env('PREFIX') . 'pictures')->where('da_id', $id)->get();
        $count = $data->count();
        // print_r($data);
        if ($count != 0) {
            $array = json_decode(json_encode($data), true);
            foreach ($array as $row) {
                echo $row["picture_file"];
                $delete = $row["picture_file"];
                unlink("image/pictureImg/.$row[picture_file]");
            }
            
        }
        $post = tb_durable_articles::find($id);



        DB::table(env('PREFIX') . 'tb_durable_articles')->where('da_id', $id)->delete();
        DB::table(env('PREFIX') . 'pictures')->where('da_id', $id)->delete();





        // return redirect()->to(url()->previous());//
        //
    }

    public function deletepic(Request $request)
    {
        $picture_file = $request->input('picture_file');
        $picture_id = $request->input('picture_id');
        $deleted = DB::table(env('PREFIX') . 'pictures')->where('picture_file', $picture_file)->delete();

        if ($deleted) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
