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
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KURSUS BAHASA INGGRIS</title>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        height: 250vh;
        background-color: pink;
      }

      .card-row {
        width: 100%;
        height: 180vh;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
      } 

      .card-row a {
        width: 18rem;
        justify-self: center;
      }

      .card {
        align-self: flex-start;
        transition: 300ms;
        box-shadow: 2px 2px 10px 4px salmon;
      }

      .card:hover {
        transform: scale(1.1);
        color: darkslategrey;
        font-weight: 600;
        box-shadow: 2px 2px 10px 4px white;
      }

    </style>
  </head>
  <body>
    <?php require "navbar.php"; ?>
    <div class="container">
      <h2 class="text-center">FEATURED COURSES</h2>
      <h1 class="text-center mb-4">Pick A Course To Learn</h1>
    
    <div class="card-row">
        
        <?php foreach($courses as $crs) : ?>
          <a href="coursesDet.php?videos=<?= $crs["course_id"]; ?>" class="col-3 text-decoration-none">
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
      <?php require "footer.php"; ?>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>