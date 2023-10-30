

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
    <!-- JS -->
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <title>เว็บไซต์จัดการครุภัณฑ์ สาขาวิศวกรรมคอมพิวเตอร์</title>
</head>

<body>
    
    @extends('admin.template_admin.show_cargivers')
    @extends('admin.edit_template.template.menu_bar_template')
</body>
</html>