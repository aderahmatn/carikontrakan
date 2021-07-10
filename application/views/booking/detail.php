<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                Detail Booking Kontrakan
                <small class="float-right">Tanggal Transaksi: <?= $pesanan->tgl_pesanan ?></small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            Data Pemesan
            <address>
                <strong><?= ucwords($pesanan->nama_user) ?></strong><br>
                Phone: <?= $pesanan->handphone ?><br>
                Email: <?= $pesanan->email ?>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Tanggal Mulai Menempati :</b> <?= $pesanan->tgl_masuk ?><br>
            <b>Nama kontrakan :</b> <a href="<?= base_url('iklansaya/detail/') . $pesanan->id_kontrakan ?>"><?= ucwords($pesanan->nama_kontrakan) ?></a><br>
            <b>Total Pembayaran :</b> <?= rupiah($pesanan->harga) ?>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


    <div class="row mb-4">
        <b>Bukti Pembayaran</b>
        <div class="col-md-12">
            <img src="<?= base_url('./uploads/bukti_bayar/') . $pesanan->bukti_bayar ?>" alt="foto bukti bayar" width="30%" class="img-thumbnail img-detail">
        </div>
    </div>

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-12" id="note">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi penolakan</label>
                <textarea class="form-control" rows="3" id="noteText"></textarea>
            </div>
            <button onclick="rejectConfirmationClose()" class="btn btn-default float-left mr-3"> Batal</button>
            <button onclick="submitReject('<?= base_url('booking/update/') . $pesanan->id_pesanan . '/ditolak/' ?>', '<?= $pesanan->id_kontrakan . '/' . $pesanan->kamar_tersedia ?>')" class="btn btn-danger float-right mr-3"><i class="fas fa-times"></i> Tolak</button>
        </div>
        <div class="col-12" id="footerButton">
            <a href="<?= base_url('booking/list') ?>" class="btn btn-default"><i class="fas fa-chevron-left"></i> Kembali</a>
            <?php if ($pesanan->status_pemesanan == "menunggu konfirmasi") : ?>
                <a href="<?= base_url('booking/update/') . $pesanan->id_pesanan . '/terkonfirmasi/pesanan terkonfirmasi/' . $pesanan->id_kontrakan . '/' . ($pesanan->kamar_tersedia - 1) ?>" class="btn btn-success float-right"><i class="fas fa-check"></i> Konfirmasi</a>
                <button onclick="rejectConfirmation()" class="btn btn-danger float-right mr-3"><i class="fas fa-times"></i> Tolak</button>
            <?php endif ?>

        </div>
    </div>
</div>



<!-- Delete Confirm -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#note').hide()
    });

    function rejectConfirmation() {
        $('#note').show()
        $('#footerButton').hide()
    }

    function rejectConfirmationClose() {
        $('#note').hide()
        $('#footerButton').show()
    }

    function submitReject(url, kontrakan) {
        var note = $('#noteText').val()
        location.href = url + note + '/' + kontrakan;
    }
</script>