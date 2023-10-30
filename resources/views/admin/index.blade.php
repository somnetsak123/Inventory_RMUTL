
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
  </head>
  <body>

 <!-- <php   dontforget ? before php ************------------------------------------------**************************
    // Generate the QR code
    $url = $_GET['url'] ?? '';
    $name = $_GET['name'] ?? '';
    
  $nameqr=$name;
  

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.qrserver.com/v1/create-qr-code/?data=$url");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$qr_code = curl_exec($ch);
curl_close($ch);

// Send the QR code image to the browser
header("Content-Type: image/png");
header("Content-Disposition: attachment; filename=$nameqr");

// Output the QR code image data
echo $qr_code; ?>-->
    

  <label>
  <!-- <iframe src="" frameborder="1" width=""> </iframe> -->
</label>
<!-- ส่วนของการเเสดงผล -->


@extends('admin.template_admin.index_show')

<!-- ส่วนของเมนู เเละ ประมวลผล -->
@extends('admin.template_admin.menu_bar_admin')

  </body>
</html>

