<?php
  require 'php/config.php';
  require 'php/managerHeader.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Register Test Centre</title>
  </head>
  <body>
    <?php include 'nav-Manager.php'; ?>
    <?php include 'sideNav-Officer.php'; ?>

    <div class="container">
      <h1 class="display-4 mt-3 text-center">Register Test Centre</h1>
      <div class="card bg-light mt-5 mb-5 mx-auto" style="max-width: 40rem;">
        <div class="card-header"></div>
        <div class="card-body">
           <form action="php/function/register_Centre.php" method="POST" class="needs-validation" novalidate>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formName">Centre Name</label>
                    <input type="text" class="form-control" id="centrenameInput" placeholder="Centre Name" name="centrename_Input" required>
                    <div class="invalid-feedback">
                    Please provide a valid Centre Name.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formName">Centre Address</label>
                    <input type="text" class="form-control" id="centreAddressInput" placeholder="Centre Address" name="centreAddress_Input" required>
                    <div class="invalid-feedback">
                    Please provide a valid Centre Address.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="formName">Centre Phone Number</label>
                    <input type="text" class="form-control" id="centreNumInput" placeholder="Centre Phone Number" name="centreNum_Input" required>
                    <div class="invalid-feedback">
                    Please provide a valid Centre Phone Number.
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="btnRegister">Register</button>
            </div>
        </form>
    </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="js\sideNav.js"></script>
    <script src="js\formValidation.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
