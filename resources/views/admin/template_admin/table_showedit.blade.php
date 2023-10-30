<?php

session_start();
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
) 
->orderBy('room_name', 'asc')
->get();

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


<button type="button" data-modal-toggle="authentication-modal" id="edi" class="address"> </button>


<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <!-- Modal content -->
    <div class="relative w-full h-full max-w-md ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal" onclick="closeModal()">
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
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">เเก้ไขรายละเอียดครุภัณฑ์</h3>
                <form class="space-y-6" name="formRegis" id="formRegis" action="/tableneo/{<?php echo $row->id ?>}" method="POST">
                    @csrf
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-1/2 px-2">

                            <input type="hidden" value="<?php echo $row->id ?>" id="id" name="id" />
                            <input type="hidden" value="<?php echo $row->da_id ?>" id="duracleidkeep" name="duracleidkeep" />
                            <input type="hidden" value="<?php echo $_SESSION['caregiver_name'] ?>" id="Getcaregiver_name" name="Getcaregiver_name" />
                            <input type="hidden" value="<?php echo $_SESSION['user_statuses'] ?>" id="Getuser_statuses" name="Getuser_statuses" />
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสครุภัณฑ์</label>
                            <input value="<?php echo $row->da_id ?>" type="text" name="da_id" id="da_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div class="w-1/2 px-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">วันที่ได้รับ</label>
                            <!-- <input type="datetime-local" id="dateget" name="dateget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                                    value="<?php echo $row->date_get ?>"> -->
                            <input type="date" id="dateget" name="dateget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo date('Y-m-d', strtotime($row->date_get)); ?>">
                        </div>

                        <div class="w-1/2 px-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ตรวจเช็คล่าสุด</label>
                            <!-- <input type="datetime-local" id="da_recheck_year" name="da_recheck_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                     value="<?php echo $row->da_recheck_year ?>"> -->
                            <input type="date" id="created_at" name="created_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo date('Y-m-d', strtotime($row->created_at)); ?>">
                        </div>

                        <div class="w-1/2 px-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อครุภัณฑ์</label>
                            <input value="<?php echo $row->da_name ?>" type="text" name="da_name" id="da_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>

                        <div class="w-1/2 px-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> ห้อง</label>
                            <!-- <input value="<?php echo $row->id_type ?>" type="text" name="id_type" id="id_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required> -->
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="room_id" id="room_id">
                                <option value="<?php echo $row->room_id ?>" style="font-family: Kanit;"> {{ $row->room_name }}</option>
                                @foreach($data_rooms as $row1)
                                <option value="{{ $row1->room_id }}" style="font-family: Kanit;" {{ $row->room_id == $row1->room_id ? 'selected' : '' }}>
                                    {{ $row1->room_name }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="w-1/2 px-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ผู้ดูเเล</label>
                            <!--  <input value="<?php echo $row->cargiver_id ?>" type="text" name="cargiver_id" id="cargiver_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required> -->
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="cargiver_id" id="cargiver_id">
                                <option value="<?php echo $row->cargiver_id ?>" style="font-family: Kanit;"> {{ $row->caregiver_name }}</option>
                                @foreach($data_tb_cargivers as $row2)
                                <option value="<?php echo $row2->cargiver_id ?>" style="font-family: Kanit;"> {{ $row2->caregiver_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="w-1/2 px-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ราคา</label>
                            <input value="<?php echo $row->da_price ?>" type="text" name="da_price" id="da_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div class="w-1/2 px-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">สถานะ</label>
                            <!--  <input value="<?php echo $row->da_flag ?>" type="text" name="da_flag" id="da_flag" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required> -->
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="da_flag" id="da_flag">
                                <option value="<?php echo $row->da_flag ?>" style="font-family: Kanit;"> {{ $row->da_status }}</option>
                                @foreach($data_tb_flag as $row4)
                                <option value="<?php echo $row4->da_flag ?>" style="font-family: Kanit;"> {{ $row4->da_status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-1/2 px-2">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ประเภท</label>
                            <!--  <input value="<?php echo $row->room_id ?>" type="text" name="room_id" id="room_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required> -->
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_type" id="id_type">
                                <option value="<?php echo $row->id_type ?>" style="font-family: Kanit;"> {{ $row->da_type }}</option>
                                @foreach($data_tb_types as $row3)
                                <option value="<?php echo $row3->id_type ?>" style="font-family: Kanit;"> {{ $row3->da_type }}</option>
                                @endforeach
                            </select>
                        </div>




                    </div>
                    <div>

                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">latitude</label>
                        <input value="<?php echo $row->latitude ?>" type="text" name="latitude" id="latitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">longitude</label>
                        <input value="<?php echo $row->longitude ?>" type="text" name="longitude" id="longitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                    </div>

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



<script>
    setTimeout(function() {
        document.getElementById('edi').click();
    }, 250);
</script>