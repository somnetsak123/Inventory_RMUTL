<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet" /> -->
    <link href="/css/edi.css" rel="stylesheet">
    <link href="/css/ediV2.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>


    <title>เว็บครุภัณฑ์</title>
</head>

<body>


    <center>
        <table>
            <tr>
                <th></th>
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
                                
                                <input type="text" id="itemname" name="itemname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required autocomplete="off">
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

    <!-- เมื่อกดเมนูจะมาแสดงตรงนี้ ตัวตันอยู่ที่ menu_bar_user.blade.php -->
    @yield('list-data')




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




</body>

</html>