<?php

require 'functions.php';

$id = $_GET['id'];

$query = "SELECT * FROM tb_mahasiswa WHERE id = $id";
$m = query($query);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail mahasiswa</title>
</head>

<body>

  <h3>Mahasiswa</h3>

  <ul>
    <li><img src="img/<?= $m['gambar']; ?>" width="70px"></li>
    <li><?= $m['nim']; ?></li>
    <li><?= $m['nama']; ?></li>
    <li><?= $m['email']; ?></li>
    <li><?= $m['jurusan']; ?></li>
    <li>
      <a href="">Ubah</a> | <a href="">Hapus</a>
    </li>
  </ul>
  <a href="latihan3.php">
    Kembali</a>

</body>

</html>