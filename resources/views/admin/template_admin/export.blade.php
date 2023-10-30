<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <!-- JQuery -->
    <script src="https:https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <div style="padding: 10px">
    <script>
        $(document).ready(function() {
        $('#edit_table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            } );
        } );
    </script>
    </div>

    <title>Exports Page</title>

</head>
<body>
<h2>ตารางข้อมูลครุภัณฑ์</h2><hr>
<div class="container edit_table">
    <table id="edit_table" style="padding: 10px">
        <thead>
            <tr>
                <th>รหัส</th>
                <th>ชื่อ</th>
                <th>ประเภท</th>
                <th>ชื่อผู้ดูแล</th>
                <th>วันที่ได้รับ</th>
                <th>ระยะเวลาที่ใช้</th>
                <th>ราคา</th>
                <th>สถานะ</th>
                <th>วันที่ตรวจเช็ค</th>
                <th>ห้องเรียน</th>
            </tr>
        </thead>
        <tbody>
            
        <?php
            foreach ($tb_durable_articles as $row) {
        ?>
            <tr>
                <td><?php echo $row->da_id ?></td>
                <td><?php echo $row->da_name ?></td>
                <td><?php echo $row->da_type ?></td>
                <td><?php echo $row->caregiver_name ?></td>
                <td><?php echo $row->date_get ?></td>
                <td><?php echo $row->time_of_use ?></td>
                <td><?php echo $row->da_price ?></td>
                <td><?php echo $row->da_status ?></td>
                <td><?php echo $row->da_recheck_year ?></td>
                <td><?php echo $row->room_name ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>