<?php

session_start();

if(!isset($_SESSION["login"])) {
  header("Location: ../halaman/login.php");
  exit;
}

require '../functions/fungsi.php';

$videos = query("SELECT *, 
  videos.name AS title,
  categories.name AS category_name,
  courses.name AS course_name,
  videos.id AS video_id
  FROM videos INNER 
  JOIN courses ON courses.id = videos.course_id 
  JOIN categories ON courses.category_id = categories.id ORDER BY videos.id");

// tombol jika ditekan
if(isset($_POST["search"])) {
  $videos = searchVid($_POST["keyword"]);
}

if(isset($_POST["sort"])) { 
  if($_POST["sort"] === "old") {
    $videos = query("SELECT *, 
                      videos.name AS title,
                      categories.name AS category_name,
                      courses.name AS course_name,
                      videos.id AS video_id
                      FROM videos INNER 
                      JOIN courses ON courses.id = videos.course_id 
                      JOIN categories ON courses.category_id = categories.id ORDER BY videos.id ASC
  ");
  }

  if($_POST["sort"] === "new") {
    $videos = query("SELECT *,
                videos.name AS title,
                categories.name AS category_name,
                courses.name AS course_name,
                videos.id AS video_id
                FROM videos INNER 
                JOIN courses ON courses.id = videos.course_id 
                JOIN categories ON courses.category_id = categories.id ORDER BY videos.id 
                DESC
  ");
  }
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
    <h1 class="bg-info rounded p-2 m-3 text-center">Admin Dashboard</h1>
    <form action="" method="POST">
     <select  class="bg-info text-white p-2 m-3 fw-bold rounded shadow-sm" name="sort" id="sort" onchange="this.form.submit();">
      <?php if($_POST["sort"] === "new") : ?>
      <option value="new"selected>NEWEST</option>
      <option value="old">LATEST</option>
      <?php else : ?>
        <option value="new">NEWEST</option>
        <option value="old" selected>LATEST</option>
        <?php endif; ?>
     </select>
    </form>

        <nav class="navbar">
              <div class="container-fluid">
                <form class="d-flex" role="search" action="" method="POST">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" autofocus autocomplete="off">
                  <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                  </form>
                </div>
              </nav>
    <a href="tambahVideo.php" class="btn btn-warning"><i class="bi bi-plus-square"></i></a>
    <table class="table table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Course</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php foreach($videos as $vid) : ?>
      <tr>
        <th scope="row"><?= $i ?></th>
      <td><img src="../img/<?= $vid["thumbnail"]; ?>" alt="image" width="100px"></td>
      <td><?= $vid['title'] ?></td>
      <td><?= $vid['category_name'] ?></td>
      <td><?= $vid['course_name'] ?></td> 
      
      <td>
          <a href="updateVideo.php?id=<?= $vid["video_id"] ?>" class="badge text-bg-warning text-decoration-none">Change</a> 
          <a href="removeVideo.php?id=<?= $vid['video_id']; ?>" onclick="return confirm('You Sure?');" class="badge text-bg-danger text-decoration-none">Remove</a>
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