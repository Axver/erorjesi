<?php
	// include "../connect.php";
    $sql = "select ST_asgeojson(geom) AS geometry,user_app.nama_lengkap,user_app.alamat,user_app.contact, id_tanah,no_sertifikat,harga,gambar FROM tanah_dijual 
    INNER JOIN user_app On tanah_dijual.id_user=user_app.id_user";
	$result = pg_query($sql);
	$hasil = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
	
	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geometry']),
		'properties' => array(
		'id_tanah' => $isinya['id_tanah'],
		'no_sertifikat' => $isinya['no_sertifikat'],
		'nama_lengkap' => $isinya['nama_lengkap'],
		'alamat' => $isinya['alamat'],
		'contact' => $isinya['contact'],
		'harga' => $isinya['harga'],
		'gambar' => $isinya['gambar'],
		
		)
	);
	array_push($hasil['features'], $features);
	}
	$data= json_encode($hasil);
	
	?>
		