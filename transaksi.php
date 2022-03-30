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
				include 'transaksi_baru.php';
				break;
			case 'edit':
				include 'transaksi_edit.php';
				break;
			case 'hapus':
				include 'transaksi_hapus.php';
				break;
			case 'cetak':
				include 'cetak_nota.php';
				break;
		}
	} else {

		echo '
				<div class="page-container">
					<div class="main-content">
						<div class="section__content section__content--p30">
							<div class="container-fluid">

								<div class="row">
                            		<div class="col-md-12">
                               			<div class="overview-wrap">
                                    	<h2 class="title-1">Daftar Transaksi</h2>
											<a href="./admin.php?hlm=transaksi&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Transaksi</a>
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
														<th width="10%">No. Nota</th>
														<th width="20%">Nama Pelanggan</th>
														<th width="10%">Jenis</th>
														<th width="10%">Total Bayar</th>
														<th width="10%">Tanggal</th>
														<th width="20%">Tindakan</th>
													</tr>
												</thead>
												
												<tbody>';
													//script menampilkan data dari database
													$sql = mysqli_query($koneksi, "SELECT * FROM transaksi");
														if(mysqli_num_rows($sql) > 0){
														$no = 0;
														while($row = mysqli_fetch_array($sql)){
														$no++;
													echo '

													<tr>
														<td>'.$no.'</td>
														<td>'.$row['no_nota'].'</td>
														<td>'.$row['nama'].'</td>
														<td>'.$row['jenis'].'</td>
														<td>RP. '.number_format($row['total']).'</td>
														<td>'.date("d M Y", strtotime($row['tanggal'])).'</td>
														<td>

														<script type="text/javascript" language="JavaScript">
															function konfirmasi(){
																tanya = confirm("Anda yakin akan menghapus data ini?");
																if (tanya == true) return true;
																else return false;
															}
														</script>

														<a href="?hlm=cetak&id_transaksi='.$row['id_transaksi'].'" class="btn btn-info btn-s" target="_blank">Cetak Nota</a>
														<a href="?hlm=transaksi&aksi=edit&id_transaksi='.$row['id_transaksi'].'" class="btn btn-warning btn-s">Edit</a>
														<a href="?hlm=transaksi&aksi=hapus&submit=yes&id_transaksi='.$row['id_transaksi'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

														</td>
													</tr>';
															}
														} else {
															echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=transaksi&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';
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
