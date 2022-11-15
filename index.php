<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <section class="container">

      <div class="side-bar">
        <div class="side-box">
          <div class="side-icons">
            <ul>
              <li>
                <a href="#">
                  <span class="slide-icon"><i class="fa-solid fa-box-open"></i></span>
                  <span class="side-page">Products</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="slide-icon"><i class="fa-thin fa-camera"></i></span>
                  <span class="side-page">Images</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

        <?php include"includes/layouts/logo.php" ; include"includes/layouts/model.php" ; include"includes/layouts/table.php"; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>