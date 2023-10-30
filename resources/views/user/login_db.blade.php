<link href="/dist/edi.css" rel="stylesheet">
<link href="/dist/ediV2.css" rel="stylesheet">
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use function CommonMark\Render\HTML;
// include('\src\connectdb.php');
session_start();
$getuser = $_POST["user"];
$getpass = $_POST["pass"];
// คำสั่ง SQL และสั่งให้ทำงาน
$data = DB::table($prefix.'tb_cargivers')
    ->where('cargiver_username', $getuser)
    ->where('cargiver_password', $getpass)
    ->get();
// หาจำนวนเรกคอร์ดข้อมูล
$num_rows = count($data);
if ($num_rows == 1) {
    foreach ($data as $row) {
        $_SESSION['user'] = $getuser;
        $_SESSION['user_statuses'] = $row->user_statuses;
        $_SESSION['caregiver_name'] = $row->caregiver_name;
    }
 
    redirect()->to('/index_admin')->send(); //ไปไปตามหน้าที่คุณต้องการ

} else {
    //$code_error="<BR><FONT COLOR=\"red\">ข้อมูลที่คุณกรอกไม่ถูกต้อง กรุณา Login ใหม่อีกครั้ง</FONT>";

    $_SESSION['error'] = "User หรือ Password ไม่ถูกต้อง!!";
    //echo"<script>alert('User หรือ Password ไม่ถูกต้อง!!');window.location=/src/login.html</script>";

    redirect()->to('/login')->send(); //ไม่ถูกต้องให้กับไปหน้าเดิม
}









?>

<!-- <h1>user = <?= $getuser ?></h1>
<h1>pass = <?= $getpass ?></h1> -->