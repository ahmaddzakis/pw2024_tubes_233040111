<?php

session_start();

if(!isset($_SESSION["login"])) {
  header("Location: ../halaman/admin.php");
  exit;
}

require "../functions/fungsi.php";

$courses = query("SELECT * FROM courses");

// Jika tombol tambah ditekan
if (isset($_POST["tambah"])) {
  // Jika data berhasil ditambahkan
  if (tambah_video($_POST) > 0) {
    echo "<script>
        alert('Data berhasil ditambah!');
        document.location.href = '../admin/adminVideo.php';
      </script>";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>[+] Data Video</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container col-8 mt-4">
      <h1>Add Data for Video</h1>
      <a href="adminVideo.php" class="badge text-bg-dark text-decoration-none p-2">BACK</a>
    <form action="" method="POST" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="video" class="form-label">Title</label>
        <input type="text" class="form-control" id="video" name="title" placeholder="Add Title" required>
      </div>

      <div class="mb-3">
        <label for="course" class="form-label">Course</label>
        <select name="course_id" class="form-control" id="course">
            <option value="">Choose Courses</option>
            <?php foreach($courses as $course){ ?>
            <option value="<?php echo $course['id']; ?>">
                <?php echo $course['name']; ?>
            </option> 
            <?php }  ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="link" class="form-label">Link</label>
        <input type="text" class="form-control" id="link" name="link" placeholder="Add Link" required>
      </div>
      
      <div class="mb-3">
        <label for="image" class="form-label">Add Thumbnail</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Add Thumbnail">
      </div>
      
      <button type="submit" name="tambah" class="btn btn-secondary">Add</button>
      </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>