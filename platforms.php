<?php   
  
    //--- Header include
    $title = "Platforms";
    include"includes/components/header.php";

    // Redirect
    if(!isset($_SESSION['user'])){ header('location:login.php'); die(); }
    $platforms = getplatforms($conn);

    //--- Body includes
?>
    
  <form action="includes/scripts.php" method="post">
    <div class="container float-end my-3 col-12 col-md-4 row">
        <input type="text" name="platform" class="form-control" placeholder="Add Platform Name ...">
    </div>
  </form>

<?php
      include"includes/components/table_platforms.php";

    //--- Footer include
    include"includes/components/footer.php"
  ?>
