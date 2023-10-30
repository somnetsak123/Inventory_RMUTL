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

  <!-- Font -->
  <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>

  <!-- CSS -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="/css/export.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

  <!-- JS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์</title>

</head>

<body>
  <div class="container_table show_report">
    <h3>คำร้องการรายงานครุภัณฑ์ชำรุด (Reports)</h3>
    <hr><br>
    <table id="show_report" class="show_report">
      <thead>
        <tr>
          <th>เรื่อง</th>
          <th>รหัสครุภัณฑ์</th>
          <th>ชื่อ</th>
          <th>ประเภท</th>
          <th>ชื่อผู้ดูแล</th>
          <th>ระยะเวลาใช้งาน</th>
          <th>ราคา</th>
          <th>สถานะ</th>
          <th>วันที่ตรวจเช็ค</th>
          <th>เบอร์โทร</th>
          <th>หมายเหตุ</th>
          <th>จำนวนครั้ง</th>
          <th>ตำแหน่ง</th>
          <th>รูปภาพ</th>
          <th></th>
          
        </tr>
      </thead>
      <tbody>

        <?php $i = 0; ?>
        @foreach($data as $row)

        <tr>
          <th><?php echo $row->da_subject ?></th>
          <td><?php echo $row->da_id ?></td>
          <td><?php echo $row->da_name ?></td>
          <td><?php echo $row->da_type ?></td>
          <td><?php echo $row->caregiver_name ?></td>

          <td><?php echo $row->time_of_use ?></td>
          <td><?php echo $row->da_price ?></td>
          <td><?php echo $row->report_state ?></td>
          <td><?php echo $row->da_recheck_year ?></td>
          <td><?php echo $row->phone_number ?></td>
          <td><?php echo $row->note ?></td>
          <td><?php echo $row->count_report ?></td>
          <td>

            <style>
              .show-image-button {
                display: flex;
                justify-content: center;
                align-items: center;
              }

              .modal {
                width: 500px;
                height: 300px;
              }
            </style>

            <div class="row" id="map-data"> </div>
            <button class="map-button" data-map="<?php echo $row->address; ?>"><?php echo $row->address; ?></button>

          <td>
            <div class="row" id="list-data"></div>
            <button class="show-image-button" data-itemname="<?php echo $row->da_id ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
              </svg>
            </button>
          </td>

          <!-- <button id="show_image" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">รูปภาพ</button> -->

          <td>
            
            <form id="formAdd" method="POST" enctype="multipart/form-data" action="{{url('/report/update')}}">
              @csrf <!-- เพิ่มตรงนี้ -->
              <input type="hidden" value="<?php echo $row->da_id ?>" id="da_id" name="da_id" />
              <input type="hidden" value="<?php echo $row->count_report ?>" id="count_report" name="count_report" />
              <input type="hidden" value="<?php echo $_SESSION['caregiver_name'] ?>" id="caregiver_name" name="caregiver_name" />
              <input type="hidden" value="<?php echo $_SESSION['user_statuses'] ?>" id="user_statuses" name="user_statuses" />
              <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ยืนยัน</button>

            </form>

            <br>

            <form id="formAdd" method="POST" enctype="multipart/form-data" action="{{url('/report/destroy')}}">
              @csrf <!-- เพิ่มตรงนี้ -->
              <input type="hidden" value="<?php echo $row->da_id ?>" id="da_id" name="da_id" />
              <input type="hidden" value="<?php echo $row->count_report ?>" id="count_report" name="count_report" />
              <input type="hidden" value="<?php echo $_SESSION['caregiver_name'] ?>" id="caregiver_name" name="caregiver_name" />
              <input type="hidden" value="<?php echo $_SESSION['user_statuses'] ?>" id="user_statuses" name="user_statuses" />
              <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ยกเลิก</button>

            </form>

            <!-- <a href="/report/update/<?php echo ($row->da_id) ?>/<?php echo $row->count_report ?>/<?php echo $_SESSION['caregiver_name']; ?>/<?php echo $_SESSION['user_statuses']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ยืนยัน</a> -->
          </td>


        </tr>



        <?php $i++; ?>
        @endforeach
      </tbody>
    </table>

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



    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $(".show-image-button").click(function() {
          var itemname = $(this).data("itemname"); // ดึงค่า itemname จากแอตทริบิวต์ของปุ่มที่คลิก

          $.ajax({
            url: "/report_showimage",
            type: "post",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              itemname: itemname // ส่งค่า itemname เป็นพารามิเตอร์ของ Ajax request
            },
            beforeSend: function() {
              $(".loading").show();
            },
            complete: function() {
              $(".loading").hide();
            },
            success: function(data) {
              $("#list-data").empty();
              $("#list-data").append(data);
            }
          });
        });
      });
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $(".map-button").click(function() {
          var itemname = $(this).data("map"); // ดึงค่า itemname จากแอตทริบิวต์ของปุ่มที่คลิก

          $.ajax({
            url: "/report_map",
            type: "post",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              itemname: itemname // ส่งค่า itemname เป็นพารามิเตอร์ของ Ajax request
            },
            beforeSend: function() {
              $(".loading").show();
            },
            complete: function() {
              $(".loading").hide();
            },
            success: function(data) {
              $("#map-data").empty();
              $("#map-data").append(data);
            }
          });
        });
      });
    </script>


    <script>
      $(document).ready(function() {
        $('#show_report').DataTable();
      });
    </script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</body>

</html>