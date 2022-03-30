<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id_biaya = $_REQUEST['id_biaya'];
		$jenis = $_REQUEST['jenis'];
		$biaya = $_REQUEST['biaya'];

		$sql = mysqli_query($koneksi, "UPDATE biaya SET jenis='$jenis', biaya='$biaya' WHERE id_biaya='$id_biaya'");

		if($sql == true){
			header('Location: ./admin.php?hlm=biaya');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_biaya = $_REQUEST['id_biaya'];

		$sql = mysqli_query($koneksi, "SELECT * FROM biaya WHERE id_biaya='$id_biaya'");
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
									<h2 class="title-1">Edit Data Biaya</h2><br><br></br></br>									
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="au-card chart-percent-card">
								<div class="au-card-inner">

								<form method="post" action="" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="jenis" class="col-sm-6 control-label">Jenis Kendaraan</label>
										<div class="col-sm-6">
											<input type="hidden" name="id_total" value="<?php echo $row['id_total']; ?>">
											<input type="text" class="form-control" id="jenis" value="<?php echo $row['jenis']; ?>" name="jenis" placeholder="Jenis Kendaraan" required>
										</div>
									</div>
									<div class="form-group">
										<label for="biaya" class="col-sm-6 control-label">total Jasa</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" id="biaya" value="<?php echo $row['biaya']; ?>" name="biaya" placeholder="total Jasa" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" name="submit" class="btn btn-success">Simpan</button>
											<a href="./admin.php?hlm=total" class="btn btn-danger">Batal</a>
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
