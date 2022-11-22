
      <nav class="nav-bar-box navbar bg-white py-0 shadow shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="assets/images/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            GAMING
          </a>
          <div class="float-right">
            <a class="navbar-brand float-right dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
            </a>

            <ul class="dropdown-menu end-0" style="left:inherit">
            <?php if(isset($_SESSION['user'])){ ?>
              <li><a class="dropdown-item desible" href="#"><?= $_SESSION['user'] ?></a></li>
              <li>
                <form action="includes/scripts.php" method="post">
                  <input type="submit" value="Log out" name="logout" class="dropdown-item">
                </form>
              </li>
              <?php } else {?>
                <li><a class="dropdown-item" href="login.php">Login Now</a></li>
              <?php } ?>
            </ul>

          </div>
        </div>
      </nav>