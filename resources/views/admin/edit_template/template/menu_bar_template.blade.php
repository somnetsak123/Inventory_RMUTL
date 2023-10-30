<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <!-- CSS -->
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link href="/css/backtotop_button.css" rel="stylesheet">
    <link href="/css/template_nav.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/addalerts.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- JS -->
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    

    <script src="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.css" />

    <link href="/css/navbar.css" rel="stylesheet">
    <title>เว็บไซต์จัดการครุภัณฑ์ สาขาวิศวกรรมคอมพิวเตอร์</title>

<style>

    /* ปรับสไตล์ลิงก์ของแบนเนอร์ */
.banner-link {
  display: inline-block;
  text-decoration: none;
  position: relative;
  width: 100%;
 /* ใช้ความสูงของ viewport เพื่อให้แสดงเต็มจอ */
  overflow: hidden; 
}

.banner-link:hover::before {
  content: "คลิกเพื่อแก้ไข";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 6px 12px;
  border-radius: 5px;
  font-size: 14px;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
}

.banner-link:hover::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.2);
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
}

.banner-link:hover::before,
.banner-link:hover::after {
  opacity: 1;
  visibility: visible;
}

/* ปรับสไตล์รูปภาพแบนเนอร์ */
.banner-image {
  display: block;
  width: 100%;
  height: auto;
  border-radius: 10px;
  transition: transform 0.3s ease;
}

.banner-image:hover {
  transform: scale(1.05);
}

</style>


</head>




<body>
    

    <?php

    $conn = mysqli_connect($servername, $username, $password, $database) or die("Error: " . mysqli_error($conn));
    mysqli_query($conn, "SET NAMES 'utf8' ");
    $query_title = "SELECT * FROM {$prefix}tb_templates WHERE `id_template` LIKE 1 ";
    $title_sql = mysqli_query($conn, $query_title);

    $query_banner = "SELECT * FROM {$prefix}tb_templates WHERE `id_template` LIKE 2 ";
    $banner_sql = mysqli_query($conn, $query_banner);

    ?>


    <nav class="flex items-center">
        <span class="nav-toggle" id="js-nav-toggle"></span>

        <div class="logo">
            <?php

            foreach ($title_sql as $row) {
            ?>


                <a href="#" data-modal-toggle="form_edit_title" id="edit_title" class="banner-link">
                    <h1> {{$row['template_data']}}</h1>
                </a>
            <?php
            }

            ?>


        </div>

        <ul id="js-menu">
            <li><a href="/templateController/show_types/add" >ประเภท</a></li>
            <li><a href="/templateController/show_building/add" >อาคารเรียน</a></li>
            <li><a href="/templateController/show_room/add" >ห้องเรียน</a></li>
            <li><a href="/templateController/show_cargivers/add" >ผู้ดูเเล</a></li>
        </ul>
    </nav>

    
    <div data-dial-init class="fixed right-6 bottom-6 group">
        <div id="speed-dial-menu-default" class="flex flex-col items-center hidden mb-4 space-y-2"></div>
        <a a href="/index_admin">
            <button type="button" data-tooltip-target="tooltip-share" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-[#513300] rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                </svg>
            </button>
         </a>    
        </div>
    </div>

    <?php
    foreach ($banner_sql as $row) {
    ?>

<a href="#" data-modal-toggle="form_edit_banner" id="edit_banner" class="banner-link">
  <img src="\image\.<?php echo $row['template_data'] ?>" alt="Banner Image" class="banner-image" width="100%">
</a>


    <?php
    }

    ?>

   <!-- เพิ่มประเภท -->
<div id="form_type" tabindex="1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="form_type">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class=" mb-4 text-xl font-medium text-gray-900 dark:text-white">เพิ่มประเภท</h3>
                    <form class="space-y-6" name="formtype" id="formtype" action="/tb_typeController/store" method="POST">
                    @csrf
                    <div>
                            <label for="da_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ประเภทที่ต้องการ</label>
                            <input type="text" name="da_type" id="da_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ส่งข้อมูล</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <!-- เพิ่มอาคารเรียน -->
    <div id="form_building" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="form_building">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class=" mb-4 text-xl font-medium text-gray-900 dark:text-white">เพิ่มอาคารเรียน</h3>
                    <form enctype="multipart/form-data" class="space-y-6" name="formbuilding" id="formbuilding" action="/buildingController/store" method="POST">
                    @csrf
                    <div>
                            <label for="building_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อาคารเรียน</label>
                            <input type="text" name="building_name" id="building_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                        </div>
                        <div>
                            <h5 class="font"> เเนบรูปอาคารเรียน</h5>
                            <input name="files[]" type="file" accept="image/png, image/gif, image/jpeg">


                        </div>

                        <div class="flex justify-between">
                            <div class="flex items-start">
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ส่งข้อมูล</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>








    <!-- เเก้ไขไตเติล -->
    <div id="form_edit_title" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="form_edit_title">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class=" mb-4 text-xl font-medium text-gray-900 dark:text-white">แก้ไขข้อความ</h3>
                    <form class="space-y-6" name="formedit_title" id="formedit_title" action="/templateController/update/1" method="POST">
                    @csrf
                    <div>


                            <input type="text" name="template_data" id="template_data" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                        </div>
                        <div>

                        </div>

                        <div class="flex justify-between">
                            <div class="flex items-start">
                            </div>

                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover_transition">ส่งข้อมูล</button>

                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>

    <!-- เเก้ไขเเบนเนอร์ -->
    <div id="form_edit_banner" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="form_edit_banner">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class=" mb-4 text-xl font-medium text-gray-900 dark:text-white">แก้ไขแบรนเนอร์ (ขนาดที่แนะนำ 1463 x 313)</h3>
                    <form enctype="multipart/form-data" class="space-y-6" name="formedit_banner" id="formedit_banner" action="/templateController/update/2" method="POST">
                    @csrf
                    <div>


                            <input name="files[]" type="file" accept="image/png, image/gif, image/jpeg" multiple>
                        </div>
                        <div>

                        </div>

                        <div class="flex justify-between">
                            <div class="flex items-start">
                            </div>

                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover_transition">ส่งข้อมูล</button>

                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>

        <!-- form เพิ่มผู้ดูแล -->
        <div id="form_cargivers" tabindex="1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="form_cargivers">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class=" mb-4 text-xl font-medium text-gray-900 dark:text-white">เพิ่มชื่อผู้ดูแล</h3>
                    <form class="space-y-6" name="formtype" id="formtype" action="/cargivers_Controller/store" method="POST">
                    @csrf
                    <div>
                            <input type="text" name="caregiver_name" id="caregiver_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ส่งข้อมูล</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

*** สามารถเเก้ไข โลโก้ เเละ แบนเนอร์ ได้



    <!-- jQuery -->
    <script src="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.css" />
</body>

</html>