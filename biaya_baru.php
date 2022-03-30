<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$jenis = $_REQUEST['jenis'];
		$biaya = $_REQUEST['biaya'];

		$sql = mysqli_query($koneksi, "INSERT INTO biaya(jenis, biaya) VALUES('$jenis', '$biaya')");

		if($sql == true){
			header('Location: ./admin.php?hlm=biaya');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">

						<div class="row">
							<div class="col-md-12">
								<div class="overview-wrap">
									<h2 class="title-1">Tambah Data Biaya</h2><br><br></br></br>									
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="au-card chart-percent-card">
								<div class="au-card-inner">

									<form method="post" action="" class="form-horizontal" role="form">
										<div class="form-group">
											<label for="jenis" class="col-sm-4 control-label">Jenis</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis" required>
											</div>
										</div>
										<div class="form-group">
											<label for="biaya" class="col-sm-4 control-label">Biaya Jasa</label>
											<div class="col-sm-6">
												<input type="number" class="form-control" id="biaya" name="biaya" placeholder="Biaya Jasa" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
												<a href="./admin.php?hlm=biaya" class="btn btn-danger">Batal</a>
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
?>
