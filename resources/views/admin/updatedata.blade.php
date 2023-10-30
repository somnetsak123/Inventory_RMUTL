<?php 
session_start();
// // ชื่อไฟล์
// $db_idget= $_POST["db_id"];
print_r($_POST);
echo '<pre>';
print_r($_FILES);
echo '<pre>';
// echo $db_idget;


$getda_id=$_POST['da_id'];
$getda_name=$_POST['da_name'];
$getcaregiver_name=$_POST['caregiver_name'];
$getdateget=$_POST['dateget'];
$gettime_of_use=$_POST['time_of_use'];
$getda_price=$_POST['da_price'];
$getda_flag=$_POST['da_flag'];
$getda_recheck_year=$_POST['da_recheck_year'];
$getroom_id=$_POST['room_id'];
$getcaregiver_id=$_POST['caregiver_id'];
$getbuilding_id=$_POST['building_id'];


print_r($_POST); echo '<pre>';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";



if ($getda_flag != "sold") {
$sql2 = "UPDATE {$prefix}tb_durable_articles SET  da_id = '".$getda_id."',da_name = '".$getda_name."',caregiver_name = '".$getcaregiver_name."'
,date_get = '".$getdateget."',time_of_use = '".$gettime_of_use."',da_price = '".$getda_price."',da_flag = '".$getda_flag."'
,da_recheck_year = '".$getda_recheck_year."',room_id= '".$getroom_id."'
 WHERE da_id ='".$_POST['duracleidkeep']."'
";
$q2 = mysqli_query( $conn, $sql2 ); 

print_r($sql2);
                                    


$sql4 = "UPDATE {$prefix}tb_cargivers SET  da_id = '".$getda_id."',caregiver_name = '".$getcaregiver_name."'
 WHERE caregiver_id='".$_POST['caregiver_id']."'
";
$q4 = mysqli_query( $conn, $sql4 ); 


$sql = "UPDATE {$prefix}pictures SET  da_id = '".$getda_id."'
WHERE da_id ='".$_POST['duracleidkeep']."'
";
$q = mysqli_query( $conn, $sql ); 
}

else{

    $sql8 = " INSERT INTO {$prefix}historys(`da_id`, `da_name`, `da_type`, `caregiver_name`, `date_get`, `time_of_use`, `da_price`, `da_flag`, `da_recheck_year`, `room_id`) VALUES 
    ('".$getda_id."','".$getda_name."','".$getcaregiver_name."','".$getdateget."'
    ,'gettime_of_use','".$getda_price."','".$getda_flag."','".$getda_recheck_year."','".$getroom_id."')";
    $q8 = mysqli_query( $conn, $sql8 ); 


   


    $sql5="DELETE FROM  {$prefix}tb_cargivers WHERE caregiver_id='$getcaregiver_id'";
    $conn->query($sql5); // delete the first registration table
    
    $sql6="DELETE FROM {$prefix}tb_durable_articles WHERE da_id='$getda_id'";
    $conn->query($sql6); // delete the user information table 
    
    $sql7="DELETE FROM {$prefix}pictures WHERE da_id='$getda_id'";
    $conn->query($sql7); // delete the user information table 



}

?>