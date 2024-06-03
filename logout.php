<?php

session_start();

session_destroy();

header("Location: halaman/login1.php");

?>