<?php
require "../functions/fungsi.php";
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: ../halaman/admin.php");
  exit;
}

$categories = query("SELECT * FROM categories");
$teachers = query("SELECT * FROM teachers");


// Jika tombol tambah ditekan
if (isset($_POST["tambah"])) {
  // Jika data berhasil ditambahkan
  if (tambah_course($_POST) > 0) {
    echo "<script>
        alert('Data berhasil tambah!');
        document.location.href = '../admin/adminCourse.php';
      </script>";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>[+] Data Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container col-8 mt-4">
      <h1>Add Data for Courses</h1>
      <a href="adminCourse.php" class="badge text-bg-dark text-decoration-none p-2">BACK</a>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id">
      <div class="mb-3">
        <label for="course_name" class="form-label">Add Course</label>
        <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Add Course" required>
      </div>

      <div class="mb-3">
        <label for="detail" class="form-label">Add Detail</label>
        <textarea class="form-control" id="detail" name="detail" placeholder="Change Detail" required></textarea>
      </div>
      
      
      <div class="mb-3">
        <label for="teacher" class="form-label">Add Teacher</label>
        <select name="teacher_id" class="form-control" id="teacher">
            <?php foreach($teachers as $tch){ ?>
            <option value="<?php echo $tch['id']; ?>">
                <?php echo $tch['name']; ?>
            </option> 
            <?php }  ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">Add Category</label>
        <select name="category_id" class="form-control" id="category">
            <?php foreach($categories as $ctg){ ?>
            <option value="<?php echo $ctg['id']; ?>">
                <?php echo $ctg['name']; ?>
            </option> 
            <?php }  ?>
        </select>
      </div>

      <div class="mb-3">
        <input type="hidden" name="old_thumbnail" value="<?= $course["image"]; ?>">
        <label for="thumbnail" class="form-label">Add Image</label>
        <input type="file" class="form-control" id="thumbnail" name="image" placeholder="Change Thumbnail">
      </div>
      
      <button type="submit" name="tambah" class="btn btn-secondary">Add</button>
      </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>