<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah User </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('users') ?>" class="text-red">Master User </a></li>
                    <li class="breadcrumb-item active">Tambah User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Isi data dibawah ini menambahkan user</p>
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
                    <button type="submit" class="btn btn-danger btn-block">Daftarkan User</button>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.card -->
</div>