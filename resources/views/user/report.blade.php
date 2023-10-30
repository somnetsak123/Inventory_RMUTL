<?php

use App\Models\report_da;

session_start();
// // ชื่อไฟล์
// $db_idget= $_POST["db_id"];
print_r($_POST);
echo '<pre>';
print_r($_FILES);
echo '<pre>';
// echo $db_idget;

$getdb_id=$_POST['Exportda_id'];
$getda_name=$_POST['Exportda_name'];
$getcargiver=$_POST['Exportcaregiver_name'];
$getdateget=$_POST['Exportdate_get'];
$gettime_of_use = $_POST['Exporttime_of_use'];
$getbuilding=$_POST['Exportbuilding_name'];
$getroom=$_POST['Exportroom_name'];
$getprice=$_POST['Exportda_price'];
$getlist_radio="แจ้งเสีย";
$getrecheck=$_POST['Exportda_recheck_year'];
$getroom_id=$_POST['Exportroom_id'];

$getphone_number=$_POST['phone_number'];
$getnote=$_POST['note'];


print_r($_POST);

// Create connection

// Check connection



$report = new report_da();
$report->da_id = $getdb_id;
$report->da_name = $getda_name;
$report->caregiver_name = $getcargiver;
$report->date_get = $getdateget;
$report->time_of_use = $gettime_of_use;
$report->da_price = $getprice;
$report->report_state = $getlist_radio;
$report->da_recheck_year = $getrecheck;
$report->room_id = $getroom;
$report->phone_number = $getphone_number;
$report->note = $getnote;
$report->save();



if($report){

    redirect()->to('/show_user?da_id='.$getdb_id)->send();
}




