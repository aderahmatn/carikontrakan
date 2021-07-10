<div class="row mx-md-4 mt-4 bg-red text-center pt-3">
    <div class="col-12 ">
        <h2 class="mb-3"><?= ucwords($kontrakan->nama_kontrakan) ?></h2>
    </div>
</div>
<div class="row mx-md-4 mt-4">
    <div class="col-md-6 ">
        <img src="<?= base_url('./uploads/thumbnail/') . $kontrakan->thumbnail ?>" alt="foto thumbnail" class="img-booking mb-4">
    </div>
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><strong>Input data untuk melakukan pemesanan kontrakan</strong></div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="<?= base_url('booking/submit_pesanan/') . $kontrakan->id_kontrakan ?>" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="fid_user" value="<?= $this->session->userdata('id_user') ?>">
                <input type="hidden" name="fid_kontrakan" value="<?= $kontrakan->id_kontrakan ?>">
                <input type="hidden" name="ftanggal_pesanan" value="<?= date('y-m-d') ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="fnama_kontrakan">Nama Lengkap</label>
                        <input type="text" class="form-control <?= form_error('fnama_pemilik') ? 'is-invalid' : '' ?>" id="fnama_pemilik" name="fnama_pemilik" placeholder="Nama pemiliik kontrakan" value="<?= $this->session->userdata('nama_user') ?>" disabled>
                        <div class="invalid-feedback">
                            <?= form_error('fnama_pemilik') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ftanggal_masuk">Tanggal mulai menempati</label>
                        <input type="date" class="form-control <?= form_error('ftanggal_masuk') ? 'is-invalid' : '' ?>" id="ftanggal_masuk" name="ftanggal_masuk" placeholder="Tanggal mulai menempati" value="<?= $this->input->post('ftanggal_masuk'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('ftanggal_masuk') ?>
                        </div>
                    </div>
                    <hr>
                    <strong>Silahkan melakukan pembayaran DP ke rekening dibawah ini, untuk memesan kontrakan ini</strong>
                    <div class="row mt-3 p-2 border d-flex align-items-center">
                        <div class="col-md-6"><strong>Jumlah bayar : </strong></div>
                        <div class="col-md-6 ">
                            <p class="m-0"><?= rupiah($kontrakan->harga) ?></p>
                        </div>
                    </div>
                    <div class="row mt-3 p-2 border d-flex align-items-center">
                        <div class="col-md-6"><img src="<?= base_url('assets/images/bank/bank-bca.png') ?>" alt="bca" width="150"></div>
                        <div class="col-md-6 ">
                            <p class="m-0">A/N Cari Kontrakan</p>
                            <p class="m-0">2132 3231 9038 1231</p>
                        </div>
                    </div>

                    <div class="row my-3 p-2 border d-flex align-items-center">
                        <div class="col-md-6"><img src="<?= base_url('assets/images/bank/bank-mandiri.png') ?>" alt="mandiri" width="150"></div>
                        <div class="col-md-6">
                            <p class="m-0">A/N Cari Kontrakan</p>
                            <p class="m-0">2132 3231 9038 1231</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ffoto">Bukti Transfer</label>
                        <input type="file" class="pt-1 form-control <?= form_error('ffoto') ? 'is-invalid' : '' ?>" id="ffoto" name="ffoto" value="<?= $this->input->post('ffoto'); ?>">
                        <small class="text-muted">*Format file harus <i>jpg/png/gif/jpeg</i>, maksimal <i>file size 2Mb</i></small>
                        <div class="invalid-feedback">
                            <?= form_error('ffoto') ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row mx-md-4 mt-4 bg-red text-center pt-3">
    <div class="col-12 ">
        <h2 class="mb-3"><?= ucwords('detail kontrakan') ?></h2>
    </div>
</div>
<div class="row mx-md-4 mt-4">
    <div class="col-md-6 ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" colspan="2">
                        <h1>Data Kontrakan</h1>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Nama Kontrakan</th>
                    <td><?= $kontrakan->nama_kontrakan ?></td>
                </tr>
                <tr>
                    <th scope="row">Kategori</th>
                    <td><?= $kontrakan->kategori ?></td>
                </tr>
                <tr>
                    <th scope="row">Harga per bulan</th>
                    <td><?= rupiah($kontrakan->harga) ?></td>
                </tr>
                <tr>
                    <th scope="row">Kamar Tersedia</th>
                    <td> <?= $kontrakan->kamar_tersedia ?></td>
                </tr>
                <tr>
                    <th scope="row">Deskripsi Kontrakan</th>
                    <td> <?= $kontrakan->deskripsi ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" colspan="2">
                        <h1>Alamat Kontrakan</h1>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Nama Jalan</th>
                    <td><?= $kontrakan->jalan ?></td>
                </tr>
                <tr>
                    <th scope="row">Kecamatan</th>
                    <td><?= $kontrakan->kecamatan ?></td>
                </tr>
                <tr>
                    <th scope="row">Detail Alamat</th>
                    <td>Rp. <?= $kontrakan->deskripsi_alamat ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row mx-md-4 mt-4">
    <h1 class="mb-2 ml-3">Peta Lokasi Kontrakan</h1>
    <div id='mapid' style="width: 100%; height: 300px;" class="my-3 mx-3"></div>

</div>

<script type="text/javascript">
    // tangerang
    // -6.193935834961845, 106.49757328749318
    var startlat = '<?php echo $kontrakan->lat ?>'
    var startlon = '<?php echo $kontrakan->lon ?>'

    var options = {
        center: [startlat, startlon],
        zoom: 12
    }


    var map = L.map('mapid', options);
    var nzoom = 12;

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: 'Cari Kontrakan'
    }).addTo(map);
    var myMarker = L.marker([startlat, startlon], {
        title: "Coordinates",
        alt: "Coordinates",
        draggable: false
    }).addTo(map).on('click', function() {
        var lat = myMarker.getLatLng().lat.toFixed(8);
        var lon = myMarker.getLatLng().lng.toFixed(8);
        var czoom = map.getZoom();
        if (czoom < 18) {
            nzoom = czoom + 2;
        }
        if (nzoom > 18) {
            nzoom = 18;
        }
        if (czoom != 18) {
            map.setView([lat, lon], nzoom);
        } else {
            map.setView([lat, lon]);
        }
        myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
    });
</script>