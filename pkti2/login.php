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
        <li><a href="login.php">LOGIN ADMIN</a></li>
        <li><a href="tentang kami.php">TENTANG KAMI</a></li>
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
	<h3>Log In</h3>
	<div class='login'>
		<form action='proses/login.php' method='post'>
			<table>
				<tr><td width='100'>Email</td><td>: <input type='text' size='30' name='email'></td></tr>
				<tr><td>Password</td><td>: <input type='password' size='30' name='password'></td></tr>
				<tr><td colspan='2' align='right'><input type='submit' value='Login' class='tombol'></td></tr>
			</table>
		</form>
	</div>
<br>
<h3>Registrasi Akun Baru</h3>

<div class='register'><table border='0' >
	
	<tr>
		<td>Nama Depan</td><td><input type='text' name='nama' id='namax'></td>
	</tr>
	<tr>
		<td>Nama Belakang</td><td><input type='text' name='namaa' id='namay'></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td><td><input type='radio' value='l' name='jk' checked>&nbsp;&nbsp;Laki&nbsp;<input type='radio' value='l' name='jk'>&nbsp;Perempuan&nbsp;&nbsp;</td>
	</tr>
	
	<tr>
		<td>Email (Digunakan Sebagai Akun Login)</td><td><input type='text' name='email' id='email' size='25'></td>
	</tr>
	<tr>
		<th colspan='2'>Password Anda</th>
	</tr>
	<tr>
		<td>Password</td><td><input type='password' name='pass1' id='p1'></td>
	</tr>
	<tr>
		<td>Samakan</td><td><input type='password' name='pass2' id='p2'></td>
	</tr>
	<tr>
		<th colspan='2'>Alamat Anda</th>
	</tr>
	<tr>
		<td>provinsi</td><td><input type='text' name='provinsi' id=provinsi></td>
	</tr>
	<tr>
		<td>Kota</td><td><input type='text' name='kota' id='kota'></td>
	</tr>
	<tr>
		<td>Alamat Rumah</td><td><input type='text' name='alamat' id='alamat'></td>
	</tr>
	<tr>
		<td>Kode Pos</td><td><input type='text' name='pos' id='pos'></td>
	</tr>
	<tr>
		<th colspan='2'>Informasi Kontak</th>
	</tr>
	<tr>
		<td>Telp / Hp</td><td><input type='text' name='telp' id='telp'></td>
	</tr>
	<tr>
		<td>Fax (Boleh Dikosongkan)</td><td><input type='text' name='fax'></td>
	</tr>
	<tr><td colspan='2'><br><Br><input type='submit' value='Daftar' class='tombol'><input type='button'value='asd'></td></tr>

	</table>

      
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