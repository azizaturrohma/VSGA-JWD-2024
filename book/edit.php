<?php

$kode = $_GET['kode'];

$conn = mysqli_connect("localhost", "root", "", "perpustakaan");
$query = "SELECT * FROM book WHERE kode = '$kode'";
// print($query);

$result = mysqli_query($conn, $query);
$book = mysqli_fetch_array($result);
// print_r($book);

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

  <div class="container">
    <div>
      <h2>Form Edit Buku</h2>
    </div>

    <form class="row g-3 my-2" name="bookForm" onsubmit="return validateForm()" method="post" action="edit-handler.php">
      <div class="col-12">
        <label for="kode" class="form-label">Kode</label>
        <input type="text" class="form-control" id="kode" name="kode" value="<?= $book['kode'] ?>">
      </div>
      <div class="col-12">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?= $book['judul'] ?>">
      </div>
      <div>
        <label for="cover" class="form-label">Cover</label>
        <input type="file" class="form-control" id="cover" value="<?= $book['cover'] ?>" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
      </div>
      <div class="col-6">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $book['penerbit'] ?>">
      </div>
      <div class="col-6">
        <label for="pengarang" class="form-label">Pengarang</label>
        <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $book['pengarang'] ?>">
      </div>
      <div class="col-12">
        <label for="jenis" class="form-label">Jenis</label>
        <select class="form-select" id="jenis" name="jenis">
          <option <?php if ($book['jenis'] == 'Modul') {
                    print 'selected';
                  } ?>>Modul</option>
          <option <?php if ($book['jenis'] == 'Textbook') {
                    print 'selected';
                  } ?>>Textbook</option>
          <option <?php if ($book['jenis'] == 'TA') {
                    print 'selected';
                  } ?>>TA</option>
        </select>
      </div>
      <div class="row mt-3">
        <div class="col-6">
          <label for="kategori" class="form-label">Kategori</label>
          <div class="form-check">
            <input <?php if ($book['kategori_bisnis'] == 1) {
                      print 'checked';
                    } ?> class="form-check-input" type="checkbox" value="1" id="kategori_bisnis" name="kategori_bisnis">
            <label class="form-check-label" for="kategori_bisnis">
              Bisnis
            </label>
          </div>
          <div class="form-check">
            <input <?php if ($book['kategori_informatika'] == 1) {
                      print 'checked';
                    } ?> class="form-check-input" type="checkbox" value="1" id="kategori_informatika" name="kategori_informatika">
            <label class="form-check-label" for="kategori_informatika">
              Informatika
            </label>
          </div>
        </div>
        <div class="col-6">
          <label for="ketersediaan" class="form-label">Ketersediaan</label>
          <div class="form-check">
            <input <?php if ($book['ketersediaan'] == 1) {
                      print 'checked';
                    } ?> class="form-check-input" type="radio" name="ketersediaan" id="ketersediaan1" value="1" value="<?= $book['ketersediaan'] ?>">
            <label class="form-check-label" for="ketersediaan1">
              Tersedia
            </label>
          </div>
          <div class="form-check">
            <input <?php if ($book['ketersediaan'] == 0) {
                      print 'checked';
                    } ?> class="form-check-input" type="radio" name="ketersediaan" id="ketersediaan2" value="0" value="<?= $book['ketersediaan'] ?>">
            <label class="form-check-label" for="ketersediaan2">
              Tidak tersedia
            </label>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-4">
          <label for="harga" class="form-label">Harga</label>
          <input type="number" class="form-control" id="harga" name="harga" value="<?= $book['harga'] ?>" oninput="updateTotal()">
        </div>
        <div class="col-4">
          <label for="jumlah" class="form-label">Jumlah</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" oninput="updateTotal()" value="<?= $book['jumlah'] ?>">
        </div>
        <div class="col-4">
          <label for="total" class="form-label">Total</label>
          <input type="number" class="form-control" id="total" name="total" value="<?= $book['total'] ?>">
        </div>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
      </div>
    </form>
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

  <!-- Script -->
  <script>
    function validateForm() {
      // form name & input name
      let x = document.forms["bookForm"]["pengarang"].value;
      if (x == "") {
        alert("Kolom wajib diisi");
        return false;
      }
    }

    function updateTotal() {
      let harga = document.getElementById("harga").value;
      let jumlah = document.getElementById("jumlah").value;

      let total = harga * jumlah;

      document.getElementById("total").value = total;
    }
  </script>

  <!-- Bootstrap Script -->
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>