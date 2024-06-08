<?php
require "../functions/fungsi.php";

$id = $_GET["id"];
$tch = query("SELECT *, teachers.id AS teacher_id, teachers.name AS teacher_name, teachers.description AS teacher_description, courses.id AS course_id, courses.name AS course_name, teachers.image AS teacher_image FROM teachers LEFT JOIN courses ON teacher_id = teachers.id WHERE teachers.id = $id")[0];

session_start();

if(!isset($_SESSION["login"])) {
  header("Location: ../halaman/admin.php");
  exit;
}


if (isset($_POST["change"])) {
  // Jika data berhasil ditambahkan
  echo "<script>
      alert('Data berhasil diubah!');
      document.location.href = '../admin/adminTeacher.php';
    </script>";
  change($_POST);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>[C] Data Teachers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container col-8 mt-4">
      <h1>Change Data for Teachers</h1>
      <a href="adminTeacher.php" class="badge text-bg-dark text-decoration-none p-2">BACK</a>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $tch["teacher_id"]; ?>">
      <div class="mb-3">
        <label for="teacher" class="form-label">Change Teacher</label>
        <input type="text" class="form-control" id="teacher" name="teacher" value="<?= $tch["teacher_name"]; ?>" placeholder="Add teacher" required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Change Description</label>
        <textarea class="form-control" id="description" name="description" placeholder="Change Description" required><?= $tch["teacher_description"]; ?></textarea>
      </div>

      <div class="mb-3">
        <input type="hidden" name="old_image" value="<?= $tch["teacher_image"]; ?>">
        <label for="image" class="form-label">Change Image</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Change Image">
      </div>
      
      <input type="hidden" name="teacher_id" value="<?= $tch["teacher_id"]; ?>">
      <button name="change" class="btn btn-secondary">Change</button>
      </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>