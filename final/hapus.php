<?php

$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

$kode = $_GET['kode'];

// Query
$query = "DELETE FROM buku WHERE kode = '$kode'";

mysqli_query($conn, $query);

$success = mysqli_affected_rows($conn);

if ($success > 0) {
	echo "
			<script>
				alert('Data berhasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('Data gagal dihapus!');
				document.location.href = 'index.php';
			</script>
		";
}
