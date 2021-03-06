

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css"
          integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"
            integrity="sha512-C7BBF9irt5R7hqbUm2uxtODlUVs+IsNu2UULGuZN7gM+k/mmeG4xvIEac01BtQa4YIkUpp23zZC4wIwuXaPMQA=="
            crossorigin=""></script>
    <style>
        #mapid {
            height: 600px;
        }
    </style>
    <script type="text/javascript" src="../jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script src="../fw_leaflet/leaflet-src.js"></script>
    <link rel="stylesheet" href="../fw_leaflet/leaflet.css"/>


      <!-- plugin Draw Include -->
  <script src="../plugin_draw/src/Leaflet.draw.js"></script>
    <script src="../plugin_draw/src/Leaflet.Draw.Event.js"></script>
    <link rel="stylesheet" href="../plugin_draw/src/leaflet.draw.css"/>
    

    <script src="../../../server/plugin_draw/src/Toolbar.js"></script>
    <script src="../../../server/plugin_draw/src/Tooltip.js"></script>

    <script src="../../../server/plugin_draw/src/ext/GeometryUtil.js"></script>
    <script src="../../../server/plugin_draw/src/ext/LatLngUtil.js"></script>
    <script src="../../../server/plugin_draw/src/ext/LineUtil.Intersect.js"></script>
    <script src="../../../server/plugin_draw/src/ext/Polygon.Intersect.js"></script>
    <script src="../../../server/plugin_draw/src/ext/Polyline.Intersect.js"></script>
    <script src="../../../server/plugin_draw/src/ext/TouchEvents.js"></script>

    <script src="../../../server/plugin_draw/src/draw/DrawToolbar.js"></script>
    <script src="../../../server/plugin_draw/src/draw/handler/Draw.Feature.js"></script>
    <script src="../../../server/plugin_draw/src/draw/handler/Draw.SimpleShape.js"></script>
    <script src="../../../server/plugin_draw/src/draw/handler/Draw.Polyline.js"></script>
    <script src="../../../server/plugin_draw/src/draw/handler/Draw.Marker.js"></script>
    <script src="../../../server/plugin_draw/src/draw/handler/Draw.Circle.js"></script>
    <script src="../../../server/plugin_draw/src/draw/handler/Draw.CircleMarker.js"></script>
    <script src="../../../server/plugin_draw/src/draw/handler/Draw.Polygon.js"></script>
    <script src="../../../server/plugin_draw/src/draw/handler/Draw.Rectangle.js"></script>


    <script src="../../../server/plugin_draw/src//edit/EditToolbar.js"></script>
    <script src="../../../server/plugin_draw/src/edit/handler/EditToolbar.Edit.js"></script>
    <script src="../../../server/plugin_draw/src/edit/handler/EditToolbar.Delete.js"></script>

    <script src="../../../server/plugin_draw/src/Control.Draw.js"></script>

    <script src="../../../server/plugin_draw/src/edit/handler/Edit.Poly.js"></script>
    <script src="../../../server/plugin_draw/src/edit/handler/Edit.SimpleShape.js"></script>
    <script src="../../../server/plugin_draw/src/edit/handler/Edit.Rectangle.js"></script>
    <script src="../../../server/plugin_draw/src/edit/handler/Edit.Marker.js"></script>
    <script src="../../../server/plugin_draw/src/edit/handler/Edit.CircleMarker.js"></script>
    <script src="../../../server/plugin_draw/src/edit/handler/Edit.Circle.js"></script>

  


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lahan Lahan</title>

    <!-- Bootstrap core CSS -->
    <link href="../fw_bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../fw_bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- Plugin CSS -->
    <link href="../fw_bootstrap/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../fw_bootstrap/css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">



<!-- Header -->
<header class="masthead bg-primary text-white text-center">
    <div class="container">

    </div>
</header>

<!-- Portfolio Grid Section -->
<section class="portfolio" id="portfolio">
    <div class="container">
        <button type="button" class="btn btn-info" name="button" onclick="tampildigitasi()"> Tambah Info</button>
        <select id="filterdata" onchange="filter()">
            <option>
                Kepadatan Penduduk
            </option>
            <option>
                Curah Hujan
            </option>

            <option>
                Dataran rendah
            </option>

            <option>
                Dataran Tinggi
            </option>
        </select>
        <button type="button" class="btn btn-success" name="button" onclick="refresh()"> Refresh</button>
        <button type="button" class="btn btn-info" name="button" onclick="tampildigitasi()"> Luas (m2)</button>
        <select>
            <option>
                <=5000
            </option>
            <option>
                5001-10000
            </option>
            10001-20000
            <option>
                20000-40000
            </option>

            <option>
                >40000
            </option>
        </select>
        <div class="row">
            <div class="col-sm-10">
                <div id="map" style="width: 750px; height: 600px; border: 1px solid #ccc"></div>
            </div>
            <div style='margin-left:-50px;' class="col-sm-2">
                <div class="panel panel-info">
                    <div class="panel-head">
                        Input Data
                    </div>
                    <div class="panel-body">


                        <div class="row">
                            <div class="col-sm-3">
                                <label for="lat">Latitude </label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="lat" id="lat" value="-7.368081">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-3 ">
                                <label for="lon">Longitude</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="lon" id="lon" value="108.220256">
                            </div>
                        </div>


                        <br/>
                        <input type="button" onclick="zoompeta()" name="" value="cari">
                        <br/>
                        <h3>Data Geometry</h3>
                        <input type="text" name="geometry" id="geometry" value="" disabled>


                    </div>

                </div>

                <div class="panel panel-info">
                    <div class="panel-body">
                        <br/>Nomor Sertipikat: <br/>
                        <input type="text" name="id" id="id" value="">

                    </div>
                    <br/>
                    <input type="button" onclick="passing_php()" class="btn btn-info" name="" value="Input Data">

                </div>

            </div>
        </div>
        <script>
            function refresh() {
                document.location.reload();
            }
        </script>

        <script>
            var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib}),
                map = new L.Map('map', {center: new L.LatLng(-6.282250, 106.801443), zoom: 13}),
                drawnItems = L.featureGroup().addTo(map);
            L.control.layers({
                'osm': osm.addTo(map),
                "google": L.tileLayer('http://www.google.com/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
                    attribution: 'google'
                })
            }, {'drawlayer': drawnItems}, {position: 'topleft', collapsed: false}).addTo(map);
            map.addControl(new L.Control.Draw({
                edit: {
                    featureGroup: drawnItems,
                    poly: {
                        allowIntersection: false
                    }
                },
                draw: {
                    polygon: {
                        allowIntersection: false,
                        showArea: true
                    }
                }
            }));

            map.on(L.Draw.Event.CREATED, function (event) {
                var layer = event.layer;

                drawnItems.addLayer(layer);
                //Mengambil Data geometri Hasil Gambar
                var datagambar = drawnItems.toGeoJSON();
                //Convert ke geojson
                convertedData = JSON.stringify(datagambar.features);
                var length = convertedData.length;
                var substr = convertedData.substr(80, length);
                var hapus_belakang = substr.slice(0, -5);
                // var replace=hapus_belakang.replace('],[','"')
                var res = hapus_belakang.replace(/],/gi, '"');
                var res1 = res.replace(/,/gi, ' ');
                var res2 = res1.replace(/]/gi, ' ');
                var res3 = res2.replace(/\[/g, '');
                res4 = res3.replace(/"/g, ',');
                document.getElementById("geometry").value = res4;

                // console.log(hapus_belakang);
                console.log(res4);


            });

        </script>

        <script>

            //icon

            function zoompeta() {
                var lat = document.getElementById("lat").value;
                var lon = document.getElementById("lon").value;
                map.panTo(new L.LatLng(lat, lon));
                var marker = L.marker([lat, lon]).addTo(map);
                marker.bindPopup("<b>Lokasi!!!</b><br>Tanah Disekitar Sini").openPopup();
            }

        </script>

        <script>

            function passing_php() {
                var sertipikat = document.getElementById("id").value;
                window.location.href = "../../magang_1/sy_proses/pr_inputbpn.php?geom=" + res4 + "&nosertipikat=" + sertipikat;

            }

        </script>

        <script>

            function tampildigitasi() {
                var argeojson = <?php echo json_encode($hasil) ?>;
                data = L.geoJSON(argeojson).addTo(map);
                data.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan <br/> <img src='../image/example.jpg'> <br/>-harga (Rp.xxxxxxxx)<br/> <p>Keterangan, keterangan,keterangan </p><button class='btn btn-info'> Edit </button> <button class='btn btn-info'>Remove</button>");

            }

        </script>
        <!-- Script untuk Filter Lahan -->
        <script>

            function filter() {
                ubah = document.getElementById('filterdata').value;
                argeojson = <?php echo json_encode($hasil) ?>;
                if (ubah == "Dataran rendah") {
                    var poli;
                    console.log(argeojson);


                    for (var i = 0; i < argeojson.features.length; i++) {
                        if (argeojson.features[i].properties.ketinggian == 'Dataran Rendah') {
                            // console.log(argeojson.features[i].properties.gid);
                            poli = L.geoJSON(argeojson.features[i].geometry).addTo(map);
                            poli.setStyle({fillColor: '#000000'});
                            poli.setStyle({fillOpacity: 0.5});
                            poli.setStyle({color: 'none'});
                            // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/> <img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");


                        }
                        else if (argeojson.features[i].properties.ketinggian == 'Dataran Tinggi') {

                            // poli=L.geoJSON(argeojson.features[i].geometry).addTo(map);
                            // poli.setStyle({fillColor: '#FF0000'});
                            // poli.setStyle({fillOpacity: 0.5});
                            // poli.setStyle({color: 'none'});
                            // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/><img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
                        }
                        else {
                            // poli=L.geoJSON(argeojson.features[i].geometry).addTo(map);
                            // poli.setStyle({fillColor: '#4A235A'});
                            // poli.setStyle({fillOpacity: 0.5});
                            // poli.setStyle({color: 'none'});
                            // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan <br/> <img src='../image/example.jpg'> <br/>-harga (Rp.xxxxxxxx)<br/> <p>Keterangan, keterangan,keterangan </p><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
                        }
                    }


                }

                else if (ubah == "Dataran Tinggi") {
                    var poli;
                    console.log(argeojson);


                    for (var i = 0; i < argeojson.features.length; i++) {
                        if (argeojson.features[i].properties.ketinggian == 'Dataran Rendah') {
                            // console.log(argeojson.features[i].properties.gid);
                            // poli=L.geoJSON(argeojson.features[i].geometry).addTo(map);
                            // poli.setStyle({fillColor: 'none'});
                            // poli.setStyle({fillOpacity: 0.5});
                            // poli.setStyle({color: 'none'});
                            // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/> <img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");


                        }
                        else if (argeojson.features[i].properties.ketinggian == 'Dataran Tinggi') {

                            poli = L.geoJSON(argeojson.features[i].geometry).addTo(map);
                            poli.setStyle({fillColor: '#FF0000'});
                            poli.setStyle({fillOpacity: 0.5});
                            poli.setStyle({color: 'none'});
                            // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/><img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
                        }
                        else {
                            // poli=L.geoJSON(argeojson.features[i].geometry).addTo(map);
                            // poli.setStyle({fillColor: '#4A235A'});
                            // poli.setStyle({fillOpacity: 0.5});
                            // poli.setStyle({color: 'none'});
                            // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan <br/> <img src='../image/example.jpg'> <br/>-harga (Rp.xxxxxxxx)<br/> <p>Keterangan, keterangan,keterangan </p><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
                        }
                    }


                }

            }

        </script>

        <script>
            //Verifikasi User untuk masuk menu bidding
            function verifikasi_user() {
                var roleuser = '<?php echo $_SESSION['roleuser']?>';
                // console.log(roleuser);
                if (roleuser == 'bpn') {
                    console.log('hai ini testing');
                    window.location = '../pg_bidding/pencari/index.php';
                }
            }

        </script>

    </div>
</section>


<!-- Footer -->




<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>


<!-- Bootstrap core JavaScript -->
<script src="../fw_bootstrap/vendor/jquery/jquery.min.js"></script>
<script src="../fw_bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../fw_bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../fw_bootstrap/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="../fw_bootstrap/js/jqBootstrapValidation.js"></script>
<script src="../fw_bootstrap/js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="../fw_bootstrap/js/freelancer.min.js"></script>
\


</body>

</html>
