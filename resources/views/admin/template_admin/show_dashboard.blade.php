<?php

use App\Models\tb_durable_articles;
use Illuminate\Support\Facades\DB;

$i = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/export.css" rel="stylesheet">
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">


    <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            width: 40%;
            /* Full width */
            height: 40%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            border: none;
        }


        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;

            border: none;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            text-decoration: none;
            cursor: pointer;
        }
    </style>



</head>

<style>
    /* กำหนดสไตล์ฟอนต์ */
    @font-face {
        font-family: "Kanit";
        src: url("https://fonts.googleapis.com/css2?family=Kanit&display=swap");
    }

    /* กำหนดสไตล์เนื้อหาที่จะใช้ฟอนต์ */
    .my-text {
        font-family: "Kanit", sans-serif;
    }
</style>

<body id="page-top">

    <div id="customTooltip" class="custom-tooltip modal ">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
        </div>


    </div>
    <style>
        .custom-tooltip {
            position: absolute;
            background-color: white;
            padding: 10px;
            border: 1px solid black;
            display: none;
        }
    </style>

    <!-- Trigger/Open The Modal -->
    <!-- <button id="myBtn">Modal popup</button> -->

    <!-- The Modal -->
    <!-- <div id="myModal" class="modal"> -->

    <!-- Modal content -->
    <!--  <div class="modal-content">
            <span class="close">&times;</span>
            <p>ข้อมูล หรือสิ่งที่ต้องการให้แสดง</p>
        </div> -->
    <!-- 
    </div> -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="my-text h3 mb-0 text-gray-800"><br>Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="/index_admin" class="my-text font-color inline-flex items-center text-sm font-medium no-underline">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                หน้าแรก
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="my-text ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">แดชบอร์ด</span>
                            </div>
                        </li>
                    </ol>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="my-text text-xs font-weight-bold text-uppercase mb-1" style="color: #513300;">
                                            ครุภัณฑ์ทั้งหมด</div>
                                        <div class="my-text h5 mb-0 font-weight-bold text-gray-800"><?php echo $count ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="my-text text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            ครุภัณฑ์ที่ชำรุด</div>
                                        <div class="my-text h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_broken ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="my-text text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            ครุภัณฑ์ที่สูญหาย
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="my-text h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count_lost ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="my-text text-xs font-weight-bold text-success text-uppercase mb-1">
                                            ครุภัณฑ์ที่จำหน่าย</div>
                                        <div class="my-text h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_dispose ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach($data_types as $row)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <a href="/index_admin/?when=<?php echo $row->id_type ?>&type=type" style="text-decoration: none;" >
                                        <div class="my-text text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                                            {{$row->da_type}}
                                        </div>
                                        <?php
                                        $type = tb_durable_articles::where('id_type', $row->id_type)->get();
                                        $count_type = $type->count();
                                        ?>
                                        <div class="my-text h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_type ?></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                





                @endforeach
            </div>


            <!-- Content Row -->
            <div class="row">
                <!-- Bar Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="my-text m-0 font-weight-bold" style="color: #513300;">แผนภูมิแท่งของครุภัณฑ์ สาขาวิชาวิศวกรรมคอมพิวเตอร์</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <style>
                                    #myChart {
                                        width: 200px;
                                        height: 150px;
                                    }
                                </style>



                                <canvas id="myChart"></canvas>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var chart;
                                    var data_count;

                                    function updateChartSize() {
                                        var modal = document.getElementById("customTooltip");
                                        var chartContainer = document.getElementById('chartContainer');
                                        var chartWidth = chartContainer.offsetWidth;
                                        var chartHeight = chartContainer.offsetHeight;

                                        var showTotalTypes = @json($showTotalTypes);
                                        var showTypesOfcount = @json($showTypesOfcount);
                                        var show_durable = @json($show_durable);
                                        var show_count_durable = @json($show_count_durable);

                                        var showTotalTypes_obj = JSON.parse(showTotalTypes);
                                        var showTypesOfcount_obj = JSON.parse(showTypesOfcount);
                                        var show_durable_obj = JSON.parse(show_durable);
                                        var show_count_durable_obj = JSON.parse(show_count_durable);

                                        // console.log(show_durable_obj);
                                        // console.log(show_count_durable_obj);
                                        // สร้างรายละเอียดแต่ละแท่นข้อมูล
                                        var details = showTypesOfcount_obj;

                                        // กำหนดรายละเอียดให้แต่ละแท่นข้อมูล
                                        showTypesOfcount_obj.forEach(function(data, index) {
                                            data.details = details[index];
                                        });
                                        // ตรวจสอบว่าแผนภูมิถูกสร้างแล้วหรือยัง
                                        if (chart) {
                                            // อัปเดตขนาดแผนภูมิ
                                            chart.resize(chartWidth, chartHeight);
                                        } else {
                                            // สร้างแผนภูมิใหม่
                                            console.log(showTypesOfcount_obj)

                                            chart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: showTypesOfcount_obj,
                                                    datasets: [{
                                                        label: '',
                                                        render: 'value',
                                                        data: showTotalTypes_obj,
                                                        backgroundColor: ['rgba(231, 74, 59, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(106, 50, 159, 0.2)', 'rgba(255, 151, 44, 0.2)'],
                                                        borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(106, 50, 159, 1)', 'rgba(255, 151, 44, 1)'],
                                                        borderWidth: 1,

                                                    }]
                                                },

                                            });


                                            

                                            modal.style.display = "none";


                                        }
                                    }






                                    // เรียกฟังก์ชันอัปเดตขนาดแผนภูมิเมื่อหน้าจอโหลดหรือเปลี่ยนขนาด
                                    window.addEventListener('DOMContentLoaded', updateChartSize);
                                    window.addEventListener('resize', updateChartSize);
                                </script>

                                <style>
                                    .card-white-bg {
                                        display: none;
                                    }
                                </style>

                                <div class="col-xl-4 col-lg-6">
                                    <div class="card mb-4 card-white-bg">
                                        <!-- เนื้อหาอื่น ๆ ในการ์ด -->
                                        <div class="card-body">
                                            <div id="chartContainer" style="width: 100%; height: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Pie Chart -->
<div class="col-xl-4 col-lg-6">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="my-text m-0 font-weight-bold" style="color: #513300;">แผนภูมิวงกลมของครุภัณฑ์ สาขาวิชาวิศวกรรมคอมพิวเตอร์</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var years = @json($years);
                        var totalItems = @json($totalItems);
                        var totalItems_obj = JSON.parse(totalItems);

                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Category');
                        data.addColumn('number', 'Value');
                        data.addRows(totalItems_obj);

                        var options = {
                            width: '100%', // Set width to 100% to make it responsive
                            height: 300,
                            colors: ['#e74a3b', '#4e73df', '#f6c23e', '#1cc88a', '#6A329F', '#FF972C']
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

                        function drawChartOnResize() {
                            chart.draw(data, options);
                        }

                        window.addEventListener('resize', drawChartOnResize);
                        drawChartOnResize(); // Initial draw
                    }
                </script>

                <style>
                    #chart_div {
                        width: 100%;
                        height: 100%;
                    }
                </style>

                <!-- ส่วนที่แสดงแผนภูมิ -->
                <div id="chart_div"></div>
            </div>
        </div>
    </div>
</div>


        </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./js/navbar.js"></script>
</body>

</html>