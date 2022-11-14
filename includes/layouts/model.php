<!-- Button trigger modal -->
<button type="button" class="btn btn-success float-end my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php" method="post">
        <div class="modal-body">
            <div class="mb-3">
              <label for="img_url" class="form-label">Image URL</label>
              <input type="url" class="form-control" id="img_url" name="img_url" placeholder="Add Image URL (https://www.example.com)" required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Add product name..." required>
            </div>
            <div class="mb-3">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Add product quantity" required>
            </div>
            <div class="mb-3">
              <label for="platform" class="form-label">Platform</label>
              <select name="platform" id="platform" class="form-control" required>
                <option value="steam">Steam</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="text" name="price" id="price" class="form-control" placeholder="Add product price" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>