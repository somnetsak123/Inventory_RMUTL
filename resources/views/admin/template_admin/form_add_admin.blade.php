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
    <link href="/css/export.css" rel="stylesheet">
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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/openlayers/2.13.1/theme/default/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/2.13.1/OpenLayers.js"></script>


    <title>Title page</title>
    <title>ระบบจัดการครุภัณฑ์ หลักสูตรวิศวกรรมคอมพิวเตอร์</title>





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

        #map {
            height: 100%;
        }

        /* 
 * Optional: Makes the sample page fill the window. 
 */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 500px;
        }

        /* Styles for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            margin: auto;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            background-color: white;
            position: relative;
            z-index: 2;
            /* Set a higher z-index to ensure it's above the map */
        }

        /* Close button style */
        .close-btn {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            z-index: 3;
            /* Set the z-index to 2 to position it above the map */
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>


    <section class="section b " id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <form id="formAdd" method="POST" enctype="multipart/form-data" action="{{url('add')}}">
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

                                <input id="dropzone-file" type="file" class="hidden" name="files[]" accept="image/png, image/gif, image/jpeg" multiple required />

                            </label>
                        </div>
                        <div id="file-info"></div>
                        <br>
                        <br>
                </div>

                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="da_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">รหัสครุภัณฑ์</label>
                                <input type="text" id="da_id" name="da_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                            <div>
                                <label for="da_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ชื่อครุภัณฑ์</label>
                                <input type="text" id="da_name" name="da_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                            <div>
                                <label for="da_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ประเภท</label>
                                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_type" id="id_type">
                                    <option></option>
                                    @foreach($data_tb_types as $row)
                                    <option value="<?php echo $row->id_type ?>" style="font-family: Kanit;"> {{ $row->da_type }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label for="cargivere" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ผู้ดูเเล</label>
                                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="cargiver" id="rocargiverom">
                                    <option></option>
                                    @foreach($data_tb_cargivers as $row)
                                    <option value="{{ $row->cargiver_id }}" style="font-family: Kanit;">{{ $row->caregiver_name }}</option>
                                    @endforeach
                                </select>
                                <input value="" style="display:none" type="text" id="caregiver_name2" name="caregiver_name2">
                            </div>

                            <script>
                                document.getElementById("rocargiverom").addEventListener("change", function() {
                                    document.getElementById("caregiver_name2").value = this.value;
                                });
                            </script>

                            <div>
                                <label for="dateget" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ห้อง</label>
                                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="room" id="room">
                                    <option></option>
                                    @foreach($data_rooms as $row)
                                    <option value="<?php echo $row->room_id ?>" style="font-family: Kanit;"> {{ $row->room_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label for="dateget" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">วัน/เดือน/ปี ที่ได้รับ</label>
                                <input type="datetime-local" id="dateget" name="dateget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="วัน/เดือน/ปี" required>
                            </div>

                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">ราคา</label>
                                <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                            </div>
                            <div></div>
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">latitude</label>
                                <input type="text" id="latitude" name="latitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                            </div>
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">longitude</label>
                                <input type="text" id="longitude" name="longitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                            </div>

                            <!------------------------------------------------------------ add location-------------------------------------------------------------- -->
                            <!-- Button to open the map modal -->
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="openMapModal()">Open Map</button>

                            <!-- The map modal -->









                            <div id="mapModal" class="modal " onclick="closeMapModal()">








                                <div class="modal-content" onclick="event.stopPropagation();">

                                    <button onclick="closeMapModal()" id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span onclick="closeMapModal()" class="sr-only">Close modal</span>
                                    </button>


                                    <!-- The map will be displayed inside this div -->
                                    <div class="px-6 py-6 lg:px-8">
                                        <div id="map" onwheel="event.preventDefault()"></div>
                                    </div>

                                </div>

                            </div>

                            <script>
                                let mapInitialized = false; // To track if the map has been initialized

                                // Function to open the map modal
                                function openMapModal() {
                                    document.getElementById("mapModal").style.display = "block";
                                    if (!mapInitialized) {
                                        initMap();
                                        mapInitialized = true;
                                    }
                                }

                                // Function to close the map modal
                                function closeMapModal() {
                                    document.getElementById("mapModal").style.display = "none";
                                    clearMap();
                                }

                                function initMap() {
                                    const map = new OpenLayers.Map("map", {
                                        controls: [
                                            new OpenLayers.Control.Navigation(),
                                            new OpenLayers.Control.Zoom(),
                                        ],
                                    });
                                    const mapnik = new OpenLayers.Layer.OSM();

                                    map.addLayer(mapnik);

                                    const markers = new OpenLayers.Layer.Markers("Markers");
                                    map.addLayer(markers);

                                    // Center the map on the user's current location
                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(
                                            function(position) {
                                                // 18.811640858918405, 98.95392972113831
                                                const latitude = 18.811640858918405;
                                                const longitude = 98.95392972113831;

                                                const centerPoint = new OpenLayers.LonLat(longitude, latitude).transform(
                                                    new OpenLayers.Projection("EPSG:4326"), // Transform from WGS 1984
                                                    new OpenLayers.Projection("EPSG:900913") // to Spherical Mercator Projection
                                                );

                                                map.setCenter(centerPoint, 18); // Zoom level: 15
                                                markers.clearMarkers();
                                                const size = new OpenLayers.Size(21, 25);
                                                const offset = new OpenLayers.Pixel(-(size.w / 2), -size.h);
                                                const icon = new OpenLayers.Icon("https://www.openstreetmap.org/openlayers/img/marker.png", size, offset);
                                                markers.addMarker(new OpenLayers.Marker(centerPoint, icon));

                                                // Update the input fields with latitude and longitude
                                                document.getElementById("latitude").value = latitude;
                                                document.getElementById("longitude").value = longitude;
                                            },
                                            function(error) {
                                                console.error("Error getting current location:", error);
                                            }
                                        );
                                    }

                                    // Create the click event listener.
                                    // Create the click event listener.
                                    map.events.register("click", map, function(e) {
                                        const position = map.getLonLatFromPixel(e.xy).transform(
                                            new OpenLayers.Projection("EPSG:900913"), // Transform from Spherical Mercator Projection
                                            new OpenLayers.Projection("EPSG:4326") // to WGS 1984
                                        );

                                        // Update the input fields with latitude and longitude
                                        document.getElementById("latitude").value = position.lat;
                                        document.getElementById("longitude").value = position.lon;

                                        // Update the Marker's position
                                        markers.clearMarkers();
                                        const size = new OpenLayers.Size(21, 25);
                                        const offset = new OpenLayers.Pixel(-(size.w / 2), -size.h);
                                        const icon = new OpenLayers.Icon("https://www.openstreetmap.org/openlayers/img/marker.png", size, offset);

                                        const centerPoint = new OpenLayers.LonLat(position.lon, position.lat).transform(
                                            new OpenLayers.Projection("EPSG:4326"), // Transform from WGS 1984
                                            new OpenLayers.Projection("EPSG:900913") // to Spherical Mercator Projection
                                        );
                                        markers.addMarker(new OpenLayers.Marker(centerPoint, icon));

                                    });

                                }
                            </script>


                            <!------------------------------------------------------------ add location-------------------------------------------------------------- -->

                            <div>
                                <input type="hidden" id="building" name="building" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                        </div>

                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">สถานะ :</label>

                            <div class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="horizontal-list-radio-license" type="radio" value="1" name="list_radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="horizontal-list-radio-license" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300 inline-flex" style="font-family: Kanit;">ใช้งานได้ </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="horizontal-list-radio-id" type="radio" value="2" name="list_radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="horizontal-list-radio-id" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300" style="font-family: Kanit;">ชำรุด </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="horizontal-list-radio-millitary" type="radio" value="3" name="list_radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="horizontal-list-radio-millitary" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300" style="font-family: Kanit;">สูญหาย</label>
                                    </div>
                                </li>
                                <li class="w-full dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="horizontal-list-radio-passport" type="radio" value="4" name="list_radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="horizontal-list-radio-passport" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300" style="font-family: Kanit;">จำหน่าย</label>
                                    </div>
                                </li>
                            </div>
                        </div>

                        <!-- <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">หมายเลขสินทรัพย์เดิม</label>
                            <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ถ้ามี">
                        </div>

                        <div class="mb-6">
                            <label for="recheck" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Kanit;">สำรวจเมื่อ</label>
                            <input type="date-local" id="recheck" name="recheck" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ถ้ามี">
                        </div> -->
                        <br>
                        <button id="insertButton" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Insert</button>



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

                        <br>


                        </form>

                        <br>


                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="printQRCode()">Print QR Code</button>
                        <iframe id="qr-iframe" style="display:none"></iframe>

                        <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
                        <script>
                            function printQRCode() {
                                // Get the value of the input element
                                var inputValue = document.getElementById("da_id").value;
                                var name = document.getElementById("da_name").value;
                                var teacher = document.getElementById("caregiver_name2").value;
                                var dateget = document.getElementById("dateget").value;
                                // Generate the QR code
                                var qr = new QRious({
                                    element: document.createElement('img'),
                                    value: 'https://inventory-data-rmutl.online/show_user?da_id=' + inputValue,
                                    size: 75 // set the size of QR code
                                });
                                var text = inputValue;
                                var tname = name;
                                var tteacher = teacher;
                                var tdate_get = dateget;
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

                            const inputElement = document.getElementById("dropzone-file");
                            const insertButton = document.getElementById("insertButton");
                            inputElement.addEventListener("change", (event) => {
                                const files = event.target.files;
                                if (files.length > 10) {
                                    alert("คุณเลือกไฟล์มากเกินไป โปรดเลือกไฟล์ไม่เกิน 10 รูป");
                                    event.preventDefault();
                                    insertButton.disabled = true; 
                                    return false;
                                }

                                // ตรวจสอบจำนวนไฟล์และป้องกันการกดปุ่ม "Insert"
                                if (files.length <= 10) {
                                    insertButton.disabled = false; // ปุ่ม "Insert" สามารถกดได้
                                } 
                            });


                        </script>
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


    <script>
        // กำหนด Event Listener สำหรับ input element
        document.getElementById("dropzone-file").addEventListener("change", function(event) {
            const files = event.target.files; // รับอาร์เรย์ของไฟล์ที่เลือก

            // สร้างตัวแปรสำหรับเก็บข้อความที่จะแสดง
            let fileInfo = "";

            // วนลูปตรวจสอบไฟล์ที่เลือกและเก็บชื่อไฟล์ในตัวแปร fileInfo


            // เพิ่มข้อความจำนวนไฟล์ที่อัปโหลด
            fileInfo += "<br>Total Files: " + files.length;

            // แสดงข้อความใน div ที่มี id เป็น "file-info"
            document.getElementById("file-info").innerHTML = fileInfo;
        });
    </script>


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