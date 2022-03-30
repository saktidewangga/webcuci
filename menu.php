<?php
    if( !empty( $_SESSION['id_user'] ) ){
    include "koneksi.php";
?>

    <!-- <div class="page-wrapper"> -->
		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="./admin.php">
                    <img src="images/icon/logojn.png" alt="Juwita Nusantara" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="./admin.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="./admin.php?hlm=transaksi">
                                <i class="fas fa-chart-bar"></i>Transaksi</a>
                        </li>
                        <li>
                            <a href="?hlm=laporan">
                                <i class="far fa-calendar-alt"></i>Laporan</a>
						</li>
						
						<?php
						if( $_SESSION['level'] == 1 ){
                        ?>

                        <li>
                            <a href="./admin.php?hlm=biaya">
                                <i class="fas fa-table"></i>Biaya</a>
                        </li>

                        <li>
                            <a href="./admin.php?hlm=user">
                                <i class="fas fa-desktop"></i>User</a>
                        </li>
                        
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Data</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="./admin.php?hlm=biaya">Biaya</a>
                                </li>
                                <li>
                                    <a href="./admin.php?hlm=user">User</a>
								</li>
                            </ul>
                        </li> -->
                        <?php
                        }
                        ?>
                                
                        <li>
                        <a href="logout.php">
                        <i class="zmdi zmdi-power"></i>Logout</a>
						</li>
                    </ul>
                </nav>
            </div>
        </aside>
		<!-- END MENU SIDEBAR-->
		
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form></form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/person.png" alt="Person" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['nama']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['nama']; ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
        </div>

    <!-- </div> -->

<?php
} else {
	header("Location: ./");
	die();
}
?>