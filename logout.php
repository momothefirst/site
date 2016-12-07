<?php
    session_start();
    if (isset($_POST['logout'])) {
      unset($_SESSION['user']);
      unset($_SESSION['logged']);
      session_unset();
      session_destroy();
      header("Location: index.php");
      exit;
     }
?>