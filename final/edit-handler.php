<?php

$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

$kode =  $_POST['kode'];
$judul = $_POST['judul'];
$cover = $_POST['cover'];

// Image cover
$fileName = $_FILES['cover']['name'];
$cover = $fileName;
$tmpName = $_FILES['cover']['tmp_name'];
move_uploaded_file($tmpName, '../images/' . $fileName); // Move file upload to folder

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

// Query
$query = "UPDATE buku SET judul = '$judul', cover = '$cover', jenis = '$jenis', kategori_bisnis = $kategori_bisnis, kategori_informatika = $kategori_informatika, ketersediaan = $ketersediaan WHERE kode = '$kode'";

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
