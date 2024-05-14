<?php
// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040111');

// Query ke tabel mahasiswa
// $result = mysqli_query($conn, '');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <h1>Sign In</h1>
      <form action="">
       <label>
        Email
        <input type="email" name="email" placeholder="Enter Email">
       </label>
       <label>
        Password
        <input type="password" name="password" placeholder="Enter Password">
       </label>
       <button name="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>