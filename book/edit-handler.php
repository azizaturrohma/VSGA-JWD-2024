<?php

$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

$kode =  $_POST['kode'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$pengarang = $_POST['pengarang'];
$jenis = $_POST['jenis'];

if (isset($_POST['kategori_bisnis'])) {
	$kategori_bisnis = $_POST['kategori_bisnis'];
} else {
	$kategori_bisnis = 0;
}

if (isset($_POST['kategori_informatika'])) {
	$kategori_informatika = $_POST['kategori_informatika'];
} else {
	$kategori_informatika = 0;
}

$ketersediaan = $_POST['ketersediaan'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

$query = "UPDATE book SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', jenis = '$jenis', kategori_bisnis = $kategori_bisnis, kategori_informatika = $kategori_informatika, ketersediaan = $ketersediaan, harga = $harga, jumlah = $jumlah, total = $total WHERE kode = '$kode'";

mysqli_query($conn, $query);

$success = mysqli_affected_rows($conn);

if ($success > 0) {
	echo "
			<script>
				alert('Data berhasil diperbarui!');
				document.location.href = 'index.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('Data gagal diperbarui!');
				document.location.href = 'index.php';
			</script>
		";
}
