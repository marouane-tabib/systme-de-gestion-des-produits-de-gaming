<?php   
  
    //--- Header include
    $title = "Home";
    include"includes/components/header.php";

    // Redirect
    if(!isset($_SESSION['user'])){ header('location:login.php'); die(); }
    $products = getproducts($conn);
    $platforms = getPlatforms($conn); ?> 
    
    <div class="container row my-1 mx-auto">
      <div class="col-12 my-3 col-md shadow shadow-md calc-card">
        <span class="calc-icon">
          <i class="fa-solid fa-wallet"></i>
        </span>
        <span class="calc-sum">
          344$
        </span>
      </div>
      <div class="col-12 my-3 col-md shadow shadow-md calc-card">
        <span class="calc-icon">
          <i class="fa-solid fa-gamepad"></i>
        </span>
        <span class="calc-sum">
          344$
        </span>
      </div>
      <div class="col-12 my-3 col-md shadow shadow-md calc-card">
        <span class="calc-icon">
        <i class="fa-solid fa-box-open"></i>
        </span>
        <span class="calc-sum">
          344$
        </span>
      </div>
      <div class="col-12 my-3 col-md shadow shadow-md calc-card">
        <span class="calc-icon">
          <i class="fa-brands fa-lg fa-dribbble"></i>
        </span>
        <span class="calc-sum">
          344$
        </span>
      </div>
    </div>
    
    <?php

    //--- Body includes
      include"includes/components/model.php"; 
      include"includes/components/products_table.php";

    //--- Footer include
    include"includes/components/footer.php"
  ?>
