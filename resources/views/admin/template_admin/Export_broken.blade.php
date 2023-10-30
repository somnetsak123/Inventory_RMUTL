


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
                รายการ
                </th>
                <th scope="col" class="py-3 px-6">
                ห้อง
                </th>
                <th scope="col" class="py-3 px-6">
                ตำแหน่ง
                </th>
                <th scope="col" class="py-3 px-6">
                ผู้รับผิดชอบ
                </th>
       
				<th scope="col" class="py-3 px-6">
				<a href="/Export_Excel/Export_broken" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Export</a>
                
                </th>
                 
            </tr>
        </thead>
        <tbody>


            <?php $i=0; ?>
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
                {{$row->room_name}}
                </th>
                <th scope="col" class="py-3 px-6">
				<a href="/report/showMap/<?php echo $row->address; ?>"    >
                {{$row->address}}
				</a>
                </th>
                <th scope="col" class="py-3 px-6">
                {{$row->caregiver_name }}
                </th>
     
                     
                   
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>


<!-- <script src="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.js"></script>
<link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.css" />

<script>
var x = document.getElementById("demo");
var map = document.getElementById("map");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML =  position.coords.latitude + 
  ", " + position.coords.longitude;

  document.getElementById("demo").value = position.coords.latitude + 
  ", " + position.coords.longitude;
 


  
  // frm.latitude.value = position.coords.latitude;
  // frm.longitude.value = position.coords.longitude;


}
</script>
  -->



       

                   



</body>

</html>