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
                                <label for="fnama_kontrakan">Nama Kontrakan</label>
                                <input type="text" class="form-control <?= form_error('fnama_kontrakan') ? 'is-invalid' : '' ?>" id="fnama_kontrakan" name="fnama_kontrakan" placeholder="Enter Nama Kontrakan" value="<?= $this->input->post('fnama_kontrakan'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fnama_kontrakan') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fkategori">Kategori Kontrakan</label>
                                <select class="form-control <?php echo form_error('fkategori') ? 'is-invalid' : '' ?>" id="fkategori" name="fkategori">
                                    <option hidden value="" selected>Pilih Kategori</option>
                                    <option value="P" <?= $this->input->post('fkategori') == 'P' ? 'selected' : '' ?>>Khusus Pria</option>
                                    <option value="W" <?= $this->input->post('fkategori') == 'W' ? 'selected' : '' ?>>Khusus Wanita</option>
                                    <option value="C" <?= $this->input->post('fkategori') == 'C' ? 'selected' : '' ?>>Campur</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('fkategori') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fharga">Harga Perbulan</label>
                                <input type="text" class="form-control <?= form_error('fharga') ? 'is-invalid' : '' ?>" id="fharga" name="fharga" placeholder="Enter Harga Perbulan" value="<?= $this->input->post('fharga'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fharga') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fjumlah_kamar">Jumlah Kamar Tersedia</label>
                                <input type="text" class="form-control <?= form_error('fjumlah_kamar') ? 'is-invalid' : '' ?>" id="fjumlah_kamar" name="fjumlah_kamar" placeholder="Jumlah Kamar Tersedia" value="<?= $this->input->post('fjumlah_kamar'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fjumlah_kamar') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fdeskripsi">Fasilitas</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        WiFi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Dapur
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Dapur
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Dapur
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Dapur
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Dapur
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Dapur
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Dapur
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ffoto">Foto Kontrakan</label>
                                <input type="file" class="pt-1 form-control <?= form_error('ffoto') ? 'is-invalid' : '' ?>" id="ffoto" name="ffoto" placeholder="Enter Harga Paket" value="<?= $this->input->post('ffoto'); ?>" required>
                                <small class="text-muted">*Format file harus <i>jpg/png/gif/jpeg</i>, maksimal <i>file size 2Mb</i></small>
                                <div class="invalid-feedback">
                                    <?= form_error('ffoto') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fdeskripsi">Deskripsi</label>
                                <textarea name="fdeskripsi" id="fdeskripsi" class="form-control <?= form_error('fdeskripsi') ? 'is-invalid' : '' ?>" cols="10" rows="5" placeholder="Enter Deskripsi Kontrakan"><?= $this->input->post('fdeskripsi'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('fdeskripsi') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <strong>Pilih Lokasi Kontrakan</strong>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control <?= form_error('flat') ? 'is-invalid' : '' ?>" id="flat" name="flat" value="<?= $this->input->post('flat'); ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('flat') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control <?= form_error('flon') ? 'is-invalid' : '' ?>" id="flon" name="flon" value="<?= $this->input->post('flon'); ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('flon') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id='mapid' style="width: 100%; height: 395px;" class="mb-3"></div>
                            <div class="form-group">
                                <label for="fjalan">Nama Jalan</label>
                                <input type="text" class="form-control <?= form_error('fjalan') ? 'is-invalid' : '' ?>" id="fjalan" name="fjalan" placeholder="Enter Harga Perbulan" value="<?= $this->input->post('fjalan'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fjalan') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fkecamatan">Kecamatan</label>
                                <input type="text" class="form-control <?= form_error('fkecamatan') ? 'is-invalid' : '' ?>" id="fkecamatan" name="fkecamatan" placeholder="Enter Harga Perbulan" value="<?= $this->input->post('fkecamatan'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fkecamatan') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fdeskripsi_alamat">Deskripsi Alamat</label>
                                <textarea name="fdeskripsi_alamat" id="fdeskripsi_alamat" class="form-control <?= form_error('fdeskripsi_alamat') ? 'is-invalid' : '' ?>" cols="10" rows="5" placeholder="Enter Deskripsi Alamat"><?= $this->input->post('fdeskripsi_alamat'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('fdeskripsi_alamat') ?>
                                </div>
                            </div>
                        </div>
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

<script type="text/javascript">
    // tangerang
    // -6.193935834961845, 106.49757328749318
    var startlat = -6.193935834961845;
    var startlon = 106.49757328749318;

    var options = {
        center: [startlat, startlon],
        zoom: 12
    }

    document.getElementById('flat').value = startlat;
    document.getElementById('flon').value = startlon;

    var map = L.map('mapid', options);
    var nzoom = 12;

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: 'Cari Kontrakan'
    }).addTo(map);
    var myMarker = L.marker([startlat, startlon], {
        title: "Coordinates",
        alt: "Coordinates",
        draggable: true
    }).addTo(map).on('dragend', function() {
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
        document.getElementById('flat').value = lat;
        document.getElementById('flon').value = lon;
        myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
    });

    function chooseAddr(lat1, lng1) {
        myMarker.closePopup();
        map.setView([lat1, lng1], 15);
        myMarker.setLatLng([lat1, lng1]);
        lat = lat1.toFixed(8);
        lon = lng1.toFixed(8);
        document.getElementById('flat').value = lat;
        document.getElementById('flon').value = lon;
        myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
    }

    function myFunction(arr) {
        var out = "<br />";
        var i;

        if (arr.length > 0) {
            for (i = 0; i < arr.length; i++) {
                out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
            }
            document.getElementById('results').innerHTML = out;
        } else {
            document.getElementById('results').innerHTML = "Sorry, no results...";
        }

    }

    function addr_search() {
        var inp = document.getElementById("addr");
        var xmlhttp = new XMLHttpRequest();
        var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myArr = JSON.parse(this.responseText);
                myFunction(myArr);
            }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
</script>