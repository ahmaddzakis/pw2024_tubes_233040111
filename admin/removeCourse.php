<?php
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "../functions/fungsi.php";

$id = $_GET["id"];

$videos = query("SELECT * FROM videos WHERE course_id = $id");
$jumlahVideo = strval(count($videos));

if(remove_course($id, $jumlahVideo) > 0) {
  echo "
  <script>alert('Data Berhasil Dihapus!');
  document.location.href = 'adminCourse.php';
  </script>
  ";
} else {
  echo "
  <script>alert('Data Gagal Dihapus!');
  document.location.href = 'adminCourse.php';
  </script>
  ";
}

?>