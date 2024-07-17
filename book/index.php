<?php

$conn = mysqli_connect("localhost", "root", "", "perpustakaan");
$books = mysqli_query($conn, "SELECT * FROM book");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistem Perpustakaan</title>

  <!-- Bootstrap Style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
  <!-- Header -->
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 mx-5 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
      <!-- Home Icon -->
      <i class="bi bi-house-door-fill" style="font-size: 2rem; color: cornflowerblue;"></i>
    </div>

    <ul class=" nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="#" class="nav-link px-2 link-secondary">Beranda</a></li>
      <li><a href="#" class="nav-link px-2">Anggota</a></li>
      <li><a href="#" class="nav-link px-2">Buku</a></li>
      <li><a href="#" class="nav-link px-2">Peminjaman</a></li>
      <li><a href="#" class="nav-link px-2">Tentang Kami</a></li>
    </ul>

    <div class="col-md-3 text-end">
      <button type="button" class="btn btn-outline-primary me-2">
        Login
      </button>
      <button type="button" class="btn btn-primary">Sign-up</button>
    </div>
  </header>

  <!-- Content -->
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-8"><b>
          <h2>Data Buku</h2>
        </b></div>
      <div class="col-sm-4 text-end">
        <a href="add.php">
          <button type="button" class="btn btn-primary">Tambah Buku</button>
        </a>
      </div>
    </div>

    <!-- Table -->
    <table class="table table-striped table-hover mb-4">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode</th>
          <th scope="col">Judul</th>
          <th scope="col">Cover</th>
          <th scope="col">Pengarang</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Jenis</th>
          <th scope="col">Kategori</th>
          <th scope="col">Katersediaan</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>

      <!-- Body table -->
      <tbody>
        <!-- PHP script -->
        <?php
        $i = 1;

        foreach ($books as $book) {
        ?>
          <tr>
            <th scope="row">
              <?= $i;
              $i++;
              ?>
            </th>
            <td>
              <?= $book['kode']; ?>
            </td>
            <td>
              <?= $book['judul']; ?>
            </td>
            <td>
              <img src="../images/<?= $book['cover'] ?>" alt="Book Cover" style="height: 100px; width:100px">
            </td>
            <td>
              <?= $book['pengarang']; ?>
            </td>
            <td>
              <?= $book['penerbit']; ?>
            </td>
            <td>
              <?= $book['jenis']; ?>
            </td>
            <td>
              <?php
              $kategori = "";

              if ($book['kategori_bisnis'] == 1 && $book['kategori_informatika'] == 1) {
                $kategori = $kategori . "Bisnis, Informatika";
              } else if ($book['kategori_bisnis'] == 1) {
                $kategori = $kategori . "Bisnis";
              } else if ($book['kategori_informatika'] == 1) {
                $kategori = $kategori . "Informatika";
              }

              echo $kategori;
              ?>
            </td>
            <td>
              <?php
              if ($book['ketersediaan'] == 1) {
                echo 'Tersedia';
              } else {
                echo 'Tidak tersedia';
              }
              ?>
            </td>
            <td>
              <?= $book['harga']; ?>
            </td>
            <td>
              <?= $book['jumlah']; ?>
            </td>
            <td>
              <a href="edit.php?kode=<?= $book['kode'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="hapus.php?kode=<?= $book['kode'] ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Footer -->
  <footer class="mt-auto d-flex flex-wrap justify-content-between align-items-center py-3 mb-2 mx-5 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">© 2024 Azizatur Rohma. All rights reserved.</p>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Beranda</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Anggota</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Buku</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Peminjaman</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Tentang Kami</a></li>
    </ul>
  </footer>

  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>