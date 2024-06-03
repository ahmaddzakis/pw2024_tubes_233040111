<?php 

session_start();

if (isset($_SESSION['login'])) {
  header('Location:halaman/index.php');
} else {
  header('Location:halaman/login1.php');
}

?>