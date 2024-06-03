<?php
require "../functions/fungsi.php";
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: ../halaman/admin.php");
  exit;
}

$id = $_GET["id"];

$course = query("SELECT * FROM courses WHERE id = $id")[0];

$category_id = $course["category_id"];
$old_category = query("SELECT name FROM categories WHERE id = $category_id")[0]["name"];
$categories = query("SELECT * FROM categories WHERE id != $category_id");


// Jika tombol tambah ditekan
if (isset($_POST["change"])) {
  // Jika data berhasil ditambahkan
  if (change_course($_POST) > 0) {
    echo "<script>
        alert('Data berhasil diubah!');
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
    <title>[C] Data Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container col-8 mt-4">
      <h1>Change Data for Courses</h1>
      <a href="adminCourse.php" class="badge text-bg-dark text-decoration-none p-2">BACK</a>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $course["id"]; ?>">
      <div class="mb-3">
        <label for="course_name" class="form-label">Change Name</label>
        <input type="text" class="form-control" id="course_name" name="course_name" value="<?= $course["name"]; ?>" placeholder="Add course_name" required>
      </div>

      <div class="mb-3">
        <label for="detail" class="form-label">Change Detail</label>
        <textarea class="form-control" id="detail" name="detail" placeholder="Change Detail" required><?= $course["detail"]; ?></textarea>
      </div>
      
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select name="category_id" class="form-control" id="category">
            <option value="<?php echo $category_id; ?>"><?php echo $old_category; ?></option>
            <?php foreach($categories as $ctg){ ?>
            <option value="<?php echo $ctg['id']; ?>">
                <?php echo $ctg['name']; ?>
            </option> 
            <?php }  ?>
        </select>
      </div>

      <div class="mb-3">
        <input type="hidden" name="old_thumbnail" value="<?= $course["image"]; ?>">
        <label for="thumbnail" class="form-label">Change Image</label>
        <input type="file" class="form-control" id="thumbnail" name="image" placeholder="Change Thumbnail">
      </div>
      
      <button type="submit" name="change" class="btn btn-secondary">Change</button>
      </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>