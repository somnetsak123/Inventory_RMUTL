



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="icon" type="image/x-icon" href="icons/la.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/css/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link href="/css/edi.css" rel="stylesheet">
<link href="/css/ediV2.css" rel="stylesheet">
<link href="/css/addalerts.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- JS -->
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


</head>
<body>
<!-- เมื่อกดเมนูจะมาแสดงตรงนี้ ตัวตันอยู่ที่ menu_bar_user.blade.php -->
@yield('list-data') 
<!--  -->
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-150" method="post" action="/login_db">
				@csrf
					<?php if(isset($_SESSION['error'])) : ?>
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <span class="font-medium">


                                <?php
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']); 
                                ?>

                            </span> 

                        </div>
                    <?php endif ?>    
					<span class="login100-form-title" style="font-family: Kanit;">
						Sign In
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="font-family: Kanit;" type="text" name="user" placeholder="Username">
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="font-family: Kanit;" type="password" name="pass" placeholder="Password">
					</div>

					<div class="text-right p-t-13 p-b-23">
			
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="flex-col-c p-b-40">
		

	
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="/js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/js/popper.js"></script>
	<script src="/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/js/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/js/moment.min.js"></script>
	<script src="/js/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/js/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/js/main.js"></script>

</body>
</html>