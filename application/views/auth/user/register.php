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

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <img src="<?= base_url("assets/images/icon.png") ?>" width="50" height="50" class="" alt="">
            <a class="navbar-brand" href="<?= base_url() ?>">Cari Kontrakan</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Isi data dibawah ini untuk mulai mencari kontrakan</p>
                <form role="form" method="POST" action="" autocomplete="off">
                    <div class="form-group">
                        <input type="text" class="form-control <?= form_error('fnama_user') ? 'is-invalid' : '' ?>" id="fnama_user" name="fnama_user" placeholder="nama lengkap" value="<?= $this->input->post('fnama_user'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fnama_user') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control <?= form_error('fhandphone') ? 'is-invalid' : '' ?>" id="fhandphone" name="fhandphone" placeholder="nomor handphone" value="<?= $this->input->post('fhandphone'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fhandphone') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control <?= form_error('femail') ? 'is-invalid' : '' ?>" id="femail" name="femail" placeholder="email address" value="<?= $this->input->post('femail'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('femail') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control <?= form_error('fpassword') ? 'is-invalid' : '' ?>  " id="fpassword" name="fpassword" placeholder="password">
                        <div class="invalid-feedback">
                            <?= form_error('fpassword') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control  <?= form_error('fconf_password') ? 'is-invalid' : '' ?>" id="fconf_password" name="fconf_password" placeholder="konfirmasi password">
                        <div class="invalid-feedback">
                            <?= form_error('fconf_password') ?>
                        </div>
                    </div>
                    <p>Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Masuk disini</a></p>
                    <button type="submit" class="btn btn-danger btn-block">Daftar</button>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

</body>

</html>



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