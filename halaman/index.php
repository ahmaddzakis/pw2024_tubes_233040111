<?php
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

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
    <nav class="navbar navbar-expand-md bg-transparent sticky-top mynavbar">
      <div class="container">
        <a class="navbar-brand" href="#">CaNDy ENGLISH COURSE</a>
        <button
          class="navbar-toggler border-0"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">CaNDy ENGLISH COURSE</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <div class="navbar-nav ms-auto">
              <a class="nav-link" href="#home">Home</a>
              <a class="nav-link" href="#categories">Categories</a>
              <a class="nav-link" href="#courses">Courses</a>
              <a class="nav-link" href="#teachers">Teachers</a>
              <div class="dropdown-center">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ACCOUNT
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="login.php">Masuk</a></li>
                  <li><a class="dropdown-item" href="login.php">Daftar</a></li>
                </ul>
              </div>
              <a class="nav-link" href="login.php">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Home -->
    <section id="home" class="home">
      <div class="container">
        <div class="row">
          <div class="col-6 left">
            <h4>Halo, <?= $_SESSION["username"]; ?> <br>
            <h2>ONLINE EDUCATION</h2>
            <h3>Learn the <br>
              Skills You Need <br>
              To Succed</h3>
              <p>Free online courses with expert teachers from around the world. <a href="#courses">Let's learn!</a></p>
              <nav class="navbar bg-body-tertiary">
              <div class="container-fluid">
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
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

    <!-- Category -->
    <section id="categories" class="categories">
      <div class="container">
        <h2>POPULAR CATEGORY</h2>
        <h1>Popular Category For Learn</h1>
    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/enk.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-black">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/eng (1).jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-black bg-white">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/eno.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-black bg-white">
        <h5>Belajar</h5>
        <p>Some representative placeholder content for the third slide.</p>
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
    <!-- End Category -->

    <!-- Courses -->
    <section id="courses" class="courses">
    <div class="container">
        <h2>FEATURED COURSES</h2>
        <h1>Pick A Course To Get Started</h1>
        <div class="row justify-content-evenly">
          <div class="card" style="width: 18rem;">
      <img src="../img/cour (1).jpeg" class="card-img-top mt-2" alt="...">
      <div class="card-body">
        <h5 class="card-title">Beginner</h5>
        <p class="card-text">Seseorang yang berada di level ini mempunyai kemampuan bahasa Inggris yang masih sangat dasar. Pemahaman dan penggunaan bahasa Inggris hanya seputar kosa kata yang umum dan kalimat yang sederhana.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    
    <div class="card" style="width: 18rem;">
          <img src="../img/cour (3).jpeg" class="card-img-top mt-2" alt="...">
          <div class="card-body">
            <h5 class="card-title">Intermediate</h5>
            <p class="card-text">Pada level ini, seseorang bisa berbahasa Inggris secara pasif dan aktif dengan topik yang lebih variatif daripada level sebelumnya, baik dalam situasi informal maupun formal (tetapi terbatas). Contohnya dapat bercakap-cakap tentang cita-cita dan gaya hidup, hingga mengikuti wawancara kerja dalam bahasa Inggris.</p>
            <a href="#" class="btn btn-info text-white">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="../img/cour (2).jpeg" class="card-img-top mt-2" alt="...">
          <div class="card-body">
            <h5 class="card-title">Advanced</h5>
            <p class="card-text">Apabila seseorang menduduki level ini, artinya ia bisa menggunakan bahasa Inggris untuk kepentingan akademis dan profesional. Tidak ada lagi kesulitan untuk memahami ataupun menerapkan bahasa Inggris dalam hampir semua kesempatan. Ia dapat mengemukakan gagasannya dalam bentuk lisan dan tertulis terkait beragam topik dengan spontan, fasih, dan percaya diri.</p>
            <a href="#" class="btn btn-secondary">Go somewhere</a>
          </div>
        </div>
        </div>
      </div>
      </section>
      <!-- End Courses -->

      <!-- Teachers -->
      <section id="teachers" class="teachers">
        <div class="container">
          <h2>MEET OUR</h2>
          <h1>TEACHERS</h1>
          <div class="row justify-content-evenly">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../img/cewe.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Hikmal Maulana</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../img/cowo.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Ahmad Dzaki</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../img/cewe.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Hikmal Maulana</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../img/cowo.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Ahmad Dzaki</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </section>
      <!-- End Teachers -->

      <!-- Footer -->
      <footer>
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <small class="block"
              >&copy; 2024 CaNDy Online Courses. All Rights Reserved.</small
            >
            <small class="block"
              >Created by:
              <a href="https://instagram.com/ahmaddzakis">@ahmaddzakis</a
              >.</small
            >

            <ul class="mt-3">
              <li>
                <a href="https://instagram.com/ahmaddzakis"><i class="bi bi-instagram"></i></a>
              </li>
              <li>
                <a href="https://youtube.com/@ahmaddzaki8866?si=EkqEOC8vOR5rizby"><i class="bi bi-youtube"></i></a>
              </li>
              <li>
                <a href="https://twitter.com/AhmadDz22073681"><i class="bi bi-twitter"></i></a>
              </li>
              <li>
                <a href="https://www.facebook.com/ahmad.dzaki.7355?mibextid=nW3QTL"><i class="bi bi-facebook"></i></a>
              </li>
              <li>
                <a href="https://www.tiktok.com/@sixxeyess?is_from_webapp=1&sender_device=pc"><i class="bi bi-tiktok"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </footer>
      <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>