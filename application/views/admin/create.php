<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Administrator </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>" class="text-red">Administrator </a></li>
                    <li class="breadcrumb-item active">Tambah Administrator</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Input data administrator</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="fnama_kontrakan">Nama Admin</label>
                        <input type="text" class="form-control <?= form_error('fnama_admin') ? 'is-invalid' : '' ?>" id="fnama_admin" name="fnama_admin" placeholder="Nama administrator" value="<?= $this->input->post('fnama_admin'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fnama_admin') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="femail">Email</label>
                        <input type="text" class="form-control <?= form_error('femail') ? 'is-invalid' : '' ?>" id="femail" name="femail" placeholder="Email pemilik" value="<?= $this->input->post('femail'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('femail') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fpassword">Password</label>
                        <input type="password" class="form-control <?= form_error('fpassword') ? 'is-invalid' : '' ?>" id="fpassword" name="fpassword" placeholder="Password" value="<?= $this->input->post('fpassword'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fpassword') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fconf_password">Konfirmasi Password</label>
                        <input type="password" class="form-control <?= form_error('fconf_password') ? 'is-invalid' : '' ?>" id="fconf_password" name="fconf_password" placeholder="konfirmasi password" value="<?= $this->input->post('fconf_password'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fconf_password') ?>
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