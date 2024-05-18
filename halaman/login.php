<?php
session_start();
require("../functions/fungsi.php");
if (isset($_POST["sign-in"])) {
  $conn = koneksi();
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    
  // Cek username
  if(mysqli_num_rows($result) === 1) {
    // Cek password

    $row = mysqli_fetch_assoc(($result));
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;

      header ("Location: index.php");
      exit;
    }
  }
  
  $error = true;
}


if(isset($_POST["sign-up"])) {
  if(registrasi($_POST) > 0) {
    echo "<script>alert('Halo, User Baru Berhasil ditambahkan!')</script>";
  } else {
    $conn = koneksi();
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <div class="container">
    <div class="row-left">
      <h1>Halo, Selamat Datang Kembali</h1>
      <h3>Masukkan alamat email Anda</h3>
      <form action="" method="post">
       <label>
        Email
        <input type="email" name="email" id="email" placeholder="Enter Email" required>
       </label>
       <label>
        Password
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
       </label>
       <button type="submit" name="sign-in">Sign In</button>
      </form>

  
    </div>
    <div class="row-right">
    <h1>Selamat Datang</h1>
      <!-- <h2>Sign Up</h2> -->
      <h3>Buat Akun</h3>
      <form action="" method="post">
       <label>
        Email
        <input type="email" name="email" id="email" placeholder="Enter Email" required>
       </label>
       <label>
        Username
        <input type="text" name="username" id="username" placeholder="Enter Username" required>
       </label>
       <label>
        Password
        <input type="password" name="password1" id="password" placeholder="Enter Password" required>
       </label>
       <label>
        Konfirmasi Password
        <input type="password" name="password2" id="password" placeholder="Enter Password Again" required>
       </label>
       <button type="submit" name="sign-up">Sign Up</button>
      </form>

    </div>
    <?php if (isset($error)) : ?>
      <div class="error">
    <h1>Email / Password salah!</h1>
    <p>Silakan coba lagi!</p>
    <form action="">
      <button type="submit">Lanjutkan</button>
    </form>
  </div>
  <?php endif; ?>
  </div>
</body>
</html>