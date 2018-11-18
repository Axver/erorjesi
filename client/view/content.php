<?php

include '../../../server/proses/get_tanah.php';

?>


<!-- Script JS Menu-->




<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Andaland</a>
    </li>
    <li class="breadcrumb-item active">Selamat datang</li>
  </ol>

  <div class="menu">
    
    <div class="panel panel-info">
       <div class="panel-head"></div>
       <div class="panel-body">

       <div class="row">
           <div class="col-sm-5">
           <div class='row'>
            <div class='col sm-4'>
           
           
            </div>
           </div>
           <button class="btn btn-info" onclick="lokasi()">Lokasi</button>
           </div>

            <div class="col-sm-7">
            <div class="row">
              
              <div class="col-sm-4">
                  
                  <div class="form-group">
                  
                  <select onchange="provclick()" id="provinsi" class="form-control" id="sel1">
                 
                  </select>
                  </div>
              </div>
              <div class="col-sm-4">
                  
                  <div class="form-group">
                  
                  <select name="kabupaten" id="kabupaten" class="form-control" id="sel1">
                 
                  </select>
                  </div>
              </div>
              <div class="col-sm-4">
                  
                  <div class="form-group">
                  
                  <select name="kecamatan" id="kecamatan" class="form-control" id="sel1">
                
                  </select>
                  </div>
              </div>
       </div>

            </div>

       </div>
       <div class="col-sm-7">
           
       </div>
           
       </div>

      
    </div>

  </div>

  <div class="row">
    
    <div class="col-sm-8">
    <div id="mapid" style="height:500px; width:1090px;"></div>
    </div>


    </div>

  </div>


  
    
    
  <script>
  var json_tanah = <?php echo json_encode($hasil) ?>;
  
   var mymap = L.map('mapid',{drawControl: true}).setView([-0.874904, 100.367544], 13);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYXh2ZXI3IiwiYSI6ImNqOXNxdHF4bjBzb2czM2p6cmVzZzBwcXgifQ.l38Ez-rF1XCin25iUIynoQ'
}).addTo(mymap);

var newMarker;
var marker;


function mapClicked(e) {
    mymap.off('click', mapClicked);
    mymap.removeLayer(marker)

    marker = new L.Marker(e.latlng, { draggable: true });
    marker.bindPopup("<strong>" + e.latlng + "</strong>").addTo(mymap);

    marker.on('dragend', markerDrag);
}

function addMarker(e){
  
    // Add marker to map at click location; add popup window
   var newMarker = new L.marker(e.latlng).addTo(mymap);
   var curPos = newMarker.getLatLng();
  //  alert(curPos.lng + " : " + curPos.lat);
   newMarker.bindPopup("Marker Anda");
   console.log(curPos.lng);
   console.log(curPos.lat);
   console.log(curPos.lng+" "+curPos.lat);
   var latlong=curPos.lng+" "+curPos.lat;
   radius(latlong);
   
}


function rangeDulu()
{
  alert("Pilih Range Dahulu");
}




L.geoJSON(json_tanah).addTo(mymap);


console.log(json_tanah.features.length);
var length= json_tanah.features.length;
var polygon;

for(var i = 0; i < length; i++){
  polygon=L.geoJSON(json_tanah.features[i].geometry).addTo(mymap);
  polygon.bindPopup("<h4><b>Informasi Tanah</b></h4>"+
  
  "<b>No sertifikat:</b>"+json_tanah.features[i].properties.no_sertifikat+"<br/>"
  +"<b>Harga:</b>"+json_tanah.features[i].properties.harga+"<br/>"
  +"<b>No sertifikat:</b>"+json_tanah.features[i].properties.gambar+"<br/>"
  +"<b>Alamat:</b>"+json_tanah.features[i].properties.alamat+"<br/>"
  +"<h4><b>Info Pemilik</b></h4>"
  +"<b>Nama Pemilik:</b>"+json_tanah.features[i].properties.nama_lengkap+"<br/>"
  +"<b>Contact:</b>"+json_tanah.features[i].properties.contact+"<br/>"
  );
}


function range()
{
  var range=document.getElementById('range');
  alert("Pilih Posisi Di Map");
  mymap.on('click', addMarker);
  console.log(range.value);
}


// Pakai Ajax untuk Mendapatkan Geom dalam range tersebut

function radius(rad)
{

          $.ajax({
            type: 'GET',
            url: '../../../server/proses/radius.php?radius='+rad,
            success: function (html) {
              alert(html);
          }
        });
  
}

  </script>

  

  

 
</div>
<!-- /.container-fluid -->

<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Your Website 2018</span>
    </div>
  </div>
</footer>

</div>
<!-- /.content-wrapper -->

</div>