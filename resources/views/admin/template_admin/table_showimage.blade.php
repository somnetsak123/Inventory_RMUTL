<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
<!-- Font -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
<!-- CSS -->
<link rel="stylesheet" href="styles.css">
<link href="/css/app.css" rel="stylesheet">
<link href="/css/edi.css" rel="stylesheet">
<link href="/css/ediV2.css" rel="stylesheet">
<link href="/css/addalerts.css" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-icon-180x180.png">
<link href="./main.d8e0d294.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="msapplication-tap-highlight" content="no">

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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

<!-- !!! -->
<link rel="stylesheet" href="/css/export.css">
<link href="/css/addalerts.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/modalcar.css"> <!-- slide and modal to show picture  -->

<meta name="csrf-token" content="{{ csrf_token() }}">

<body>
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

        .invisible {
            display: none;
        }
    </style>
    <?php
    $ii = $_POST['i'];
    $da_id = $_POST['da_id'];
    $da_flag = $_POST['da_flag'];

    use Illuminate\Support\Facades\DB;
    ?>
    <button type="submit" data-toggle="modal" id="show_image" data-target="#exampleModal<?php echo $ii ?>" class="invisible">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
        </svg>
    </button>


    <div class="modal fade" id="exampleModal<?php echo $ii ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $da_id ?></h5>

                </div>
                <div class="modal-body">
                    <div id="carouselExampleIndicators<?php echo $ii ?>" class="carousel slide" data-interval="false">
                        <div class="carousel-inner">
                            <?php
                            $x = 0;
                            $a = 0;
                            $data_pic = DB::table($prefix . 'pictures')->where('da_id', '=', $da_id)->get();
                        

                            echo $num_rows;

                            if ($num_rows != 0) {
                                foreach ($data_pic as $row1) {
                                    $a++;
                                    $activeClass = ($x == 0) ? 'active' : '';
                            ?>
                                    <div class="carousel-item <?php echo $activeClass; ?>" id="carousel-item-<?php echo $da_id ?>-<?php echo $a ?>">
                                        <center>
                                            <h5 hidden class="modal-title" id="exampleModalLabel555"><?php echo $row1->picture_file ?></h5>
                                            <h5 hidden class="modal-title" id="thisforedit-<?php echo $ii ?>-<?php echo $a ?>"><?php echo $row1->picture_file ?></h5>
                                            <h5 hidden class="modal-title" id="thisfordelete-<?php echo $ii ?>-<?php echo $a ?>"><?php echo $row1->picture_file ?></h5>

                                            <img src="/image/pictureImg/.<?php echo $row1->picture_file ?>" class="img_multi d-block w-100" alt="Picture <?php echo ($x + 1); ?>"><br>


                                            <!-- del button -->
                                            <button type="button" class="delete-button hover_transition justify-center text-white bg-blue-700 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 inline-flex text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="margin: 10px; width: 112.89px;" data-da-id="<?php echo $row1->da_id ?>" data-picture-file="<?php echo $row1->picture_file ?>" data-c1="<?php echo $ii ?>" data-c2="<?php echo $a ?>">
                                                Delete
                                            </button>
                                            <!-- ตกเเต่งคอนเฟิมตรงนี้นะโอ้ตัวนี้เเก้ทีจะเเก้ทั้งคอนเฟิมลบรูปกับลบเเถวเลย -->
                                            <style>
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
                                            </style>

                                            <!-- edit picture button -->

                                            <input type="file" id="newPictureInput" style="display: none;">
                                            <!--  <button onclick="editPicture('<?php echo $row1->picture_file ?>', '<?php echo $row1->da_id ?>', '<?php echo $row1->da_id ?>', '<?php echo $a ?>')" type="button" class="hover_transition justify-center text-white bg-blue-700 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 inline-flex text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="width: 112.89px;">Edit</button>
          --><button onclick="myFunction('<?php echo $row1->da_id ?>', '<?php echo $row1->da_id ?>', 
          '<?php echo $a ?>', '<?php echo $ii ?>', '<?php echo $a ?>')" type="button" class="hover_transition justify-center text-white bg-blue-700 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 inline-flex text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="width: 112.89px;">change</button>

                                        </center>
                                    </div>

                                <?php
                                    $x++; // Increment $x for each picture

                                }
                            } else {
                                $activeClass = ($x == 0) ? 'active' : ''; ?>

                                <div class="carousel-item <?php echo $activeClass; ?>" id="carousel-item-<?php echo $da_id ?>-<?php echo $a ?>">

                                    <center>
                                        <h5 class="modal-title" id="exampleModalLabel555"> ไม่มีรูปในขณะนี้โปรดเพิ่มรูป </h5>
                                        <h5 hidden class="modal-title" id="exampleModalLabel555"></h5>

                                        <img src="/image/pictureImg/." class="img_multi d-block w-100" alt="Picture <?php echo ($x + 1); ?>">
                                        <!-- del button -->
                                    </center>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $ii ?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $ii ?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- delete  picture-->

                <script>
                    var dialogCreated = false;

                    $(".delete-button").click(function() {
                        var ida = $(this).data('da-id');
                        var file = $(this).data('picture-file');
                        var cc1 = $(this).data('c1');
                        var cc2 = $(this).data('c2');
                        // Get the unique identifier from the carousel ID
                        var id = $(this).closest('.modal').find('.carousel').attr('id');
                        var $carousel = $('#' + id);
                        var ActiveElement = $carousel.find('.carousel-item.active');

                        if (!dialogCreated) {
                            var $confirmationDialog = $('<div class="confirmation-dialog">' +
                                '<div class="confirmation-overlay"></div>' +
                                '<div class="confirmation-box">' +
                                '<p>คุณต้องการลบรูปภาพนี้หรือไม่?</p>' +
                                '<div class="buttons">' +
                                '<button class="btn-confirm bg-red-700 hover:bg-red-800">Yes</button>' +
                                '<button class="btn-cancel bg-red-700 hover:bg-red-800">No</button>' +
                                '</div>' +
                                '</div>' +
                                '</div>');

                            $('body').append($confirmationDialog);
                            dialogCreated = true;
                        }

                        $('.btn-confirm').click(function() {

                            var valuekeepfordel = document.getElementById("thisforedit-" + cc1 + "-" + cc2).textContent;
                            ActiveElement.remove();
                            var NextElement = $carousel.find('.carousel-item').first();
                            NextElement.addClass('active');
                            $('.confirmation-dialog').remove();
                            dialogCreated = false;

                            console.log('pic name :', valuekeepfordel);


                            deletePicture(ida, valuekeepfordel);

                            // Call the deletePicture function
                            /*  keepfordelreal(ida); */
                        });


                        $('.btn-cancel').click(function() {
                            $('.confirmation-dialog').remove();
                            dialogCreated = false;
                        });
                    });
                </script>



                <script>
                    function deletePicture(da_id, picture_file) {
                        console.log('deletePicture called with da_id:', da_id, 'and picture_file:', picture_file);
                        // Make sure da_id and picture_file are not empty or undefined
                        if (!da_id || !picture_file) {
                            console.error('da_id or picture_file is empty or undefined');
                            return;
                        }
                        // Get the CSRF token from the meta tag
                        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        // Create an AJAX request to delete the picture
                        var xhr = new XMLHttpRequest();

                        xhr.open('POST', '/delpiccar');
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        xhr.send('da_id=' + encodeURIComponent(da_id) + '&picture_file=' + encodeURIComponent(picture_file));
                    }
                </script>
                <!-- changepicture  -->
                <script>
                    //ตอนเเรกมันไว้ส่งค่าจากการเปลี่ยนค่าเรียลไทมเพื่อให้เวลาส่งอีกรอบอะเเบบกดเเก้รูปหลายรอบได้ชื่อที่ต้องการเเก้เรียลไหมตลอดเเต่ตอนนี้ไม่ได้ใช้ละเเต่ไม่กล้ากลัวระเบิด   
                    function myFunction(id, item_id, a, c1, c2) {

                        var valuekeep = document.getElementById("thisforedit-" + c1 + "-" + c2).textContent;


                        console.log('c1 :', c1, 'c2 :', c2);
                        console.log('pic name :', valuekeep);
                        editPicture(valuekeep, id, item_id, a);

                        // do something with the textValue variable
                        /*  alert(textValue);  */

                    }


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    /*  เอาไปทำไรปัญหาคือถ้าไม่มีรูป=ไม่มีไสล้ไห้ระบุเดะเเคปไห้ดู ตรงไหนที่ต้องระบุให้ได้พาไปดูหน่อย //  

                    /*  เพิ่มรูป */

                    function editPicture(old_picture, id, item_id, a) {
                        $('#newPictureInput').click();

                        $('#newPictureInput').off('change').on('change', function() {
                            var new_picture = $('#newPictureInput').prop('files')[0];
                            var formData = new FormData();

                            formData.append('old_picture_file', old_picture);
                            formData.append('new_picture_file', new_picture);
                            formData.append('id', id);

                            $.ajax({
                                url: '/editpiccar',
                                type: 'POST',
                                data: formData,
                                dataType: 'json',
                                contentType: false,
                                processData: false,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    console.log('old_picture:', old_picture);
                                    console.log('new_picture:', new_picture ? new_picture.name : '');
                                    console.log(response);

                                    var new_picture_url = '/image/pictureImg/.' + response.picture_file;
                                    var carousel_item = $('[id^="carousel-item-"]').filter(function() {
                                        return $(this).attr('id') === 'carousel-item-' + item_id + '-' + a;
                                    });

                                    carousel_item.find('img').attr('src', new_picture_url);
                                    carousel_item.find('h5').text(response.picture_file);

                                    $('#newPictureInput').val('');
                                },
                                error: function(xhr, status, error) {
                                    console.log(error);
                                },
                            });
                        });
                    }
                </script>

                <script>
                    function keepfordelreal(id) {

                        var valuekeepfordel = document.getElementById("thisfordelete").textContent;
                        console.log('pic name :', valuekeepfordel);
                        /* 
                                  deletePicture( id,valuekeepfordel); */

                        // do something with the textValue variable
                        /*  alert(textValue);  */

                    }
                </script>

                <div class="modal-footer">
                    <center>
                        <input type="file" id="addPicture<?php echo $ii ?>" style="display: none;" multiple>
                        <button class="hover_transition justify-center text-white bg-blue-700 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 inline-flex text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="margin: 10px; width: 112.89px;" onclick="add('<?php echo $da_id ?>', '<?php echo $da_id ?>', '<?php echo $a ?>', '<?php echo $da_flag ?>')">Add Picture</button>
                        <button type="button" class="hover_transition justify-center text-white bg-blue-700 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 inline-flex text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="width: 112.89px;" data-dismiss="modal">Close</button>
                    </center>
                </div>

                <script>
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    function add(id, item_id, a, flag) {


                        // Open the file input dialog
                        $('#addPicture<?php echo $ii ?>').click();
                        $('#addPicture<?php echo $ii ?>').off('change').on('change', function() {
                            // Get the selected files
                            var files = $('#addPicture<?php echo $ii ?>').prop('files');
                            // Create a new FormData object
                            var formData = new FormData();
                            formData.append('da_id', id);
                            formData.append('item_id', item_id);
                            formData.append('a', a);
                            formData.append('flag', flag);
                            // Append each selected file to the FormData object
                            for (var i = 0; i < files.length; i++) {
                                formData.append('file[]', files[i]);
                            }
                            // Send an AJAX request to the server
                            // Send an AJAX request to the server
                            $.ajax({
                                url: '/addpiccar',
                                method: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    console.log('Upload success:', response);
                                    location.reload();
                                },
                                error: function(xhr, status, error) {
                                    console.log('Upload error:', error);
                                }
                            });

                        });
                    }
                </script>
            </div>
        </div>
    </div>


    </p>
    </div>
    </div>
    </div>
</body>


<script>
    setTimeout(function() {
        document.getElementById('show_image').click();
    }, 250);
</script>