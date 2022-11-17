<?php
    $title ="Update"; include"includes/components/header.php" ;
    $item = getProduct($conn);
    if(!isset($_SESSION['user'])){ header('location:login.php'); die(); }
?>
        <div class="card-box container my-2 mx-auto p-3 shadow shadow-md align-item-center bg-white">
      <form action="includes/scripts.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="mb-3">
                <img src="assets/images/products/<?php echo $item['image'] ?>" height="200px" width="170px" alt="" srcset="">
            </div>
            <div class="mb-3">
              <label for="product-image" class="form-label">Select Image File</label>
              <input type="file" class="form-control" id="product-image" name="image" <?php if(!$item['image']){ echo 'required' ;}?>>
              <input type="hidden" name="oldImage" value="<?php echo $item['image'] ?>">
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Product Name</label>
              <input type="text" value="<?php echo $item['name'] ?>" class="form-control" id="name" name="name" placeholder="Add product name..." required>
            </div>
            <div class="mb-3">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="text" value="<?php echo $item['quantity'] ?>" class="form-control" id="quantity" name="quantity" placeholder="Add product quantity" required>
            </div>
            <div class="mb-3">
              <label for="platform" class="form-label">Platform</label>
              <select name="platform" id="platform" class="form-control" required>
                <option value="1">Steam</option>
                <option value="1">Steam</option>
                <option value="1">Steam</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="text" value="<?php echo $item['price'] ?>" name="price" id="price" class="form-control" placeholder="Add product price" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" class="form-control" rows="3" required><?php echo $item['description'] ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="update" class="btn btn-primary">Update</button>
        </div>
      </form>
        </div>
<?php include"includes/components/footer.php" ?>