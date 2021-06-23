<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Iklan Kontrakan </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('iklansaya') ?>" class="text-red">Iklan Kontrakan Saya</a></li>
                    <li class="breadcrumb-item active">Tambah Iklan Kontrakan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Input data Kontrakan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fnama_paket">Nama Paket</label>
                                <input type="text" class="form-control <?= form_error('fnama_paket') ? 'is-invalid' : '' ?>" id="fnama_paket" name="fnama_paket" placeholder="Enter Nama Paket" value="<?= $this->input->post('fnama_paket'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fnama_paket') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fkategori">Kategori</label>
                                <select class="form-control <?php echo form_error('fkategori') ? 'is-invalid' : '' ?>" id="fkategori" name="fkategori">
                                    <option hidden value="" selected>Pilih Kategori</option>
                                    <?php foreach ($kategori as $key) : ?>
                                        <option value="<?= $key->id_kategori ?>" <?= $this->input->post('fkategori') == $key->id_kategori ? 'selected' : '' ?>><?= $key->nama_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('fkategori') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fharga">Harga Paket</label>
                                <input type="text" class="form-control <?= form_error('fharga') ? 'is-invalid' : '' ?>" id="fharga" name="fharga" placeholder="Enter Harga Paket" value="<?= $this->input->post('fharga'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fharga') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ffoto">Foto Paket</label>
                                <input type="file" class="pt-1 form-control <?= form_error('ffoto') ? 'is-invalid' : '' ?>" id="ffoto" name="ffoto" placeholder="Enter Harga Paket" value="<?= $this->input->post('ffoto'); ?>" required>
                                <small class="text-muted">*Format file harus <i>jpg/png/gif/jpeg</i>, maksimal <i>file size 2Mb</i></small>
                                <div class="invalid-feedback">
                                    <?= form_error('ffoto') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fdeskripsi">Deskripsi</label>
                                <textarea name="fdeskripsi" id="fdeskripsi" class="form-control <?= form_error('fdeskripsi') ? 'is-invalid' : '' ?>" cols="10" rows="5" placeholder="Enter Deskripsi Paket"><?= $this->input->post('fdeskripsi'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('fdeskripsi') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">map</div>
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger float-right">Simpan</button>
                    <a href="<?= base_url('iklansaya') ?>" class="btn btn-secondary float-left">Batal</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>