<?php
    $title ="Update Platform"; include"includes/components/header.php" ;
    $item = getProduct($conn);
    if(!isset($_SESSION['user'])){ header('location:login.php'); die(); }
?>
        <div class="card-box container my-2 mx-auto p-3 shadow shadow-md align-item-center bg-white">
      <form action="includes/scripts.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">Product Name</label>
              <input type="text" value="<?php echo $item['name'] ?>" class="form-control" id="name" name="name" placeholder="Add product name..." required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="update_platform" class="btn btn-primary">Update</button>
        </div>
      </form>
        </div>
<?php include"includes/components/footer.php" ?>