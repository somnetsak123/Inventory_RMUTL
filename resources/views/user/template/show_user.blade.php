<!DOCTYPE html>
<html lang="en">

<head>


    <!-- <xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx> -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-icon-180x180.png">
    <link href="./main.d8e0d294.css" rel="stylesheet">
    <!-- <xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx> -->

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

    <style>
        img {
            border-radius: 8px;
        }

        * {


            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 50%;
            padding: 5px;
        }

        .drop-shadow-2xl {
            filter: drop-shadow(0 25px 25px rgb(0 0 0 / 0.15));
        }

        .font {
            font-family: 'Kanit', sans-serif;
            color: #34495e;
        }

        .try {

            padding-left: 250px;
        }

        .try1 {

            padding-left: 180px;
        }
    </style>
</head>

<body>

    <?php



    use Illuminate\Support\Facades\DB;

    $conn = mysqli_connect($servername, $username, $password, $database);
    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
    }


    $getda_id = $_GET['da_id'];

    ?>


    <section class="section b " id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <?php
                    // $pictures = DB::table($prefix . 'pictures')
                    //     ->select('da_id', 'picture_file')
                    //     ->where('da_id', $getda_id)
                    //     ->where('da_flag', 1)
                    //     ->groupBy('da_id', 'picture_file')
                    //     ->havingRaw('COUNT(*) >= 1')
                    //     ->distinct()
                    //     ->limit(1)
                    //     ->get();

                    $sql3 = " SELECT DISTINCT da_id , picture_file FROM {$prefix}pictures GROUP BY da_id HAVING count(da_id)>=1 AND da_id = '" . $getda_id . "' ; ";
                    $q3 = mysqli_query($conn, $sql3);




                    while ($f3 = mysqli_fetch_assoc($q3)) {

                    ?>
                        <img src="/image/pictureImg/.<?php echo $f3['picture_file'] ?>" class=" img-fluid d-block mx-auto drop-shadow-2xl rounded-lg " alt="App">
                    <?php
                    }
                    ?>
                </div>





                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">




                        <!-- ////////////////////////////////////////////////                     -->
                        <?php
                        $ReportStatus = '';
                        $dbquery = DB::table($prefix . 'report_das')
                            ->where('report_state', '=', 'แจ้งเสีย')
                            ->where('da_id', '=', $getda_id)
                            ->get();

                        $num_rows = count($dbquery);
                        if ($num_rows == 1) {
                            $ReportStatus = 'กำลังตรวจสอบการแจ้งเสีย';
                        }

                        $q = DB::table($prefix . 'tb_durable_articles')
                            ->join($prefix . 'tb_cargivers', $prefix . 'tb_durable_articles.cargiver_id', '=', $prefix . 'tb_cargivers.cargiver_id')
                            ->join($prefix . 'rooms', $prefix . 'tb_durable_articles.room_id', '=', $prefix . 'rooms.room_id')
                            ->join($prefix . 'buildings', $prefix . 'rooms.building_id', '=', $prefix . 'buildings.building_id')
                            ->join($prefix . 'tb_flag', $prefix . 'tb_durable_articles.da_flag', '=', $prefix . 'tb_flag.da_flag')
                            ->select('*')
                            ->where('da_id', '=', $getda_id)
                            ->get();

                        foreach ($q as $f) {
                        ?>
                            <!-- /////////////////////////////////////////////                     -->

                    </div>

                    <?php
                            $sqlda_name =  $f->da_name;
                            $sqlda_id =  $f->da_id;
                            $sqlid_type =  $f->id_type;
                            $sqlcaregiver_name =  $f->caregiver_name;
                            $sqldate_get =  $f->date_get;
                            $sqltime_of_use =  $f->time_of_use;
                            $sqlbuilding_name =  $f->building_name;
                            $sqlroom_name =  $f->room_name;
                            $sqltime_of_use =  $f->time_of_use;
                            $sqlda_price =  $f->da_price;
                            $sqlda_recheck_year =  $f->da_recheck_year;
                            $sqlroom_id =  $f->room_id;
                    ?>






                    <div class="left-text">
                        <h5 class="font"><?php echo $f->da_name  ?></h5>
                        <p class="font ">

                            รหัสครุภัณฑ์ : <?php echo $f->da_id  ?> <br>
                            ผู้ดูเเล : <?php echo $f->caregiver_name ?> <br>
                            วัน/เดือน/ปี ที่ได้รับ : <?php echo $f->date_get ?><br>
                            ระยะเวลาที่ใช้งานมา : <?php echo $f->time_of_use ?><br>

                            ตึก : <?php echo $f->building_name ?> <br>
                            ห้อง : <?php echo $f->building_name;

                                    $Gatlatitude = strval($f->latitude);


                                    $Gatlongitude = strval($f->longitude);

                                    $address  = $Gatlatitude . "," . $Gatlongitude;

                                    ?>


                            <br>
                            <a href="#" data-modal-toggle="modal_address" id="address" class="address">ตำแหน่ง:<?php echo $address ?></a>
                            <br>

                            <?php
                            if ($ReportStatus == 'กำลังตรวจสอบการแจ้งเสีย') { ?>
                                สถานะ : <?php echo $ReportStatus ?>
                            <?php } else { ?>
                                สถานะ : <?php echo $f->da_status ?>

                            <?php } ?>

                            <?php
                            if (($ReportStatus != 'กำลังตรวจสอบการแจ้งเสีย') || ($f->da_flag != 'ชำรุด')) { ?>
                                <button onclick="getLocation()" class="rounded-lg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-mediumrounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal" id="report">
                                    เเจ้งปัญหา
                                </button>





                                <script src="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.js"></script>
                                <link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.css" />

                                <script>
                                    var x = document.getElementById("demo");
                                    var map = document.getElementById("map");

                                    function makeaction() {
                                        document.getElementById('submitButton').disabled = false;
                                        document.getElementById('submitButton').className = "w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800";
                                    }

                                    function getLocation() {

                                        if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(showPosition);
                                        } else {
                                            x.innerHTML = "Geolocation is not supported by this browser.";
                                        }


                                    }

                                    function showPosition(position) {
                                        //   x.innerHTML =  position.coords.latitude + 
                                        //   ", " + position.coords.longitude;

                                        document.getElementById("demo").value = position.coords.latitude +
                                            ", " + position.coords.longitude;
                                        //   document.getElementById("formReport").submit();




                                        var map = L.map("map").setView([latitude, longitude], 13);
                                        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                        }).addTo(map);

                                        L.marker([latitude, longitude]).addTo(map);


                                        // frm.latitude.value = position.coords.latitude;
                                        // frm.longitude.value = position.coords.longitude;


                                    }
                                </script>


                        <div id="modal_address" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modal_address">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">แผนที่ </h3>
                                        <form class="space-y-6" name="formReport" id="formReport" action="report" method="POST">
                                            <div>
                                                <iframe width="100%" height="400" src="https://maps.google.com/maps?q=<?php echo $address  ?>&output=embed"></iframe>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Main modal -->
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
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">รายงานปัญหาครุภัณฑ์</h3>
                                        <form class="space-y-6" enctype="multipart/form-data" name="formReport" id="formReport" action="report" method="POST">
                                            @csrf
                                            <div>
                                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เรื่อง</label>
                                                <input type="text" name="subject" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>


                                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ-นามสกุล</label>
                                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เบอร์โทรศัพท์</label>
                                                <input type="text" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email (RMUTL)</label>
                                                <input type="text" name="Email" id="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>


                                                <input type="hidden" name="address" id="demo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                                            </div>
                                            <div>
                                                <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">***หมายเหตุ</label>
                                                <textarea name="note" id="note" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </textarea>
                                                <br>
                                                <input id="dropzone-file" type="file" name="files[]" accept="image/png, image/gif, image/jpeg" multiple required />


                                                <input type="hidden" value="<?php echo $sqlda_name  ?>" name="Exportda_name" id="Exportda_name" />
                                                <input type="hidden" value="<?php echo $sqlda_id  ?>" name="Exportda_id" id="Exportda_id" />
                                                <input type="hidden" value="<?php echo $sqlcaregiver_name ?>" name="Exportcaregiver_name" id="Exportcaregiver_name" />
                                                <input type="hidden" value="<?php echo $sqldate_get ?>" name="Exportdate_get" id="Exportdate_get" />


                                                <?php
                                                if ($sqltime_of_use == "0000-00-00 00:00:00") {


                                                ?>


                                                    <input type="hidden" value=" " name="Exporttime_of_use" id="Exporttime_of_use" />

                                                <?php
                                                } else {


                                                ?>

                                                    <input type="hidden" value="<?php echo $sqltime_of_use ?>" name="Exporttime_of_use" id="Exporttime_of_use" />

                                                <?php
                                                }
                                                ?>
                                                <input type="hidden" value="<?php echo $sqlbuilding_name ?>" name="Exportbuilding_name" id="Exportbuilding_name" />
                                                <input type="hidden" value="<?php echo $sqlroom_name ?>" name="Exportroom_name" id="Exportroom_name" />
                                                <input type="hidden" value="<?php echo $sqlda_price ?>" name="Exportda_price" id="Exportda_price" />
                                                <input type="hidden" value="<?php echo $sqlda_recheck_year ?>" name="Exportda_recheck_year" id="Exportda_recheck_year" />
                                                <input type="hidden" value="<?php echo $sqlroom_id ?>" name="Exportroom_id" id="Exportroom_id" />
                                                <input type="hidden" value="<?php echo $sqlid_type  ?>" name="Exportid_type" id="Exportid_type" />




                                            </div>
                                            <div class="g-recaptcha" data-callback="makeaction" data-sitekey="6LdX3esnAAAAAFHxA-ujhF-8rPbjdpBLWyq4xzL2"></div>

                                            <!-- <div class="g-recaptcha" data-sitekey="6LdX3esnAAAAAFHxA-ujhF-8rPbjdpBLWyq4xzL2" data-callback="onSubmit"></div>
                                                 -->

                                            <button disabled onclick="getLocation()" id="submitButton" type="submit" class="hidden">ส่งข้อมูล</button>

                                        </form>
                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    </p>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-lg-12">
                    <div class="hr">




                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- ***** Features Big Item Start ***** -->

    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Small Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="owl-carousel">

                    <div class="rounded-lg  ">
                        <div>
                            <i><img width="50%" src="/image/buildingImg/.<?php echo $f->building_picture ?>" class="img_sild rounded-lg" alt="App"></i>
                        </div>

                    </div>
                    <div class="rounded-lg  ">
                        <div>
                            <i><img width="50%" src="/image/roomImg/.<?php echo $f->room_picture ?>" class="img_sild rounded-lg" alt="App"></i>
                        </div>
                    </div>


                <?php
                        }
                ?>

                <?php
                // $pictures = DB::table($prefix . 'pictures')
                //     ->where('da_id', $getda_id)
                //     ->where('da_flag', 1)
                //     ->get();

                // foreach ($pictures as $f2) {
                    $sql2 = " SELECT * FROM {$prefix}pictures WHERE (da_id = '" . $getda_id . "'); ";

                    $q2 = mysqli_query($conn, $sql2);
    
    
                    while ($f2 = mysqli_fetch_assoc($q2)) {
                ?>

                    <div class="rounded-lg">
                        <div>
                            <i><img class="img_sild rounded-lg" width="50%" src="/image/pictureImg/.<?php echo $f2['picture_file'] ?>" alt=""></i>
                        </div>

                    </div>



                <?php
                }
                ?>


                <!-- <div class="rounded-lg ">
                    <div >
                        <i><img width="50%" src="room1.jpg" alt=""></i>
                    </div>
                   
                </div>

                <div class="rounded-lg ">
                    <div >
                        <i><img width="50%" src="pc2.png" alt=""></i>
                    </div>
                   
                </div>
                <div class="rounded-lg ">
                    <div >
                        <i><img width="50%" src="pc2.png" alt=""></i>
                    </div>
                   
                </div> -->

                </div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="/js/jquery-2.1.0.min.js"></script>


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function checkRecaptcha() {
            var response = grecaptcha.getResponse(); // ดึงค่าการตอบกลับจาก reCAPTCHA
            if (response.length === 0) { // ถ้ายังไม่ได้ตอบ reCAPTCHA
                alert('กรุณายืนยันตัวตนด้วย reCAPTCHA');
                return false; // ไม่ส่งฟอร์ม
            } else {
                return true; // ส่งฟอร์มต่อไป
            }
        }
    </script>



    <!-- Bootstrap -->
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="/js/owl-carousel.js"></script>
    <script src="/js/scrollreveal.min.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/jquery.counterup.min.js"></script>
    <script src="/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="/js/custom.js"></script>

    <!--JS-->
    <script src="/js/navbar.js"></script>

</body>

</html>