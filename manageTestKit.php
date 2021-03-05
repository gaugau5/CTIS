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

    <title>Manage Test Kit</title>
  </head>
  <body>
    <?php include 'nav-Manager.php'; ?>
    <?php include 'sideNav-Officer.php'; ?>

    <div class="container">
      <h1 class="display-4 mt-3 text-center">Manage Test Kit</h1>

      <button type="button" class="btn btn-outline-success float-right mb-4 mt-3" data-toggle="modal" data-target="#newKit">
        + New Kit
      </button>

      <div class="modal fade" id="newKit" tabindex="-1" aria-labelledby="newKitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newKitModalLabel">New Kit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="php/function/new_TestKit.php" method="post" class="needs-validation" novalidate>
              <div class="modal-body">

                  <div class="form-group">
                    <label for="testNameInput">Test Name</label>
                    <input type="text" class="form-control" id="testNameInput" placeholder="Test Name" name="testName_Input" required>
                    <div class="invalid-feedback">
                      Please enter a valid name.
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="stockNoInput">Stock No</label>
                    <input type="number" class="form-control" id="stockNoInput" placeholder="Stock No" name="stockNo_Input" required>
                    <div class="invalid-feedback">
                      Please enter a valid number.
                    </div>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">KitID</th>
            <th scope="col">Stock</th>
            <th scope="col">Test Name</th>
            <th scope="col" style="text-align:right">Edit</th>
            <th scope="col" style="text-align:right">Remove</th>
          </tr>
        </thead>

        <?php
          $username = $_SESSION['LoginUser'];
          $query_centreID = "SELECT CENTRE_ID FROM db_centreofficer WHERE USERNAME = '$username'";
          $query_run_centreID = mysqli_query($conn, $query_centreID);
          if ($query_run_centreID) {
            foreach ($query_run_centreID as $row_centreID) {
              $centreID = $row_centreID['CENTRE_ID'];
              $query = "Select * from db_testkit where CENTRE_ID = '$centreID'";
              $query_run = mysqli_query($conn, $query);
              if($query_run){
                foreach ($query_run as $rows)
                {
                  $kitID = $rows['KIT_ID'];
                  $stock = $rows['AVAILABLE_STOCK'];
                  $name = $rows['TEST_NAME'];
          ?>
          <tbody>
              <tr>
                <th scope="row"><?php echo $kitID ?></th>
                <td><?php echo $stock ?></td>
                <td><?php echo $name ?></td>
                <td style="text-align:right"><img src="Image/ManageTestKit/edit.png" type="button"  alt="..." class="img-thumbnail btn" data-toggle="modal" data-target="#edit<?php echo $kitID; ?>" height=100 width=50></td>
                <td style="text-align:right"><img src="Image/ManageTestKit/delete.png" type="button" alt="..." class="img-thumbnail btn" data-toggle="modal" data-target="#delete<?php echo $kitID; ?>" height=100 width=50></td>
              </tr>
          </tbody>
        <?php
                }
              }
            }
          }
        ?>

      </table>


      <?php
        $find_Kit = "select * from db_testkit";
        $statement =  mysqli_query($conn, $find_Kit);
        if($statement){
          foreach ($statement as $rows)
          {
            $kitID = $rows['KIT_ID'];

      ?>

      <div class="modal fade" id="edit<?php echo $kitID; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Update</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="row ml-5 mt-2 mr-5">
              <p class="col text-center">KitID: </p>
              <p class="col"><?php echo $kitID; ?></p>
            </div>

            <div class="row ml-5 mr-5">
              <p class="col text-center">Kit Name: </p>
              <p class="col"><?php echo $name; ?></p>
            </div>

            <form action="php/function/update_TestKit.php" method="post" class="needs-validation" novalidate>
              <div class="modal-body">
                <div class="form-group">
                  <label for="quantityInput">Quantity</label>
                  <input type="number" class="form-control" id="quantityInput" placeholder="Quantity" name="quantity_Input" required>
                  <div class="invalid-feedback">
                    Please enter a valid number.
                  </div>
                  <input type="hidden" class="form-control" value="<?php echo $kitID ?>" name="id">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="delete<?php echo $kitID; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Confirm!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="php/function/delete_TestKit.php" method="post">
              <div class="modal-body">
                <p>This action will permenently delete the kit. Are you sure to proceed?</p>
                <input type="hidden" class="form-control" value="<?php echo $kitID ?>" name="id">
              </div>

              <div class="row ml-5 mr-5">
                <p class="col text-center">KitID: </p>
                <p class="col"><?php echo $kitID; ?></p>
              </div>

              <div class="row ml-5 mr-5">
                <p class="col text-center">Kit Name: </p>
                <p class="col"><?php echo $name; ?></p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name=btnDelete>Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php
      }}
    ?>
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
