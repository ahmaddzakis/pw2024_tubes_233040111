<?php
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Utama</title>
  <link rel="stylesheet" href="../css/index.css">
</head>
<body>
  <!-- <h1>Halo, <?= $_SESSION["email"]; ?></h1> -->
  <a href="login.php">Logout</a>
</body>
</html>