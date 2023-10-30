<?php


use Illuminate\Support\Facades\DB;
?>




<!DOCTYPE html>
<html lang="en">

<head>

  <!-- --------------------------------------------------->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>

  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <!-- datatable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"><!-- datatablecss-->
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> <!-- datatablecore -->

  <title>backup</title>

  <!-- css---------------------------------------------------------------- -->
  <link rel="stylesheet" href="/css/export.css">
  <link href="/css/addalerts.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/modalcar.css"> <!-- slide and modal to show picture  -->

  <!-- -------------------------------------------------------------- -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script><!-- clear -->


  <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>



  <!-- Start Table -->
  <div class="container edit_table">
    <h3 class="mt-4 edit_table">use test toshow and use/editpiccar in test to realtime change</h3>
    <hr>
    <table id="edit_table" class="table table-striped edit_table">
      <thead>
        <th>da_id</th>
        <th>picture</th>
      </thead>

      <tbody>
        <?php
        $i = 0;
        if (!empty($tb_durable_articles)) {
          foreach ($tb_durable_articles as $row) {
            $i++
        ?>
            <tr>
              <td><?php echo $row->da_id ?></td>



              <td>
                <button type="submit" data-toggle="modal" data-target="#exampleModal<?php echo $i ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                    <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                    <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                  </svg>
                </button>
              </td>
              <div class="modal fade" id="exampleModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog " role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><?php echo $row->da_id ?></h5>
                      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <script>
                        $(document).ready(function() {
                          $('.close').click(function() {
                            $('#exampleModal<?php echo $i ?>').modal('hide');
                          });
                        });
                      </script> -->
                    </div>
                    <!-- adddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd now not -->
                    <div class="modal-body">
                                            <div id="carouselExampleIndicators<?php echo $i ?>" class="carousel slide" data-interval="false">
                                                <div class="carousel-inner">
                                                    <?php
                                                    $x = 0;
                                                    $a = 0;
                                                    $data_pic = DB::table($prefix.'pictures')->where('da_id', '=', $row->da_id)->get();
                                                    $num_rows = count($data_pic);

                                                    if ($num_rows != 0) {
                                                        foreach ($data_pic as $row1) {
                                                            $a++;
                                                            $activeClass = ($x == 0) ? 'active' : '';
                                                    ?>
                                                            <div class="carousel-item <?php echo $activeClass; ?>" id="carousel-item-<?php echo $row->da_id ?>-<?php echo $a ?>">
                                                                <center>
                                                                    <h5 hidden class="modal-title" id="exampleModalLabel555"><?php echo $row1->picture_file ?></h5>

                                                                    <img src="/image/pictureImg/.<?php echo $row1->picture_file ?>" class="d-block w-100" alt="Picture <?php echo ($x + 1); ?>">
                                                                    <!-- del button -->
                                                                    <button type="button" onclick="confirmDelete('<?php echo $row1->da_id ?>', '<?php echo $row1->picture_file ?>')" class="btn w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 delete-button">Delete</button>
                                                                   
              


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
}

.confirmation-box button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.confirmation-box .btn-confirm {
  background-color: green;
  color: white;
}

.confirmation-box .btn-cancel {
  background-color: red;
  color: white;
}


  </style>
<script>function confirmDelete(id, file) {
  var $confirmationDialog = $('<div class="confirmation-dialog">' +
                                '<div class="confirmation-overlay"></div>' +
                                '<div class="confirmation-box">' +
                                  '<p>Are you sure you want to delete this picture?</p>' +
                                  '<div class="buttons">' +
                                    '<button class="btn-confirm">Yes</button>' +
                                    '<button class="btn-cancel">No</button>' +
                                  '</div>' +
                                '</div>' +
                              '</div>');
  $('body').append($confirmationDialog);
  
  $('.btn-confirm').click(function() {
    deletePicture(id, file);
    $confirmationDialog.remove();
  });
  
  $('.btn-cancel').click(function() {
    $confirmationDialog.remove();
  });
}



  </script>
                                                                                  <!-- edit button -->
                                                                    <!-- ตัวไส่ไฟล์เฉยๆไม่มีไรอันนี้ -->
                                                                    <input type="file" id="newPictureInput" style="display: none;">
                                                                    <!--  //อันนี้คืออะไร -->
                                                                    <!--  //ไว้ส่ง ชื่อไฟจะเปลี่ยน ไอดีครุภภัณใช้เทียบในดาต้าเบส carousel-item-<?php echo $row1->da_id ?>-<?php echo $a ?> อีก2ตัวหลังไว้ระบุสไล้ที่มันอยู่ -->
                                                                    <button onclick="editPicture('<?php echo $row1->picture_file ?>', '<?php echo $row1->da_id ?>', '<?php echo $row1->da_id ?>', '<?php echo $a ?>')" type="button" class="btn w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                                                                </center>
                                                            </div>

                                                        <?php
                                                            $x++; // Increment $x for each picture

                                                        }
                                                    } else {
                                                        $activeClass = ($x == 0) ? 'active' : ''; ?>
                            
                                                        <div class="carousel-item <?php echo $activeClass; ?>" id="carousel-item-<?php echo $row->da_id ?>-<?php echo $a ?>">
                            
                                                          <center>
                                                            <h5  class="modal-title" id="exampleModalLabel555"> ไม่มีรูปในขณะนี้โปรดเพิ่มรูป </h5>
                                                            <h5 hidden class="modal-title" id="exampleModalLabel555"></h5>
                            
                                                            <img src="/image/pictureImg/." class="d-block w-100" alt="Picture <?php echo ($x + 1); ?>">
                                                            <!-- del button -->
                                                          </center>
                                                        </div>
                                                      <?php
                                                      }
                                                      ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $i ?>" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $i ?>" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- delete  -->
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
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Remove the carousel item from the DOM
            var carouselItems = document.querySelectorAll('.carousel-item ');
            for (var i = 0; i < carouselItems.length; i++) {
                if (carouselItems[i].classList.contains('active')) {
                    carouselItems[i].remove(); // Remove the currently active carousel item from the DOM
                    // Add the active class to the next carousel item, if there is one
                    var nextElement = carouselItems[i+1];
                    if (nextElement) {
                        nextElement.classList.add('active');
                    } else {
                        // If there is no next carousel item, add the active class to the first carousel item
                        var firstElement = document.querySelector('.carousel-item');
                        firstElement.classList.add('active');
                    }
                    break;
                }
            }
        }
    };
    xhr.open('POST', '/delpiccar');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.send('da_id=' + encodeURIComponent(da_id) + '&picture_file=' + encodeURIComponent(picture_file));
}

                                        </script>
                    <div class="modal-footer">
                      <center>
                        <input type="file" id="addPicture<?php echo $i ?>" style="display: none;" multiple>
                        <button class="btn w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="add('<?php echo $row->da_id ?>', '<?php echo $row->da_id ?>', '<?php echo $a ?>', '<?php echo $row->da_flag ?>')">Add Picture</button>
                        <button type="button" class="btn w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-dismiss="modal">Close</button>
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
                        $('#addPicture<?php echo $i ?>').click();
                        $('#addPicture<?php echo $i ?>').off('change').on('change', function() {
                          // Get the selected files
                          var files = $('#addPicture<?php echo $i ?>').prop('files');
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
                          $.ajax({
                            url: '/addpiccar',
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
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
            </tr>
        <?php }
        } ?>

      </tbody>
    </table>
  </div>
  <!-- End -->

  <!-- GEO -->

  <!-- JavaScript to delete carousel items -->


  <body>

    <script>
      $(document).ready(function() {
        $('#edit_table').DataTable();
      });
    </script>

  </body>
  <!-- GEO -->

</html>