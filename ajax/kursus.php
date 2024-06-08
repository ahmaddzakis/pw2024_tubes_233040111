<?php 
usleep(300000);
require "../functions/fungsi.php";
$keyword = $_GET["keyword"];
$query = "SELECT *, 
  courses.name AS course_name,
  courses.image AS course_image,
  categories.detail AS category_detail,
  categories.name AS category_name,
  courses.id AS course_id
  FROM courses
  LEFT JOIN categories ON category_id = categories.id
  WHERE
  courses.name LIKE '%$keyword%' OR
  courses.teacher_name LIKE '%$keyword%'
  ORDER BY courses.id";

 $courses = query($query);
?>

<?php foreach($courses as $crs) : ?>
  <a href="coursesDet.php?videos=<?= $crs["course_id"]; ?>">
    <div class="card" style="width: 18rem;">
      <img src="../img/<?= $crs["course_image"]; ?>" class="card-img-top" alt="thumbnail">
      <div class="card-body">
        <p class="card-text text-center fs-6"><?= $crs["course_name"]; ?></p>
        <p class="card-text text-center fs-6"><?= $crs["teacher_name"]; ?></p>
      </div>
    </div>
  </a>
<?php endforeach ; ?>