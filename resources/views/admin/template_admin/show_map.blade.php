<!DOCTYPE html>
<html>

<head>
  <title>ระบบจัดการครุภัณฑ์ สาขาวิศวกรรมคอมพิวเตอร์</title>
  <!-- CSS -->
  <link href="/css/export.css" rel="stylesheet">
  <link href="/css/export.css" rel="stylesheet">
  <link href="/css/edi.css" rel="stylesheet">
  <link href="/css/ediV2.css" rel="stylesheet">
  <link href="/css/navbar.css" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-extra-markers/dist/css/leaflet.extra-markers.min.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-extra-markers/dist/js/leaflet.extra-markers.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

  <style>
    #map {
      height: 500px;
      width: 100%;
      max-width: 1080px;
      /* ขนาดแผนที่เริ่มต้น */
      margin: 0 auto;
      /* จัดกลางแผนที่ในหน้าต่าง */
    }
  </style>

</head>

<body>
  <div class="container">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li class="inline-flex items-center">
        <a href="/index_admin" class="font-color inline-flex items-center text-sm font-medium ">
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
          <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">แผนที่</span>
        </div>
      </li>
    </ol><br><br>

    <div id="map">
      <?php
      $iconUrl1 = asset('image/icon/pin/1.png');
      $iconUrl2 = asset('image/icon/pin/2.png');
      $iconUrl3 = asset('image/icon/pin/3.png');
      $iconUrl4 = asset('image/icon/pin/4.png');
      $iconUrl5 = asset('image/icon/pin/5.png');
      $iconUrl6 = asset('image/icon/pin/6.png');
      $iconUrl7 = asset('image/icon/pin/7.png');
      $iconUrl8 = asset('image/icon/pin/8.png');
      ?>

      <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
      <script src="https://unpkg.com/leaflet-extra-markers/dist/js/leaflet.extra-markers.min.js"></script>

      <script>
        var map = L.map("map").setView([18.811585606961938, 98.9539225293276], 24);
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // สร้างฟังก์ชันสำหรับแสดงหมุด
        function addMarker(lat, lng, description, type) {
          var markerIcon;

          // กำหนดสีของ icon ตามเงื่อนไขหรือคุณลักษณะที่ต้องการ
          if (type === 11) {
            markerIcon = L.ExtraMarkers.icon({
              icon: '<?php echo $iconUrl1; ?>',
              number: description,
              markerColor: 'red'


            });
          } else if (type === 12) {
            markerIcon = L.ExtraMarkers.icon({
              icon: '<?php echo $iconUrl2; ?>',
              number: description,
              markerColor: 'green'


            });
          } else if (type === 13) {
            // ให้สีเป็นค่าเริ่มต้นหรือสีอื่นที่คุณต้องการ
            markerIcon = L.ExtraMarkers.icon({
              icon: '<?php echo $iconUrl3; ?>',
              number: description,
              markerColor: 'blue'


            });
          } else if (type === 14) {
            // ให้สีเป็นค่าเริ่มต้นหรือสีอื่นที่คุณต้องการ
            markerIcon = L.ExtraMarkers.icon({
              icon: '<?php echo $iconUrl3; ?>',
              number: description,
              markerColor: 'orange'


            });
          } else if (type === 15) {
            // ให้สีเป็นค่าเริ่มต้นหรือสีอื่นที่คุณต้องการ
            markerIcon = L.ExtraMarkers.icon({
              icon: '<?php echo $iconUrl3; ?>',
              number: description,
              markerColor: 'purple'


            });
          } else if (type === 16) {
            // ให้สีเป็นค่าเริ่มต้นหรือสีอื่นที่คุณต้องการ
            markerIcon = L.ExtraMarkers.icon({
              icon: '<?php echo $iconUrl3; ?>',
              number: description,
              markerColor: 'white'


            });
          } else if (type === 17) {
            // ให้สีเป็นค่าเริ่มต้นหรือสีอื่นที่คุณต้องการ
            markerIcon = L.ExtraMarkers.icon({
              icon: '<?php echo $iconUrl3; ?>',
              number: description,
              markerColor: 'yellow'


            });
          } else if (type === 18) {
            // ให้สีเป็นค่าเริ่มต้นหรือสีอื่นที่คุณต้องการ
            markerIcon = L.ExtraMarkers.icon({
              icon: '<?php echo $iconUrl3; ?>',
              number: description,
              markerColor: 'black'


            });
          }

          var marker = L.marker([lat, lng], {
            icon: markerIcon
          }).addTo(map);
          marker.bindPopup(description);
        }

        fetch('/markers')
          .then(function(response) {
            return response.json();
          })
          .then(function(data) {
            data.forEach(function(marker) {
              if (marker.latitude && marker.longitude) {
                var description = marker.da_name;
                var type = marker.id_type;
                addMarker(marker.latitude, marker.longitude, description, type);
              }
            });
          });
      </script>
    </div>
  </div>


</body>

</html>