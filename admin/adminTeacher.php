<?php

session_start();

if(!isset($_SESSION["login"])) {
  header("Location: ../halaman/login.php");
  exit;
}

require '../functions/fungsi.php';

$teachers = query("SELECT *,
teachers.id AS teacher_id,
teachers.name AS teacher_name,
teachers.image as teacher_image,
teachers.description AS description
FROM teachers ORDER BY teachers.id DESC");

// tombol cari ditekan
if(isset($_POST["search"])) {
  $teachers = searchTeac($_POST["keyword"]);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php require "../halaman/navbar.php"; ?>
    <div class="container">
      <a href="../admin/dashboard.php" class="badge text-bg-dark text-decoration-none p-2">BACK</a>
      <h1>Admin Dashboard</h1>
      <nav class="navbar">
              <div class="container-fluid">
                <form class="d-flex" role="search" action="" method="POST">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" autofocus autocomplete="off">
                  <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                  </form>
                </div>
              </nav>
      <a href="tambahTeacher.php" class="btn btn-warning"><i class="bi bi-plus-square"></i></a>
    <table class="table table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php foreach($teachers as $tch) : ?>
      <tr>
        <th scope="row"><?= $i ?></th>
      <td><img src="../img/<?= $tch["teacher_image"]; ?>" alt="" width="100px"></td>
      <td><?= $tch['teacher_name'] ?></td>
      <td><?= $tch['description'] ?></td>
      
      <td>
          <a href="updateTeacher.php?id=<?= $tch["teacher_id"] ?>" class="badge text-bg-warning text-decoration-none">Change</a> 
          <a href="removeTeacher.php?id=<?= $tch['teacher_id']; ?>" onclick="return confirm('You Sure?');" class="badge text-bg-danger text-decoration-none">Remove</a>
    </td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>


  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>