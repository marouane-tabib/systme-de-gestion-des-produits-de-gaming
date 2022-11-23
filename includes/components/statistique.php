<?php 
    include('includes/tools/calc.php');
    $statistique = [
        [
            "title" => "Sum Price",
            "class_icon" => "fa-solid fa-wallet",
            "action" => "SUM" ,
            "target" => "price"
        ],
        [
            "title" => "Sum Quantity",
            "class_icon" => "fa-solid fa-gamepad",
            "action" => "SUM" ,
            "target" => "quantity"
        ],
        [
            "title" => "Total",
            "class_icon" => "fa-solid fa-box-open",
            "action" => "COUNT" ,
            "target" => "*"
        ],
        [
            "title" => "Total",
            "class_icon" => "fa-brands fa-lg fa-dribbble",
            "action" => "COUNT" ,
            "target" => "platform_id"
        ],
    ];
?>
    <div class="container row my-1 mx-auto">
        <?php foreach ($statistique as $card) { ?>
            <div class="col-12 my-3 col-md shadow shadow-md calc-card">
                <span class="calc-icon">
                <i class="<?= $card['class_icon'] ?>"></i>
                </span>
                <span class="calc-sum">
                <?php $result = calc($conn , $card['action'] , $card['target']); echo $result['calc'] ?>
                </span>
            </div>
        <?php } ?>
      <!-- <div class="col-12 my-3 col-md shadow shadow-md calc-card">
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
      </div> -->
    </div>