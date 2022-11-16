<?php   
    //--- Header include
    $title = "Home";
    include"includes/components/header.php";

    // Redirect
    if(!$_SESSION['user']){ header('location:login.php');die(); } 
    // unset($_SESSION['user']);

    //--- Body includes
      include"includes/components/logo.php"; 
      include"includes/components/model.php"; 
      include"includes/components/table.php";

    //--- Footer include
    include"includes/components/footer.php"
  ?>
