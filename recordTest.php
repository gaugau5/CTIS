<?php
  require 'php/config.php';
  $role = include("php/findRole.php");

  if(!isset($_SESSION['LoginUser'])){
    header('Location: index.php');
  }

  if ($role != "Tester") {
    echo '<script type="text/javascript">alert("You are unauthorized to access this page.");location.replace("/CTIS/php/logout.php")</script>';
  }
  $patientType = 'pType_Input';
  $disable = ($patientType = 'returnee') ? '':'disabled="disabled"';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Record New Test</title>
  </head>
  <body>
    <?php include 'nav-Tester.php'; ?>
    <?php include 'sideNav-Officer.php'; ?>

    <div class="container">
      <h1 class="display-4 mt-5 text-center">Record New Test</h1>

      <div class="card bg-light mt-5 mb-5 mx-auto" style="max-width: 40rem;">
        <div class="card-body">
          <form action="php/function/record_Test.php" method="post" class="needs-validation" novalidate>
            <div class="form-row">
            <div class="form-group">
              <label for="formPatientType">Patient Type</label>
              <select  class='form-control' id='PatientTypeInput' placeholder='PatientType' name ='pType_Input'>
              <option value='' selected disabled hidden>Choose a patient type</option>
              <option value='returnee' >Returnee</option>
              <option value='quarantined' >Quarantined</option>
              <option value='close contact' >Close Contact</option>
              <option value='infected' >Infected</option>
              <option value='suspected' >Suspected</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid patient type
              </div>
            </div>
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

            <div class="form-group">
              <label for="formSymptoms">Symptoms</label>
              <textarea type="text" class="form-control" id="SymptomsInput" placeholder="Patient Symptoms" name="symptoms_Input" required></textarea>
              <div class="invalid-feedback">
                Please provide a valid symptoms.
              </div>
            </div>
            <div class="form-group">
              <label for="formPatientType">Test Kit</label>
              <?php
              $testerUsername = $_SESSION['LoginUser'];
              $query_id = "SELECT CENTRE_ID from db_centreofficer WHERE USERNAME = '$testerUsername'";
              $query_run = mysqli_query($conn,$query_id);
              if($query_run){
                foreach($query_run as $row_centreID){
                  $centreID = $row_centreID['CENTRE_ID'];

                }
              }
              $query_centreName = "SELECT TEST_NAME FROM db_testkit WHERE CENTRE_ID = '$centreID'";
              $queryKitNames_run = mysqli_query($conn, $query_centreName);

              echo"<select class='form-control' id='TestKitInput' placeholder='TestKit' name='testKit_Names' required>";
                echo"<option value='' selected disabled hidden>Choose a test kit</option>";
                  foreach($queryKitNames_run as $row_KitNames)
                  {
                    echo"<option name ='testKit_Names'>$row_KitNames[TEST_NAME]</option>";
                  }
              echo"</select>"

              ?>
              <div class="invalid-feedback">
                Please choose a test kit
              </div>
            </div>
            <div class="text-center">
              <input <?php echo $disable; ?> type="hidden" class="form-control" value="<?php echo $_SESSION['LoginUser'] ?>" name="testerUsername">
              <button type="submit" class="btn btn-success" name="btnRecord">Record</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="js\sideNav.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

 </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
