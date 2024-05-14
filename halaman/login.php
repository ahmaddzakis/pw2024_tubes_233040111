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
      <h1>Hey, <br> Welcome</h1>
      <form action="">
       <label>
        Username
        <input type="text" name="username" placeholder="Type your Username...">
       </label>
       <label>
        Password
        <input type="password" name="password" placeholder="Type your Password...">
       </label>
       <button name="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>