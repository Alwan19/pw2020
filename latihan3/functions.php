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

  //cek username
  $query = "SELECT * FROM tb_user WHERE username = '$username'";
  if ($user = query($query)) {

    //cek password
    if (password_verify($password, $user['password'])) {
      //set session
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }
  } else {
    return [
      'error' => true,
      'pesan' => 'username atau password salah'
    ];
  }
}

function registrasi($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  //username / password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
          alert('username / password tidak boleh kosong');
          document.location.href = 'registrasi.php';
          </script>";

    return false;
  }

  //username ada
  $query = "SELECT * FROM tb_user WHERE username = '$username'";
  if (query($query)) {
    echo "<script>
            alert('username sudah terdaftar');
            document.location.href = 'registrasi.php';
            </script>";

    return false;
  }

  //password dan konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai');
            document.location.href = 'registrasi.php';
            </script>";

    return false;
  }

  //password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
            alert('password terlalu pendek');
            document.location.href = 'registrasi.php';
            </script>";

    return false;
  }

  //username dan password sesuai
  //enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  //isert ke tabel user
  $query = "INSERT INTO 
            tb_user
            VALUES
            (null, '$username', '$password_baru')
            ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
