<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

        $id_user = $_REQUEST['id_user'];
		$level = $_REQUEST['level'];

        if($id_user == 1){
            header("location: ./admin.php?hlm=user");
            die();
        }

		$sql = mysqli_query($koneksi, "UPDATE user SET level='$level' WHERE id_user='$id_user'");

		if($sql == true){
			header('Location: ./admin.php?hlm=user');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_user = $_REQUEST['id_user'];

		$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
		while($row = mysqli_fetch_array($sql)){

?>

	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">

						<div class="row">
							<div class="col-md-12">
								<div class="overview-wrap">
									<h2 class="title-1">Edit User</h2><br><br></br></br>									
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="au-card chart-percent-card">
								<div class="au-card-inner">

									<form method="post" action="" class="form-horizontal" role="form">
										<div class="form-group">
											<input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
											<label for="username" class="col-sm-6 control-label">Username</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" name="username" placeholder="Username" readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="nama" class="col-sm-6 control-label">Nama User</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="nama" value="<?php echo $row['nama']; ?>" name="nama" placeholder="Nama User" readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="jenis" class="col-sm-6 control-label">Jenis User</label>
											<div class="col-sm-6">
												<select name="level" class="form-control" required>
													<option value="<?php echo $row['level']?>">
													<?php
														$level = $row['level'];
														if($level == 1){
															echo 'Admin';
														} else {
															echo 'User Biasa';
														}
													?>
													</option>
													<option value="2">User Biasa</option>
													<option value="1">Admin</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="./admin.php?hlm=user" class="btn btn-danger">Batal</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	}
	}
}
?>
