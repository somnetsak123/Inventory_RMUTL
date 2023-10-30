

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    

<table>
<tr>
<?php
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = " SELECT DISTINCT * FROM {$prefix}tb_durable_articles
INNER JOIN {$prefix}tb_cargivers ON {$prefix}tb_cargivers.cargiver_id = {$prefix}tb_durable_articles.cargiver_id
INNER JOIN {$prefix}pictures ON {$prefix}pictures.da_id = {$prefix}tb_durable_articles.da_id
INNER JOIN {$prefix}rooms ON {$prefix}rooms.room_id = {$prefix}tb_durable_articles.room_id
INNER JOIN {$prefix}buildings ON {$prefix}buildings.building_id= {$prefix}rooms.building_id
WHERE {$prefix}pictures.da_id LIKE '%".$_POST['itemname']."%' OR {$prefix}tb_cargivers.caregiver_name LIKE '%".$_POST['itemname']."%'OR {$prefix}tb_durable_articles.da_name LIKE '%".$_POST['itemname']."%' OR {$prefix}rooms.room_id LIKE '%".$_POST['itemname']."%' GROUP BY {$prefix}pictures.da_id HAVING count({$prefix}pictures.da_id)>=1; ";
$q = mysqli_query( $conn, $sql );
$no = 0;



  while( $f = mysqli_fetch_assoc( $q ) ) {
    ?>
         
        
        <th>    
            <center>
            <a href="/show_user?da_id=<?php echo $f['da_id']  ?>"><img class=" h-auto rounded-lg" src="/image/pictureImg/.<?php echo $f['picture_file']  ?>" alt="image description"  width="90%"></a>
            </center>
            <figcaption class="pt-2  text-sm text-center text-gray-500 dark:text-gray-400"></figcaption>
        </th>
         <?php    

            $no++;
         if($no ==2)
         {
           echo "<tr>
                   
                 </tr>   " ;    
           $no =0;     
         }
           
         
         
        //             ".$f['picture_file']."
      
               
           
        // $no++;
    }
?>
   
</tr>

</table>

</body>
</html>


