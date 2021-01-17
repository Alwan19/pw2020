<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'db_latihan');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);


  $query = "INSERT INTO 
            tb_mahasiswa
            VALUES
            (null, '$nama', '$nim', '$email', '$jurusan', '$gambar')
            ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  $query = "DELETE FROM tb_mahasiswa WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function edit($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);


  $query = "UPDATE 
            tb_mahasiswa
            SET
            nama = '$nama', 
            nim = '$nim', 
            email = '$email', 
            jurusan = '$jurusan', 
            gambar = '$gambar'
            WHERE
            id = $id
            ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM 
            tb_mahasiswa 
            WHERE 
            nama LIKE '%$keyword%'
            OR
            nim LIKE '%$keyword%'
            OR
            jurusan LIKE '%$keyword%'
            OR
            email LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  $query = "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'";

  if (query($query)) {

    //set session
    $_SESSION['login'] = true;

    header("Location: index.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'username atau password salah'
    ];
  }
}
