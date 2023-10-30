<?php

use Illuminate\Support\Facades\DB;

session_start();

if (isset($_SESSION['user'])) {
    $_SESSION['msg'] = "Admin";

    if (isset($_GET['da_id'])) {
        $getda_id = $_GET['da_id'];
        redirect()->to('/show_admin?da_id=' . $getda_id)->send();
    }
}

// if (isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['user']);
//     redirect()->to('/login')->send();
// }

$conn = mysqli_connect($servername, $username, $password, $database) or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");


$title_sql = DB::table($prefix . 'tb_templates')->where('id_template', 1)->get();

$banner_sql = DB::table($prefix . 'tb_templates')->where('id_template', 2)->get();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- JS -->
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>





    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมมพิวเตอร์</title>

</head>

<body>

    <script src="{{ asset('js/todo.js') }}" defer></script>

    <nav>
        <span class="nav-toggle" id="js-nav-toggle">
            <i class="fas fa-bars"></i>
        </span>

        <div class="logo">
            <?php

            foreach ($title_sql as $row) {
            ?>



                <h1> {{$row->template_data}}</h1>

            <?php
            }

            ?>
        </div>
        <ul  class="list-1 " id="js-menu">
            <li><a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill inline-flex" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                    </svg>&nbsp;หน้าแรก</a>
            </li>
            <li><a href="/dashboard_view">แดชบอร์ด</a></li>
            <!-- <li><button onclick="scanQRCode()" data-modal-toggle="QR_code" id="QR_code">สแกนคิวอาร์โค้ด</button></li> -->
            <li><a href="/types_view">ประเภท</a></li>
            <li><a href="/building_view">อาคารเรียน</a></li>

            <li><a href="/cargivers_view">ผู้ดูแล</a></li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-lock inline-flex" viewBox="0 0 16">
                    <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z" />
                    <path d="M3.904 9.223C2.875 8.755 2 8.007 2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-1.364-.125 2.988 2.988 0 0 0-2.197.731 4.525 4.525 0 0 0-1.254 1.237A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777ZM8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.09 0 .178 0 .266-.003A1.99 1.99 0 0 1 8 15v-1Zm0-1.5c0 .1.003.201.01.3A1.9 1.9 0 0 0 8 13c-1.573 0-3.022-.289-4.096-.777C2.875 11.755 2 11.007 2 10v-.839c.457.432 1.004.751 1.49.972C4.722 10.693 6.318 11 8 11c.086 0 .172 0 .257-.002A4.5 4.5 0 0 0 8 12.5Z" />
                    <path d="M9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
                </svg><a href="/login">&nbsp;เข้าสู่ระบบ (ผู้ดูแล)</a>
            </li>
        </ul>
    </nav>


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


    <?php

    foreach ($banner_sql as $row) {
    ?>

        <img src="\image\.<?php echo  $row->template_data ?>" width="100%">
    <?php
    }

    ?>
    <br>

    @section('list-data')

    <br>
    <br>



    <div class="row" id="list-data">



        @endsection


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
                            url: "/?when=33&type=search",
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




        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script crossorigin="anonymous" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script>
            function scanQRCode() {

                var currentURL = window.location.href;
                console.log(currentURL); // แสดง URL ปัจจุบันในคอนโซล
                // ทำสิ่งที่คุณต้องการกับ URL ปัจจุบันที่เก็บไว้ในตัวแปร

                if (currentURL.includes("show")) {
                    var slicedURL = currentURL.substring(0, currentURL.indexOf("show"));
                    console.log("มี"); // แสดงผลลัพธ์ในคอนโซล
                    console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล
                } else if (currentURL.includes("types_view")) {
                    var slicedURL = currentURL.substring(0, currentURL.indexOf("types_view"));
                    console.log("มี"); // แสดงผลลัพธ์ในคอนโซล
                    console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                } else if (currentURL.includes("building_view")) {
                    var slicedURL = currentURL.substring(0, currentURL.indexOf("building_view"));
                    console.log("มี"); // แสดงผลลัพธ์ในคอนโซล
                    console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                } else if (currentURL.includes("cargivers_view")) {
                    var slicedURL = currentURL.substring(0, currentURL.indexOf("cargivers_view"));
                    console.log("มี"); // แสดงผลลัพธ์ในคอนโซล
                    console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                } else if (currentURL.includes("login")) {
                    var slicedURL = currentURL.substring(0, currentURL.indexOf("login"));
                    console.log("มี"); // แสดงผลลัพธ์ในคอนโซล
                    console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                } else if (currentURL.includes("?")) {
                    var slicedURL = currentURL.substring(0, currentURL.indexOf("?"));
                    console.log("มี"); // แสดงผลลัพธ์ในคอนโซล
                    console.log(slicedURL); // แสดงผลลัพธ์ในคอนโซล

                } else {
                    var slicedURL = currentURL;
                    console.log("ไม่มี"); // แสดงผลลัพธ์ในคอนโซล
                    console.log(slicedURL);
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
                    let urlWithoutPrefix = content.replace("https://inventory-data-rmutl.online/", "");

                    console.log(urlWithoutPrefix); // Print the modified URL to the console
                    let combinedURL = slicedURL + urlWithoutPrefix;

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

        <script type="text/javascript">
            $(function() {
                $("#menu1").click(function() {
                    $.ajax({
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                        url: "search",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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