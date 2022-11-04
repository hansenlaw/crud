<?php 
require '../functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM karyawan WHERE 
	nama LIKE '%$keyword%' OR
	jk LIKE '%$keyword%' OR
	tgllahir LIKE '%$keyword%' OR
	nomorHP LIKE '%$keyword%' OR
	divisi LIKE '%$keyword%' OR
	email LIKE '%$keyword%' OR
	alamat LIKE '%$keyword%' 
	";
	
$pekerja = query($query);

 ?>

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