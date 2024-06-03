<?php

require "../functions/fungsi.php";

session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$categories = query("SELECT * FROM categories");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CaNDy | English Online Course</title>
  <link rel="stylesheet" href="../css/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
</head>
<body>

  <!-- Navbar -->
  <?php require "navbar.php"; ?>
  <!-- End Navbar -->

    <!-- Category -->
    <section id="courses" class="courses">
    <div class="container">
        <h2>FEATURED CATEGORIES</h2>
        <h1>Pick A Category To Get Started</h1>
        <div class="row justify-content-evenly">
          <?php foreach($categories as $ctg) : ?>
          <div class="card" style="width: 18rem;">
            <img src="../img/<?= $ctg["image"]; ?>" class="card-img-top mt-2" alt="courses">
            <div class="card-body">
              <h5 class="card-title"><?= $ctg["name"]; ?></h5>
              <a href="courses.php?course=<?= $ctg["id"] ?>" class="btn btn-light">LEARN</a>
            </div>
          </div>
          <?php endforeach; ?>
      </div>
      </section>
      <!-- End Category -->

      <!-- Footer -->
      <?php require "footer.php"; ?>
      <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>