<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

$query = "SELECT * FROM tb_mahasiswa";

$mahasiswa = query($query);

//ketika tombol cari diklik

if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar mahasiswa</title>
</head>

<body>

  <a href="logout.php">Logout</a>

  <h3>Daftar mahasiswa</h3>

  <a href="tambah.php">Tambah data</a>
  <br>
  <br>

  <form action="" method="POST">
    <input type="text" name="keyword" size="40px" placeholder="Masukkan Keyword Cari..." autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari</button>
  </form>

  <br>
  <br>

  <table border="1" cellpadding="10" cellspacing="0" style="text-align: center;">

    <tr>

      <th>#</th>
      <th>Gambar</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Aksi</th>

    </tr>

    <?php if (empty($mahasiswa)) : ?>
      <tr>
        <td colspan="5">
          <p style="color: red; font-style: italic;">Data mahasiswa tidak ditemukan.!</p>
        </td>
      </tr>

    <?php endif; ?>

    <?php $i = 1;
    foreach ($mahasiswa as $m) : ?>
      <tr>

        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width="50px"></td>
        <td><?= $m['nim']; ?></td>
        <td><?= $m['nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $m['id']; ?>">Lihat detail</a>
        </td>

      </tr>
    <?php endforeach; ?>

  </table>


</body>

</html>