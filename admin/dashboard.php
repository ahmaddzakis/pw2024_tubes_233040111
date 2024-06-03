<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  </head>
  <body>
    <?php require "../halaman/navbar.php"; ?>
    <div class="container">
      <a href="../halaman/index.php" class="badge text-bg-dark text-decoration-none p-2 mb-4">HOME</a>
      <h1 class="text-warning text-center p-2 mb-4 bg-info rounded">Welcome to Admin Dashboard</h1>
      <div class="row">
        <div class="col-12 kotak">
          <div class="teacher p-2">
          <i class="fa-solid fa-clipboard fa-5x text-success-emphasis p-2"></i>
            <h1 class="pb-2">Teachers</h1>
            <a href="adminTeacher.php" class="text-white fs-5 bg-secondary rounded-pill p-2">See Details</a>
          </div>
          <div class="course p-2">
            <i class="fa-solid fa-book fa-5x text-success-emphasis p-2"></i>
          <h1 class="pb-2">Courses</h1>
          <a href="adminCourse.php" class="text-white fs-5 bg-secondary rounded-pill p-2">See Details</a>
          </div>
          <div class="category p-2">
          <i class="fa-solid fa-address-book fa-5x text-success-emphasis p-2"></i>
          <h1 class="pb-2">Videos</h1>
          <a href="adminVideo.php" class="text-white fs-5 bg-secondary rounded-pill p-2">See Details</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>