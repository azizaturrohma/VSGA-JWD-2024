<?php

$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

$kode =  $_POST['kode'];
$judul = $_POST['judul'];
$jenis = $_POST['jenis'];

if (isset($_POST['kategori_bisnis'])) {
	$kategori_bisnis = $_POST['kategori_bisnis'];
}

if (isset($_POST['kategori_informatika'])) {
	$kategori_informatika = $_POST['kategori_informatika'];
}

$ketersediaan = $_POST['ketersediaan'];

$query = "INSERT INTO buku(kode, judul, jenis, kategori_bisnis, kategori_informatika, ketersediaan) VALUES('$kode', '$judul', '$jenis', $kategori_bisnis, $kategori_informatika, $ketersediaan)";

mysqli_query($conn, $query);

$success = mysqli_affected_rows($conn);
if ($success > 0) {
	echo "
			<script>
				alert('Data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('Data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
}
