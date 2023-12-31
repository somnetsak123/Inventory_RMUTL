<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "Admin เท่านั้น!!";
    redirect()->to('/')->send();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    unset($_SESSION['user_statuses']);
    unset($_SESSION['caregiver_name']);
    redirect()->to('/login')->send();
}



$conn = mysqli_connect($servername, $username, $password, $database) or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");
$query_title = "SELECT * FROM {$prefix}tb_templates WHERE `id_template` LIKE 1 ";
$title_sql = mysqli_query($conn, $query_title);

$query_banner = "SELECT * FROM {$prefix}tb_templates WHERE `id_template` LIKE 2 ";
$banner_sql = mysqli_query($conn, $query_banner);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICON -->
    <link rel="icon" href="/icon/favicon.ico" />

    <!-- CSS -->
    <link href="/css/alert-count.css" rel="stylesheet">
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link href="/css/addalerts.css" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- JS -->
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์</title>
</head>

<body>
    <style>
        /* Add a media query for small screens */
        @media screen and (max-width: 768px) {
            .list-1 {
                display: none;
            }

            .menu-visible {
                display: block !important;
            }

            .list-1.menu-visible {
                display: block;
            }
        }
    </style>
    <!-- <?php echo $_SESSION['caregiver_name']; ?> -->
    <nav>
        <span class="nav-toggle" id="js-nav-toggle">
            <i class="fas fa-bars"></i>
        </span>
        <div class="logo">
            <?php
            foreach ($title_sql as $row) {
            ?>
                <h1> {{$row['template_data']}}</h1>
            <?php
            }

            ?>
        </div>
        <ul class="list-1 " id="js-menu">
            <!--หน้าแรก-->
            <li >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill inline-flex" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                </svg>
                <a href="/index_admin">&nbsp;หน้าแรก</a>
            </li>

            <li ><a href="/dashboard">แดชบอร์ด</a></li>
            <li ><a href="/types">ประเภท</a></li>
            <li ><a href="/building">อาคารเรียน</a></li>
            <li ><a href="/cargivers">ผู้ดูแล</a></li>

            @if ($_SESSION['user_statuses'] == 1 )
            <li >
                <a href="/add/show">
                    เพิ่ม
                </a>
            </li>
            @endif

            <li >
                <a href="/tableneo/show/<?php echo $_SESSION['caregiver_name']; ?>/<?php echo $_SESSION['user_statuses']; ?>">
                    แก้ไข
                </a>
            </li>

            <li >
                <a href="/Export_Excel/show_survey">
                    ดาวน์โหลด
                </a>
            </li>

            @if ($_SESSION['user_statuses'] == 1 )
            <li >
                <a href="/templateController/show">
                    เทมเพลต
                </a>
            </li>
            @endif
            </div>

            <style>
                .count-number {
                    position: absolute;
                    top: -6px;
                    left: -10px;
                    background-color: red;
                    color: white;
                    padding: 0px;
                    border-radius: 50%;
                }
            </style>

            <li class="count-number-con">
                <form action="/report/show/<?php echo $_SESSION['caregiver_name']; ?>/<?php echo $_SESSION['user_statuses']; ?>" method="get">
                    @csrf
                    <button type="submit" class="hidden"></button>
                </form>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-flex bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                </svg>
                <a href="/report/show/<?php echo $_SESSION['caregiver_name']; ?>/<?php echo $_SESSION['user_statuses']; ?>">
                    &nbsp;แจ้งชำรุด
                </a>
                <?php
                $data = $_SESSION['caregiver_name'];
                if ($_SESSION['user_statuses'] == 1) {
                    $sql = "SELECT * FROM {$prefix}report_das where report_state='แจ้งเสีย' ";
                } else {
                    $sql = "SELECT * FROM {$prefix}report_das where report_state='แจ้งเสีย' AND caregiver_name='$data' ";
                }
                $dbquery = mysqli_query($conn, $sql);
                $num_rows = mysqli_num_rows($dbquery);

                if ($num_rows != 0) {
                ?>
                    <div>
                        <span class="count-number"><?php echo $num_rows ?></span>
                    </div>
                <?php
                }
                ?>
            </li>

            <li >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-flex bi bi-database-fill-lock" viewBox="0 0 16 16">
                    <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z" />
                    <path d="M3.904 9.223C2.875 8.755 2 8.007 2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-1.364-.125 2.988 2.988 0 0 0-2.197.731 4.525 4.525 0 0 0-1.254 1.237A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777ZM8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.09 0 .178 0 .266-.003A1.99 1.99 0 0 1 8 15v-1Zm0-1.5c0 .1.003.201.01.3A1.9 1.9 0 0 0 8 13c-1.573 0-3.022-.289-4.096-.777C2.875 11.755 2 11.007 2 10v-.839c.457.432 1.004.751 1.49.972C4.722 10.693 6.318 11 8 11c.086 0 .172 0 .257-.002A4.5 4.5 0 0 0 8 12.5Z" />
                    <path d="M9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
                </svg>
                <a href="/index_admin?logout='1'">&nbsp;ออกจากระบบ</a>
            </li>
        </ul>
    </nav>
    <script>
        // JavaScript to toggle the menu on small screens
        document.getElementById('js-nav-toggle').addEventListener('click', function() {
            console.log(document.getElementById('js-menu').classList.toggle('menu-visible'));
        });

        // Close the menu when a menu item is clicked (optional)
        var menuItems = document.querySelectorAll('.list-1 a');
        menuItems.forEach(function(menuItem) {
            menuItem.addEventListener('click', function() {
                document.getElementById('js-menu').classList.remove('menu-visible');


            });
        });
    </script>
    <?php $sql = "SELECT * FROM {$prefix}report_das where report_state='แจ้งเสีย' "; //เช็คค่าข้อมูลที่ส่งมาจากฟอร์ม
    $dbquery = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($dbquery);

    /*    if ($num_rows >= 1) {
    ?>
        <div>
            <div class="inline-flex absolute -top-0 right-1 justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">
                <span class="flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>

                    <?php echo $num_rows ?>
            </div>

        </div>
    <?php
    } */
    ?>


    <?php

    foreach ($banner_sql as $row) {
    ?>

        <img src="\image\.<?php echo  $row['template_data'] ?>" width="100%">
    <?php
    }

    ?>




    <!-- @section('list-data')     
<br>
<br>
<div class="" id="list-data" >
@endsection -->


    @section('list-data')

    <br>
    <br>



    <div class="row" id="list-data">
        @endsection



        <div id="QR_codeT" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button onclick="stopCamera()" id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="QR_codeT">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Scan Qr Code</h3>
                        <div id="preview123">
                            <video class="p-1 border" id="videoElement" style="width: 100%;"></video>
                        </div>
                        <br>

                    </div>
                </div>
            </div>
        </div>




        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script crossorigin="anonymous" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script>
            function scanQRCode() {

                var currentURL = window.location.href;
                console.log(currentURL); // แสดง URL ปัจจุบันในคอนโซล
                console.log("asdasd");
                // ทำสิ่งที่คุณต้องการกับ URL ปัจจุบันที่เก็บไว้ในตัวแปร


                if (currentURL.includes("index_admin")) {
                    var slicedURL = currentURL.substring(0, currentURL.indexOf("index_admin"));
                    console.log("มี ตัด index_admin "); // แสดงผลลัพธ์ในคอนโซล
                    console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                    if (currentURL.includes("show")) {
                        var slicedURL = currentURL.substring(0, currentURL.indexOf("show"));
                        console.log("มี1"); // แสดงผลลัพธ์ในคอนโซล
                        console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล
                    } else if (currentURL.includes("types_view")) {
                        var slicedURL = currentURL.substring(0, currentURL.indexOf("types_view"));
                        console.log("มี2"); // แสดงผลลัพธ์ในคอนโซล
                        console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                    } else if (currentURL.includes("building_view")) {
                        var slicedURL = currentURL.substring(0, currentURL.indexOf("building_view"));
                        console.log("มี3"); // แสดงผลลัพธ์ในคอนโซล
                        console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                    } else if (currentURL.includes("cargivers_view")) {
                        var slicedURL = currentURL.substring(0, currentURL.indexOf("cargivers_view"));
                        console.log("มี4"); // แสดงผลลัพธ์ในคอนโซล
                        console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                    } else if (currentURL.includes("login")) {
                        var slicedURL = currentURL.substring(0, currentURL.indexOf("login"));
                        console.log("มี5"); // แสดงผลลัพธ์ในคอนโซล
                        console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                    }

                }
                // เพิ่มโค้ดเริ่มต้นการแสดงภาพจากกล้อง
                var scanner = new Instascan.Scanner({
                    video: document.getElementById('videoElement'),
                    mirror: false
                });

                scanner.addListener('scan', function(content) {
                    console.log(content); // Print QR code content to the console

                    // Perform other actions with the scanned QR code content as needed

                    // ตัดข้อความ "https://inventory-data-rmutl.online/" ออกจาก URL
                    let urlWithoutPrefix = content.replace("https://inventory-data-rmutl.online/show_user", "");

                    console.log(slicedURL); // Print the modified URL to the console
                    let combinedURL = slicedURL + "show_admin" + urlWithoutPrefix;
                    console.log("1111");
                    console.log(combinedURL); // แสดงผลลัพธ์ที่ต่อเข้าด้วยกันในคอนโซล
                    window.location.href = combinedURL;
                    // หยุดการเล่นวิดีโอของกล้อง
                    let stream = videoElement.srcObject;
                    let tracks = stream.getTracks();
                    tracks.forEach(function(track) {
                        track.stop();
                        // พาเบราว์เซอร์ไปยังหน้าเว็บไซต์ที่ได้รับผลลัพธ์

                    });


                    // ตั้งค่าวิดีโอเป็น null เพื่อเคลียร์ทรัพยากร
                    videoElement.srcObject = null;

                });

                Instascan.Camera.getCameras().then(function(cameras) {
                    console.log(cameras.length);
                    if (cameras.length == 2) {
                        scanner.start(cameras[1]); // Start scanning with the first available camera
                    } else if (cameras.length == 1) {
                        scanner.start(cameras[0]);

                    } else {

                        console.error('No cameras found.');
                    }
                });
            }

            function stopCamera() {
                let videoElement = document.getElementById('videoElement');
                let stream = videoElement.srcObject;
                let tracks = stream.getTracks();
                tracks.forEach(function(track) {
                    track.stop();
                });
                videoElement.srcObject = null;
            }
        </script>



        </table>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script type="text/javascript">
            // จากปุ่นค้นหา
            $(function() {
                $("#btnSearch").click(function() {
                    var itemname = $("#itemname").val(); // ดึงค่า itemname จากฟอร์ม

                    if (itemname.trim() !== '') { // ตรวจสอบว่า itemname ไม่เป็นค่าว่าง
                        $.ajax({
                            url: "/index_admin/?when=33&type=search",
                            type: "get",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                itemname: itemname
                            },
                            // beforeSend: function() {
                            //     $(".loading").show();
                            // },
                            // complete: function() {
                            //     $(".loading").hide();
                            // },
                            // success: function(data) {
                            //     $("#list-data").html(data);
                            // }
                        });
                    }
                });

                $("#searchform").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#btnSearch").click();
                        return false;
                    }
                });
            });
        </script>
        <!-- จาก menu -->
        <script type="text/javascript">
            $(function() {
                $("#menu1").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname1").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });

                $("#menu2").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname2").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });

                $("#menu3").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname3").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });

                $("#menu4").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname4").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });

                $("#menu5").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname5").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });

                $("#menu6").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname6").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });

                $("#menu7").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname7").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });

                $("#menu8").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname8").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });

                $("#menu9").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname9").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });


                $("#menu10").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname10").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });


                $("#menu11").click(function() {
                    $.ajax({
                        url: "search_admin",
                        type: "post",
                        data: {
                            itemname: $("#itemname11").val()
                        },
                        beforeSend: function() {
                            $(".loading").show();
                        },
                        complete: function() {
                            $(".loading").hide();
                        },
                        success: function(data) {
                            $("#list-data").html(data);
                        }
                    });
                });

                $("#searchform1").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu1").click();
                        return false;
                    }
                });

                $("#searchform1").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu2").click();
                        return false;
                    }
                });

                $("#searchform1").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu3").click();
                        return false;
                    }
                });

                $("#searchform1").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu4").click();
                        return false;
                    }
                });

                $("#searchform1").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu5").click();
                        return false;
                    }
                });

                $("#searchform1").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu6").click();
                        return false;
                    }
                });

                $("#searchform1").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu7").click();
                        return false;
                    }
                });

                $("#searchform1").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu8").click();
                        return false;
                    }
                });

                $("#searchform2").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu9").click();
                        return false;
                    }
                });

                $("#searchform2").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu10").click();
                        return false;
                    }
                });

                $("#searchform2").on("keyup keypress", function(e) {
                    var code = e.keycode || e.which;
                    if (code == 13) {
                        $("#menu11").click();
                        return false;
                    }
                });

            });
        </script>
        <br><br>

        <!-- Footer (CSS-Navbar)
        <footer class="footer">
            <div class="footer__left">
                <img src="#" alt="">
            </div>
            <div class="footer__right">
                <p>&copy; 2023 Rajamangala University of Technology Lanna. All Rights Reserved.</p>
            </div>
        </footer>
         -->

        <script src="/js/navbar.js"></script>

</body>

</html>