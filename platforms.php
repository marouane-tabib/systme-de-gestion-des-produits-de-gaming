<?php   
  
    //--- Header include
    $title = "Platforms";
    include"includes/components/header.php";

    // Redirect
    if(!isset($_SESSION['user'])){ header('location:login.php'); die(); }
    $platforms = getPlatforms($conn);

    //--- Body includes
?>
    
  <form action="includes/scripts.php" method="post">
    <div class="container float-end my-3 col-12 col-md-4 row">
        <input type="text" name="name" class="form-control" placeholder="Add Platform Name ...">
        <input type="hidden" name="saveplatform">
    </div>
  </form>

<?php
      include"includes/components/platforms_table.php";

    //--- Footer include
    include"includes/components/footer.php"
  ?>
