<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Cari Kontrakan | <?= ucfirst($this->uri->segment(1)) ?></title>

    <link rel="icon" href="<?= base_url("assets/images/icon.png") ?>" type="image/jpeg">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css") ?>">
    <!-- jQuery -->
    <script src="<?= base_url("assets/plugins/jquery/jquery.min.js") ?>"></script>
    <!-- DataTables -->
    <script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
    <script src="<?= base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js") ?>"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/dist/css/adminlte.min.css") ?>">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/sweetalert2/dark.css' ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/toastr/toastr.min.css' ?>">
    <!-- Custom Style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/custom.css' ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-red">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-danger  elevation-4 ">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>" class="brand-link navbar-red ">
                <img src="<?= base_url("assets/images/icon.png") ?>" alt="Cari Kontrakan Logo" class="brand-image">
                <span class="brand-text text-white font-weight-bold">Cari Kontrakan</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3  d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/images/user.jpg') ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url('profile') ?>" class="d-block"><?= ucwords($this->session->userdata('nama_user')) ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?><?= $this->uri->segment(1) == '' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('profile') ?>" class="nav-link <?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?><?= $this->uri->segment(1) == '' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile Saya
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('iklansaya') ?>" class="nav-link <?= $this->uri->segment(1) == 'iklansaya' ? 'active' : '' ?><?= $this->uri->segment(1) == '' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>
                                    Iklan Kontrakan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('favorite') ?>" class="nav-link <?= $this->uri->segment(1) == 'favorite' ? 'active' : '' ?><?= $this->uri->segment(1) == '' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-city"></i>
                                <p>
                                    Kontrakan Favorite
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <hr>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Kembali ke Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-logout">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Keluar
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <?= $contents ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- /.DISINI KONTEN UTAMA -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?= date('Y') ?> Cari Kontrakan by <a href="https://gisaka.net/" target="_blank" class="text-muted">Gisaka</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->


    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/dist/js/adminlte.min.js") ?>"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url() . 'assets/plugins/toastr/toastr.min.js' ?>"></script>
</body>

</html>

<!-- modal-logout -->
<div class="modal fade" id="modal-logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <b class="h4">Apakah anda yakin ingin logout?</b>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Batal</button>
                <a type="button" class="btn  btn-danger" href="<?= site_url('auth/logout_admin') ?>">Logout</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Alert Config -->
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000
        });
        <?php if ($this->session->flashdata('success')) { ?>
            Toast.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('success'); ?>'
            });
        <?php } else if ($this->session->flashdata('error')) {  ?>
            Toast.fire({
                icon: 'error',
                title: '<?= $this->session->flashdata('error'); ?>'
            });
        <?php } else if ($this->session->flashdata('warning')) {  ?>
            Toast.fire({
                icon: 'warning',
                title: '<?= $this->session->flashdata('warning'); ?>'
            });
        <?php } else if ($this->session->flashdata('info')) {  ?>
            Toast.fire({
                icon: 'info',
                title: '<?= $this->session->flashdata('info'); ?>'
            });
        <?php } ?>
    });
</script>