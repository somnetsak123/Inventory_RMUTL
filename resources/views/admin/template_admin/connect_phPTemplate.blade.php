

<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>เว็บครุภัณฑ์</title>
</head>

<body>

<?php 
       $conn = mysqli_connect($servername, $username, $password, $database) or die("Error: " . mysqli_error($conn));
       mysqli_query($conn, "SET NAMES 'utf8' ");

       $query_title = "SELECT * FROM {$prefix}tb_templates WHERE `id_template` LIKE 1 ";
       
       
       
        $title_sql = mysqli_query($conn, $query_title);

     
        foreach ($title_sql as $row)
        {
                echo  $row->template_data;
        }




        $conn = mysqli_connect($servername, $username, $password, $database) or die("Error: " . mysqli_error($conn));
        mysqli_query($conn, "SET NAMES 'utf8' ");
 
        $query_banner = "SELECT * FROM {$prefix}tb_templates WHERE `id_template` LIKE 2 ";
        
        
        
         $banner_sql = mysqli_query($conn, $query_banner);
 
      
         foreach ($banner_sql as $row)
         {
                 echo  $row->template_data;
         }

?>

</body>

</html>