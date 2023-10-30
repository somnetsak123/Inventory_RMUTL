<?php 
session_start();
// // ชื่อไฟล์
// $db_idget= $_POST["db_id"];
print_r($_POST);
echo '<pre>';
print_r($_FILES);
echo '<pre>';
// echo $db_idget;

$getdb_id=$_POST['db_id'];
$getda_name=$_POST['da_name'];
$getcargiver=$_POST['cargiver'];
$getdateget=$_POST['dateget'];
$getbuilding=$_POST['building'];
$getroom=$_POST['room'];
$getprice=$_POST['price'];
$getlist_radio=$_POST['list-radio'];
$getrecheck=$_POST['recheck'];



// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql2 = "INSERT INTO {$prefix}tb_durable_articles (`da_id`, `da_name`, `caregiver_name`, `date_get`, `time_of_use`, `da_price`, `da_flag`, `da_recheck_year`, `room_id`) 
VALUES ('".$getdb_id."', '".$getda_name."', '".$getcargiver."', '".$getdateget."', '".$getdateget."', '".$getprice."', '".$getlist_radio."', '".$getrecheck."', '".$getroom."')";
$q2 = mysqli_query( $conn, $sql2 ); 


$sql3 = "INSERT INTO {$prefix}tb_cargivers (`caregiver_id`, `caregiver_name`, `da_id`) VALUES 
                                    (NULL, '".$getcargiver."', '".$getdb_id."')";
$q3 = mysqli_query( $conn, $sql3 );                                     


foreach($_FILES['files']['tmp_name'] as $key => $value)
{
    // "\inertia-svelte\public\image\pictureImg\.$new_name"
    $file_name = $_FILES['files']['name'];
    $new_name = rand(0,microtime(true)).'-'.$file_name[$key];
    if(move_uploaded_file($_FILES['files']['tmp_name'][$key],public_path('\image\pictureImg\.').$new_name))
    {
        $sql1= "INSERT INTO {$prefix}pictures ( picture_file, da_id) VALUES
                                     ( '".$new_name."', '".$getdb_id."')";

        $q1 = mysqli_query( $conn, $sql1 );    
    }
}


// if($q3){

//     redirect()->to('/index_admin')->send();
// }

?>