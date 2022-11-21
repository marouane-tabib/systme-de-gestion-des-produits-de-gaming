<?php 
    include('includes/scripts.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?php echo $title ?></title>
  </head>
  <body>
    <style>
      .container-box{
        height: 100vh;
        background-color: green; 
      }
      .container-box .content-container{
        background-color: goldenrod;
        height: 100%;
      }
      .container-box .nav-bar-box{
        background-color: greenyellow;
        /* height: 8vh; */
      }
      .container-box .side-bar-box{
        background-color: blue;
      }
      .container-box .content-box{
        overflow: auto;
        background-color: red;
      }
    </style>
    <div class="container-box flex-column d-flex">
      <nav class="nav-bar-box navbar bg-light py-0">
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
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>

          </div>
        </div>
      </nav>
      <div class="content-container flex-row d-flex">
        <div class="side-bar-box col-2"></div>
        <div class="content-box col">
    <section class="container">

			<?php if (isset($_SESSION['action'])): ?>
      <div class="<?php echo $_SESSION['action']['class'] ?>" role="alert">
				<strong><?php echo $_SESSION['action']['status'] ?></strong>
					<?php 
						echo $_SESSION['action']['message']; 
						unset($_SESSION['action']);
					?>
					  <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php endif ?>