<?php   
  
    //--- Header include
    $title = "Categories";
    include"includes/components/header.php";

    // Redirect
    if(!isset($_SESSION['user'])){ header('location:login.php'); die(); }

    //--- Body includes
      include"includes/components/model.php"; 
      include"includes/components/table.php";

    //--- Footer include
    include"includes/components/footer.php"
  ?>
