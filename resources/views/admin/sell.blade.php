
<?php 


if (isset($_GET['da_id']) && array_key_exists('da_id', $_GET)) {
    $da_id = $_GET['da_id'];
    // ...
  } else {
    // ...
  }
  
/* 
print_r($da_id); */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-tap-highlight" content="no">


    <!-- <xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx> -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-icon-180x180.png">
    <link href="./main.d8e0d294.css" rel="stylesheet">
    <!-- <xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx> -->

    <!-- CSS -->
    <link href="/image/icon/favicon.ico" rel="icon">
    <link href="/css/output.css" rel="stylesheet">
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="/css/owl-carousel.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Kanit&display=swap' rel='stylesheet'>





    <title>Title page</title>
    <title>เว็บครุภัณฑ์</title>





    <style>
        img {
            border-radius: 8px;
        }

        * {


            box-sizing: border-box;
        }

        .text {
            font-family: Kanit;
            font-size: 20px;
        }

        .column {
            float: left;
            width: 50%;
            padding: 5px;
        }

        .drop-shadow-2xl {
            filter: drop-shadow(0 25px 25px rgb(0 0 0 / 0.15));
        }

        .font {
            font-family: 'Kanit', sans-serif;
            color: #34495e;
        }

        .try {

            padding-left: 250px;
        }

        .try1 {

            padding-left: 180px;
        }
    </style>
</head>

<body>

<?php

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);
}
?>
      <?php 
$sql = " SELECT * FROM {$prefix}tb_durable_articles

INNER JOIN {$prefix}rooms ON {$prefix}tb_durable_articles.room_id = {$prefix}rooms.room_id

INNER JOIN {$prefix}buildings ON  {$prefix}rooms.building_id = {$prefix}buildings.building_id

INNER JOIN {$prefix}tb_flag ON  {$prefix}tb_durable_articles.da_flag = {$prefix}tb_flag.da_flag

INNER JOIN {$prefix}tb_types ON  {$prefix}tb_durable_articles.id_type = {$prefix}tb_types.id_type

INNER JOIN {$prefix}tb_cargivers ON  {$prefix}tb_durable_articles.cargiver_id = {$prefix}tb_cargivers.cargiver_id

WHERE (da_id = '".$da_id."');";
$q = mysqli_query( $conn, $sql );
while( $f = mysqli_fetch_assoc( $q ) ) { 
    ?>
    <section class="section b " id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <form id="sell" method="POST" enctype="multipart/form-data" action="/sellup/<?php echo $f["da_id"] ?>">
                        @csrf
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>

                                <input id="dropzone-file" type="file" class="hidden" name="files[]" accept="image/png, image/gif, image/jpeg" multiple />
                            </label>
                        </div>
                        <br>
                        <br>
                </div>
          
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="da_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">รหัสครุภัณฑ์</label>
                                <input value=" <?php echo $f['da_id']  ?> " type="text" id="da_id" name="da_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="da_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ชื่อครุภัณฑ์</label>
                                <input value=" <?php echo $f['da_name']  ?>"  type="text" id="da_name" name="da_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="da_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ประเภท</label>
                                <input value=" <?php echo $f['da_type']  ?>" type="text" id="da_type" name="da_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_type" id="id_type">

                            </div>
                            <div>
                                <label for="caregiver_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ผู้ดูเเล</label>
                                <input value=" <?php echo $f['caregiver_name']  ?>" type="text" id="caregiver_name" name="caregiver_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                           
                            <div>
                                <label for="date_get" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">วัน/เดือน/ปี ที่ได้รับ</label>
                                <input type="datetime-local" id="date_get" name="date_get" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $f["date_get"] ?>">
                            </div>

                            <div>
                                <label for="da_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ราคา</label>
                                <input value=" <?php echo $f['da_price']  ?>"type="text" id="da_price" name="da_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                            </div>
                            <div>
                                <label for="da_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">สถานะ</label>
                                <input value=" <?php echo $f['da_status']  ?>"type="text" id="da_status" name="da_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                            </div>
                            <div>
                                <label for="da_recheck_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ตรวจสภาพล่าสุด</label>
                                <input type="datetime-local" id="da_recheck_year" name="da_recheck_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $f["da_recheck_year"] ?>">
                              </div>
                            <div>
                                <label for="room_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ห้อง</label>
                                <input value=" <?php echo $f['room_name']  ?>"type="text" id="room_name" name="room_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                            </div>
                            <div>
                                <label for="building_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ตึก</label>
                                <input value=" <?php echo $f['building_name']  ?>"type="text" id="building_name" name="building_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                            </div>
                            <!-- <div>
                                <input type="hidden" id="building" name="building" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div> -->

                        </div>

                        
                        <?php 
}
?>
                        <br>
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
  rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700
   dark:focus:ring-blue-800">Insert</button>




                        <br>


                        </form>

                        <br>


                        <!-- 
<button type="button" onclick="downloadQR()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
     rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700
      dark:focus:ring-blue-800">Generate QR Code</button>
      <script>
 function downloadQR() {
    var inputValue = document.getElementById("da_id").value;
  var qrUrl = "https://api.qrserver.com/v1/create-qr-code/?data=http://http:/localhost:8000/show_user?da_id=" + inputValue;

  fetch(qrUrl)
    .then(response => response.blob())
    .then(blob => {
      let url = URL.createObjectURL(blob);
      let a = document.createElement("a");
      a.href = url;
      a.download = inputValue + ".png";
      document.body.appendChild(a);
      a.click();
      setTimeout(() => {
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
      }, 100);
    });
}

  </script> -->



                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>


    <script src="assets/js/custom.js"></script>

</body>

</html>