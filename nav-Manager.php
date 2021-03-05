<nav class="navbar navbar-expand-lg navbar-dark font-weight-bold" style="background-color: #007ecc;">
  <a class="navbar-brand" href="managerHome.php">Covid-19 Evaluation System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
    $managerUsername = $_SESSION['LoginUser'];
    $queryCentreID = "SELECT CENTRE_ID FROM db_centreofficer where USERNAME = '$managerUsername'";
    $queryCentreID_run = mysqli_query($conn,$queryCentreID);
    if($queryCentreID_run){
      foreach($queryCentreID_run as $rowCentreID){
        $centreID = $rowCentreID['CENTRE_ID'];
      }
    }

  ?>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="managerHome.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <?php
          if($centreID == NULL){
        ?>
        <a class="nav-link" href="registerTestCentre.php">Test Centre</a>
        <?php
          }else{
        ?>
        <a class="nav-link disabled" href="registerTestCentre.php" aria-disabled="true">Test Centre</a>
        <?php
          }
        ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addTester.php">Add Tester</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manageTestKit.php">Manage Test Kit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="generateTestReport.php"> Test Report </a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="php/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
