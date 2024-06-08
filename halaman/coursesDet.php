<?php 
session_start();
require "../functions/fungsi.php";
$id = $_GET["videos"];
$videos = query("SELECT *
                FROM videos 
                WHERE course_id = $id");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KURSUS BAHASA INGGRIS</title>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        height: 250vh;
        background-color: pink;
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

    </style>
  </head>
  <body>
    <?php require "navbar.php"; ?>
    <?php if(isset($_SESSION["login"])) : ?>
    <div class="container">
    <a href="javascript:history.back()" class="badge text-bg-dark text-decoration-none p-2">BACK</a>
    <h1 class="text-center">WATCH ONLINE COURSE NOW !</h1>
    <h1><marquee direction="right" scrollamount="20" class="fw-bold bg bg-success rounded ">JUST DO IT! YOU CAN DO IT! JUST DO IT! YOU CAN DO IT! JUST DO IT! YOU CAN DO IT! JUST DO IT! YOU CAN DO IT!</marquee></h1>
    </div>

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
      <?php else : ?>
        <h1 class="bg bg-danger text-white text-center m-4 p-4"><marquee behavior="alternate" scrollamout="20" direction="right">ANDA HARUS <a href="login1.php">LOG - IN</a> TERLEBIH DAHULU UNTUK MENGAKSES VIDEO</marquee></h1>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>