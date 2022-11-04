<?php 
$conn =mysqli_connect('localhost', 'root', '', 'phpdasar');


function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($ini = mysqli_fetch_assoc($result) ) {
		$rows[] = $ini;
	}
	return $rows;
}

function tambah($data){
	global $conn;
	$nama = htmlspecialchars($data['nama']);
	$jk = htmlspecialchars($data['jk']);
	$tgllahir = htmlspecialchars($data['tgllahir']);
	$nomorHP = htmlspecialchars($data['nomorHP']);
	$divisi = htmlspecialchars($data['divisi']);
	$email = htmlspecialchars($data['email']);
	$alamat = htmlspecialchars($data['alamat']);

	$query = "INSERT INTO karyawan VALUES ('', '$nama','$jk', '$tgllahir', '$nomorHP', '$divisi', '$email', '$alamat')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM karyawan WHERE id=$id");
	return mysqli_affected_rows($conn);
}

function ubah ($data) {
	global $conn;

	$id = $data['id'];
	$nama = htmlspecialchars($data['nama']);
	$jk = htmlspecialchars($data['jk']);
	$tgllahir = htmlspecialchars($data['tgllahir']);
	$nomorHP = htmlspecialchars($data['nomorHP']);
	$divisi = htmlspecialchars($data['divisi']);
	$email = htmlspecialchars($data['email']);
	$alamat = htmlspecialchars($data['alamat']);
	

	$query = " UPDATE karyawan SET
			nama = '$nama',
			jk = '$jk',
			tgllahir = '$tgllahir',
			nomorHP = '$nomorHP',
			divisi = '$divisi',
			email = '$email',
			alamat = '$alamat'
			WHERE id = $id
	";

	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}

function cari ($keyword) {
	$query = "SELECT * FROM karyawan WHERE 
	nama LIKE '%$keyword%' OR
	jk LIKE '%$keyword%' OR
	tgllahir LIKE '%$keyword%' OR
	nomorHP LIKE '%$keyword%' OR
	divisi LIKE '%$keyword%' OR
	email LIKE '%$keyword%' OR
	alamat LIKE '%$keyword%' 
	";
	return query($query);
}

function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$repass = mysqli_real_escape_string($conn, $data['repass']);

	// username tersedia ato ga
	$result = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)){
		echo "<script>
					alert('Username sudah terdaftar');
			  </script>";

		return false;
	}

	// cek konfirmasi
	if($password !== $repass){
		echo "<script>
					alert('Konfirmasi password tidak sesuai');
			  </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO login VALUES ('', '$username', '$password')");

	return mysqli_affected_rows($conn);
}

 ?>