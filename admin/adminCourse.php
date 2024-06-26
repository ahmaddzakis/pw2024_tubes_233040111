<?php

session_start();

if(!isset($_SESSION["login"])) {
  header("Location: ../halaman/login.php");
  exit;
}

require '../functions/fungsi.php';

$courses = query("SELECT *,
courses.id AS course_id,
courses.name AS course_name,
courses.image AS course_image,
courses.detail AS course_detail,
courses.teacher_name AS teacher_name,
categories.name AS category_name
FROM courses
LEFT JOIN categories ON categories.id = courses.category_id
LEFT JOIN teachers ON teachers.id = teacher_id
ORDER BY courses.id DESC");

// tombol cari ditekan
if(isset($_POST["search"]))  {
  $courses = searchCour($_POST["keyword"]);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  </head>
  <body>
    <?php require "../halaman/navbar.php"; ?>
    <div class="container">
      <a href="../admin/dashboard.php" class="badge text-bg-dark text-decoration-none p-2">BACK</a>
      
      <h1 class="bg-info rounded p-2 m-3 text-center">Admin Dashboard</h1>
      <nav class="navbar">
              <div class="container-fluid">
                <form class="d-flex" role="search" action="" method="POST">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" autofocus autocomplete="off">
                  <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                  </form>
                </div>
              </nav>
      <a href="tambahCourse.php" class="btn btn-warning"><i class="bi bi-plus-square"></i></a>
      <a href="../print.php" class="bg-info rounded p-2 mt-5 shadow text-white text-center text-decoration-none fw-bold">PRINT <i class="fa-solid fa-print"></i></a>
    <table class="table table-striped table-hover">
    
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Image</th>
      <th scope="col">Course</th>
      <th scope="col">Teacher</th>
      <th scope="col">Category</th>
      <th scope="col">Detail</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php foreach($courses as $course) : ?>
      <tr>
        <th scope="row"><?= $i ?></th>
      <td><img src="../img/<?= $course["course_image"]; ?>" alt="" width="100px"></td>
      <td><?= $course['course_name']; ?></td>
      <td><?= $course['teacher_name']; ?></td> 
      <td><?= $course['category_name']; ?></td>
      <td><?= $course['course_detail']; ?></td> 

      
      <td>
          <a href="updateCourse.php?id=<?= $course["course_id"] ?>" class="badge text-bg-warning text-decoration-none">Change</a> 
          <a href="removeCourse.php?id=<?= $course['course_id']; ?>" onclick="return confirm('You Sure?');" class="badge text-bg-danger text-decoration-none">Remove</a>
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