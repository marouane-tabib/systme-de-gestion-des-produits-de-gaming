<?php 
    include('includes/tools/calc.php');
?>
    <div class="container row my-1 mx-auto">
      <div class="col-12 my-3 col-md shadow shadow-md calc-card">
        <span class="calc-icon">
          <i class="fa-solid fa-wallet"></i>
        </span>
        <span class="calc-sum">
          <?php $result = calc($conn , "SUM" , "price"); echo $result['calc'] ?> $
        </span>
      </div>
      <div class="col-12 my-3 col-md shadow shadow-md calc-card">
        <span class="calc-icon">
          <i class="fa-solid fa-gamepad"></i>
        </span>
        <span class="calc-sum">
          <?php $result = calc($conn , "SUM" , "quantity"); echo $result['calc'] ?>
        </span>
      </div>
      <div class="col-12 my-3 col-md shadow shadow-md calc-card">
        <span class="calc-icon">
        <i class="fa-solid fa-box-open"></i>
        </span>
        <span class="calc-sum">
          <?php $result = calc($conn , "COUNT" , "*"); echo $result['calc'] ?>
        </span>
      </div>
      <div class="col-12 my-3 col-md shadow shadow-md calc-card">
        <span class="calc-icon">
          <i class="fa-brands fa-lg fa-dribbble"></i>
        </span>
        <span class="calc-sum">
          <?php $result = calc($conn , "COUNT" , "platform_id"); echo $result['calc'] ?>
        </span>
      </div>
    </div>