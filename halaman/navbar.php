<?php 
?>



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
              <a class="nav-link" href="../halaman/index.php">Home</a>
              <a class="nav-link" href="../halaman/categories.php">Categories</a>
              <a class="nav-link" href="../halaman/coursesPage.php">Courses</a>
              <a class="nav-link" href="../halaman/teachers.php">Teachers</a>
              <?php if(isset($_SESSION["login"]) && $_SESSION["level"] === "Admin") : ?>
              <div class="dropdown-center">
                <button class="btn btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ACCOUNT
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../admin/dashboard.php">Admin</a></li>
                </ul>
              </div>
              <?php endif; ?>
              <a class="nav-link" href="../logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->