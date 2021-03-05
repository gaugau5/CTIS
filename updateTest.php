<?php
  require 'php/config.php';
  require 'php/testerHeader.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Update Test</title>
  </head>
  <body>
    <?php include 'nav-Tester.php'; ?>
    <?php include 'sideNav-Officer.php'; ?>

    <div class="container">
      <h1 class="display-4 mt-5 text-center">Update Test</h1>

      <div class="card bg-light mt-5 mb-5 mx-auto" style="max-width: 30rem;">
        <div class="card-body">

          <form action="php/function/update_Test.php" method="post" class="needs-validation" novalidate>
            <div class="form-row">
              <div class="form-group col d-flex align-items-center">
                <label for="formTestID">TestID:</label>
              </div>
              <div class="form-group col-8">
                <input type="text" class="form-control input-lg" autocomplete="off" id="testIDInput" placeholder="TestID" name="testID_Input" required>
                <div class="invalid-feedback">
                  Enter a valid Test ID.
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col d-flex align-items-center">
                <label for="formTestID">Result:</label>
              </div>
              <div class="form-group col-8">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="result_Input" id="resultPositive" value="Positive" required>
                  <label class="form-check-label" for="resultPositive">
                    Positive
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="result_Input" id="resultNegative" value="Negative" required>
                  <label class="form-check-label" for="resultNegative">
                    Negative
                  </label>
                  <div class="invalid-feedback">
                    Plese select the result.
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="text-center">
              <button type="submit" data-toggle="modal" data-target="#detail" class="btn btn-success" name="btnUpdate">Update</button>
              <?php $show_modal = false; ?>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function(){
        $('#testIDInput').typeahead({
            source: function(query, result)
            {
              $.ajax({
                url: "php/function/fetchTestID.php",
                method: "POST",
                data: {query:query},
                dataType:"json",
                success: function(data)
                {
                  result($.map(data, function(item){
                    return item;
                  }));
                }
              })
            }
        });
      });
    </script>

    <!-- Optional JavaScript -->
    <script src="js\sideNav.js"></script>
    <script src="js\formValidation.js"></script>
    <script src="js\sideNav.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!--  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
