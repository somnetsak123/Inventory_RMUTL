<?php


$getda_id = $_GET['da_id'];


?>

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
    <link href="/image/icon/favicon.ico" rel="icon">
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

    <title>Title page</title>
    <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์</title>





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


    // Create connection

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection

    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
    }




    ?>
    <section class="section b " id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <?php
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
                        $sql = " SELECT * FROM {$prefix}tb_durable_articles

INNER JOIN {$prefix}tb_cargivers ON {$prefix}tb_durable_articles.cargiver_id = {$prefix}tb_cargivers.cargiver_id 

INNER JOIN {$prefix}rooms ON {$prefix}tb_durable_articles.room_id = {$prefix}rooms.room_id

INNER JOIN {$prefix}buildings ON  {$prefix}rooms.building_id = {$prefix}buildings.building_id

INNER JOIN {$prefix}tb_flag ON  {$prefix}tb_durable_articles.da_flag = {$prefix}tb_flag.da_flag

WHERE (da_id = '" . $getda_id . "');";
                        $q = mysqli_query($conn, $sql);
                        while ($f = mysqli_fetch_assoc($q)) {
                        ?>
                            <!-- /////////////////////////////////////////////                     -->
                            <div class="left-text">
                                <h5 class="font   "><?php echo $f['da_name']  ?></h5>
                                <p class="font ">

                                    รหัส ครุภัณฑ์ : <?php echo $f['da_id']  ?> <br>
                                    ผู้ดูเเล : <?php echo $f['caregiver_name'] ?> <br>
                                    วัน/เดือน/ปี ที่ได้รับ : <?php echo $f['date_get'] ?><br>
                                    ระยะเวลาที่ใช้งานมา : <?php echo $f['time_of_use'] ?><br>

                                    ตึก : <?php echo $f['building_name'] ?> <br>
                                    ห้อง : <?php echo $f['room_name'];

                                            $Gatlatitude = strval($f['latitude']);


                                            $Gatlongitude = strval($f['longitude']);

                                            $address  = $Gatlatitude . "," . $Gatlongitude;

                                            ?>


                                    <br>
                                    <a href="#" data-modal-toggle="authentication-modal" id="address" class="address">ตำแหน่ง:<?php echo $address ?></a>
                                    <br>
                                    สถานะ : <?php echo $f['da_status'] ?>
                                </p>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hr"></div>
                    </div>
                </div>
            </div>
    </section>



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
                    <form class="space-y-6" name="formReport" id="formReport" action="report" method="POST">
                        @csrf
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


    <!-- ***** Features Big Item Start ***** -->

    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Small Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="owl-carousel">
                    <div class="image-container">
                        <img class="img_sild rounded-lg" src="/image/buildingImg/.<?php echo $f['building_picture'] ?>" alt="">
                    </div>

                    <div class="image-container">
                        <img class="img_sild rounded-lg" src="/image/roomImg/.<?php echo $f['room_picture'] ?>" alt="">
                    </div>

                <?php
                        }
                ?>

                <?php
                $sql2 = " SELECT * FROM {$prefix}pictures WHERE (da_id = '" . $getda_id . "'); ";

                $q2 = mysqli_query($conn, $sql2);


                while ($f2 = mysqli_fetch_assoc($q2)) {
                ?>

                    <div class="image-container">
                        <img class="img_sild rounded-lg" src="/image/pictureImg/.<?php echo $f2['picture_file'] ?>" alt="">
                    </div>



                <?php
                }
                ?>

                </div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
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

    <!-- Global Init -->
    <script src="/js/custom.js"></script>


</body>

</html>