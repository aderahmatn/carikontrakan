<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Laporan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">laporan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form role="form" method="POST" action="" autocomplete="off">
                    <strong>Pilih tanggal laporan pemesanan kontrakan</strong>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" class="form-control <?= form_error('ftgl_awal') ? 'is-invalid' : '' ?>" id="ftgl_awal" name="ftgl_awal" placeholder="Nama customer">
                                <div class="invalid-feedback">
                                    <?= form_error('ftgl_awal') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 text-center justify-items-center">
                            <h5 class="mt-1">s/d</h5>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" class="form-control <?= form_error('ftgl_akhir') ? 'is-invalid' : '' ?>" id="ftgl_akhir" name="ftgl_akhir" placeholder="Nama customer">
                                <div class="invalid-feedback">
                                    <?= form_error('ftgl_akhir') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <?php if ($this->session->userdata('id_owner') != null) { ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fpemilik">Pemilik Kontrakan</label>
                                    <input type="hidden" class="form-control" value="<?= $this->session->userdata('id_owner') ?>" name="fpemilik">
                                    <input type="text" class="form-control" value="<?= $this->session->userdata('nama_admin') ?>" readonly>

                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fpemilik">Pemilik Kontrakan</label>
                                    <select class="form-control <?php echo form_error('fpemilik') ? 'is-invalid' : '' ?>" id="fpemilik" name="fpemilik">
                                        <option value="" selected hidden>Pilih Pemilik</option>
                                        <option value="all">Semua Pemilik</option>
                                        <?php foreach ($pemilik as $key) : ?>
                                            <option value="<?= $key->id_owner ?>" <?= $this->input->post('fpemilik') == $key->id_owner ? 'selected' : '' ?>><?= $key->nama_owner ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= form_error('fpemilik') ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-md-1 text-center justify-items-center">
                            <h5 class="mt-1"></h5>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fstatus">Status Pemesanan</label>
                                <select class="form-control <?php echo form_error('fstatus') ? 'is-invalid' : '' ?>" id="fstatus" name="fstatus">
                                    <option value="" selected hidden>Pilih Status pemesanan</option>
                                    <option value="all">Semua status</option>
                                    <option value="menunggu konfirmasi">Menunggu Konfirmasi</option>
                                    <option value="terkonfirmasi">Terkonfirmasi</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('fstatus') ?>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Submit</button>

            </div>
            </form>

        </div>
        <?php if ($result != null) { ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan transaksi tanggal <?= $tgl1 . " sampai " . $tgl2 ?></h3>
                    <a href="<?= base_url('pdf/report/') . $tgl1 . "/" . $tgl2 . "/" . $owner . "/" . $status ?>" class="btn btn-primary btn-sm float-right" target="_blank">Export PDF</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table id="customer" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Tgl Pesanan</th>
                                        <th>Tgl Menempati</th>
                                        <th>Kontrakan</th>
                                        <th>Nama Pemilik</th>
                                        <th>Status</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $key->nama_user ?></td>
                                            <td><?= $key->tgl_pesanan ?></td>
                                            <td><?= $key->tgl_masuk ?></td>
                                            <td><?= $key->nama_kontrakan ?></td>
                                            <td><?= $key->nama_owner ?></td>
                                            <td><?= $key->status_pemesanan ?></td>
                                            <td><?= rupiah($key->harga) ?></td>

                                        </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <td colspan="7" class="text-center"><strong>Total Pendapatan</strong></td>
                                        <td><?= rupiah($total) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>