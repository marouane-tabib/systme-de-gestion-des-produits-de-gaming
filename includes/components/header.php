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
        height: 92%;
      }
      .container-box .nav-bar-box{
        background-color: greenyellow;
        height: 8%;
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
      <div class="nav-bar-box"></div>
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