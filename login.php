<?php
    $title ="Login"; include"includes/components/header.php" ;
    if($_SESSION['user']){ header('location:index.php'); die(); }
?>
        <div class="card-box col-12 col-md-5 my-5 mx-auto p-3 shadow shadow-md align-item-center bg-white">
          <div class="text-center">
            <h3>WELCOME BACK!</h3>
            <small>Don't have an account? <a href="#">Sign up</a></small>
          </div><br>
          <form action="includes/scripts.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Add Your User Name" min="4" max="50" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="******" min="8" max="50" required>
            </div>
            <a href="#">Forgot your password?</a><br><br>
            <button type="submit" name="login" class="btn btn-primary col-12">Sign In</button>
          </form>
        </div>
<?php include"includes/components/footer.php" ?>