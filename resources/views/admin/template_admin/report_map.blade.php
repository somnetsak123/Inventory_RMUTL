<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/edi.css" rel="stylesheet">
        <link href="/css/ediV2.css" rel="stylesheet">
        <link href="/css/addalerts.css" rel="stylesheet">


        <button type="button" data-modal-toggle="authentication-modal-map" id="address" class="address"> </button>


        <div id="authentication-modal-map" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button id="end" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal-map">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">แผนที่ </h3>

                        <div>
                            <iframe width="100%" height="200" src="https://maps.google.com/maps?q=<?php echo $_POST['itemname']?>&output=embed"></iframe>

                        </div>




                        <br>

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


        <script>
        setTimeout(function() {
            document.getElementById('address').click();
        }, 200);
    </script>