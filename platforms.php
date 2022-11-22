<?php   
  
    //--- Header include
    $title = "Platforms";
    include"includes/components/header.php";

    // Redirect
    if(!isset($_SESSION['user'])){ header('location:login.php'); die(); }
    $platforms = getplatforms($conn);

    //--- Body includes
      include"includes/components/model.php"; 
      include"includes/components/table.php";

    //--- Footer include
    include"includes/components/footer.php"
  ?>
