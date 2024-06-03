<?php
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "../functions/fungsi.php";

$id = $_GET["id"];

if(remove($id) > 0) {
  echo "
  <script>alert('Data Berhasil Dihapus!');
  document.location.href = 'adminTeacher.php';
  </script>
  ";
} else {
  echo "
  <script>alert('Data Gagal Dihapus!');
  document.location.href = 'adminTeacher.php';
  </script>
  ";
}

?>