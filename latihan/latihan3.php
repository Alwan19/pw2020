<?php

require 'functions.php';

$query = "SELECT * FROM tb_mahasiswa";

$mahasiswa = query($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar mahasiswa</title>
</head>

<body>

  <h3>Daftar mahasiswa</h3>

  <table border="1" cellpading="10" cellspacing="0" style="text-align: center;">

    <tr>

      <th>#</th>
      <th>Gambar</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Aksi</th>

    </tr>

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