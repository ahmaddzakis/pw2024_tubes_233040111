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
      $email = $_POST["email"];
      $_SESSION["username"] = user($email);

      // var_dump($_SESSION["username"]);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Halaman Login</title>
</head>

<body>
    <div class="container" id="container">
    <?php if (isset($error)) : ?>
                    <div class="error">
                  <h1>Email / Password salah!</h1>
                  <p>Silakan coba lagi!</p>
                  <a href="login.php"><button type="button">Lanjutkan</button></a>
                </div>
              <?php endif; ?>
        <div class="form-container sign-up">
            <form action="" method="post">
                <h1>Buat Akun</h1>
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="password1" id="password" placeholder="Password" required>
                <input type="password" name="password2" id="password" placeholder="Konfirmasi Password" required>
                <label for="admin">Admin</label>
                <input type="radio" name="radio" id="admin" value="Admin">
                <label for="users">User</label>
                <input type="radio" name="radio" id="users" value="Users">
                <button type="submit" name="sign-up">Mendaftar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Masuk</h1>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button type="submit" name="sign-in">Masuk</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Selamat Datang kembali!</h1>
                    <p>Masukkan detail pribadi Anda untuk menggunakan semua fitur situs</p>
                    <button class="hidden" id="login">Masuk</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Halo, teman!</h1>
                    <p>Daftarkan dengan detail pribadi Anda untuk menggunakan semua fitur situs</p>
                    <button class="hidden" id="register">Mendaftar</button>
                </div>
            </div>
        </div>
        
    </div>
    <script src="../js/script.js"></script>
</body>

</html>