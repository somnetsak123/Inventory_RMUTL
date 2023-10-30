<php session_start(); use App\Controllers\EditController; ?>
<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "Admin เท่านั้น!!";
    redirect()->to('/index')->send();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    redirect()->to('/login')->send();
}

?>


<?php


// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!doctype html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>

    <link href="/css/report_button.css" rel="stylesheet">
    <style>
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    text-align: center;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  h5.font {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  input[type="file"] {
    padding: 10px;
    margin-bottom: 20px;
    width: 100%;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    border-radius: 5px;
  }
  
</style>

  </head>

  <body>

    <a href="/add/show">
      <button id="add" name="/add" class="btn btn-info font-medium rounded-lg text-sm w-full sm:w-auto 
                          px-5 py-2.5 text-center ">เพิ่มครุภัณฑ์</button> </a>
    </a>
    <a href="/fsell">
      <button id="fsell" name="fsell" class="btn btn-info font-medium rounded-lg text-sm w-full sm:w-auto 
                          px-5 py-2.5 text-center ">ตรวจสอบจำหน่าย</button> </a>
    </a>

    <div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr align="center" >
        <th>รหัสครุภัณฑ์</th>
        <th>ชื่อครุภัณฑ์</th>
        <th>ประเภท</th>
        <th>ผู้ดูเเล</th>
        <th>ได้รับเมื่อ</th>
        <th>ใช้มาเเล้ว</th>
        <th>ราคา</th>
        <th>สถานะ</th>
        <th>ตรวจสภาพล่าสุดเมื่อ</th>
        <th>ห้อง</th>
        <th>รูปห้อง</th>
        <th>ตึก</th>
        <th>รูปตึก</th>
        <th>เเก้ไข</th>
        <th>รูปครุภัณฑ์</th>
        <th>ลบ</th>
        <th>สร้าง QR Code</th>
        <th>จำหน่าย</th>
      </tr>
    </thead>
    <tbody>


    



      <?php 
        $i = 0;
        print_r($stateQR);

        
        foreach ($data as $index => $row) {
         if($row["da_flag"] !=4 ){ 
      ?>
    
      <!-- <td>

<input  type="checkbox" id="checkvalue" name="checkvalue[]" value="<?php echo $row["da_id"] ?>" >

</td>  -->


      <form  method="POST" enctype="multipart/form-data"  name="form1" action="/tableneo/<?php echo $row["id"] ?>">

        <?php
        echo "<tr>";
        /*  action="/updatedata" */

        /////////////////////
        echo "<td>" ?>


        <input type="hidden" value="<?php echo   $row["da_id"] ?>" name="duracleidkeep"/>
        <input type="text" id="row{$index}_da_id" name="da_id" class="bg-gray-50 border border-gray-300
      text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo   $row["da_id"] ?>">
        <?php
        "</td> ";
       
        /////////////////////


        /////////////////////
        echo "<td>" ?>
        <input type="text" id="da_name" name="da_name" class="bg-gray-50 border border-gray-300 
    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo   $row["da_name"] ?>">
        <?php
        "</td> ";
        //////////////////   
        echo "<td>" ?>
      <!--   <input type="text" id="da_type" name="da_type" class="bg-gray-50 border border-gray-300 
    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
    dark:focus:border-blue-500" value="<?php echo $row["da_type"] ?>"> -->
    <select name="id_type" id="id_type">
    <option value="<?php echo $row["id_type"]; ?>"><?php echo $row["da_type"]; ?></option>
    <?php foreach ($data_tb_types as $index => $roww) { ?>
        <option value="<?php echo $roww["id_type"]; ?>"><?php echo $roww["da_type"]; ?></option>
    <?php } ?>
</select>
        <?php

        "</td> ";

        //////////////////   
        echo "<td>" ?>
    <!--     <input type="text" id="caregiver_name" name="caregiver_name" class="bg-gray-50 border border-gray-300 
    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
    dark:focus:border-blue-500" value="<?php echo $row["caregiver_name"] ?>"> -->

    <select name="cargiver_id" id="cargiver_id">
    <option value="<?php echo $row["cargiver_id"]; ?>"><?php echo $row["caregiver_name"]; ?></option>
    <?php foreach ($data_tb_cargivers as $index => $roww) { ?>
        <option value="<?php echo $roww["cargiver_id"]; ?>"><?php echo $roww["caregiver_name"]; ?></option>
    <?php } ?>
</select>
   

        <?php
        "</td> ";
        ///////////////////     
        echo "<td>" ?>
        <input type="datetime-local" id="dateget" name="dateget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row["date_get"] ?>">
        <?php
        "</td> ";
        ///////////////////    
        echo "<td>" ?>
         
        <!-- <input type="datetime-local" id="time_of_use" name="time_of_use" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row["time_of_use"] ?>">
 -->
        <script>
          function displayDateTime() {
            var currentDate = new Date();
            document.getElementById("current-date-time").innerHTML = currentDate;
          }

          displayDateTime();
        </script>
        <script>
          function displayDateTime() {
            var currentDate = new Date();
            document.getElementById("current-date-time").innerHTML = currentDate;
          }

          setInterval(displayDateTime, 1000);
        </script>

        <?php
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
        $u_y = date("Y", $time) - date("20y", strtotime($row["date_get"])); //เอาจากที่ได้จาก sql มาใส่เเทน 2022
        if (date("m", $time) >= date("m", strtotime($row["date_get"]))) {
          $u_m = date("m", $time) - date("m", strtotime($row["date_get"]));
        }
        if (date("m", $time) <= date("m", strtotime($row["date_get"]))) {
          $u_m =  date("m", strtotime($row["date_get"])) - date("m", $time);
        }
        ////////////////////////////////////////////////////////////
       /*  echo (date("d", strtotime($row["date_get"]))); */
        if (date("d", $time) >= date("d", strtotime($row["date_get"]))) {
          $u_d =  date("d", $time) - date("d", strtotime($row["date_get"]));
        }
        if (date("d", $time) <= date("d", strtotime($row["date_get"]))) {
          $u_d =  date("d", strtotime($row["date_get"])) - date("d", $time);
        }
        // $u_d=  date("d",strtotime($row["date_get"])) - date("d",$time);
       /*  echo (date("20y", strtotime($row["date_get"]))); */
?><input type="text"  class="bg-gray-50 border border-gray-300
text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo "     $u_y ปี $u_m เดือน $u_d วัน";?>"readonly><?php
        /* echo "$u_y   ปี    $u_m เดือน      $u_d  วัน"; */
        ?>
       <!--  <?php echo $row["date_get"] ?> -->
        <?php
        // time_difference = date(' Y-m-d ', $time_difference);
        // $time_differencecc = date('Y-m-d  ', $current_time);
        // $time_differenceccc = date('Y-m-d  ', $stored_time);
        ?>
        <?php
        "</td> ";
        //////////////////
        echo "<td>" ?>
        <input type="number" id="da_price" name="da_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        value="<?php echo $row["da_price"] ?>">
        <?php
        "</td> "; ?>

        <td>
        <select name="da_flag" id="da_flag">
    <option value="<?php echo $row["da_flag"]; ?>"><?php echo $row["da_status"]; ?></option>
    <?php foreach ($data_flag as $index => $roww) { ?>
        <option value="<?php echo $roww["da_flag"]; ?>"><?php echo $roww["da_status"]; ?></option>
    <?php } ?>
</select>


     <!--   <?php $i++ ?> 
          <select name="da_flag" id="da_flag"onChange="OnSelectedIndexChange()">
            <option value="<?php echo $row["da_flag"] ?>" ><?php echo $row["da_status"] ?></option>
            <option value="1">ใช้งานได้</option>
            <option value="2">ชำรุด</option>
            <option value="3">สูญหาย</option>
             <option value="myModal<?php echo $i ?>">จำหน่าย</option> 
          </select> -->


     <!--  <input  type="hidden" name="my"  value="myModal<?php echo $i ?>" id="my">
<div id="myModal<?php echo $i ?>" class="modal">
  <div class="modal-content">
   <span class="close">&times;</span> 
     <form action="/testqr"> 
    <h5 class="font"  > เเนบหลักฐาน <?php echo $i; echo $row["da_id"]  ?> </h5>
      <input  type="file" name="files[]" accept="image/*" multiple>

      <button value="myModal<?php echo $i ?>" onclick="click5(this.value)" id="modalButton" class=" block text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4   font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" data-modal-toggle="authentication-modal" id="report">
  ยืนยัน
</button>
                                </div>
</div>
</div>  -->



<!-- 
<script>
  var modalTriggered = false;
  var modal;

function OnSelectedIndexChange() {
  if (modalTriggered) return;

  var da_flags = document.querySelectorAll('select[name="da_flag"]');

  for (var i = 0; i < da_flags.length; i++) {
    if (da_flags[i].value.includes("myModal") ) {
      var Id_modal = da_flags[i].value
      modal = document.getElementById(Id_modal);
      document.getElementById("da_flag").value = "5";
      modal.style.display = "block";
      modalTriggered = true;
      
      
    }
  }
}

var closeBtn = document.getElementsByClassName("close")[0];
closeBtn.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  
}
function click5(modalId) {
  var selectElement = document.querySelector('select[name="da_flag"]');
  selectElement.value = "5";
  document.getElementById(modalId).value = 5;
}
</script>      -->                                    
<!-- 
<select name="da_flag" id="da_flag"onChange="OnSelectedIndexChange()">
            <option> <?php echo $i ?> <?php echo $row["da_flag"] ?></option>
            <option value="1">ใช้งานได้</option>
            <option value="2">ชำรุด</option>
            <option value="3">สูญหาย</option>
            <option value="5">จำหน่าย</option>
          </select>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span> -->
    <!-- <form action="/testqr"> -->
    <!-- <h5 class="font"  > เเนบหลักฐาน</h5>
      <input name="files[]" type="file"  accept="image/*" multiple>

      <button id="modalButton" class=" block text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4   font-medium
 rounded-lg text-sm px-5 py-2.5 text-center  dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" data-modal-toggle="authentication-modal" id="report">
                                    ยืนยัน
                                </button>
                                </div> -->
<!-- </div>
<script>
 

function OnSelectedIndexChange() {
 

  var da_flags = document.querySelectorAll('select[name="da_flag"]');

  for (var i = 0; i < da_flags.length; i++) {
    if (da_flags[i].value == "5") {
      var modal = document.getElementById("myModal");
      modal.style.display = "block";
      
      break;
    }
  }
}



var closeBtn = document.getElementsByClassName("close")[0];
closeBtn.onclick = function() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
  document.getElementById("da_flag").value = 0;
}


  window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
<script>
document.getElementById("modalButton").addEventListener("click", function() {
  window.location.href = "/testqr";
});
  </script> -->
         
        </td>

        <?php echo "<td>" ?>
        <input type="datetime-local" id="da_recheck_year" name="da_recheck_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row["da_recheck_year"]  ?>">
        <?php
        "</td> "; ?>

        <td>
        <select name="room_id" id="room_id">
    <option value="<?php echo $row["room_id"]; ?>"><?php echo $row["room_name"]; ?></option>
    <?php foreach ($data_rooms as $index => $roww) { ?>
        <option value="<?php echo $roww["room_id"]; ?>"><?php echo $roww["room_name"]; ?></option>
    <?php } ?>
</select>
      <!--     <select name="room_id" id="room_id">
            <option value="<?php echo $row["room_id"] ?>"><?php echo $row["room_id"] ?></option>
            <option value="1-101" style="font-family: Kanit;">ทค.1-101</option>
  <option value="1-201" style="font-family: Kanit;">ทค.1-201</option>
  <option value="1-202" style="font-family: Kanit;">ทค.1-202</option>
  <option value="1-203" style="font-family: Kanit;">ทค.1-203</option>
  <option value="1-204" style="font-family: Kanit;">ทค.1-204</option>
  <option value="1-205" style="font-family: Kanit;">ทค.1-205</option>
  <option value="1-301" style="font-family: Kanit;">ทค.1-301</option>
  <option value="1-302" style="font-family: Kanit;">ทค.1-302</option>
  <option value="2-201" style="font-family: Kanit;">ทค.2-101</option>
  <option value="2-202" style="font-family: Kanit;">ทค.2-201</option>
  <option value="2-203" style="font-family: Kanit;">ทค.2-301</option>
          </select> -->
         
        </td>
       
        
        <?php echo "<td >" ?> <img src="/image/roomImg/<?php  echo $row['room_picture'] ?>" width="100%">
        </td>



        <?php "</td> "; ?>

        <td>

          <?php echo $row["building_name"] ?>

        

        </td>

        <?php "</td> "; ?>



        <?php
        "</td> ";

        echo "<td >" ?> <img src="/image/buildingImg/<?php echo $row["building_picture"] ?>" width="100%">

        <td>
          <!--  <td> <a href="'action' => 'EditController@edit'" class ="btn btn-primary">Edit </a> </td> -->
          <!-- onclick="updatedata()" -->
          <style>
  .icon-black {
    color: black;
  }
</style>

<button class="icon-black" type="submit" id="updatedata">
  <i style="font-size:24px" class="fa">&#xf044;</i>
</button>
        </td>




        <input style='display:none' type="text" id="cargiver_id" name="cargiver_id" class="bg-gray-50 border border-gray-300
      text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo   $row["cargiver_id"] ?>">
        <input style='display:none' type="text" id="id" name="id" class="bg-gray-50 border border-gray-300
      text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo   $row["id"] ?>">

        <?php
        /////////////////  

        /////////////////  
        "</td> "; ?>
        <input style='display:none' type="text" id="building_id" name="building_id" class="bg-gray-50 border border-gray-300
      text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo   $row["building_id"] ?>">
        <?php
        "</td> "; ?>




      </form>



      <!-- เพิ่ม -->

      <td>

        <form method="POST" enctype="multipart/form-data" action="/showdura">

         <!--  <button onclick="showdura()" value="<?php echo $row["da_id"] ?>" id="showdura" name="da_id" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto  btn-primary
 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">durable</button> -->

 
<button name="da_id" class="icon-black" type="submit" onclick="showdura()" value="<?php echo $row["da_id"] ?>" id="showdura">
  <i style="font-size:24px" class="fa">&#xf1c5;</i>
</button>


        </form>



        
      </td>

      <td>

        <form method="POST" enctype="multipart/form-data" action="/deletetableneo/<?php echo $row["da_id"] ?>">

          <input style='display:none' type="text" id="cargiver_id" name="cargiver_id" value="<?php echo   $row["cargiver_id"] ?>">

          <input style='display:none' type="text" id="picture_file" name="picture_file" value="<?php echo   $row["picture_file"] ?>">
          <?php
          "</td> "; ?>
         <!--  <button class="btn btn-danger font-medium rounded-lg text-sm w-full sm:w-auto 
                          px-5 py-2.5 text-center ">Delete</button> -->

          <button class="icon-black" type="submit" >
          <i style="font-size:24px" class="fa">&#xf1f8;</i>
          </button>     
                
         
        </form>
      </td>



      <td>


    

        <input type="hidden" type="text" id="rowda_id" name="rowda_id" value="<?php echo $row["da_id"] ?>"> 

        <a href="/qrcode/<?php echo $row['da_id'] . '/' . $row['da_name'] . '/' . $row['caregiver_name'] . '/' . $row['da_price']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">

     <button class="icon-black" type="submit" >
          <i style="font-size:24px" class="fa"> &#xf029;  </i>
          </button>  
      </a>
       
       <input type="hidden" value="<?php echo   $data_id ?>" id="testqr" name="testqr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <input type="hidden"  value="<?php echo   $passname ?>"   id="passname" name="passname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <input type="hidden"  value="<?php echo   $passcare ?>"  id="passcare" name="passcare" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <input type="hidden"  value="<?php echo   $passprice ?>"  id="passprice" name="passprice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
     
       <?php if ($stateQR == 1) { ?> 
       <!--    dasdasdasdasdasd
          {{ $data_id }} -->

          <iframe id="qr-iframe" style="display:none"></iframe>
                        <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
         <script>
  function downloadQR() {
    // Get the value of the input element
    var inputValue = document.getElementById("testqr").value;
    var name = document.getElementById("passname").value;
     var teacher = document.getElementById("passcare").value; 
    var price = document.getElementById("passprice").value;


    
    // Generate the QR code
    var qr = new QRious({
      element: document.createElement('img'),
      value: 'http://localhost:8000/show_user?da_id=' + inputValue,
      size: 800 // set the size of QR code
    });

    var text = inputValue;
    var tname = name;
    var tteacher = teacher;
    var tprice = price;

    // Create an HTML file with the QR code
    var html = '<html><head><title>.</title></head><body>' +
      qr.element.outerHTML + '<br><br>' +
      '<div style="text-align:center; font-size:25px; font-family: Kanit;">' + 'รหัสครุภัณฑ์ : ' + text  + '<br><br>' +
      'ชื่อครุภัณฑ์ : ' + tname + '<br><br>' + 'ผู้ดูเเล : ' + tteacher + '<br><br>' + 'ราคา : ' + tprice + '</div>' + 
      '</body></html>';

    // Assign the HTML content to the iframe
    var iframe = document.getElementById('qr-iframe');
    iframe.contentWindow.document.open();
    iframe.contentWindow.document.write(html);
    iframe.contentWindow.document.close();

    setTimeout(function() {
      // Print the iframe
      iframe.contentWindow.focus();
      iframe.contentWindow.print();
      
    }, 1000);
  }

  window.onload = function() {
    downloadQR();
  };
</script>

        <?php } ?> 

       <!--  <button type="button" onclick="downloadQR()" class="btn-success text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium 
     rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
     dark:focus:ring-blue-800"><?php echo $row["da_id"] ?></button> -->
      </td>

      <td> 
<!--  <a href="/sell/<?php echo $row["da_id"] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
       <button type="submit"   class="btn-success text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium 
     rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
     dark:focus:ring-blue-800">จำหน่าย</button> -->

     <a href="/sell/<?php echo $row["da_id"] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
     <button  class="icon-black" type="submit" value="<?php echo $row["da_id"] ?>" id="sell">
  <i style="font-size:24px" class="fa">&#xf07a;</i>
</button></a>
      </td>




      <?php
      echo "</tr>";
      ?>

    <?php
    }
   } 
    echo "</table>";



    echo '</div>';
    echo '</div>'; //md-6;
    echo '</div>'; //row;
    echo '</div>'; //container;


    ?>



    <?php

 
    ?>


    </h1>
  </body>

  </html>
  