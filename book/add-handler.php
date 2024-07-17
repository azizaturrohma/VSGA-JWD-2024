<pre>

<?php

print_r($_POST);

$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

$kode =  $_POST['kode'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$pengarang = $_POST['pengarang'];
$jenis = $_POST['jenis'];

if (isset($_POST['kategori_bisnis'])) {
	$kategori_bisnis = $_POST['kategori_bisnis'];
}

if (isset($_POST['kategori_informatika'])) {
	$kategori_informatika = $_POST['kategori_informatika'];
}

$ketersediaan = $_POST['ketersediaan'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

$query = "INSERT INTO book(kode, judul, penerbit, pengarang, jenis, kategori_bisnis, kategori_informatika, ketersediaan, harga, jumlah, total) VALUES('$kode', '$judul', '$penerbit', '$pengarang', '$jenis', '$kategori_bisnis', '$kategori_informatika', '$ketersediaan', '$harga', '$jumlah', '$total')";

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

?>

</pre>