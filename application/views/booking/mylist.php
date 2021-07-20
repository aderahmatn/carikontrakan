<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Data List Booking Kontrakan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <?php if (!$pesanan) { ?>
                            <div class="alert alert-danger text-center alert-block">Anda belum melakukan pemesanan kontrakan</div>
                        <?php } else { ?>
                            <table id="TabelUser" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Kode Booking</th>
                                        <th>Nama User</th>
                                        <th>Handphone</th>
                                        <th>Tgl Booking</th>
                                        <th>Kontrakan</th>
                                        <th>Tgl Masuk</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pesanan as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $key->kode_booking ?></td>
                                            <td><?= $key->nama_user ?></td>
                                            <td><?= $key->handphone ?></td>
                                            <td><?= $key->tgl_pesanan ?></td>
                                            <td><?= $key->nama_kontrakan ?></td>
                                            <td><?= $key->tgl_masuk ?></td>

                                            <td><?= status($key->status_pemesanan) ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('booking/pembayaran/') . $key->kode_booking ?>"><button type="button" class="btn btn-default btn-sm" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm" <?= $key->status_pemesanan == 'menunggu pembayaran' ? '' : 'disabled' ?>>konfirmasi pembayaran</button>
                                                    </a>
                                                </div>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('booking/detail_pesanan/') . $key->id_pesanan ?>"><button type="button" class="btn btn-default btn-sm" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm">detail</button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        <?php } ?>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</section>






<!-- page script -->
<script>
    $(document).ready(function() {
        $('#TabelUser').DataTable();
        $('[data-tolltip="tooltip"]').tooltip({
            trigger: "hover"
        })

    });
</script>
<!--Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>
                        <span>Data yang dihapus tidak akan bisa dikembalikan.</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#"> Hapus</a>
            </div>
        </div>
    </div>
</div>
<!--foto modal-->
<div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>
                        <span>Data yang dihapus tidak akan bisa dikembalikan.</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#"> Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirm -->
<script type="text/javascript">
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    function fotoDetail(id) {

        $('#fotoModal' + id).modal();
    }
</script>