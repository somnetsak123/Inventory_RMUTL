<?php

$conn = mysqli_connect($servername, $username, $password, $database) or die("Error: " . mysqli_error($conn));


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font -->
  <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>

  <!-- CSS -->
  <link href="/css/app.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/export.css">
  <link href="/css/edi.css" rel="stylesheet">
  <link href="/css/ediV2.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

  <!-- JS -->
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

  <!-- JQuery -->
  <script src="https:https://code.jquery.com/jquery-3.6.3.min.js"></script>

  <style>
    .btn-divider {
      border-left: 1px solid #ccc;
      /* สีเส้นคั่นอ่อน */
      margin: 0 5px;
      height: 100%;
    }
  </style>

  <script>
    $(document).ready(function() {
      $('#edit_table').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'copy',
            className: 'btn1 btn-primary'
          },
          {
            extend: 'excel',
            className: 'btn3 btn-primary'
          },

          {
            extend: 'print',
            className: 'btn5 btn-primary'
          },
          {
            text: 'Export SQL',
            className: 'btn6 btn-primary',
            action: function() {
              window.location.href = '/export/sql';
            }
          },
          {
            text: 'Export File',
            className: 'btn7 btn-primary',
            action: function() {
              window.location.href = '/export/file';
            }
          }
        ],
        initComplete: function() {
          $('.btn5').after('<span class="btn-divider"></span>');
        }
      });
    });
  </script>

  <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์</title>

</head>

<body>
  <div class="container_table edit_table">
    <h3>ตารางข้อมูลครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์ (Exports)</h3>


    <!-- Breadcrumb -->




    <!-- Breadcrumb -->

    <ol class="inline-flex items-center mb-3 sm:mb-0">
      <li>
        <div class="flex items-center">
          <button id="dropdownProject" data-dropdown-toggle="dropdown-project_types" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700"><svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm9-10v.4A3.6 3.6 0 0 1 8.4 9H6.61A3.6 3.6 0 0 0 3 12.605M14.458 3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
            </svg>ประเภท<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdown-project_types" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class=" py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

              @foreach($tb_types as $row)
              <li>
                <a href="/Export_Excel/Export_survey/id_type/<?php echo $row->id_type ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$row->da_type}}</a>
              </li>
              @endforeach

            </ul>
          </div>
        </div>
      </li>




      <li aria-current="page">
        <div class="flex items-center">
          <button id="dropdownDatabase" data-dropdown-toggle="dropdown-database_flag" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700"><svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
              <path d="M8 5.625c4.418 0 8-1.063 8-2.375S12.418.875 8 .875 0 1.938 0 3.25s3.582 2.375 8 2.375Zm0 13.5c4.963 0 8-1.538 8-2.375v-4.019c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353c-.193.081-.394.158-.6.231l-.189.067c-2.04.628-4.165.936-6.3.911a20.601 20.601 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244c-.053-.028-.113-.053-.165-.082v4.019C0 17.587 3.037 19.125 8 19.125Zm7.09-12.709c-.193.081-.394.158-.6.231l-.189.067a20.6 20.6 0 0 1-6.3.911 20.6 20.6 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244C.112 6.035.052 6.01 0 5.981V10c0 .837 3.037 2.375 8 2.375s8-1.538 8-2.375V5.981c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353Z" />
            </svg>สถานะ<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdown-database_flag" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

              @foreach($tb_flag as $row)
              <li>
                <a href="/Export_Excel/Export_survey/da_flag/<?php echo $row->da_flag ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$row->da_status}}</a>
              </li>
              @endforeach


            </ul>
          </div>
        </div>
      </li>


      <li aria-current="page">
        <div class="flex items-center">
          <button id="dropdownDatabase" data-dropdown-toggle="dropdown-database_cargivers" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700"><svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
              <path d="M8 5.625c4.418 0 8-1.063 8-2.375S12.418.875 8 .875 0 1.938 0 3.25s3.582 2.375 8 2.375Zm0 13.5c4.963 0 8-1.538 8-2.375v-4.019c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353c-.193.081-.394.158-.6.231l-.189.067c-2.04.628-4.165.936-6.3.911a20.601 20.601 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244c-.053-.028-.113-.053-.165-.082v4.019C0 17.587 3.037 19.125 8 19.125Zm7.09-12.709c-.193.081-.394.158-.6.231l-.189.067a20.6 20.6 0 0 1-6.3.911 20.6 20.6 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244C.112 6.035.052 6.01 0 5.981V10c0 .837 3.037 2.375 8 2.375s8-1.538 8-2.375V5.981c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353Z" />
            </svg>ผู้ดูแล<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdown-database_cargivers" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

              @foreach($tb_cargivers as $row)
              <li>
                <a href="/Export_Excel/Export_survey/cargiver_id/<?php echo $row->cargiver_id ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$row->caregiver_name}}</a>
              </li>
              @endforeach

            </ul>
          </div>
        </div>
      </li>

      <li aria-current="page">
        <div class="flex items-center">
          <button id="dropdownDatabase" data-dropdown-toggle="dropdown-database_date_get" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700"><svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
              <path d="M8 5.625c4.418 0 8-1.063 8-2.375S12.418.875 8 .875 0 1.938 0 3.25s3.582 2.375 8 2.375Zm0 13.5c4.963 0 8-1.538 8-2.375v-4.019c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353c-.193.081-.394.158-.6.231l-.189.067c-2.04.628-4.165.936-6.3.911a20.601 20.601 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244c-.053-.028-.113-.053-.165-.082v4.019C0 17.587 3.037 19.125 8 19.125Zm7.09-12.709c-.193.081-.394.158-.6.231l-.189.067a20.6 20.6 0 0 1-6.3.911 20.6 20.6 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244C.112 6.035.052 6.01 0 5.981V10c0 .837 3.037 2.375 8 2.375s8-1.538 8-2.375V5.981c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353Z" />
            </svg>ปีที่ได้รับ<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdown-database_date_get" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

            @foreach($get_dateget as $row)
              <li>
                <a href="/Export_Excel/Export_survey/date_get/<?php echo $row->year ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"> ค.ศ. {{$row->year}}</a>
              </li>
              @endforeach


            </ul>
          </div>
        </div>
      </li>

      <li aria-current="page">
        <div class="flex items-center">
          <button id="dropdownDatabase" data-dropdown-toggle="dropdown-database_room" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700"><svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
              <path d="M8 5.625c4.418 0 8-1.063 8-2.375S12.418.875 8 .875 0 1.938 0 3.25s3.582 2.375 8 2.375Zm0 13.5c4.963 0 8-1.538 8-2.375v-4.019c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353c-.193.081-.394.158-.6.231l-.189.067c-2.04.628-4.165.936-6.3.911a20.601 20.601 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244c-.053-.028-.113-.053-.165-.082v4.019C0 17.587 3.037 19.125 8 19.125Zm7.09-12.709c-.193.081-.394.158-.6.231l-.189.067a20.6 20.6 0 0 1-6.3.911 20.6 20.6 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244C.112 6.035.052 6.01 0 5.981V10c0 .837 3.037 2.375 8 2.375s8-1.538 8-2.375V5.981c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353Z" />
            </svg>ห้องเรียน<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdown-database_room" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

            @foreach($room as $row)
              <li>
                <a href="/Export_Excel/Export_survey/room_id/<?php echo $row->room_id ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">ห้อง {{$row->room_name}}</a>
              </li>
              @endforeach


            </ul>
          </div>
        </div>
      </li>

      <li aria-current="page">
        <div class="flex items-center">
          <button id="dropdownDatabase" data-dropdown-toggle="dropdown-database_buildings" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700"><svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
              <path d="M8 5.625c4.418 0 8-1.063 8-2.375S12.418.875 8 .875 0 1.938 0 3.25s3.582 2.375 8 2.375Zm0 13.5c4.963 0 8-1.538 8-2.375v-4.019c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353c-.193.081-.394.158-.6.231l-.189.067c-2.04.628-4.165.936-6.3.911a20.601 20.601 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244c-.053-.028-.113-.053-.165-.082v4.019C0 17.587 3.037 19.125 8 19.125Zm7.09-12.709c-.193.081-.394.158-.6.231l-.189.067a20.6 20.6 0 0 1-6.3.911 20.6 20.6 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244C.112 6.035.052 6.01 0 5.981V10c0 .837 3.037 2.375 8 2.375s8-1.538 8-2.375V5.981c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353Z" />
            </svg>อาคารเรียน<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdown-database_buildings" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
              @foreach($buildings as $row)
              <li>
                <a href="/Export_Excel/Export_survey/building_id/<?php echo $row->building_id ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">อาคาร {{$row->building_name}}</a>
              </li>
              @endforeach

            </ul>
          </div>
        </div>
      </li>

      <li aria-current="page">
        <div class="flex items-center">
          <button id="dropdownDatabase" data-dropdown-toggle="dropdown-database_expired" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700"><svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
              <path d="M8 5.625c4.418 0 8-1.063 8-2.375S12.418.875 8 .875 0 1.938 0 3.25s3.582 2.375 8 2.375Zm0 13.5c4.963 0 8-1.538 8-2.375v-4.019c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353c-.193.081-.394.158-.6.231l-.189.067c-2.04.628-4.165.936-6.3.911a20.601 20.601 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244c-.053-.028-.113-.053-.165-.082v4.019C0 17.587 3.037 19.125 8 19.125Zm7.09-12.709c-.193.081-.394.158-.6.231l-.189.067a20.6 20.6 0 0 1-6.3.911 20.6 20.6 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244C.112 6.035.052 6.01 0 5.981V10c0 .837 3.037 2.375 8 2.375s8-1.538 8-2.375V5.981c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353Z" />
            </svg>ปีที่จำหน่าย<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdown-database_expired" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

            @foreach($expired as $row)
              <li>
                <a href="/Export_Excel/Export_survey/expired/<?php echo $row->year ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$row->year}}</a>
              </li>
              @endforeach


            </ul>
          </div>
        </div>
      </li>

      <li aria-current="page">
        <div class="flex items-center">
          <button id="dropdownDatabase" data-dropdown-toggle="dropdown-database_created_at" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700"><svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
              <path d="M8 5.625c4.418 0 8-1.063 8-2.375S12.418.875 8 .875 0 1.938 0 3.25s3.582 2.375 8 2.375Zm0 13.5c4.963 0 8-1.538 8-2.375v-4.019c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353c-.193.081-.394.158-.6.231l-.189.067c-2.04.628-4.165.936-6.3.911a20.601 20.601 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244c-.053-.028-.113-.053-.165-.082v4.019C0 17.587 3.037 19.125 8 19.125Zm7.09-12.709c-.193.081-.394.158-.6.231l-.189.067a20.6 20.6 0 0 1-6.3.911 20.6 20.6 0 0 1-6.3-.911l-.189-.067a10.719 10.719 0 0 1-.852-.34 8.08 8.08 0 0 1-.493-.244C.112 6.035.052 6.01 0 5.981V10c0 .837 3.037 2.375 8 2.375s8-1.538 8-2.375V5.981c-.052.029-.112.054-.165.082a8.08 8.08 0 0 1-.745.353Z" />
            </svg>ปีที่สำรวจ<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdown-database_created_at" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

            @foreach($created_at as $row)
              <li>
                <a href="/Export_Excel/Export_survey/created_at/<?php echo $row->year ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"> {{$row->year}}</a>
              </li>
              @endforeach


            </ul>
          </div>
        </div>
      </li>

    </ol>





    <hr><br>

    <table id="edit_table" class="edit_table">
      <thead>
        <tr>
          <th>รหัสครุภัณฑ์</th>
          <th>ชื่อ</th>
          <th>ประเภท</th>
          <th>ชื่อผู้ดูแล</th>
          <th>วันที่ได้รับ</th>
          <th>ระยะเวลาใช้งาน</th>
          <th>ราคา</th>
          <th>สถานะ</th>
          <th>วันที่ตรวจเช็ค</th>
          <th>ตึก</th>
          <th>ห้องเรียน</th>
          <th>จำนวนแจ้งเสีย</th>
          <th>วันที่จำหน่าย</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($tb_durable_articles as $row) {
        ?>
          <tr>
            <td><?php echo $row->da_id ?></td>
            <td><?php echo $row->da_name ?></td>
            <td><?php echo $row->da_type ?></td>
            <td><?php echo $row->caregiver_name ?></td>
            <td><?php echo $row->date_get ?></td>
            <td><?php
                date_default_timezone_set('Asia/Bangkok');
                // Get the current timestamp
                $time = time();
                $stored_time = '2022-12-15';
                $current_time = date('Y-m-d');
                // Convert the stored time string into a timestamp
                // Subtract the stored timestamp from the current timestamp
                // $time_difference = $current_time - $stored_time;
                // Format the time difference into a human-readable string
                // list($byear, $bmonth, $bday)= explode("-",$stored_time); 
                // list($tyear, $tmonth, $tday)= explode("-",$current_time);  
                // $mstored_time = mktime(0, 0, 0, $bmonth, $bday, $byear);
                // $mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
                // echo "วันเกิด $stored_time"."<br>\n";
                //echo "วันที่ปัจจุบัน $time"."<br>\n";
                // จะต้องทำการเเยก ปี เดือน ก่อนถึงจะเอามาใช้ได้
                $u_y = date("Y", $time) - date("20y", strtotime($row->date_get)); //เอาจากที่ได้จาก sql มาใส่เเทน 2022
                if (date("m", $time) >= date("m", strtotime($row->date_get))) {
                  $u_m = date("m", $time) - date("m", strtotime($row->date_get));
                }
                if (date("m", $time) <= date("m", strtotime($row->date_get))) {
                  $u_m =  date("m", strtotime($row->date_get)) - date("m", $time);
                }
                ////////////////////////////////////////////////////////////
                /*  echo (date("d", strtotime($row["date_get"]))); */
                if (date("d", $time) >= date("d", strtotime($row->date_get))) {
                  $u_d =  date("d", $time) - date("d", strtotime($row->date_get));
                }
                if (date("d", $time) <= date("d", strtotime($row->date_get))) {
                  $u_d =  date("d", strtotime($row->date_get)) - date("d", $time);
                }
                // $u_d=  date("d",strtotime($row["date_get"])) - date("d",$time);
                /*  echo (date("20y", strtotime($row["date_get"]))); */
                ?><?php

                  echo "$u_y ปี $u_m เดือน $u_d วัน";
                  /* echo "$u_y   ปี    $u_m เดือน      $u_d  วัน"; */
                  ?>
              <?php
              $sql = "UPDATE {$prefix}tb_durable_articles SET `time_of_use` = '$u_y-$u_m-$u_d' WHERE {$prefix}tb_durable_articles.`id` = $row->id ";


              if (mysqli_query($conn, $sql)) {
              } else {
                echo "การเพิ่มข้อมูล datetime ลงในตารางผิดพลาด: " . mysqli_error($conn);
              }

              ?>
              <?php

              // time_difference = date(' Y-m-d ', $time_difference);
              // $time_differencecc = date('Y-m-d  ', $current_time);
              // $time_differenceccc = date('Y-m-d  ', $stored_time);
              ?>
            <td><?php echo number_format($row->da_price) ?></td>
            <td><?php echo $row->da_status ?></td>
            <td><?php echo $row->created_at ?></td>
            <td><?php echo $row->building_name ?></td>
            <td><?php echo $row->room_name ?></td>
            <td><?php echo $row->count_report ?></td>
            <td><?php echo $row->expired ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>