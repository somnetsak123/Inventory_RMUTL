<?php

// Create connection

use PhpParser\Node\Stmt\Echo_;

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
    if (!empty($_GET)) {
        // if(isset($_GET['type'])){    
        switch ($_GET['type']) {
            case "building":
                $data_type = "building";
                $data = "WHERE {$prefix}buildings.building_id =";
                $if_data1 = $_GET['when'];
                $if_data2 = $_GET['when'];
                // โค้ดที่จะทำงานเมื่อ expression เท่ากับ value1
                break;
            case "cargiver":
                $data_type = "cargiver";
                $data = "WHERE {$prefix}tb_cargivers.cargiver_id  =";
                $if_data1 = $_GET['when'];
                $if_data2 = $_GET['when'];
                // โค้ดที่จะทำงานเมื่อ expression เท่ากับ value2
                break;
            case "rooms":
                $data_type = "rooms";
                $data = "WHERE {$prefix}rooms.room_id  =";
                $if_data1 = $_GET['when'];
                $if_data2 = $_GET['when'];
                // โค้ดที่จะทำงานเมื่อ expression เท่ากับ value3
                break;
            case "type":
                /* print_r($_GET); */
                $data_type = "type";
                $data = "WHERE {$prefix}tb_types.id_type =";
                $if_data1 = $_GET['when'];
                $if_data2 = $_GET['when'];
                // โค้ดที่จะทำงานเมื่อ expression เท่ากับ value3
                break;
            case "search":

                $data_type = 'search';
                $data = "WHERE {$prefix}pictures.da_id ";
                $if_data1 = "LIKE '%" . $_GET['when'] . "%' OR {$prefix}tb_cargivers.caregiver_name LIKE '%" . $_GET['when'] . "%'OR {$prefix}tb_durable_articles.da_name LIKE '%" . $_GET['when'] . "%' OR {$prefix}rooms.room_id LIKE '%" . $_GET['when'] . "%'";
                $if_data2 = $_GET['when'];
                break;
            default:
                $data = "";
                $if_data1 = "";
                $if_data2 = "";
                $data_type = "";
                // โค้ดที่จะทำงานเมื่อ expression ไม่เท่ากับทุก value
        }
    } else {
        $data = "";
        $if_data1 = "";
        $if_data2 = "";
        $data_type = "";
    }

    // $perpage = 20;
    // if (isset($_GET['page'])) {
    //     $page = $_GET['page'];
    // } else {
    //     $page = 1;
    // }
    // $start = ($page - 1) * $perpage;

    $entriesPerPage = 8; // กำหนดจำนวนรูปภาพในหน้าละ 8 รูป
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // ดึงค่าหน้าปัจจุบันจากพารามิเตอร์ URL
    $startIndex = ($page - 1) * $entriesPerPage;
    $endIndex = $startIndex + $entriesPerPage - 1;

    $sql = "SELECT DISTINCT {$prefix}pictures.da_id, {$prefix}pictures.picture_file 
            FROM {$prefix}pictures 
            INNER JOIN {$prefix}tb_durable_articles ON {$prefix}pictures.da_id = {$prefix}tb_durable_articles.da_id
            INNER JOIN {$prefix}tb_types ON {$prefix}tb_durable_articles.id_type = {$prefix}tb_types.id_type 
            INNER JOIN {$prefix}tb_cargivers ON {$prefix}tb_durable_articles.cargiver_id = {$prefix}tb_cargivers.cargiver_id 
            INNER JOIN {$prefix}rooms ON {$prefix}tb_durable_articles.room_id = {$prefix}rooms.room_id
            INNER JOIN {$prefix}buildings ON {$prefix}rooms.building_id = {$prefix}buildings.building_id 
            {$data} {$if_data1} 
            GROUP BY {$prefix}pictures.da_id 
            HAVING COUNT({$prefix}pictures.da_id) >= 1
            LIMIT {$startIndex}, {$entriesPerPage};";
    $q = mysqli_query($conn, $sql);
    $no = 0;

    ?>

    <?php
    $sql2 = " SELECT DISTINCT {$prefix}pictures.da_id, {$prefix}pictures.picture_file 
            FROM {$prefix}pictures 
            INNER JOIN {$prefix}tb_durable_articles ON {$prefix}pictures.da_id = {$prefix}tb_durable_articles.da_id
            INNER JOIN {$prefix}tb_types ON {$prefix}tb_durable_articles.id_type = {$prefix}tb_types.id_type 
            INNER JOIN {$prefix}tb_cargivers ON {$prefix}tb_durable_articles.cargiver_id = {$prefix}tb_cargivers.cargiver_id 
            INNER JOIN {$prefix}rooms ON {$prefix}tb_durable_articles.room_id = {$prefix}rooms.room_id
            INNER JOIN {$prefix}buildings ON {$prefix}rooms.building_id  = {$prefix}buildings.building_id 
            {$data} {$if_data1} 
            GROUP BY {$prefix}pictures.da_id 
            HAVING COUNT({$prefix}pictures.da_id) >= 1 ";
    $query2 = mysqli_query($conn, $sql2);
    $total_record = mysqli_num_rows($query2);
    $totalEntries = ceil($total_record / $entriesPerPage);

    ?>


    <center>
        <table>
            <tr>
              
                <th> <?php echo ('    '); ?></th>
                <th>

                    <div class="items-center text-center  row col-md-12">
                        <form class="flex items-center form-inline" name="searchform" id="searchform">
                            @csrf
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative ">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                    </svg>

                                </div>

                                <input  type="text" id="itemname" name="itemname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                 placeholder="พบ <?php echo ($total_record);  ?> รายการ" required autocomplete="off">
                            </div>

                            <button id="btnSearch" type="button" class="p-2.5 ml-2 text-sm font-medium text-white bg-brown rounded-lg border bg-blue-700 hover_transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="sr-only glyphicon glyphicon-search">Search</span>
                            </button>

                        </form>
                    </div>
                </th>
                <th>
                    <button onclick="scanQRCode()" data-modal-toggle="QR_codeT" id="QR_code" type="button" class=" flex form-control btn btn-primary p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:focus:ring-blue-800 hover_transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" w-5 h-5 bi bi-qr-code-scan" viewBox="0 0 16 16">
                            <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z" />
                            <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z" />
                            <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z" />
                            <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z" />
                            <path d="M12 9h2V8h-2v1Z" />
                        </svg>
                    </button>
                </th>
                <th>
                    <a href="/map_admin">
                        <button type="button" class=" flex form-control btn btn-primary p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:focus:ring-blue-800 hover_transition">
                            <svg class=" w-5 h-5 bi bi-qr-code-scan" style="color: white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path fill="#ffffff" d="M408 120C408 174.6 334.9 271.9 302.8 311.1C295.1 321.6 280.9 321.6 273.2 311.1C241.1 271.9 168 174.6 168 120C168 53.73 221.7 0 288 0C354.3 0 408 53.73 408 120zM288 152C310.1 152 328 134.1 328 112C328 89.91 310.1 72 288 72C265.9 72 248 89.91 248 112C248 134.1 265.9 152 288 152zM425.6 179.8C426.1 178.6 426.6 177.4 427.1 176.1L543.1 129.7C558.9 123.4 576 135 576 152V422.8C576 432.6 570 441.4 560.9 445.1L416 503V200.4C419.5 193.5 422.7 186.7 425.6 179.8zM150.4 179.8C153.3 186.7 156.5 193.5 160 200.4V451.8L32.91 502.7C17.15 508.1 0 497.4 0 480.4V209.6C0 199.8 5.975 190.1 15.09 187.3L137.6 138.3C140 152.5 144.9 166.6 150.4 179.8H150.4zM327.8 331.1C341.7 314.6 363.5 286.3 384 255V504.3L192 449.4V255C212.5 286.3 234.3 314.6 248.2 331.1C268.7 357.6 307.3 357.6 327.8 331.1L327.8 331.1z" />
                            </svg>
                        </button>
                    </a>
                </th>
       
            </tr>





        </table>





    </center>


    <table>



        <tr>


            <table>
                <tr>
                    <div class="container_index">
                        <div class="test_index">
                            <?php

                            while ($f = mysqli_fetch_assoc($q)) {
                            ?>
                                <div class="test_margin">
                                    <a href="\show_admin?da_id=<?php echo $f['da_id'] ?>">
                                        <img class="img_index rounded-lg" src="/image/pictureImg/.<?php echo $f['picture_file'] ?>" alt="" width="90%">
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="flex flex-col items-center" style="margin-top: 10px">
                            <!-- Help text -->
                            <span class="text-sm text-gray-700 dark:text-gray-400" id="pagination-info">
                                Showing <span class="font-semibold text-gray-900 dark:text-white" id="start-index"><?php echo $page  ?></span> to <span class="font-semibold text-gray-900 dark:text-white" id="end-index"><?php echo $totalEntries ?></span>&nbsp;Pages
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                <!-- Buttons -->
                                <a href="?page=1&when=<?php echo $if_data2; ?>&type=<?php echo $data_type; ?>">

                                    <button id="" class="hover_transition rounded-l text-white bg-blue-700 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600">
                                        << </button>
                                </a>
                                <button id="prev-button" class="hover_transition text-white bg-blue-700 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600">
                                    < </button>
                                        <?php for ($i = $page - 5; $i <= $page + 5; $i++) {
                                            if ($i > 0 && $i <= $totalEntries) {
                                                if ($i == $page) {   ?>

                                                    <a href="?page=<?php echo $i; ?>&when=<?php echo $if_data2; ?>&type=<?php echo $data_type; ?>">
                                                        <button id="" class="text-white bg-blue-soft font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600">
                                                            <?php echo $i; ?>
                                                        </button>
                                                    </a>

                                                <?php
                                                } else {
                                                ?>

                                                    <a href="?page=<?php echo $i; ?>&when=<?php echo $if_data2; ?>&type=<?php echo $data_type; ?>">
                                                        <button id="" class="hover_transition text-white bg-blue-700 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600">
                                                            <?php echo $i; ?>
                                                        </button>
                                                    </a>
                                        <?php }
                                            }
                                        } ?>
                                        <button id="next-button" class="hover_transition text-white bg-blue-700 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600">
                                            >
                                        </button>
                                        <a href="?page=<?php echo $totalEntries; ?>&when=<?php echo $if_data2; ?>&type=<?php echo $data_type; ?>">
                                            <button id="" class="hover_transition rounded-r text-white bg-blue-700 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600">
                                                >> </button>
                                        </a>
                            </div>
                        </div>
                    </div>
                </tr>
            </table>

            <script>
                document.getElementById("prev-button").addEventListener("click", function() {
                    var currentPage = parseInt("<?php echo $page ?>");
                    var Get_if_data2 = parseInt("<?php echo $if_data2 ?>");
                    var Get_data_type = "<?php echo $data_type ?>";
                    if (currentPage > 1) {
                        window.location.href = "?page=" + (currentPage - 1) + "&when=" + Get_if_data2 + "&type=" + Get_data_type;
                    }
                });

                document.getElementById("next-button").addEventListener("click", function() {

                    var currentPage = parseInt("<?php echo $page ?>");
                    var totalPages = <?php echo $totalEntries ?>;
                    var Get_if_data2 = parseInt("<?php echo $if_data2 ?>");
                    var Get_data_type = "<?php echo $data_type ?>";

                    console.log(<?php echo $total_record ?>);
                    console.log(totalPages);
                    if (currentPage < totalPages) {

                        window.location.href = "?page=" + (currentPage + 1) + "&when=" + Get_if_data2 + "&type=" + Get_data_type;
                    }
                });
            </script>

</body>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
    // จากปุ่นค้นหา
    $(function() {
        $("#btnSearch").click(function() {
            var itemname = $("#itemname").val(); // ดึงค่า itemname จากฟอร์ม
            // ดึงค่าที่ป้อนเข้ามาจาก input
            var itemname = document.getElementById("itemname").value;

            // สร้าง URL โดยรวมพารามิเตอร์ GET ด้วยข้อมูลที่คุณต้องการส่ง
            var url = "/index_admin/?when=" + encodeURIComponent(itemname) + "&type=search";

            // ดำเนินการเปิดหน้าเว็บใหม่หรือทำการรีเดอร์เรคต์ไปยัง URL นี้
            window.location.href = url;


        });

    });
</script>

</html>