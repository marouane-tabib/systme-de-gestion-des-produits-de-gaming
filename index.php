<?php   
  
    //--- Header include
    $title = "Home";
    include"includes/components/header.php";

    // Redirect
    if(!isset($_SESSION['user'])){ header('location:login.php'); die(); }
    $products = getproducts($conn);
    $platforms = getPlatforms($conn); ?> 
    
    <style>
      .calc-card{
        padding: 15px 15px;
        margin: 20px 5px;
        border-radius: 7px;
        position: relative;
        background: #333;
        color: #F8F8F8;
      }
      .calc-icon{
    position: absolute;
    top: -15px;
    left: 0;
    border-radius: 50%;
    border: 0.6px solid #CCC;
    clip-path: circle;
    padding: 5px 9px;
    background: #f8f8f8;
    color: #333333;
    box-shadow: 2px 1px 10px #0005 inset !important;
}
      .calc-sum{
        text-align: center;
    display: flex;
    justify-content: center;
    font-weight: bold;
    font-size: 1.2rem;
      }
    </style>
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
