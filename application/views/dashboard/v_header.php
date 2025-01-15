<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HMS | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="<?= base_url(); ?>" class="logo">
                <span class="logo-mini"><b>HMS</b></span>
                <span class="logo-lg font-weight-normal"><b>HMS Portal</b></span>
            </a>

            <nav class="navbar navbar-static-top">

                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <?php 
                                $id_user = $this->session->userdata('id');
                                $user = $this->db->query("select * from pengguna where pengguna_id='$id_user'")->row();
                            ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs"><b><?= $user->pengguna_nama; ?></b></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle"
                                        alt="User Image">
                                    <p>
                                        <?= $user->pengguna_nama; ?>
                                        <small>Hak akses : <?= $this->session->userdata('level') ?></small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <?php 
                                        if ($this->session->userdata('level') == 'admin') {
                                            ?>
                                                <div class="pull-left">
                                                    <a href="<?= base_url().'dashboard/ganti_password' ?>"
                                                        class="btn btn-default btn-flat">Ganti Password</a>
                                                </div>
                                                <div class="pull-right">
                                                    <a href="<?= base_url().'dashboard/pengguna' ?>"
                                                        class="btn btn-default btn-flat">Hak Akses</a>
                                                </div>
                                            <?php
                                        } else {
                                            ?>
                                                <div class="text-center footer-name">
                                                    <a href="<?= base_url().'dashboard/ganti_password' ?>"
                                                        class="btn btn-default btn-flat">Ganti Password</a>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle"
                            alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <?php 
                            $id_user = $this->session->userdata('id');
                            $user = $this->db->query("select * from pengguna where pengguna_id='$id_user'")->row();
						?>
                        <p class="text-capitalize"><?= $user->pengguna_nama; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?= base_url().'dashboard' ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>DASHBOARD</span>
                        </a>
                    </li>
                    <?php 
					    if($this->session->userdata('level') == "admin"){
					?>
                    <!-- <li>
                        <a href="<?= base_url().'dashboard/jalur' ?>">
                            <i class="glyphicon glyphicon-sort"></i>
                            <span>MASTER JALUR</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a href="<?= base_url().'dashboard/absen' ?>">
                            <i class="glyphicon glyphicon-sort"></i>
                            <span>MASTER Absen</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="<?= base_url().'dashboard/karyawan' ?>">
                            <i class="glyphicon glyphicon-sort"></i>
                            <span>MASTER karyawan</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url().'dashboard/dataset' ?>">
                            <i class="glyphicon glyphicon-sort"></i>
                            <span>MASTER Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url().'dashboard/pengganti' ?>">
                            <i class="glyphicon glyphicon-sort"></i>
                            <span>MASTER Pengganti</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="<?= base_url().'dashboard/pos' ?>">
                            <i class="glyphicon glyphicon-link"></i>
                            <span>MASTER POS</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url().'dashboard/hadir' ?>">
                            <i class="glyphicon glyphicon-copy"></i>
                            <span>ABSEN</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url().'dashboard/henkaten' ?>">
                            <i class="fa fa-users"></i>
                            <span>HENKATEN</span>
                        </a>
                    </li>
                    <li>
						<a href="<?= base_url().'dashboard/skil' ?>">
							<i class="fa fa-pencil"></i>
							<span>SKILL MANAJEMEN</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url().'dashboard/mp' ?>">
							<i class="fa fa-pencil"></i>
							<span>MP MANAJEMEN</span>
						</a>
					</li> -->
                    <?php
					    } 
					?>

                    <?php 
					    if($this->session->userdata('level') == "spv" || $this->session->userdata('level') == "Foreman"){
					?>
                    <!-- <li>
                        <a href="<?= base_url().'dashboard/pos' ?>">
                            <i class="glyphicon glyphicon-link"></i>
                            <span>MASTER POS</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url().'dashboard/hadir' ?>">
                            <i class="glyphicon glyphicon-copy"></i>
                            <span>ABSEN</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url().'dashboard/henkaten' ?>">
                            <i class="fa fa-users"></i>
                            <span>HENKATEN</span>
                        </a>
                    </li>
                    <li>
						<a href="<?= base_url().'dashboard/skil' ?>">
							<i class="fa fa-pencil"></i>
							<span>SKILL MANAJEMEN</span>
						</a>
					</li> -->
					<!-- <li>
						<a href="<?= base_url().'dashboard/mp' ?>">
							<i class="fa fa-pencil"></i>
							<span>MP MANAJEMEN</span>
						</a>
					</li> -->
                    <?php
					    } 
					?>

                    <li>
						<a href="<?= base_url().'dashboard/absen' ?>">
							<i class="fa fa-pencil"></i>
							<span>MASTER Absen</span>
						</a>
					</li>

                    <li>
                        <a href="<?= base_url().'dashboard/profil' ?>">
                            <i class="fa fa-user"></i>
                            <span>PROFIL</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url().'dashboard/keluar' ?>">
                            <i class="fa fa-share"></i>
                            <span>KELUAR</span>
                        </a>
                    </li>

                </ul>
            </section>
        </aside>