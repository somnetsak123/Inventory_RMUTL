<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

<link href="/css/app.css" rel="stylesheet">
<link href="/css/edi.css" rel="stylesheet">
<link href="/css/ediV2.css" rel="stylesheet">
<link href="/css/addalerts.css" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-icon-180x180.png">
<link href="./main.d8e0d294.css" rel="stylesheet">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="msapplication-tap-highlight" content="no">

<!-- css -->
<link href="/css/edi.css" rel="stylesheet">
<link href="/css/ediV2.css" rel="stylesheet">
<link href="/css/export.css" rel="stylesheet">
<link href="/css/navbar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="/css/templatemo-art-factory.css">
<link rel="stylesheet" type="text/css" href="/css/owl-carousel.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>

<!-- JS -->
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>



<button type="button" data-modal-toggle="authentication-modal-image" id="show_image" class="address"> </button>


<div id="authentication-modal-image" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal-image">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-7 py-7 lg:px-8 max-w-2xl">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">รูปภาพ </h3>
                <section class="section">

                    <div id="controls-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                            <?php

                            use Illuminate\Support\Facades\DB;

                            $pictures = DB::table($prefix . 'pictures')
                                ->where('da_id', $_POST['itemname'])
                                
                                ->get();


                            ?>
                            <div id="controls-carousel" class="relative w-full" data-carousel="static">

                                <!-- Carousel wrapper -->
                                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                                    <?php
                                    foreach ($pictures as $f2) {
                                    ?>
                                        <!-- Carousel Item -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="/image/pictureImg/.<?= $f2->picture_file ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                        </div>
                                    <?php
                                    }
                                    ?>





                                </div>
                                <!-- Slider controls -->
                                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>

                </section>
            </div>
        </div>
    </div>
</div>


</p>
</div>
</div>
</div>

<script src="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.js"></script>
<link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet/v1.7.1/leaflet.css" />
<script src="/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="/js/owl-carousel.js"></script>
<script src="/js/scrollreveal.min.js"></script>
<script src="/js/waypoints.min.js"></script>
<script src="/js/jquery.counterup.min.js"></script>
<script src="/js/imgfix.min.js"></script>

<!-- Global Init -->
<script src="/js/custom.js"></script>

<!--JS-->
<script src="/js/navbar.js"></script>

<script>
    setTimeout(function() {
        document.getElementById('show_image').click();
    }, 250);
</script>