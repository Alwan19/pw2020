<?php

require 'functions.php';

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM tb_mahasiswa WHERE id = $id";
$m = query($query);

//tombol udah ditekan atau belum
if (isset($_POST['edit'])) {
  if (edit($_POST) > 0) {
    echo "<script>
            alert('Data telah diedit');
            document.location.href = 'index.php';
          </script>
          ";
  } else {
    echo "Data gagal diedit!!";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit data</title>
</head>

<body>

  <h3>Edit Data Mahasiswa</h3>

  <form action="" method="POST">

    <input type="hidden" name="id" value="<?= $m['id']; ?>">

    <ul>

      <li>
        <label for="nama">
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $m['nama']; ?>">
        </label>
      </li>

      <li>
        <label>
          NIM :
          <input type="number" name="nim" required value="<?= $m['nim']; ?>">
        </label>
      </li>

      <li>
        <label>
          Email :
          <input type="text" name="email" required value="<?= $m['email']; ?>">
        </label>
      </li>

      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" required value="<?= $m['jurusan']; ?>">
        </label>
      </li>

      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required value="<?= $m['gambar']; ?>">
        </label>
      </li>

      <button type="submit" name="edit">Edit</button>

    </ul>

    <a href="index.php">Kembali</a>

  </form>

</body>

</html>