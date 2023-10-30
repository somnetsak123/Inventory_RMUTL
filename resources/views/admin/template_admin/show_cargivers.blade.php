<?php
$i = 0;
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
    <div class="container">
        <h4>
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/index_admin" class="font-color inline-flex items-center text-sm font-medium ">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        หน้าแรก
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">ผู้ดูแล</span>
                    </div>
                </li>
            </ol><br>

            @foreach($data as $row)
            <?php
            $i++;

            if (preg_match('/add/', $status)) {
                $data = "teams";
            } else {
                $data = " ";
            }
            ?>
            <center>
                <div class="<?php echo $data ?>">
                    <a href="/index_admin/?when=<?php echo $row->cargiver_id ?>&type=cargiver" class="align_caregiver bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="p-4 leading-normal text-center">
                        {{$row->status}}
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{$row->caregiver_name}}</h5>
                        </div>
                    </a>

                    <!-- Button -->
                    @if (preg_match('/add/',$status))
                    <div>
                        <center>
                            <button class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 inline-flex text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <a href="#" data-modal-toggle="form_change_name<?php echo $i; ?>" id="change_name<?php echo $i; ?>">
                                    <h1>แก้ไขชื่อ</h1>
                                </a>
                            </button>

                            <button class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 inline-flex text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <a href="#" data-modal-toggle="form_cargiversAddId<?php echo $i; ?>" id="cargiversAddId<?php echo $i; ?>">
                                    <h1> เพิ่มไอดี </h1>
                                </a>
                            </button>

                            @if ($row->cargiver_username != NULL)
                            <form class="space-y-6" name="formDeleteId<?php echo $i; ?>" id="formDeleteId<?php echo $i; ?>" action="/templateController/DeleteIdcargivers" method="POST">
                                @csrf
                                <button value="<?php echo $row->cargiver_id ?>" name="cargiver_id" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm sm:w-auto px-8 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">ลบไอดี</button>
                            </form>
                            @endif
                        </center>
                    </div>
                    @endif
                </div><br>
                <hr>
            </center>

            <!-- form เพิ่ม แก้ชื่อผู้ดูแล -->
            <div id="form_change_name<?php echo $i; ?>" tabindex="1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="form_change_name<?php echo $i; ?>">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">แก้ไขชื่อของ {{$row->caregiver_name}}</h3>
                            <form class="space-y-4" name="formtype<?php echo $i; ?>" id="formtype<?php echo $i; ?>" action="/templateController/change_name" method="POST">
                                @csrf
                                <div>
                                    <input type="hidden" name="cargiver_id" id="cargiver_id" value="<?php echo $row->cargiver_id;  ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                                    <input type="text" name="caregiver_name" id="caregiver_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                </div>

                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ส่งข้อมูล</button>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <!-- form เพิ่ม ID ผู้ดูแล -->
            <div id="form_cargiversAddId<?php echo $i; ?>" tabindex="1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="form_cargiversAddId<?php echo $i; ?>">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">เพิ่ม ID ของ {{$row->caregiver_name}} <?php echo $i; ?></h3>
                            <form class="space-y-4" name="formtype<?php echo $i; ?>" id="formtype<?php echo $i; ?>" action="/templateController/AddIdcargivers" method="POST">
                                @csrf
                                <div>
                                    <input type="text" name="cargiver_id" id="cargiver_id" value="<?php echo $row->cargiver_id;  ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" name="username" id="username" value="<?php echo $row->cargiver_username;  ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>
                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Password</label>
                                    <input type="text" name="password" id="password" value="<?php echo $row->cargiver_password;  ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>
                                <div>
                                    <label for="dateget" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">สถานะ</label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="user_statuses" id="user_statuses">
                                        <option value="1" style="font-family: Kanit;"> ผู้ดูแลระบบ</option>
                                        <option value="2" style="font-family: Kanit;"> ผู้ดูแลครุภัณฑ์</option>
                                    </select>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ส่งข้อมูล</button>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            @endforeach

            @if (preg_match('/add/',$status) )
            <center>
                <div class="teams_add">
                    <a href="#" data-modal-toggle="form_cargivers" class="w-full flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="container" style="align-items: center;">
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center h-28 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center pt-5 pb-6"><br>
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">เพิ่มผู้ดูแล</span></p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </a>
                    @endif
                </div>
            </center>

            <script src="/js/navbar.js"></script>

</body>

</html>