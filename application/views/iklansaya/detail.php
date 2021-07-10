<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Kontrakan </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('iklansaya') ?>" class="text-red">Iklan Kontrakan Saya</a></li>
                    <li class="breadcrumb-item active">Detail Kontrakan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= ucwords($kontrakan->nama_kontrakan) ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" value="<?= $kontrakan->id_kontrakan ?>" name="fid_kontrakan">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= base_url('./uploads/thumbnail/') . $kontrakan->thumbnail ?>" alt="foto thumbnail" class="img-thumbnail mb-4" width="100%">
                        </div>
                        <div class="col-md-6">
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
                                        <td>Rp. <?= $kontrakan->harga ?></td>
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
                    <strong class="mb-4">Peta Lokasi Kontrakan</strong>
                    <div id='mapid' style="width: 100%; height: 300px;" class="my-3"></div>
                    <div class="row">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?= base_url('iklansaya') ?>" class="btn btn-secondary float-right">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
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