<?php

require 'functions.php';

//tombol udah ditekan atau belum
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data telah ditambahkan');
            document.location.href = 'index.php';
          </script>
          ";
  } else {
    echo "Data gagal ditambahkan!!";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah data</title>
</head>

<body>

  <h3>Tambah Data Mahasiswa</h3>

  <form action="" method="POST">

    <ul>

      <li>
        <label for="nama">
          Nama :
          <input type="text" name="nama" autofocus required>
        </label>
      </li>

      <li>
        <label>
          NIM :
          <input type="number" name="nim" required>
        </label>
      </li>

      <li>
        <label>
          Email :
          <input type="text" name="email" required>
        </label>
      </li>

      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" required>
        </label>
      </li>

      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required>
        </label>
      </li>

      <button type="submit" name="tambah">Tambah</button>

    </ul>

    <a href="index.php">Kembali</a>

  </form>

</body>

</html>