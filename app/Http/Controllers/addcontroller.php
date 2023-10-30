<?php

namespace App\Http\Controllers;

use App\Models\picture;

use App\Models\tb_cargiver;
use App\Models\tb_durable_articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;



class addcontroller extends Controller
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

        // $this->validate($request, [
        //     'da_id' =>'request',
        //     'da_name' =>'request',
        //     'cargiver' =>'request',
        //     'dateget' =>'request',
        //     'building' =>'request',
        //     'room' =>'request',
        //     'price' =>'request',
        //     'list-radio' =>'request',
        //     'recheck' =>'request',]);

        // $add = new tb_durable_articles([
        //     'db_id'=>$request->get('db_id'),
        //     'da_name'=>$request->get('da_name'),
        //     'cargiver'=>$request->get('cargiver'),
        //     'dateget'=>$request->get('dateget'),
        //     'building'=>$request->get('building'),
        //     'room'=>$request->get('room'),
        //     'price'=>$request->get('price'),
        //     'list-radio'=>$request->get('list-radio'),
        //     'recheck'=>$request->get('recheck'),
        // ]);

        //  $add->save();
        if ($request->get('da_id') != null) {


            $addtb_durable_articles = new tb_durable_articles;
            $addtb_durable_articles->da_id = $request->get('da_id');



            $addtb_durable_articles->da_name = $request->get('da_name');
            $addtb_durable_articles->cargiver_id = $request->get('cargiver');
            $addtb_durable_articles->date_get = $request->get('dateget');
            $addtb_durable_articles->room_id = $request->get('room');
            $addtb_durable_articles->da_price = $request->get('price');
            $addtb_durable_articles->da_flag = $request->get('list_radio');
            $addtb_durable_articles->da_recheck_year = $request->get('recheck');
            $addtb_durable_articles->id_type = $request->get('id_type');

            $addtb_durable_articles->latitude = $request->get('latitude');
            $addtb_durable_articles->longitude = $request->get('longitude');
            $resultData = $addtb_durable_articles->save();


            if ($resultData && $request->get('da_id') != null) {

?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <link rel="stylesheet" href="alert/dist/sweetalert.css">

                <script>
                    setTimeout(
                        function showAlert() {
                            Swal.fire({
                                icon: 'success',
                                title: 'เพิ่มข้อมูลสำเร็จ',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
            // นำผู้ใช้ไปยังหน้าใหม่หลังจากแสดงกล่องแจ้งเตือนเสร็จสิ้น
            window.location.href = '/add/show'; // กำหนด URL ของหน้าใหม่ที่ต้องการให้นำไปยัง
        });
    }, 100);
                </script>


            <?php
            }
        }


        if ($request->get('da_id') == null) {

            ?>

            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link rel="stylesheet" href="alert/dist/sweetalert.css">

            <script>
                setTimeout(
                    function showAlert() {

                        Swal.fire({
                            icon: 'error',
                            title: 'เพิ่มข้อมูลไม่สำเร็จ',
                            text: '',
                            footer: ''
                        }).then(() => {
            // นำผู้ใช้ไปยังหน้าใหม่หลังจากแสดงกล่องแจ้งเตือนเสร็จสิ้น
            window.location.href = '/add/show'; // กำหนด URL ของหน้าใหม่ที่ต้องการให้นำไปยัง
        });
            </script>

<?php
        }


        /* print_r($_FILES['files']['tmp_name']); */

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
            $addpicture->da_flag = $request->get('list_radio');
            $addpicture->save();
        }
        

        





        
        //-----------------------------------------------------------------------------------------------------------QR

        /* $url = "http://localhost:8000/show_user?da_id=" . $request->get('da_id');
$qr = $request->get('da_id');
$nameqr = "$qr.png";

// Generate the QR code
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.qrserver.com/v1/create-qr-code/?data=$url");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$qr_code = curl_exec($ch);
curl_close($ch);

//echo "<script>window.location.href = '/index_admin?url=$url&name=$nameqr';</script>";


// Send the QR code image to the browser
header("Content-Type: image/png");
header("Content-Disposition: attachment; filename=$nameqr");

// Output the QR code image data
echo $qr_code;  */







        /*  include('/phpqrcode/qrlib.php');
    

    // how to save PNG codes to server

        $tempDir = "/qrcodess/";
    
    $codeContents = 'This Goes From File';
    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = '005_file_'.md5($codeContents).'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
        echo 'File generated!';
        echo '<hr />';
    } else {
        echo 'File already generated! We can use this cached file to speed up site on common codes!';
        echo '<hr />';
    }
    
    echo 'Server PNG File: '.$pngAbsoluteFilePath;
    echo '<hr />';
    
    // displaying
    echo '<img src="'.$urlRelativeFilePath.'" />'; */








        //-----------------------------------------------------------------------------------------------------------QR

        /* print_r($_FILES);
        echo '<pre>'; */



        // $addpicture = new picture();
        // $addpicture->da_id = $request->get('da_id');
        // $addpicture->picture_file = $request->get('files');
        // $addpicture->save();


        //  DB::insert('insert into tb_durable_articles 
        //  (da_id,da_name,cargiver,dateget,building,room,price,list-radio,recheck) values (?,?,?,?,?,?,?,?,?)',
        // ['Niyati','asd','asd','asd',211,200,'qwe','asd','']);
        // // return redirect()->route('admin.add')->with('success', 'บันทึกข้อมูลเเล้ว');



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
        $data_rooms = DB::table(env('PREFIX').'rooms')->orderBy('room_name', 'asc')->get();
        $data_tb_types = DB::table(env('PREFIX').'tb_types')->get();
        $data_tb_cargivers = DB::table(env('PREFIX').'tb_cargivers')->get();
        
        /*  $data = mysqli_query($conn, $query3); */

   

    
        // return view('admin.table',compact('data','stateQR','data_id'));
        return view('admin.add',compact('data_rooms','data_tb_types','data_tb_cargivers'));
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
