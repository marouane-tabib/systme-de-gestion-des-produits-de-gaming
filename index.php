<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
<style>
  .logo{
    background-color: #ffff0e;
    display: inline;
    border-bottom: red 3px solid;
    padding: 2px 5px;
    box-shadow: 0.7px 1px 4px #5557;
  }
  .g{
    color:red;font-size:2rem;font-weight:bold;
  }
</style>
    <section class="container">
        <h1 class="h3 logo"><span class="g">G</span>aming</h1><br>
        <?php include"includes/layouts/model.php" ; include"includes/layouts/table.php"; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>