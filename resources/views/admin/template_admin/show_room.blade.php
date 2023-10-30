<?php
$i = 0;

if ($building_id != null) {

    $GetUrlRoom = " ";
    $GetUrlbuilding = "/building";
} else {
    $GetUrlRoom = "/templateController/show_room/add/";
    $GetUrlbuilding = "/templateController/show_building/add ";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="/css/export.css" rel="stylesheet">
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">

    <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์</title>

</head>

<body>

    <div class="container_index">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="\index_admin" class="font-color inline-flex items-center text-sm font-medium ">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    หน้าแรก
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <a href="<?php echo $GetUrlbuilding ?>" class="font-color inline-flex items-center text-sm font-medium ">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium ">อาคารเรียน</span>
                    </a>
                </div>
            </li>
            @if($building_id == null)
            @foreach($data_buildings as $row)
            <li>
                <div class="flex items-center">

                    <a href="/templateController/show_room/add/<?php echo $row->building_id ?>" class="font-color inline-flex items-center text-sm font-medium ">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium "><?php echo $row->building_name ?></span>
                    </a>
                </div>

            </li>
            @endforeach
            @endif
            <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">ห้องเรียน</span>
                </div>
            </li>
        </ol>
        <br><br>

        <!-- Block -->
        <div class="test">
            @foreach($data as $row)
            <?php
            $i++;
            ?>
            @if($building_id != null)
            @if($row->building_id == $building_id)
            <div class="test_margin">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="/index_admin/?when=<?php echo $row->room_id ?>&type=rooms">
                        <img class="img_test rounded-t-lg" src="/image/roomImg/.<?php echo $row->room_picture ?>" alt="" />
                    </a>

                    <div class="p-5 flex items-center justify-between">
                        <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="text-align: left;">{{$row->room_name}}</h5>

                    </div>
                </div>
            </div>
            @endif


            @else
            <div class="test_margin">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <!-- <a href="/?when=<?php echo $row->room_id ?>&type=rooms"> -->
                    <img class="img_test rounded-t-lg" src="/image/roomImg/.<?php echo $row->room_picture ?>" alt="" />
                    <!-- </a> -->

                    <div class="p-5 flex items-center justify-between">
                        <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="text-align: left;">{{$row->room_name}}</h5>


                        <a data-modal-toggle="form_change_room<?php echo $i; ?>" id="change_room<?php echo $i; ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            แก้ไข&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square inline-flex" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>

                        
                    </div>
                </div>
            </div>


           <!-- Form Edit-->
           <div id="form_change_room<?php echo $i; ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="form_change_room<?php echo $i; ?>">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class=" mb-4 text-xl font-medium text-gray-900 dark:text-white">แก้ไขห้องเรียน {{$row->room_name}}</h3>
                            <form enctype="multipart/form-data" class="space-y-6" name="formroom" id="formroom" action="/roomController/change_room" method="POST">
                                @csrf
                                <div>
                                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อาคารเรียน</label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="building_id" id="building_id">
                                        @foreach($data_buildings as $row1)
                                        <option value="<?php echo $row1->building_id ?>" style="font-family: Kanit;"> {{ $row1->building_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="room_id" id="room_id" value="<?php echo $row->room_id ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                                    <label for="formroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ห้องเรียน</label>
                                    <input  value="<?php echo $row->room_name ?>" type="text" name="room_name" id="room_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>

                                <div>
                                    <h5 class="font"> เเนบรูปห้องเรียน</h5>
                                    <input name="files[]" type="file" accept="image/png, image/gif, image/jpeg" required>
                                </div>

                                <div class="flex justify-between">
                                    <div class="flex items-start"></div>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ส่งข้อมูล</button>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>



            @endif
            @endforeach



            <!-- Upload -->
            @if (preg_match('/add/',$status))
            <a href="#" data-modal-toggle="form_room">
                <div class="container">
                    <div class="flex flex-col items-center pt-5 pb-6"><br>
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">เพิ่มห้องเรียน</span></p>
                    </div>
                </div>
            </a>
            @endif

            <!-- เพิ่มห้องเรียน -->
            <div id="form_room" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="form_room">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class=" mb-4 text-xl font-medium text-gray-900 dark:text-white">เพิ่มห้องเรียน</h3>
                            <form enctype="multipart/form-data" class="space-y-6" name="formroom" id="formroom" action="/roomController/store" method="POST">
                                @csrf
                                <div>
                                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อาคารเรียน</label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="building_id" id="building_id">
                                        @foreach($data_buildings as $row)
                                        <option value="<?php echo $row->building_id ?>" style="font-family: Kanit;"> {{ $row->building_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="formroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ห้องเรียน</label>
                                    <input type="text" name="room_name" id="room_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                                </div>
                                <div>
                                    <h5 class="font"> เเนบรูปห้องเรียน</h5>
                                    <input name="files[]" type="file" accept="image/png, image/gif, image/jpeg">
                                </div>
                                <div class="flex justify-between">
                                    <div class="flex items-start">
                                    </div>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ส่งข้อมูล</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>




    <script src="/js/navbar.js"></script>

</body>

</html>