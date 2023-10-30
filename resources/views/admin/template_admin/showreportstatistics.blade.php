


<?php


// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

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
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link href="/css/addalerts.css" rel="stylesheet">
  

    <title>เว็บครุภัณฑ์</title>
</head>

<body>


<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    
    <div class="pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                รหัสครุภัณฑ์
                </th>
                <th scope="col" class="py-3 px-6">
                ชื่อ
                </th>
                <th scope="col" class="py-3 px-6">
                ชื่อผู้ดูแล
                </th>
                <th scope="col" class="py-3 px-6">
                วันที่ได้รับ
                </th>
                <th scope="col" class="py-3 px-6">
                ใช้มาเเล้วกี่วัน
                </th>
                <th scope="col" class="py-3 px-6">
                ราคา
                </th>
                <th scope="col" class="py-3 px-6">
                สถานะ
                </th>
                <th scope="col" class="py-3 px-6">
                วันที่ตรวจสอบ
                </th>
                <th scope="col" class="py-3 px-6">
                เบอร์ของผู้ที่เเจ้งเสีย
                </th>    
                <th scope="col" class="py-3 px-6">
                หมายเหตุ
                </th>  
                <th scope="col" class="py-3 px-6">
                ครั้งที่แจ้ง
                </th>                             
            </tr>
        </thead>
        <tbody>


    
            @foreach($data as $row)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4 w-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$row->da_id}}
                
                </th>
                <th scope="col" class="py-3 px-6">
                {{$row->da_name}}
                </th>
                <th scope="col" class="py-3 px-6">
                {{$row->caregiver_name}}
                </th>
                <th scope="col" class="py-3 px-6">
                {{$row->date_get}}
                </th>
                <th scope="col" class="py-3 px-6">
                {{$row->time_of_use}}
                </th>
                <th scope="col" class="py-3 px-6">
                {{$row->da_price}}
                </th>
                <th scope="col" class="py-3 px-6">
                {{$row->report_state}}
                </th>
                <th scope="col" class="py-3 px-6">
                {{$row->da_recheck_year}}
                </th>
                <th scope="col" class="py-3 px-6">
                {{$row->phone_number}}
                </th>    
                <th scope="col" class="py-3 px-6">
                {{$row->note}}
                </th>  
                <th scope="col" class="py-3 px-6">
                {{$row->count_report}}
                </th>                    
                <!-- <th scope="col" class="py-3 px-6">
                    <a href="/report_statistics/<?php echo $row->da_id ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ยืนยัน</a>
                </th>
                <th scope="col" class="py-3 px-6">
                    <a href="/report/destroy/<?php echo $row->da_id ?>/" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ยกเลิก</a>
                </th>                     -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



 


</body>

</html>