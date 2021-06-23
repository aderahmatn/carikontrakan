<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Cari Kontrakan <?= $this->uri->segment(1) == '' ? '' :  ' | ' . $this->uri->segment(1)   ?></title>

    <link rel="icon" href="<?= base_url("assets/images/icon.png") ?>" type="image/jpeg">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/dist/css/adminlte.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/dist/css/style.css") ?>">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/sweetalert2/dark.css' ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/toastr/toastr.min.css' ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() . 'assets/plugins/jquery/jquery.min.js' ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() . 'assets/plugins/bootstrap/js/bootstrap.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() . 'assets/dist/js/adminlte.min.js' ?>"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url() . 'assets/plugins/toastr/toastr.min.js' ?>"></script>
</head>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-white justify-content-between ">
            <div class="container-fluid m-2">
                <div>
                    <img src="<?= base_url("assets/images/icon.png") ?>" width="30" height="30" class="d-inline-block align-top" alt="">
                    <a class="navbar-brand" href="<?= base_url() ?>">Cari Kontrakan</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav float-md-right">
                        <li class="nav-item <?= $this->uri->segment(1) == '' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url() ?>">Beranda <span class="sr-only"></a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(1) == 'tentang_saya' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('tentang_saya') ?>">Kontrakan</a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(1) == 'paket_mua' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('auth/register') ?>">Daftar</a>
                        </li>
                        <li class="nav-item border mr-4 ml-2 border-light my-1 rounded"></li>

                        <?php if (!$this->session->userdata('nama_user')) { ?>
                            <li class="nav-item">
                                <a class="btn btn-danger <?= $this->uri->segment(2) == 'login' ? 'active' : '' ?>" href="<?= base_url('auth/login') ?>">Masuk</a>
                            <?php } else { ?>
                            <li class="nav-item dropdown ml-n3">
                                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                                    <i class="fas fa-user-circle mr-3 ml-n2 fa-lg"></i><?= ucfirst($this->session->userdata('nama_user')) ?>
                                </a>
                                <div class="dropdown-menu bg-red">
                                    <a href="<?= base_url('dashboard') ?>" class="dropdown-item text-white">
                                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item text-white" data-toggle="modal" data-target="#modal-logout">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                                    </a>
                                </div>
                            </li>

                        <?php } ?>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <?= $contents ?>
        </div>
        <div class="text-center pt-3 pb-0 border-top mt-5">
            <p class="text-secondary text-sm">© 2021 carikontrakan.com, All rights reserved</p>
        </div>
    </div>
</body>

</html>

<!-- modal-logout -->
<div class="modal fade" id="modal-logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <b class="h4">Apakah anda yakin ingin keluar?</b>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn  btn-secondary bg-white" data-dismiss="modal">Batal</button>
                <a type="button" class="btn  btn-danger" href="<?= site_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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