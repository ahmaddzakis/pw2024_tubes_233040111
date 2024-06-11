<?php

require "../functions/fungsi.php";

session_start();

$teachers = query("SELECT * FROM teachers");

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

      <!-- Teachers -->
      <section id="teachers" class="teachers">
        <div class="container">
          <h2>MEET OUR</h2>
          <h1>TEACHERS</h1>
          <div class="row justify-content-evenly">
            <?php foreach($teachers as $teacher) : ?>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../img/<?= $teacher["image"]; ?>" class="img-fluid rounded mt-4 border p-1 shadow" alt="teacher">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $teacher["name"]; ?></h5>
                  <p class="card-text"><?= $teacher["description"]; ?></p>
                  <p class="card-text"><small class="text-body-secondary"> &copy; CaNDy FREE ONLINE COURSES</small></p>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          </div>
        </div>
      </section>
      <!-- End Teachers -->

      <!-- Footer -->
      <?php require "footer.php"; ?>
      <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>