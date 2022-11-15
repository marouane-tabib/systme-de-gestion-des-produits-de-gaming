<?php
    // Redirect
    session_start();
    if(!$_SESSION['user']){ header('location:login.php'); }
    //--- Header include
    $title = "Home";
    include"includes/layouts/header.php";

    //--- Body includes
      include"includes/layouts/logo.php"; 
      include"includes/layouts/model.php"; 
      include"includes/layouts/table.php";

    //--- Footer include
    include"includes/layouts/footer.php"
  ?>
