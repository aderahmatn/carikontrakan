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
            <form role="form" method="POST" action="<?= base_url('booking/submit_pesanan/') . $kontrakan->id_kontrakan . '/' . 'B' . $kode_booking ?>" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="fid_user" value="<?= $this->session->userdata('id_user') ?>">
                <input type="hidden" name="fkode_booking" value="<?= 'B' . $kode_booking ?>">
                <input type="hidden" name="fid_kontrakan" value="<?= $kontrakan->id_kontrakan ?>">
                <input type="hidden" name="ftanggal_pesanan" value="<?= date('y-m-d') ?>">

                <div class="card-body">
                    <div class="form-group">
                        <label for="fnama_kontrakan">Nama Pemesan</label>
                        <input type="text" class="form-control <?= form_error('fnama_pemilik') ? 'is-invalid' : '' ?>" id="fnama_pemesan" name="fnama_pemesan" placeholder="Nama Pemesan Kontrakan" value="<?= $this->session->userdata('nama_user') ?>" <?= !$this->session->userdata('id_user') ? 'disabled' : '' ?>>
                        <div class="invalid-feedback">
                            <?= form_error('fnama_pemesan') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ftanggal_masuk">Tanggal mulai menempati</label>
                        <input type="date" class="form-control <?= form_error('ftanggal_masuk') ? 'is-invalid' : '' ?>" id="ftanggal_masuk" name="ftanggal_masuk" placeholder="Tanggal mulai menempati" value="<?= $this->input->post('ftanggal_masuk'); ?>" min='<?= date('Y-m-d') ?>' <?= !$this->session->userdata('id_user') ? 'disabled' : '' ?>>
                        <div class="invalid-feedback">
                            <?= form_error('ftanggal_masuk') ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php if ($this->session->userdata('id_user')) { ?>
                        <button type="submit" class="btn btn-danger float-right">Submit</button>
                    <?php } else { ?>
                        <a href="<?= base_url('auth/login') ?>" class="btn btn-danger float-right">Masuk untuk memesan kontrakan</a>
                    <?php  } ?>
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