<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'user_baru.php';
				break;
			case 'edit':
				include 'user_edit.php';
				break;
			case 'hapus':
				include 'user_hapus.php';
				break;
		}
	} else {

		echo '
		<div class="page-wrapper">
			<div class="page-container">
				<div class="main-content">
					<div class="section__content section__content--p30">
						<div class="container-fluid">

						<div class="row">
							<div class="col-md-12">
								<div class="overview-wrap">
								<h2 class="title-1">Data User</h2>
								<a href="./admin.php?hlm=user&aksi=baru" class="btn btn-success btn-s pull-right">Tambah User</a>
								</div>
							</div>
						</div>

						<div class="row">
								<div class="col-lg-12">
								<h2 class="title-1 m-b-25"></h2>
									<div class="table-responsive table--no-card m-b-40">
										<table class="table table-borderless table-striped table-earning">
											<thead>
												<tr class="info">
													<th width="5%">No</th>
													<th width="22%">Username</th>
													<th width="33%">Nama</th>
													<th width="20%">Level</th>
													<th width="20%">Tindakan</th>
												</tr>
											</thead>
										
										<tbody>';

										//script menampilkan data dari database
										$sql = mysqli_query($koneksi, "SELECT * FROM user");
										if(mysqli_num_rows($sql) > 0){
											$no = 0;

											while($row = mysqli_fetch_array($sql)){
												$no++;
											echo '

				  							 <tr>
												<td>'.$no.'</td>
												<td>'.$row['username'].'</td>
												<td>'.$row['nama'].'</td>
												<td>';

												if($row['level'] == 1){
													echo 'Admin';
												} else {
													echo 'User Biasa';
												}

												echo'</td>
												<td>

												<script type="text/javascript" language="JavaScript">
													function konfirmasi(){
														tanya = confirm("Anda yakin akan menghapus user ini?");
														if (tanya == true) return true;
														else return false;
													}
												</script>

												<a href="?hlm=user&aksi=edit&id_user='.$row['id_user'].'" class="btn btn-warning btn-s">Edit</a>
												<a href="?hlm=user&aksi=hapus&submit=yes&id_user='.$row['id_user'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

												</td>
											</tr>';
												}
											} else {
												echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=user&aksi=baru">Tambah user baru</a></u> </p></center></td></tr>';
											}
											echo '
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>';
	}
}
?>
