<?php

$conn = mysqli_connect($servername, $username, $password, $database) or die("Error: " . mysqli_error($conn));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="/css/export.css" rel="stylesheet">
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์</title>

    <!-- !!! -->
    <link rel="stylesheet" href="/css/export.css">
    <link href="/css/addalerts.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/modalcar.css"> <!-- slide and modal to show picture  -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <style>
        .alert-box {
            width: 500px;
            height: 400;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f2f2f2;
            text-align: center;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #999;
        }

        .alert-box h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .alert-box p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .alert-box button {
            background-color: #009900;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
    <style>
        .input-group {
            display: flex;
            gap: 1rem;
        }

        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 100%;
            margin: auto;
        }

        .confirmation-dialog {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
        }

        .confirmation-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .confirmation-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .confirmation-box p {
            margin: 0 0 10px 0;
        }

        .confirmation-box .buttons {
            display: flex;
            justify-content: space-between;
            padding: 5px 10px;
            cursor: pointer;
            margin: 0 5px;
            /* ลดช่องว่างด้านซ้ายและขวาลง */
        }

        .confirmation-box button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirmation-box .btn-confirm {
            background-color: #046c4e;
            color: white;
            width: 70px;
            height: 44px;
        }

        .confirmation-box .btn-cancel {
            background-color: #c81e1e;
            color: white;
            width: 70px;
            height: 44px;
        }

        .show-image-button {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal {
            width: 500px;
            height: 300px;
        }
    </style>


    <!-- Start Table -->
    <div class="container_table edit_table">

        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/tableneo/show/<?php echo $_SESSION['caregiver_name']; ?>/<?php echo $_SESSION['user_statuses']; ?>" class="font-color inline-flex items-center text-sm font-medium ">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    ตารางเเก้ไข
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <a  href="/tableneo/show_trash/<?php echo $_SESSION['caregiver_name']; ?>/<?php echo $_SESSION['user_statuses']; ?>" class="font-color inline-flex items-center text-sm font-medium ">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">ตารางถังขยะ</span>
                    </a>
                </div>
            </li>
        </ol>
        <h3>ตารางข้อมูลครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์ (Edits)</h3>
        <hr><br>
        <table id="edit_table" class="table table-striped edit_table table-hover">
            <thead>
                <th>รหัสครุภัณฑ์</th>
                <th>ชื่อ</th>
                <th>ประเภท</th>
                <th>ชื่อผู้ดูแล</th>
                <th>วันที่ได้รับ</th>
                <th>ระยะเวลาที่ใช้</th>
                <th>ราคา</th>
                <th>สถานะ</th>
                <th>วันที่ตรวจเช็ค</th>
                <th>ห้องเรียน</th>
                <th>อาคารเรียน</th>
                <th>รูปภาพ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>


            </thead>
            <tbody>

                <?php
                $i = 0;

                if (!empty($tb_durable_articles)) {
                    foreach ($tb_durable_articles as $row) {
                        $i++
                ?>
                        <tr>
                            <td><?php echo $row->da_id ?></td>

                            <td><?php echo $row->da_name ?></td>
                            <td><?php echo $row->da_type ?></td>
                            <td><?php echo $row->caregiver_name ?></td>
                            <td><?php echo $row->date_get ?></td>
                            <td><?php
                                date_default_timezone_set('Asia/Bangkok');
                                // Get the current timestamp
                                $time = time();
                                $stored_time = '2022-12-15';
                                $current_time = date('Y-m-d');
                                // Convert the stored time string into a timestamp
                                // Subtract the stored timestamp from the current timestamp
                                // $time_difference = $current_time - $stored_time;
                                // Format the time difference into a human-readable string
                                // list($byear, $bmonth, $bday)= explode("-",$stored_time); 
                                // list($tyear, $tmonth, $tday)= explode("-",$current_time);  
                                // $mstored_time = mktime(0, 0, 0, $bmonth, $bday, $byear);
                                // $mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
                                // echo "วันเกิด $stored_time"."<br>\n";
                                //echo "วันที่ปัจจุบัน $time"."<br>\n";
                                // จะต้องทำการเเยก ปี เดือน ก่อนถึงจะเอามาใช้ได้
                                $u_y = date("Y", $time) - date("20y", strtotime($row->date_get)); //เอาจากที่ได้จาก sql มาใส่เเทน 2022
                                if (date("m", $time) >= date("m", strtotime($row->date_get))) {
                                    $u_m = date("m", $time) - date("m", strtotime($row->date_get));
                                }
                                if (date("m", $time) <= date("m", strtotime($row->date_get))) {
                                    $u_m =  date("m", strtotime($row->date_get)) - date("m", $time);
                                }
                                ////////////////////////////////////////////////////////////
                                /*  echo (date("d", strtotime($row["date_get"]))); */
                                if (date("d", $time) >= date("d", strtotime($row->date_get))) {
                                    $u_d =  date("d", $time) - date("d", strtotime($row->date_get));
                                }
                                if (date("d", $time) <= date("d", strtotime($row->date_get))) {
                                    $u_d =  date("d", strtotime($row->date_get)) - date("d", $time);
                                }
                                // $u_d=  date("d",strtotime($row["date_get"])) - date("d",$time);
                                /*  echo (date("20y", strtotime($row["date_get"]))); */
                                ?><?php

                                    echo "$u_y ปี $u_m เดือน $u_d วัน";
                                    /* echo "$u_y   ปี    $u_m เดือน      $u_d  วัน"; */
                                    ?>
                                <?php
                                $sql = "UPDATE {$prefix}tb_durable_articles SET `time_of_use` = '$u_y-$u_m-$u_d' WHERE {$prefix}tb_durable_articles.`id` = $row->id ";


                                if (mysqli_query($conn, $sql)) {
                                } else {
                                    echo "การเพิ่มข้อมูล datetime ลงในตารางผิดพลาด: " . mysqli_error($conn);
                                }

                                ?>
                                <?php

                                // time_difference = date(' Y-m-d ', $time_difference);
                                // $time_differencecc = date('Y-m-d  ', $current_time);
                                // $time_differenceccc = date('Y-m-d  ', $stored_time);
                                ?></td>


                            <td><?php echo  number_format($row->da_price) ?></td>
                            <td><?php echo $row->da_status ?></td>

                            <td><?php echo $row->created_at ?></td>
                            <td><?php echo $row->room_name ?></td>
                            <td><?php echo $row->building_name ?></td>

                            <!-- รูป -->
                            <td>
                                <div class="row" id="list-data"></div>
                                <button class="show-image-button" data-itemname1="<?php echo $row->da_id ?>,<?php echo $i ?>,<?php echo $row->da_flag ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                                    </svg>
                                </button>
                            </td>
                            <!-- แก้ไข -->
                            <td>
                                <div class="row" id="list-edit"></div>
                                <button class="edit-button" data-itemname2="<?php echo $row->da_id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>

                            </td>
                            <!-- ลบ -->
                            <td>
                                <button type="button" onclick="confirmDelrow('<?php echo $row->da_id ?>',
                                     '<?php echo $Getcaregiver_name ?>',
                                     '<?php echo $Getuser_statuses ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </button>
                            </td>







                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- End -->

    <!-- delete -->
    <script>
        function confirmDelrow(id, caename, status) {
            var $confirmationDialog = $('<div class="confirmation-dialog">' +
                '<div class="confirmation-overlay"></div>' +
                '<div class="confirmation-box">' +
                '<p>คุณต้องการลบข้อมูลครุภัณฑ์นี้หรือไม่ ?</p>' +
                '<div class="buttons">' +
                '<button class="btn-confirm">Yes</button>' +
                '<button class="btn-cancel">No</button>' +
                '</div>' +
                '</div>' +
                '</div>');
            $('body').append($confirmationDialog);

            $('.btn-confirm').click(function() {
                $.post('/confirm_destroy/' + id + '/' + caename + '/' + status, {
                        _token: "{{ csrf_token() }}" // Add the CSRF token for security purposes
                    })
                    .done(function(response) {
                        // Handle the response from the Laravel controller here
                        console.log(response);
                        window.location.reload(); // Reload the page after the record has been deleted
                    })
                    .fail(function(response) {
                        console.error(response);
                        alert("An error occurred while deleting the record.");
                    });
                $confirmationDialog.remove();
            });

            $('.btn-cancel').click(function() {
                $confirmationDialog.remove();
            });
        }
    </script>
    <!-- delete -->
    <!-- QRCode -->
    <iframe id="qr-iframe" style="display:none"></iframe>

    <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
    <script>
        function printQRCode(i, row) {
            // Get the value of the input element

            var inputValue = row.da_id;
            var name = row.da_name;
            var teacher = row.caregiver_name;
            var date_get = row.date_get;
            // Generate the QR code
            var qr = new QRious({
                element: document.createElement('img'),
                value: 'https://inventory-data-rmutl.online/show_user?da_id=' + inputValue,
                size: 75 // set the size of QR code
            });
            var text = inputValue;
            var tname = name;
            var tteacher = teacher;
            var tdate_get = date_get;
            // Create an HTML file with the QR code
            var html =
                '<html><head> <link href="/css/export.css" rel="stylesheet"> <title>.</title></head><body> <div class="printQR"  style=" font-size:9px; font-family: Kanit;"> <div style="text-align: center;">' + qr.element.outerHTML + '</div>  รหัสครุภัณฑ์ : ' + text + '<br><br>' +
                'ชื่อครุภัณฑ์ : ' + tname + '<br> ผู้ดูเเล : ' + tteacher + '<br> วันที่ได้รับ  : ' + tdate_get + '</div>' + '</body></html>';

            // Assign the HTML content to the iframe
            var iframe = document.getElementById('qr-iframe');
            iframe.contentWindow.document.open();
            iframe.contentWindow.document.write(html);
            iframe.contentWindow.document.close();
            setTimeout(function() {
                // Print the iframe
                iframe.contentWindow.focus();
                iframe.contentWindow.print();
            }, 1000);
        }
    </script>
    <!-- QRCode -->
    <!-- call modal from other page -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".show-image-button").click(function() {
                var itemname = $(this).data("itemname1");
                var itemValues = itemname.split(",");
                var da_id = itemValues[0];
                var i = itemValues[1];
                var da_flag = itemValues[2];

                $.ajax({
                    url: "/table_showimage",
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        da_id: da_id,
                        i: i,
                        da_flag: da_flag
                    },
                    beforeSend: function() {
                        $(".loading").show();
                    },
                    complete: function() {
                        $(".loading").hide();
                    },
                    success: function(data) {
                        $("#list-data").empty();
                        $("#list-data").append(data);
                    }
                });
            });

            $(".edit-button").click(function() {
                var itemname = $(this).data("itemname2");
                console.log(itemname);

                $.ajax({
                    url: "/table_showedit",
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        itemname: itemname
                    },
                    beforeSend: function() {
                        $(".loading").show();
                    },
                    complete: function() {
                        $(".loading").hide();
                    },
                    success: function(data) {
                        $("#list-edit").empty();
                        $("#list-edit").append(data);
                    }
                });
            });
        });

        $(function() {
            $(".sell-button").click(function() {

                var itemname = $(this).data("itemname3"); // Retrieve the itemname value from the clicked button's data attribute
                console.log(itemname);
                $.ajax({
                    url: "/table_showsell",
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        itemname: itemname // ส่งค่า itemname เป็นพารามิเตอร์ของ Ajax request
                    },
                    beforeSend: function() {
                        $(".loading").show();
                    },
                    complete: function() {
                        $(".loading").hide();
                    },
                    success: function(data) {

                        console.log($("#list-sell").empty());
                        $("#list-sell").empty();
                        $("#list-sell").append(data);
                    }
                });
            });
        });
    </script>
    <!-- call modal from other page -->
    <script>
        function displayDateTime() {
            var currentDate = new Date();
            document.getElementById("current-date-time").innerHTML = currentDate;
        }

        displayDateTime();
    </script>
    <script>
        function displayDateTime() {
            var currentDate = new Date();
            document.getElementById("current-date-time").innerHTML = currentDate;
        }

        setInterval(displayDateTime, 1000);
    </script>

    <!-- data table -->
    <script>
        $(function() {

            $('#edit_table').DataTable();
            console.log("meeee");
        });
    </script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- data table -->



</body>

</html>