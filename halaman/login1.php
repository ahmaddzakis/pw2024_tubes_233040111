<?php 
session_start();

require("../functions/fungsi.php");

if (isset($_POST["login"])) {
  $conn = koneksi();
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    
  // Cek username
  if(mysqli_num_rows($result) === 1) {
  // Cek password

    $row = mysqli_fetch_assoc(($result));
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;
      $email = $_POST["email"];
      $_SESSION["name"] = user($email);
      $name = $_SESSION["name"];
      $_SESSION["level"] = query("SELECT level FROM users WHERE name = '$name'")[0]["level"];

      header ("Location: index.php");
      exit;
    }
  }
  
  $error = true;
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN | Hello!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: aqua;
      }
    </style>
    <!-- <link rel="stylesheet" href="../css/login1.css"> -->
  </head>
  <body>
    <section>
      <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-12 col-sm-8 col-md-6 m-auto">
          <h2><marquee direction="left" behavior="alternate" class="fw-bold bg bg-light rounded ">LOG - IN</marquee></h2>
            <div class="card border-0 shadow">
              <div class="card-body">
              <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
              </svg>
                <form action="" method="POST">
                  <div class="error text-danger">
                      <?php if(isset($error)) : ?>
                      <h4>Email / Password salah!</h4>
                <?php endif; ?>
                    </div>
                  <input type="email" name="email" id="email" class="form-control my-3 py-2" placeholder="Email" required>
                  <!-- <input type="text" name="name" id="name" class="form-control my-3 py-2" placeholder="Username" required> -->
                  <input type="password" name="password" id="password" class="form-control my-3 py-2" placeholder="Password" required>
                  <div class="text-center mt-3">
                    <a href="register.php" class="nav-link m-4">Don't have an Account?</a>
                    <button class="btn btn-info fw-bold" name="login" id="login" type="submit">LOG - IN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>