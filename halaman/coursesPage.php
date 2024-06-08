<?php 
session_start();
require "../functions/fungsi.php";

$courses = query("SELECT *, 
  courses.name AS course_name,
  courses.image AS course_image,
  categories.detail AS category_detail,
  categories.name AS category_name,
  courses.id AS course_id
  FROM courses
  LEFT JOIN categories ON category_id = categories.id
  ORDER BY courses.id");

  // tombol cari ditekan
if(isset($_POST["search"])) {
  $courses = searchPage($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KURSUS BAHASA INGGRIS</title>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <script src="../js/jquery-3.7.1.min.js"></script>
    <style>
      .card-row {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
      }

      .card {
        margin: auto;
      }

      .card:hover {
        transform: scale(1.1);
        font-weight: 500;
        box-shadow: 2px 2px 10px 4px white;
      }

      .load {
        width: 100px;
        position: absolute;
        left: 225px;
        top: -5px;
        z-index: -1;
        display: none;
      }
    </style>
  </head>
  <body>
  <?php require "navbar.php"; ?>
  <nav class="navbar">
              <div class="container-fluid">
               <form class="d-flex" role="search">
                  <input class="form-control me-2 shadow-sm" type="search" placeholder="Search Something ..." aria-label="Search" id="keyword" autocomplete="off">
                  <button class="btn btn-outline-secondary" type="submit" name="search" id="searchButton">Search</button>
                  <img src="../img/load.gif" alt="load" class="load">
                  </form>
                </div>
              </nav>
    <section id="teachers" class="teachers">
        <div class="container">
          <h1 class="m-4">PICK COURSES</h1>
          <div class="row card-row" id="container">
          <?php foreach($courses as $crs) : ?>
            <a href="coursesDet.php?videos=<?= $crs["course_id"]; ?>">
              <div class="card" style="width: 18rem;">
                <img src="../img/<?= $crs["course_image"]; ?>" class="card-img-top" alt="thumbnail">
                <div class="card-body">
                  <p class="card-text text-center fs-6"><?= $crs["course_name"]; ?></p>
                  <p class="card-text text-center fs-6"><?= $crs["teacher_name"]; ?></p>
                </div>
              </div>
            </a>
        <?php endforeach ; ?>
          </div>
        </div>
      </section>
      <!-- End Teachers -->

      <!-- Footer -->
      <?php require "footer.php"; ?>
      <!-- End Footer -->

      <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>