<?php
function koneksi() {
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040111');
return $conn;
}

function query($query) {
  $conn = koneksi();

  $result = mysqli_query($conn, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function registrasi($data) {
  $conn = koneksi();

  $email = strtolower($data["email"]);
  $username = ucwords(stripslashes($data["username"]));
  $password1 = mysqli_real_escape_string($conn, $data["password1"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  if($password1 !== $password2) {
      echo "<script>alert('Konfirmasi password tidak sesuai')</script>";
      return false;
  }

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  if(mysqli_fetch_assoc($result)) {
      echo "<script>alert('Email sudah terdaftar')</script>";
      return false;
  }

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$username'");
  if(mysqli_fetch_assoc($result)) {
      echo "<script>alert('Username sudah terpakai')</script>";
      return false;
  }

  $password1 = password_hash($password1, PASSWORD_DEFAULT);

  mysqli_query($conn, "INSERT INTO users(email, password, name) VALUES ('$email', '$password1', '$username')");

  return mysqli_affected_rows($conn);
}
?>
