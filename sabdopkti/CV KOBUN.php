<?php
include("conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Angkot Medan</title>
<style type="text/css">

</style>

<link rel="stylesheet" type="text/css" href="my.css" />


</head> 
<body bgcolor="#CCCCCC"> <div id="halaman">
 <div id="header">
<font color="#0000FF"><center><h1>ANGKOT MEDAN</h1></center></font>
 			<ul id="float"> 
        <li><a href="index.php">HOME</a></li>
        <li><a href="Daftar Angkot.php">DAFTAR  ANGKOT</a></li>
        <li><a href="#">LOGIN ADMIN</a></li>
        <li><a href="TENTANG KAMI.php">TENTANG KAMI</a></li>
      </ul>
 </div>
 
  <div id="kiri"><h2><font color="#0000FF">Cari Rute Angkot :</font></h2> <br /><h3>Tempat Awal:</h3></p>
  <form action="" method="GET">
  <select name="trayek_awal">
  <option value="pilih" >Pilih</option>
  <?php
  $getQ = "SELECT id_angkot, trayek_awal FROM trayek";
  $getTrayek = mysql_query($getQ);
  while($getFetching = mysql_fetch_assoc($getTrayek)):
  echo '<option id="'.$getFetching['id_angkot'].'" value="'. $getFetching['trayek_awal'].'">'. $getFetching['trayek_awal'] .'</option>';
  endwhile;
  ?> 
</select><p><h3>Tujuan :</h3></p>
  <select name="trayek_akhir">
  <option value="pilih" >Pilih</option>
  <?php
  $getQ2 = "SELECT id_angkot, trayek_akhir FROM trayek";
  $getTrayek2 = mysql_query($getQ2);
  while($getFetching2 = mysql_fetch_assoc($getTrayek2)):
  echo '<option id="'.$getFetching2['id_angkot'].'" value="'. $getFetching2['trayek_akhir'].'">'. $getFetching2['trayek_akhir'] .'</option>';
  endwhile;
  ?>
  </select>
  <p>
  <br/> <input type="submit" name="submit" value="Cari Angkot"/></p>
  </form>

<h3><font color="#0000FF"> INFORMASI TARIF</font></h3>
  <p>Tarif Angkot per estafet (10 km): Penumpang  umum/Dewasa=Rp 4.000,- Pelajar/Mahasiswa=Rp 3.000,- </p>
  </div>
  <div id="tengah">
  
  <?php
  if(!isset($_REQUEST['submit'])) {
	  ?>
      <center><h3><font color="#FF0000">DAFTAR ANGKOT CV KOBUN </font></h3></center>
      <h4>No Angkot:03  Rute:TUNTUNGAN-JALAN VETERAN-PP</h4> <h4>No Angkot:07 Rute: TEMBUNG-PETERAN-PP</h4><h4>No Angkot:62 Rute:TUNTUNGAN-T AMPLAS-PP </h4><h4>No Angkot:63 Rute:KEDAI DURIAN-T.P BARIS-PP </h4>
      <?php
  } else {
  ?>
   <center><h2><font color="#FF0000">Angkot yang Anda Cari adalah</font></h2></center>
    <?php
  $trayek_awal = $_REQUEST['trayek_awal'];
	$trayek_akhir = $_REQUEST['trayek_akhir'];
	$q = "SELECT * FROM trayek WHERE trayek_awal LIKE '$trayek_awal' && trayek_akhir LIKE '$trayek_akhir'";
	$qsend = mysql_query($q);
	if($qsend) {
		echo '<table align="center" border="FF0000"><tr><th>Nama Angkot</th><th>Nomor Angkot</th><th>Warna Angkot</th></tr>';
		while($qFetching = mysql_fetch_assoc($qsend)) :
			echo '<tr><td>' . $qFetching['nama_angkot'].'</td><td>'.$qFetching['no_angkot'].'</td><td>'.$qFetching['warna_angkot'].'</td></tr>';
		endwhile;
		echo '</table>';
	} 
	else  {
    
		echo mysql_errno($qsend);
	}
  }
	?>
  </div>

</div>  
            	
</body>
</html>