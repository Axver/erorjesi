<?php
	
	$geom=$_GET['geom'];
	$sertipikat=$_GET['nosertipikat'];
	// $geom1=ST_GeomFromGeoJSON($geom);
	// echo $geom;
	// echo "<br/>";
	// echo $sertipikat;
	
	include '../connect.php';
	
	//Akhirnya bisa insert wkwkwkw
	$sql= "INSERT INTO tanah_dijual(id_user,harga,gambar,No_Sertifikat, geom) VALUES(1,1,'1','$sertipikat', ST_GeomFromText('MULTIPOLYGON((($geom)))') )";
	$result=pg_query($sql);
	if ($result)
	{
		echo "<script> alert('Insert Data Berhasil!!'); window.location = '../../'; </script>";
	}
	else {
		echo "<script> alert('Insert Data gagal!!'); window.location = '../../'; </script>";
	}
	
	
	
	
	
	//Querynya
	// INSERT INTO digitasi_lahan(sertipikat, geom)
	// VALUES('test1', ST_GeomFromText('MULTIPOLYGON(((235670.354215375
	// 894016.780856,235668.324215375 894025.050856,235681.154215375
	//  894028.210856,235683.184215375 894019.940856,235670.354215375 894016.780856)))') )
	
	
	
?>
