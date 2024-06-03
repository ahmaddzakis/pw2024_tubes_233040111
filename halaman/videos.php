<?php 

session_start();
require "../functions/fungsi.php";

$id = $_GET["id"];
$link = query("SELECT link FROM videos WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Videos</title>
     <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #4158D0;
        background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
      }

      .row {
        width: 100%;
        height: 622px;
        background-color: black;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .back {
        margin-left: 60px;
        margin-bottom: 5px;
      }
    </style>
</head>
<body>
  <?php require "navbar.php" ?>
  <a href="javascript:history.back()" class="back badge text-bg-dark text-decoration-none p-2">BACK</a>

  <div class="container row">
      <iframe width="1260" height="615" src="<?= $link["link"]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>