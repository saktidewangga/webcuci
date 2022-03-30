<?php

    //memulai session
    session_start();

    //jika ada session, maka akan diarahkan ke halaman dashboard admin
    if(isset($_SESSION['id_user'])){

        //mengarahkan ke halaman dashboard admin
        header("Location: ./admin.php");
        die();
    }

    //mengincludekan koneksi database
    include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Jasa Cuci</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">

		<?php

		//apabila tombol login di klik akan menjalankan skript dibawah ini
		if( isset( $_REQUEST['login'] ) ){

			//mendeklarasikan data yang akan dimasukkan ke dalam database
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];

			//script query ke insert data ke dalam database
			$sql = mysqli_query($koneksi, "SELECT id_user, username, nama, level FROM user WHERE username='$username' AND password=MD5('$password')");

			//jika skript query benar maka akan membuat session
			if( $sql){
				list($id_user, $username, $nama, $level) = mysqli_fetch_array($sql);

				//membuat session
				$_SESSION['id_user'] = $id_user;
				$_SESSION['username'] = $username;
				$_SESSION['nama'] = $nama;
				$_SESSION['level'] = $level;

				header("Location: ./admin.php");
				die();
			} else {

				$_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
				header('Location: ./');
				die();
			}

		} else {
		?>
	
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

				<?php
				if(isset($_SESSION['err'])){
					$err = $_SESSION['err'];
					echo '<div class="alert alert-warning alert-message">'.$err.'</div>';
					unset($_SESSION['err']);
				}
				?>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

				</form>
				<?php
				}
				?>
				<!-- <span class="login100-form-title p-b-0">
					Cucian Juwita Nusantara
				</span> -->
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>