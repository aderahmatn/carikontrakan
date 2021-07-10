<div class="row mx-md-4 mt-4  text-center pt-3">
    <div class="col-md-6 ">
        <div class="bg-red p-3 mb-3">
            <h3 class="py-3 text-center">Gak perlu ribet, cukup masukan lokasi kontrakan yang kamu mau</h3>
            <div class="container text-center">
                <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">

                    <select name="fkecamatan" id="fkecamatan" class="form-control form-control-lg shadow select-custom">
                        <option hidden value="">Pilih area</option>
                        <?php foreach ($kecamatan as $key) : ?>
                            <option value="<?= $key->id_kecamatan ?>" <?= $key->id_kecamatan == $kecamatanDipilih ? 'selected' : '' ?>><?= ucwords($key->kecamatan) ?></option>
                        <?php endforeach ?>
                    </select>
                    <button class="btn btn-default btn-lg my-4 shadow rounded" type="submit">Cari Kontrakan</button>
                </form>
            </div>
        </div>
        <ul class="list-group">
            <?php foreach ($kontrakan as $key) : ?>
                <div class="card bg-light ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="<?= base_url('./uploads/thumbnail/') . $key->thumbnail ?>" alt="thumbnail-kontrakan" class="img-list img-thumbnail">
                            </div>
                            <div class="col-md-7">
                                <h2><b><?= ucwords($key->nama_kontrakan) ?></b></h2>
                                <p class="text-muted text-sm"> <?= rupiah($key->harga) ?> / tersedia <?= ucwords($key->kamar_tersedia) ?> kamar / <?= ucwords($key->kategori) ?></p>
                                <ul class="ml-4 fa-ul text-muted ">
                                    <li class="small"><?= ucfirst($key->deskripsi_alamat) ?> </li>
                                </ul>
                                <a href="<?= base_url('booking/kontrakan/') . $key->id_kontrakan ?>" class="btn btn-danger btn-block mt-5">Booking Sekarang</a>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach ?>

        </ul>
    </div>
    <div class="col-md-6 min-vh-100">
        <div id="map" style="width: 100%; height: 100%;"></div>
    </div>
</div>



<script type="text/javascript">
    // tangerang
    // -6.193935834961845, 106.49757328749318
    var startlat = '<?php echo $kontrakan[0]->lat ?>'
    var startlon = '<?php echo $kontrakan[0]->lon ?>'
    var options = {
        center: [startlat, startlon],
        zoom: 15
    }
    var map = L.map('map', options);
    var nzoom = 15;

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: 'Cari Kontrakan'
    }).addTo(map);
    var homeIcon = L.icon({
        iconUrl: '<?= base_url('assets/images/icon.png') ?>',
        iconSize: [60, 60],
    });
    <?php foreach ($kontrakan as $key) : ?>

        var konsan = L.marker(['<?= $key->lat ?>', '<?= $key->lon ?>'], {
            icon: homeIcon
        }).bindPopup(
            "<img src='<?= base_url('./uploads/thumbnail/') . $key->thumbnail ?>' width='200'/></br></br><h6><?= ucwords($key->nama_kontrakan) ?></h6>Tersedia <?= $key->kamar_tersedia ?> kamar</br></br><h6><span class='badge badge-success'><?= rupiah($key->harga) ?></span></h6><h6><span class='badge badge-primary'><?= $key->kategori ?></span></h6></br><a href='<?= base_url('booking/kontrakan/') . $key->id_kontrakan ?>' class='btn btn-danger btn-block btn-sm text-white'>Booking Sekarang</a>", {
                maxWidth: "auto",
            }).addTo(map)
    <?php endforeach ?>
</script>