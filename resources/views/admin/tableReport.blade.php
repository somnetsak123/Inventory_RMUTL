
<?php 



?>


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
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link href="/css/addalerts.css" rel="stylesheet">
  

    <title>เว็บครุภัณฑ์</title>
</head>

<body>
@extends('admin.template_admin.showreport')


@extends('admin.template_admin.menu_bar_admin')

</body>

</html>