<?php

session_start();

if(!isset($_SESSION["login"])) {
  header("Location: ../halaman/admin.php");
  exit;
}

require "../functions/fungsi.php";

// Jika tombol tambah ditekan
if (isset($_POST["tambah"])) {
  // Jika data berhasil ditambahkan
  if (tambah($_POST) > 0) {
    echo "<script>
        alert('Data berhasil ditambah!');
        document.location.href = '../admin/adminTeacher.php';
      </script>";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>[+] Data Teachers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container col-8 mt-4">
      <h1>Add Data for Teacher</h1>
      <a href="adminTeacher.php" class="badge text-bg-dark text-decoration-none p-2">BACK</a>
    <form action="" method="POST" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="teacher" class="form-label">Add Teacher</label>
        <input type="text" class="form-control" id="teacher" name="teacher" placeholder="Add Teacher" required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Add Description</label>
        <textarea class="form-control" id="description" name="description" placeholder="Add Description" required></textarea>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Add Image</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Add Image" required>
      </div>
      
      <button type="submit" name="tambah" class="btn btn-secondary">Add</button>
      </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>