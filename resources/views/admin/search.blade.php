<?php

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link href="/css/addalerts.css" rel="stylesheet">
    <link href="/css/export.css" rel="stylesheet">

    <!-- JS -->
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์</title>
    
</head>
<body>
<?php



$sql = " SELECT DISTINCT * FROM {$prefix}tb_durable_articles
INNER JOIN {$prefix}tb_cargivers ON {$prefix}tb_cargivers.cargiver_id = {$prefix}tb_durable_articles.cargiver_id
INNER JOIN {$prefix}pictures ON {$prefix}pictures.da_id = {$prefix}tb_durable_articles.da_id
INNER JOIN {$prefix}rooms ON {$prefix}rooms.room_id = {$prefix}tb_durable_articles.room_id
INNER JOIN {$prefix}buildings ON {$prefix}buildings.building_id= {$prefix}rooms.building_id
WHERE {$prefix}pictures.da_id LIKE '%".$_POST['itemname']."%' OR {$prefix}tb_cargivers.caregiver_name LIKE '%".$_POST['itemname']."%'OR {$prefix}tb_durable_articles.da_name LIKE '%".$_POST['itemname']."%' OR {$prefix}rooms.room_id LIKE '%".$_POST['itemname']."%' GROUP BY {$prefix}pictures.da_id HAVING count({$prefix}pictures.da_id)>=1
LIMIT 10; ";
$q = mysqli_query( $conn, $sql );
$no = 0;


?>

<table>
<tr>
 


<div class="container_index">
    <div class="test">

        <?php
        while ($f = mysqli_fetch_assoc($q)) {
        ?>
            <div class="test_margin">
                <a href="\show_admin?da_id=<?php echo $f['da_id']  ?>">
                    <img class=" h-auto rounded-lg" src="/image/pictureImg/.<?php echo $f['picture_file']  ?>" alt="" width="90%">
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</div>
  
</tr>
</table>
</body>
</html>


