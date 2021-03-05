<?php
  include "php/login.php"
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>CTIS Login</title>
  </head>
  <body>
    <!--?php include 'nav-Manager.php'; ?-->

    <div class="container" id="login">
      <h1 class="display-4 mt-5 text-center">Welcome to Covid-19 Evaluation System</h1>
      <div class="card bg-light mt-5 mb-5 mx-auto" style="max-width: 18rem;">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="php/login.php" method="post">
            <div class="form-group">
              <label for="formGroupExampleInput">Username</label>
              <input type="text" class="form-control" id="name" name="username_Input" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Password</label>
              <input type="password" class="form-control" id="password" name="password_Input" placeholder="******">
            </div>
            <hr>
            <p class="text-center text-danger">
              <?php echo $message; ?>
            </p>
            <div class="text-center">
              <input name="btnLogin" type="submit" value=" Login ">
            </div>
            <hr>
          </form>
        </div>
      </div>

    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
