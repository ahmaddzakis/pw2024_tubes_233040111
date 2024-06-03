<?php
function koneksi() {
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040111');
return $conn;
}

function query($query) {
  $conn = koneksi();

  $result = mysqli_query($conn, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function register($data) {
  $conn = koneksi();

  $email = strtolower($data["email"]);
  $username = ucwords(stripslashes($data["name"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  if($password !== $password2) {
      echo "<script>alert('Konfirmasi password tidak sesuai!')</script>";
      return false;
  }

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  if(mysqli_fetch_assoc($result)) {
      echo "<script>alert('Email sudah terdaftar')</script>";
      return false;
  }

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$username'");
  if(mysqli_fetch_assoc($result)) {
      echo "<script>alert('Username sudah terpakai!')</script>";
      return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($conn, "INSERT INTO users(email, password, name) VALUES ('$email', '$password', '$username')");

  return mysqli_affected_rows($conn);
}

function user($data) {
  $conn = koneksi();

  $email = $data;

  $username = query("SELECT name FROM users WHERE email = '$email'")[0]["name"];

  return $username;
}

function tambah($data) {
  $conn = koneksi();

  $teacher = htmlspecialchars($data["teacher"]);
  $description = htmlspecialchars($data["description"]);

  $image = upload();
  if(!$image) {
    return false;
  }

  $query = "INSERT INTO teachers (name, image, description)
            VALUES('$teacher', '$image', '$description')
            ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function tambah_course($data) {
  $conn = koneksi();

  $teacher_id = htmlspecialchars($data["teacher_id"]);
  $course_name = htmlspecialchars($data["course_name"]);
  $detail = htmlspecialchars($data["detail"]);
  $category_id = htmlspecialchars($data["category_id"]);
  $teacher_name = query("SELECT name FROM teachers WHERE id = $teacher_id")[0]["name"];

  
  $image = upload();
  if(!$image) {
    return false;
  }
  
  $query = "INSERT INTO courses (category_id, name, teacher_name, image, detail)
            VALUES('$category_id', '$course_name', '$teacher_name', '$image', '$detail')
            ";

mysqli_query($conn, $query) or die(mysqli_error($conn));

 $course_id = query("SELECT id FROM courses WHERE name = '$course_name'")[0]["id"];

 mysqli_query($conn, "UPDATE teachers SET course_id = $course_id WHERE name = '$teacher_name'");

  return mysqli_affected_rows($conn);
}

function tambah_video($data) {
  $conn = koneksi();
  $course_id = htmlspecialchars($data["course_id"]);
  $title = htmlspecialchars($data["title"]);
  $link = htmlspecialchars($data["link"]);

  $thumbnail = upload();
  if(!$thumbnail) {
    return false;
  }

  $query = "INSERT INTO videos (course_id, name, thumbnail, link)
            VALUES('$course_id', '$title', '$thumbnail', '$link')
            ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function upload() {
  $namaFile = $_FILES['image']['name'];
  $ukuranFile = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $tmpName = $_FILES['image']['tmp_name'];

  // Cek apakah tidak ada gambar yang diupload
  if( $error === 4) {
      echo "<script>
              alert('Pilih gambar terlebih dahulu!');
          </script>";
      return false;
  }

  // Cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
              alert('Yang anda upload bukan gambar!');
          </script>";
      return false;
  }

  // Cek jika ukurannya terlalu besar
  if( $ukuranFile > 1000000) {
      echo "<script>
              alert('Ukuran gambar terlalu besar!');
          </script>";
      return false;
  }

  // Generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // Lolos pengecekan, gambar siap diupload
  move_uploaded_file($tmpName, "../img/" . $namaFileBaru);

  return $namaFileBaru;
}

function remove($id) {
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM teachers WHERE id = $id");

  return mysqli_affected_rows($conn);
}

function remove_course($id, $videos) {
  $conn = koneksi();

  if($videos > 0) {
    mysqli_query($conn, "DELETE courses, videos FROM courses JOIN videos ON course_id = courses.id WHERE courses.id = $id");

    return mysqli_affected_rows($conn);
  } else {
    mysqli_query($conn, "DELETE FROM courses WHERE courses.id = $id");

    return mysqli_affected_rows($conn);
  }


}

function remove_video($id) {
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM videos WHERE id = $id");

  return mysqli_affected_rows($conn);
}

function change($data) {
  $conn = koneksi();

  $id = $data["id"];
  $name = htmlspecialchars($data["teacher"]);
  $description = htmlspecialchars($data["description"]);
  $old_image = htmlspecialchars($data["old_image"]);
  // $teacher_id = htmlspecialchars($data["teacher_id"]);

  // Cek apakah user pilih gambar baru atau tidak
  if( $_FILES['image']['error'] === 4) {
      $newImage = $old_image;
  } else {
      $newImage = upload();
  } 

  //  query update data
  $query = "UPDATE teachers SET
              name = '$name',
              description = '$description',
              image = '$newImage'
              WHERE id = $id 
              ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function change_course($data) {
  $conn = koneksi();

  $id = $data["id"];
  $course_name = htmlspecialchars($data["course_name"]);
  $detail = htmlspecialchars($data["detail"]);
  $category_id = htmlspecialchars($data["category_id"]);
  $old_thumbnail = htmlspecialchars($data["old_thumbnail"]);

  // Cek apakah user pilih gambar baru atau tidak
  if( $_FILES['image']['error'] === 4) {
      $thumbnail = $old_thumbnail;
  } else {
      $thumbnail = upload();
  } 

  //  query update data
  $query = "UPDATE courses SET
              name = '$course_name',
              detail = '$detail',
              category_id = '$category_id',
              image = '$thumbnail'
              WHERE id = $id 
              ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function change_video($data) {
  $conn = koneksi();

  $id = $data["id"];
  $title = htmlspecialchars($data["title"]);
  $link = htmlspecialchars($data["link"]);
  // $video_id = htmlspecialchars($data["video_id"]);
  $old_thumbnail = htmlspecialchars($data["old_thumbnail"]);

  // Cek apakah user pilih gambar baru atau tidak
  if( $_FILES['image']['error'] === 4) {
      $thumbnail = $old_thumbnail;
  } else {
      $thumbnail = upload();
  } 

  //  query update data
  $query = "UPDATE videos SET
              name = '$title',
              link = '$link',
              -- video_id = '$video_id',
              thumbnail = '$thumbnail'
              WHERE id = $id 
              ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function seacrh($keyword) {
  $query = "SELECT * FROM mahasiswa
              WHERE
              nama LIKE '%$keyword%' OR
              nama LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'
  ";

  return query($query);
}
?>
