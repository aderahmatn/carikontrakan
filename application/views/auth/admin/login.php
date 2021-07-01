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

<body class="hold-transition login-page ">

    <div class="login-box">
        <div class="login-logo">
            <img src="<?= base_url("assets/images/icon.png") ?>" width="50" height="50" class="" alt="">
            <a class="navbar-brand" href="<?= base_url() ?>">Cari Kontrakan</a>
        </div>
        <!-- /.login-logo -->
        <div class="card ">
            <div class="card-body login-card-body ">
                <div class="alert alert-warning text-center text-red" role="alert">
                    <i class="fas fa-exclamation-triangle fa-2x mb-2 "></i>
                    <br />
                    <strong>AREA KHUSUS ADMINISTRATOR</strong>
                </div>
                <form action="<?= base_url('auth/process_login_admin') ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <input type="email" class="form-control" id="femail" name="femail" placeholder="email address" require>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control " id="fpassword" name="fpassword" placeholder="Password" require>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Masuk</button>
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