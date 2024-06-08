<?php

require "../functions/fungsi.php";

session_start();
// var_dump($_SESSION["name"]);

$videos = query("SELECT *
                FROM videos"
                );

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
    <style>
      body {
        height: 250vh;
        background-color: palegoldenrod;
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
        font-weight: 500;
        box-shadow: 2px 2px 10px 4px white;
      }

      .right img {
        animation: gokil 2s infinite;
      }

      @keyframes gokil {
        0%,
        100% {
          transform: scale(1);
        }
        50% {
          transform: scale(1.1);
        }
      }



    </style>
</head>
<body>

  <!-- Navbar -->
  <?php require "navbar.php"; ?>
  <!-- End Navbar -->
  
    <!-- Home -->
    <section id="home" class="home">
      <div class="container">
        <div class="row">
          <div class="col-6 left">
            <?php if (isset($_SESSION["login"])) : ?>
            <h4>Hey, <?= $_SESSION["name"]; ?></h4>
            <?php endif; ?>
            <h2>ONLINE EDUCATION</h2>
            <h3>Learn the <br>
              Skills You Need <br>
              To Succed</h3>
              <p>Free online courses with expert teachers from around the world. <a href="coursesPage.php">Let's learn!</a></p>
              <nav class="navbar bg-body-tertiary rounded">
              <div class="container-fluid">
                <form action="coursesPage.php" method="post" class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search Courses" aria-label="Search" name="keyword" autocomplete="off">
                  <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                  </form>
                </div>
              </nav>
          </div>
          <div class="col-6 right">
            <img src="../img/home.png" alt="home" width="500">
          </div>
        </div>
    </div>
</section>
    <!-- End Home -->

    <!-- Preview -->
    <section id="categories" class="categories">
      <div class="container">
        <h2>PREVIEW</h2>
        <h1>Preview For Learn</h1>
    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/stdy.jpeg" class="d-block w-100" alt="image">
        <div class="carousel-caption d-none d-md-block text-black bg-white">
          <h5>Easy way to Learn!</h5>
          <p>Learn with Experts Anytime, Anywhere, & Enjoy</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../img/belajar.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-black bg-white">
          <h5>Perfect online Course For your Carrer!</h5>
          <p>Speak English like an Expert!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../img/study.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-black bg-white">
          <h5>LIVE LEARN GROW</h5>
          <p>Education Investment goes a Long Way.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
    </section>
    <!-- End Preview -->

    <!-- Videos -->

    <h1 class="m-3 fw-bold border"><marquee behavior="alternate" scrollamount="15" direction="right">WATCH VIDEOS</marquee></h1>
    <?php if(isset($_SESSION["login"])) : ?>
    <div class="card-row">
      <?php foreach($videos as $vid) : ?>
        <a href="videos.php?id=<?= $vid["id"]; ?>" class="col-3 text-decoration-none">
          <div class="card p-0" style="width: 18rem;">
            <img src="../img/<?= $vid["thumbnail"]; ?>" class="card-img-top" alt="thumbnail">
            <div class="card-body">
              <p class="card-text text-center"><?= $vid["name"]; ?></p>
            </div>
          </div>
        </a>
      <?php endforeach ; ?>
    </div>
    <?php else : ?>
      <h1 class="bg bg-danger text-white text-center m-4 p-4"><marquee behavior="alternate" scrollamout="20" direction="right">ANDA HARUS <a href="login1.php">LOG - IN</a> TERLEBIH DAHULU UNTUK MENGAKSES VIDEO</marquee></h1>
  <?php endif; ?>
    <!-- End Videos -->

      <!-- Footer -->
      <?php require "footer.php"; ?>
      <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>