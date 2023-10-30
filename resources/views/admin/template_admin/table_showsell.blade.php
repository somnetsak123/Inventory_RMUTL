<?php
session_start();
use Intervention\Image\Facades\Image;
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

<link href="/css/app.css" rel="stylesheet">
<link href="/css/edi.css" rel="stylesheet">
<link href="/css/ediV2.css" rel="stylesheet">
<link href="/css/addalerts.css" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-icon-180x180.png">
<link href="./main.d8e0d294.css" rel="stylesheet">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="msapplication-tap-highlight" content="no">

<!-- css -->
<link href="/css/edi.css" rel="stylesheet">
<link href="/css/ediV2.css" rel="stylesheet">
<link href="/css/export.css" rel="stylesheet">
<link href="/css/navbar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="/css/templatemo-art-factory.css">
<link rel="stylesheet" type="text/css" href="/css/owl-carousel.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>

<!-- JS -->
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

<?php

use Illuminate\Support\Facades\DB;

$row = DB::table($prefix . 'tb_durable_articles')
    ->join($prefix . 'rooms', $prefix . 'tb_durable_articles.room_id', '=', $prefix . 'rooms.room_id')
    ->join($prefix . 'tb_types', $prefix . 'tb_durable_articles.id_type', '=', $prefix . 'tb_types.id_type')
    ->join($prefix . 'tb_cargivers', $prefix . 'tb_durable_articles.cargiver_id', '=', $prefix . 'tb_cargivers.cargiver_id')
    ->join($prefix . 'tb_flag', $prefix . 'tb_durable_articles.da_flag', '=', $prefix . 'tb_flag.da_flag')
    ->select(
        $prefix . 'tb_durable_articles.*',
        $prefix . 'rooms.room_name',
        $prefix . 'tb_types.da_type',
        $prefix . 'tb_cargivers.caregiver_name',
        $prefix . 'tb_flag.da_status'
    )
    ->where('da_id', $_POST['itemname'])
    ->first();

$data_rooms = DB::table(env('PREFIX') . 'rooms')->select(
    'room_id',
    'room_name'
)->get();

$data_tb_types = DB::table(env('PREFIX') . 'tb_types')->get();

$data_tb_cargivers = DB::table(env('PREFIX') . 'tb_cargivers')->select(
    'cargiver_id',
    'caregiver_name'
)->get();

$data_tb_flag = DB::table(env('PREFIX') . 'tb_flag')->select(
    'da_flag',
    'da_status'
)->get();
?>

<button type="button" data-modal-toggle="Formsell" id="Formsell_butt" class="address"> </button>


<div id="Formsell" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="Formsell" onclick="closeModal()">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <script>
                function closeModal() {
                    const modal = document.getElementById('authentication-modal');
                    modal.classList.add('hidden');
                    modal.setAttribute('aria-hidden', 'true');
                    modal.removeAttribute('tabindex');

                    // Remove all backdrop elements
                    const backdrops = document.getElementsByClassName('bg-opacity-50');
                    while (backdrops.length > 0) {
                        backdrops[0].parentNode.removeChild(backdrops[0]);
                    }
                }
            </script>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">จำหน่ายครุภัณฑ์ <?php echo $row->da_id ?> </h3>
                <form class="space-y-6" name="formRegis" id="formRegis" action="/tableneo/sell" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-2">
                        <input type="hidden" value="<?php echo $_SESSION['caregiver_name'] ?>" id="Getcaregiver_name" name="Getcaregiver_name" />
                        <input type="hidden" value="<?php echo $_SESSION['user_statuses'] ?>" id="Getuser_statuses" name="Getuser_statuses" />

                        <div class="w-1/2 px-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">วันที่จำหน่าย</label>

                            <input type="date" id="expired" name="expired" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo date('Y-m-d', strtotime($row->expired)); ?>">
                        </div>

                        <div class="w-1/2 px-2">
                            <input type="hidden" value="<?php echo $row->id ?>" id="id" name="id" />
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสครุภัณฑ์</label>
                            <input value="<?php echo $row->da_id ?>" type="text" name="da_id" id="da_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>

                    </div>
                    <br>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input1">Upload image</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="image/png, image/gif, image/jpeg" id="file_input1" name="files[]" type="file" multiple required>
                    <?php
                    $data_save_pdfs = DB::table($prefix . 'pictures')
                        ->select(
                            'picture_file',
                        )
                        ->where('da_id', '=', $row->da_id)
                        ->get();

                    ?>
                    @foreach($data_save_pdfs as $row1)
                    <a href="\image\pictureImg\.<?php echo $row1->picture_file ?>"><?php echo $row1->picture_file  ?></a> <br>


                    @endforeach
                    <br>


                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input2">Upload file</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="application/pdf" id="file_input2" name="file_input" type="file">
                    <?php

                    $data_save_pdfs = DB::table($prefix . 'tb_save_pdfs')
                        ->select(
                            'pdf_file',
                        )
                        ->where('da_id', '=', $row->da_id)
                        ->get();

                    ?>
                    @foreach($data_save_pdfs as $row1)
                    <a href="\pdf\.<?php echo $row1->pdf_file ?>"><?php echo $row1->pdf_file  ?></a> <br>
                    @endforeach
                    <br>
                    <button type="submit" class="hover_transition w-full text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ส่งข้อมูล</button>

                </form>
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
<script src="/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="/js/owl-carousel.js"></script>
<script src="/js/scrollreveal.min.js"></script>
<script src="/js/waypoints.min.js"></script>
<script src="/js/jquery.counterup.min.js"></script>
<script src="/js/imgfix.min.js"></script>


<script>
    setTimeout(function() {
        document.getElementById('Formsell_butt').click();
    }, 250);
</script>