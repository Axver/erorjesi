<?php


include '../connect.php';

$radius=$_GET['radius'];

// echo $radius;
$sql = "SELECT ST_AsGeoJSON(ST_Buffer(ST_GeomFromText('POINT(100.33521652221681 -0.8500359541370635)'),100/111319.5)) as data1";
$result = pg_query($sql);
while($a = pg_fetch_assoc($result)){
    $b=$a;
}

$c=JSON_ENCODE($b);
echo filter_var($c,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH)
?>