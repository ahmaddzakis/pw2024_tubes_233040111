<?php
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: ../halaman/admin.php");
  exit;
}

require "../functions/fungsi.php";

$id = $_GET["id"];

$videos = query("SELECT * FROM videos WHERE videos.id = $id")[0];



// Jika tombol tambah ditekan
if (isset($_POST["change"])) {
  // Jika data berhasil ditambahkan
  if (change_video($_POST) > 0) {
    echo "<script>
        alert('Data berhasil diubah!');
        document.location.href = '../admin/adminVideo.php';
      </script>";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>[C] Data Video</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container col-8 mt-4">
      <h1>Change Data for Video</h1>
      <a href="adminVideo.php" class="badge text-bg-dark text-decoration-none p-2">BACK</a>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $videos["id"]; ?>">
      <div class="mb-3">
        <label for="title" class="form-label">Change Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $videos["name"]; ?>" placeholder="Change Title" required>
      </div>

      <div class="mb-3">
        <label for="link" class="form-label">Change Link</label>
        <input class="form-control" id="link" name="link" value="<?= $videos["link"]; ?>" placeholder="Change Link" required>
      </div>

      <div class="mb-3">
        <input type="hidden" name="old_thumbnail">
        <label for="image" class="form-label">Change Thumbnail</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Change Image" required>
      </div>
      
      <button type="submit" name="change" class="btn btn-secondary">Change</button>
      </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>