<?php
$con = mysql_connect("localhost", "root", "");
//$db = mysql_select_db("angkot");
if($con) {
	$db = mysql_select_db("angkot");
} else {
	echo "<h1>Kesalahan Koneksi Database.</h1>";
}
?>