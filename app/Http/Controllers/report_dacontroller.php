<?php

namespace App\Http\Controllers;

use App\Models\picture;
use App\Models\report_da;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class report_dacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('admin.template_admin.showreport');
        //      $data = User::all();
        //  foreach ($data as $flight) {
        //     echo $flight->da_id;
        // }


        //  $data = DB::table('report_da')->get();
        // return view('admin.template_admin.showreport',compact('data'));
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

        $report_count = DB::table(env('PREFIX') . 'report_das')->where('da_id', '=', $request->get('Exportda_id'))->count();


        if (strpos($request->get('Email'), "rmutl.ac.th")) {


            $addreport_da = new report_da;
            $addreport_da->report_id = null;
            $addreport_da->da_subject = $request->get('subject');
            $addreport_da->da_id = $request->get('Exportda_id');
            $addreport_da->da_name = $request->get('Exportda_name');
            $addreport_da->caregiver_name = $request->get('Exportcaregiver_name');
            $addreport_da->date_get = $request->get('Exportdate_get');
            $addreport_da->time_of_use = $request->get('Exporttime_of_use');
            $addreport_da->da_price = $request->get('Exportda_price');
            // $addreport_da->da_flag = "แจ้งเสีย";
            $addreport_da->da_recheck_year = $request->get('Exportda_recheck_year');
            $addreport_da->room_id = $request->get('Exportroom_id');
            $addreport_da->id_type = $request->get('Exportid_type');
            $addreport_da->phone_number = $request->get('phone_number');
            $addreport_da->note = $request->get('note');
            $addreport_da->report_state = "แจ้งเสีย";
            $addreport_da->count_report = $report_count + 1;
            $addreport_da->address = $request->get('address');
            $addreport_da->name = $request->get('name');
            $addreport_da->Email = $request->get('Email');

            $addreport_da->save();


            foreach ($_FILES['files']['tmp_name'] as $key => $value) {
                // "\inertia-svelte\publicimage\pictureImg\.$new_name"
                $file_name = $_FILES['files']['name'];
                $new_name = rand(0, microtime(true)) . '-' . $file_name[$key];
                if (move_uploaded_file($_FILES['files']['tmp_name'][$key], public_path('image/pictureImg/.') . $new_name)) {
    
                    $addpicture = new picture();
                    $addpicture->da_id = $request->get('Exportda_id');
                    $addpicture->picture_file = $new_name;
                    $addpicture->da_flag = 2;
                    $addpicture->save();
                }
            }



?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link rel="stylesheet" href="alert/dist/sweetalert.css">





            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link rel="stylesheet" href="alert/dist/sweetalert.css">

            <script>
                setTimeout(
                    function showAlert() {
                        Swal.fire({
                            icon: 'success',
                            title: 'รายงานสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            // นำผู้ใช้ไปยังหน้าใหม่หลังจากแสดงกล่องแจ้งเตือนเสร็จสิ้น
                            window.location.href = '/show_user?da_id=<?php echo $request->get('Exportda_id') ?>'; // กำหนด URL ของหน้าใหม่ที่ต้องการให้นำไปยัง
                        });
                    }, 100);
            </script>


        <?php








        } else {

        ?>


            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <link rel="stylesheet" href="alert/dist/sweetalert.css">

            <script>
                setTimeout(function showAlert() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Email ของคุณไม่ถูกต้อง',
                        showConfirmButton: false, // ไม่แสดงปุ่ม Confirm
                        timer: 2000 // กำหนดเวลาให้แสดงกล่องแจ้งเตือน 2 วินาที
                    }).then(() => {
                        // นำผู้ใช้ไปยังหน้าใหม่หลังจากแสดงกล่องแจ้งเตือนเสร็จสิ้น
                        window.location.href = '/show_user?da_id=<?php echo $request->get('Exportda_id') ?>'; // กำหนด URL ของหน้าใหม่ที่ต้องการให้นำไปยัง
                    });
                }, 100);
            </script>

        <?php

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($caregiver_name, $user_statuses)
    {
        //
        //     return view('admin.template_admin.showreport');
        //      $data = User::all();
        //  foreach ($data as $flight) {
        //     echo $flight->da_id;
        // }
        //   echo $caregiver_name;
        //   echo $user_statuses;

        if ($user_statuses == 1) {
            $data = DB::table(env('PREFIX') . 'report_das')
                ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'report_das.id_type', '=', env('PREFIX') . 'tb_types.id_type')
                ->where('report_state', '=', 'แจ้งเสีย')
                ->get();
        } else {

            $data = DB::table(env('PREFIX') . 'report_das')
                ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'report_das.id_type', '=', env('PREFIX') . 'tb_types.id_type')
                ->where('report_state', '=', 'แจ้งเสีย')
                ->where('caregiver_name', '=', $caregiver_name)
                ->get();
        }




        return view('admin.tableReport', compact('data'));
    }

    public function showMap($caregiver_name, $user_statuses, $address)
    {
        ob_start();

        ?>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/edi.css" rel="stylesheet">
        <link href="/css/ediV2.css" rel="stylesheet">
        <link href="/css/addalerts.css" rel="stylesheet">


        <a href="#" data-modal-toggle="authentication-modal" id="address" class="address"></a>


        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">แผนที่ </h3>

                        <div>
                            <iframe width="100%" height="200" src="https://maps.google.com/maps?q=<?php echo urlencode($address); ?>&output=embed"></iframe>

                        </div>




                        <br>

                    </div>
                </div>
            </div>
        </div>


        </p>
        </div>
        </div>
        </div>

        <script src="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.js"></script>
        <link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.css" />


        <script>
        setTimeout(function() {
            document.getElementById('address').click();
        }, 800);
    </script>






<?php



        if ($user_statuses == 1) {
            $data = DB::table(env('PREFIX') . 'report_das')
                ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'report_das.id_type', '=', env('PREFIX') . 'tb_types.id_type')
                ->where('report_state', '=', 'แจ้งเสีย')
                ->get();
        } else {

            $data = DB::table(env('PREFIX') . 'report_das')
                ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'report_das.id_type', '=', env('PREFIX') . 'tb_types.id_type')
                ->where('report_state', '=', 'แจ้งเสีย')
                ->where('caregiver_name', '=', $caregiver_name)
                ->get();
        }


        // $data = DB::table('report_das')->where('report_state', '=','แจ้งเสีย')->get();
        return view('admin.tableReport', compact('data'));
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
    public function update(Request $request)
    {
        //

        $da_id = $request->input('da_id');
        $count_report = $request->input('count_report');
        $caregiver_name = $request->input('caregiver_name');
        $user_statuses = $request->input('user_statuses');
    


        DB::update(
            'update ' . env('PREFIX') . 'report_das set da_flag=?,report_state=? ,count_report=?
        where da_id = ? AND count_report = ' . $count_report . '',
            ["2", "ตรวจสอบเเล้ว", $count_report, $da_id]
        );

        DB::update(
            'update ' . env('PREFIX') . 'tb_durable_articles set da_flag=? , count_report=?
        where da_id = ?',
            ["2", $count_report, $da_id]
        );

        // $data = DB::table('report_das')->get();
        // return view('admin.tableReport',compact('data'));

        $url = '/report/show/' . $caregiver_name . '/' . $user_statuses;
        // $data = DB::table('report_das')->get();
        return redirect($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        $da_id = $request->input('da_id');
        $count_report = $request->input('count_report');
        $caregiver_name = $request->input('caregiver_name');
        $user_statuses = $request->input('user_statuses');



           // //ลบรูปทั้งฟมด
           $data = DB::table(env('PREFIX') . 'pictures')->where('da_id', $da_id)->where('da_flag', 2)->get();

           // print_r($data);
           $array = json_decode(json_encode($data), true);
           foreach ($array as $row) {
               echo $row["picture_file"];
               $delete = $row["picture_file"];
               unlink("image/pictureImg/.$row[picture_file]");
           }
   
   
           DB::table(env('PREFIX') . 'pictures')->where('da_id', $da_id)->where('da_flag', 2)->delete();

        DB::table(env('PREFIX') . 'report_das')->where('da_id', $da_id)->where('count_report', $count_report)->delete();

        $url = '/report/show/' . $caregiver_name . '/' . $user_statuses;
        // $data = DB::table('report_das')->get();
        return redirect($url);
    }
}
