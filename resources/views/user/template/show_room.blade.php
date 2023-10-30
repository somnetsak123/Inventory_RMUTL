<?php
$i = 0;
$count = 0;
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
                <a href="/" class="font-color inline-flex items-center text-sm font-medium ">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    หน้าแรก
                </a>
            </li>
            <li >
                <div class="flex items-center">
                <a href="../building_view" class="font-color inline-flex items-center text-sm font-medium ">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium ">อาคารเรียน</span>
                    </a>
                </div>
            </li>
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
      <!--   <p>Building ID: {{ $building_id }}</p> -->

            @foreach($data as $row)
            <?php
            $i++;
            ?>
            @if($row->building_id == $building_id)
            <div class="test_margin">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="/?when=<?php echo $row->room_id ?>&type=rooms">
                        <img class="img_test rounded-t-lg" src="/image/roomImg/.<?php echo $row->room_picture ?>" alt="" />
                    </a>

                    <div class="p-5 flex items-center justify-between">
                        <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="text-align: left;">{{$row->room_name}}</h5>
                    
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <!-- Upload -->
      

        </div>
    </div>

    <script src="/js/navbar.js">
    </script>

</body>

</html>