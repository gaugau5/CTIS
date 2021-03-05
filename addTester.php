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

    <title>Add Tester</title>
  </head>
  <body>
    <?php include 'nav-Manager.php'; ?>
    <?php include 'sideNav-Officer.php'; ?>
    <?php include 'sideNav-testerList.php'; ?>

    <div class="container">
      <h1 class="display-4 mt-3 text-center">Add Tester</h1>

      <div class="card bg-light mt-5 mb-5 mx-auto" style="max-width: 40rem;">
        <div class="card-body">
          <form action="php/function/add_Tester.php" method="post" class="needs-validation" novalidate>
            <div class="form-row">
              <div class="form-group col">
                <label for="formUsername">Username</label>
                <input type="text" class="form-control" id="usernameInput" placeholder="Username" name="username_Input" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
              <div class="form-group col">
                <label for="formPassword">Password</label>
                <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password_Input" required>
                <div class="invalid-feedback">
                  Please provide a valid password.
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <label for="formName">Name</label>
                <input type="text" class="form-control" id="nameInput" placeholder="Name" name="name_Input" required>
                <div class="invalid-feedback">
                  Please provide a valid name.
                </div>
              </div>
              <div class="form-group col">
                <label for="formIC">IC</label>
                <input type="text" class="form-control" id="ICInput" placeholder="IC" name="IC_Input" required>
                <div class="invalid-feedback">
                  Please provide a valid identification number.
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <label for="formPhoneNo">Phone No</label>
                <input type="tel" class="form-control" id="PhoneNoInput" placeholder="Phone No" name="phoneNo_Input" required>
                <div class="invalid-feedback">
                  Please provide a valid phone number.
                </div>
              </div>
              <div class="form-group col">
                <label for="formEmail">Email</label>
                <input type="email" class="form-control" id="EmailInput" placeholder="Email" name="email_Input" required>
                <div class="invalid-feedback">
                  Please provide a valid email.
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="formAddress">Address</label>
              <textarea type="text" class="form-control" id="AddressInput" placeholder="Address" name="address_Input" required></textarea>
              <div class="invalid-feedback">
                Please provide a valid address.
              </div>
            </div>
            <hr>
            <div class="text-center">
              <input type="hidden" class="form-control" value="<?php echo $_SESSION['LoginUser'] ?>" name="managerUsername">
              <button type="submit" class="btn btn-success" name="btnAdd">Add</button>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>
  </body>

  <!-- Optional JavaScript -->
  <script src="js\sideNav-testerList.js"></script>
  <script src="js\sideNav.js"></script>
  <script src="js\formValidation.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>
