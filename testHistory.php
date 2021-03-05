<?php
  require 'php/config.php';
  require 'php/patientHeader.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Test History</title>
  </head>
  <body>
    <?php include 'nav-Patient.php'; ?>

    <div class="container">
      <h1 class="display-4 mt-5 text-center">Test History</h1>

      <table class="table mt-5">
        <thead class="thead-light">
          <tr>
            <th scope="col">TestID</th>
            <th scope="col">Centre Name</th>
            <th scope="col">Test Date</th>
            <th scope="col">Status</th>
            <th scope="col" style="text-align:center">More Detail</th>
          </tr>
        </thead>

        <?php
          $username = $_SESSION['LoginUser'];
          $query_test = "SELECT * FROM db_covidtest WHERE PATIENT_USERNAME = '$username'";
          $query_run_test = mysqli_query($conn, $query_test);
          if ($query_run_test) {
            foreach ($query_run_test as $row_test) {
              $testID = $row_test['TEST_ID'];
              $testDate = $row_test['TEST_DATE'];
              $status = $row_test['STATUS'];

              $tester = $row_test['TESTER_USERNAME'];
              $query_tester = "Select CENTRE_ID from db_centreofficer where USERNAME = '$tester'";
              $queryTester_run = mysqli_query($conn, $query_tester);
              if($queryTester_run){
                foreach ($queryTester_run as $rowsTester)
                {
                  $centreID = $rowsTester['CENTRE_ID'];
                  $query_centre = "Select CENTRE_NAME from db_testcentre where CENTRE_ID = '$centreID'";
                  $queryCentre_run = mysqli_query($conn, $query_centre);
                  if($queryCentre_run){
                    foreach ($queryCentre_run as $rowsCentre){
                      $centreName = $rowsCentre['CENTRE_NAME'];
                    }
                  }
                }
              }
          ?>
          <tbody>
              <tr>
                <th scope="row"><?php echo $testID ?></th>
                <td><?php echo $centreName ?></td>
                <td><?php echo $testDate ?></td>
                <td><?php echo $status ?></td>

                <?php
                  if ($status == 'Complete') {
                ?>
                    <td style="text-align:center"><img src="Image/TestHistory/moredetail.png" type="button" alt="..." class="img-thumbnail btn" data-toggle="modal" data-target="#detail<?php echo $testID; ?>" height=100 width=50 ></td>
                <?php }
                  else { ?>
                    <td style="text-align:center"><img src="Image/TestHistory/moredetail.png" type="button" alt="..." class="img-thumbnail btn disabled" height=100 width=50></td>
                <?php  }
                 ?>

              </tr>
          </tbody>
        <?php
            }
          }
        ?>

      </table>
    </div>

    <?php
      $find_test = "SELECT * FROM db_covidtest WHERE PATIENT_USERNAME = '$username'";
      $statement =  mysqli_query($conn, $find_test);
      if($statement){
        foreach ($statement as $rows_test)
        {
          $testID = $rows_test['TEST_ID'];
          $testerUsername = $rows_test['TESTER_USERNAME'];
          $result = $rows_test['RESULT'];
          $resultDate = $rows_test['RESULT_DATE'];

          $findTester = "SELECT NAME FROM db_centreofficer WHERE USERNAME = '$testerUsername'";
          $queryFindTester_run =  mysqli_query($conn, $findTester);
          if ($queryFindTester_run) {
            foreach ($queryFindTester_run as $rows_tester) {
              $testerName = $rows_tester['NAME'];
            }
          }
    ?>
    <div class="modal fade" id="detail<?php echo $testID; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Test Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="row ml-5 mr-5 mt-3 mb-3" style="text-align:center">
            <div class="col">Test ID: </div>
            <div class="col"><?php echo $testID; ?></div>
          </div>

          <div class="row ml-5 mr-5 mb-3" style="text-align:center">
            <div class="col">Tester: </div>
            <div class="col"><?php echo $testerName; ?></div>
          </div>

          <div class="row ml-5 mr-5 mb-3" style="text-align:center">
            <div class="col">Result: </div>
            <div class="col"><?php echo $result; ?></div>
          </div>

          <div class="row ml-5 mr-5 mb-3" style="text-align:center">
            <div class="col">Result Date: </div>
            <div class="col"><?php echo $resultDate; ?></div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php
      }}
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
