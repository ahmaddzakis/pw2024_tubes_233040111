<?php

session_start();

session_destroy();

header("Location: halaman/index.php");

?>