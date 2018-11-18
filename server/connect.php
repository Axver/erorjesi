<?php
$db_url = getenv("DATABASE_URL") ?: "postgres://jdhvdvayrffstl:6a5bb1dfcd24510fa713c1d1a7a3d6fb134fba63bd99dd14e3f79e4741ea344f@ec2-54-83-8-246.compute-1.amazonaws.com:5432/d53ogvv1faeksc";

$link=pg_connect($db_url);

?>