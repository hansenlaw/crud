<?php  
session_start();

if(!isset($_SESSION['submit'])){
	header('Location:login.php');
	exit;
}

require 'functions.php';

$pekerja = query("SELECT * FROM karyawan");


// tombol cari ditekan
if ( isset($_POST['cari']) ) {
	$pekerja = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman  Admin</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="head">
	<a href="logout.php" class="logout">Logout</a>
</div>

<a href="home.php"><h1>Legal Analytics</h1></a>


<div class='atas'>
	<form action="" method="post">
		<input type="text" name="keyword" size="35" autofocus placeholder="Masukkan keyword .." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari</button>
	</form>
</div>

	<div class="tambah">
		<a href="add.php">Tambah data</a>
	</div>
	<br>
<div id="container">
<table>
	
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>
		<th>Nomor Telfon</th>
		<th>Divisi</th>
		<th>Email</th>
		<th>Alamat</th>
		<th>Aksi</th>
	</tr>	

	<?php $i=1; ?>
	<?php foreach($pekerja as $ini) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $ini['nama']; ?></td>
		<td><?= $ini['jk']; ?></td>
		<td><?= $ini['tgllahir']; ?></td>
		<td><?= $ini['nomorHP']; ?></td>
		<td><?= $ini['divisi']; ?></td>
		<td><?= $ini['email']; ?></td>
		<td><?= $ini['alamat']; ?></td>
		<td align="center">
			<a href="edit.php?id=<?= $ini['id']; ?>"><button class="edit">Edit</button></a> || 
			<a href="delete.php?id=<?= $ini['id']; ?>" onclick="return confirm('yakin?');"><button class="delete">Delete</button></a>
		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
</div>
	<?php if(!$pekerja) : ?>
	<p class=" error">Data tidak ditemukan</p>
	<?php endif; ?>

<script src="js/script.js"></script>



</body>
</html>