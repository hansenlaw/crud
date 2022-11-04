<?php 
require 'functions.php';
// cek submit sudah ditekan
if (isset($_POST["submit"]) ){

	//cek keberhasilan masukkin data
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'home.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('data gagal ditambahkan');
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
	<link rel="stylesheet" type="text/css" href="add.css">
	<title>Tambah data karyawan</title>
</head>
<body>
		<div class="container">
			<h1>Tambah data karyawan</h1>

			<form action="" method="post">
				<table>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="nama" id="nama" required></td>
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
						<td><input type="date" name="tgllahir" required></td>
					</tr>
					<tr>
						<td>Nomor Handphone</td>
						<td>:</td>
						<td><input type="number" name="nomorHP" required></td>
					</tr>
					<tr>
						<td>Divisi</td>
						<td>:</td>
						<td><select name="divisi">
							<option>--Pilih Divisi--</option>
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
						<td><input type="text" name="email" required></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><textarea name="alamat"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" name="submit">Tambah</button></td>
						<td></td>
					</tr>
				</table>
			</form>
		</div>

</body>
</html>