<?php 
session_start();

if(!isset($_SESSION['login'])){
	header('Location:login.php');
	exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET['id'];

// queri data berdasar id
$kry = query("SELECT * FROM karyawan WHERE id = $id")[0];

// cek submit sudah ditekan
if (isset($_POST["submit"]) ){
	//cek keberhasilan ubah data
	if(ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = 'home.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('data gagal diubah');
				document.location.href = 'home.php';
			</script>
		";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="edit.css">
	<title>Ubah data karyawan</title>
</head>
<body>
	<div class="container">
		<h1>Ubah data karyawan</h1>

		<form action="" method="post">
			<input type="hidden" name="id" value="<?= $kry['id']; ?>">
			<table>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><input type="text" name="nama" id="nama" required value="<?= $kry['nama']; ?>"></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><input type="radio" name="jk" value="Laki-Laki">Laki- Laki
								<input type="radio" name="jk" value="Perempuan">Perempuan</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>:</td>
							<td><input type="date" name="tgllahir" required value="<?= $kry['tgllahir']; ?>"></td>
						</tr>
						<tr>
							<td>Nomor Handphone</td>
							<td>:</td>
							<td><input type="number" name="nomorHP" value="<?= $kry['nomorHP']; ?>"></td>
						</tr>
						<tr>
							<td>Divisi</td>
							<td>:</td>
							<td><select name="divisi">
								<option>CEO</option>
								<option>FrontEnd</option>
								<option>Backend</option>
								<option>Data Scientist</option>
								<option>Intern</option>
								<option>Supervisor</option>
							</select></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type="text" name="email" value="<?= $kry['email']; ?>"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><textarea name="alamat"><?= $kry['alamat']; ?></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><button type="submit" name="submit">Update</button></td>
							<td></td>
						</tr>
					</table>

		</form>
	</div>
</body>
</html>