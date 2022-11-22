    <div class="d-flex justify-content-around">
        <a href="javascript:void(0)"
            onclick="if(confirm('Are You sure to delete this record?')){document.querySelector('#delete-product-<?php echo $row['id'] ?>').submit();} else {return false}"
            class="text-danger" id="delete-btn">
                <i class="fa-solid fa-trash"></i>
        </a>
        <a href="update.php?id=<?php echo $row["id"]?>" id="update-icon" class="text-success">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    </div>
        
    <form action="includes/scripts.php" method="post" class="d-none" id="delete-product-<?php echo $row['id'] ?>" >
        <input type="hidden" name="delete" value="<?php echo $row['id'] ?>" >
    </form>