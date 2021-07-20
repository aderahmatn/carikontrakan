<div class="row mx-md-4 mt-4 ">
    <div class="col-md-12">
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        Data Pemesanan Kontrakan
                        <small class="float-right">Tanggal pesanan dibuat : <?= $pesanan->tgl_pesanan ?></small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Kontrakan yang dipesan :
                    <address>
                        <strong><?= $pesanan->nama_kontrakan ?></strong><br>
                        kategori : <strong><?= $pesanan->kategori ?></strong><br>
                        harga per bulan : <strong><?= rupiah($pesanan->harga) ?></strong><br>
                        Alamat : <br>
                        <?= $pesanan->jalan ?><br>
                        <?= $pesanan->deskripsi_alamat ?><br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Pemesan :
                    <address>
                        <strong><?= $pesanan->nama_pemesan ?></strong><br>
                        Tanggal menempati : <strong><?= $pesanan->tgl_masuk ?></strong><br>
                        Handphone : <strong><?= $pesanan->handphone ?></strong><br>
                        Email : <strong><?= $pesanan->email ?></strong><br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Kode booking <?= $pesanan->kode_booking ?></b>
                    <br>
                    <b>Status:</b> <?= status($pesanan->status_pemesanan) ?><br>
                    <b>Note:</b><br>
                    <?= $pesanan->note ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode booking</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nama Rekening</th>
                                <th>Rekening Pengirim</th>
                                <th>Rekening Tujuan</th>
                                <th>Bukti Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pesanan->tgl_bayar == null) { ?>
                                <tr>
                                    <td colspan="6" class="text-center">Anda belum melakukan konfrimasi pembayaran</td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td><?= $pesanan->kode_booking ?></td>
                                    <td><?= $pesanan->tgl_bayar ?></td>
                                    <td><?= $pesanan->nama_rekening_pengirim ?></td>
                                    <td><?= $pesanan->no_rekening_pengirim ?></td>
                                    <td><?= $pesanan->rekening_tujuan ?></td>
                                    <td class="text-center">
                                        <img src="<?= base_url('./uploads/bukti_bayar/') . $pesanan->bukti_bayar ?>" alt="foto bukti bayar" width="90" class="img-thumbnail img-detail" onclick="fotoDetail('<?= $pesanan->id_pesanan ?>')">
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!--foto modal-->
                <div class="modal fade" id="fotoModal<?= $pesanan->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="<?= base_url('./uploads/bukti_bayar/') . $pesanan->bukti_bayar ?>" alt="foto bukti bayar" width="100%">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default" type="button" data-dismiss="modal"> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a href="<?= base_url('booking/mylist/') . $this->session->userdata('id_user') ?>" rel="noopener" class="btn btn-default"><i class="fas fa-chevron-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Delete Confirm -->
<script type="text/javascript">
    function fotoDetail(id) {

        $('#fotoModal' + id).modal();
    }
</script>