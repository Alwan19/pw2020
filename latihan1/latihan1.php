<?php

//koneksi dan pilih database
$conn = mysqli_connect('localhost', 'root', '', 'db_latihan');

//query isi tabel mahasiswa
$query = "SELECT * FROM tb_mahasiswa";
$result = mysqli_query($conn, $query);

//ubah data ke array
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}

//tampung ke variabel mahasiswa
$mahasiswa = $rows;

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

  <table border="1" cellpading="10" cellspacing="0">

    <tr>

      <th>#</th>
      <th>Gambar</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>

    </tr>

    <?php $i = 1;
    foreach ($mahasiswa as $m) : ?>
      <tr>

        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width="50px"></td>
        <td><?= $m['nim']; ?></td>
        <td><?= $m['nama']; ?></td>
        <td><?= $m['email']; ?></td>
        <td><?= $m['jurusan']; ?></td>
        <td>
          <a href="">Update</a> | <a href="">Hapus</a>
        </td>

      </tr>
    <?php endforeach; ?>

  </table>


</body>

</html>