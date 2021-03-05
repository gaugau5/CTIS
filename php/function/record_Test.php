<?php
  require '../config.php';
  session_start();

  if(isset($_POST['btnRecord'])){
        @$usernamePatient = $_POST['username_Input'];
        @$passwordPatient = $_POST['password_Input'];
        @$name = $_POST['name_Input'];
        @$IC = $_POST['IC_Input'];
        @$phoneNo = $_POST['phoneNo_Input'];
        @$email = $_POST['email_Input'];
        @$address = $_POST['address_Input'];
        @$patientType = $_POST['pType_Input'];
        @$symptoms = $_POST['symptoms_Input'];

        $testerUsername = $_SESSION['LoginUser'];
        @$testKitNames = $_POST['testKit_Names'];

        @$testDate = date("Y-m-d");
        @$status = "Pending";
        @$position = "Patient";
    
        $query = "SELECT USERNAME FROM db_role WHERE USERNAME = '$usernamePatient'";
        $query_run = mysqli_query($conn,$query);
        if($query_run){
          foreach ($query_run as $rows)
          {
            $tempUsername = $rows['USERNAME'];
            
          }
        }
        if($usernamePatient == "" || $passwordPatient == "" || $name == "" || $IC == "" || $phoneNo == "" || $email == "" || $address == "" || $patientType == "" || $symptoms == "" || $testKitNames == "")
        {
          echo '<script type="text/javascript">alert("Insert in all field.");location.replace("/CTIS/recordTest.php")</script>';
        }
        elseif ($tempUsername == $usernamePatient){
          echo '<script type="text/javascript">alert("The username you enter belongs to another user. Please try again.");location.replace("/CTIS/recordTest.php")</script>';
        }
        else{
          $query_testKit = "SELECT KIT_ID,AVAILABLE_STOCK from db_testkit WHERE TEST_NAME = '$testKitNames'";
          $queryTestKit_run = mysqli_query($conn,$query_testKit);
          if($queryTestKit_run){
            foreach($queryTestKit_run as $rowTestKit){
              $kitID = $rowTestKit['KIT_ID'];
              $stockAvailability = $rowTestKit['AVAILABLE_STOCK'];
            }
          }
          $query_centreID = "SELECT CENTRE_ID FROM db_centreofficer where USERNAME ='$testerUsername'";
          $queryCentreID_run = mysqli_query($conn,$query_centreID);
          if($queryCentreID_run){
            while($rowCentreID = mysqli_fetch_array($queryCentreID_run)){
              $centreID = $rowCentreID['CENTRE_ID'];
            }
          }
          $query = "INSERT into db_patient values ('$usernamePatient', '$passwordPatient', '$name', '$IC', '$phoneNo', '$email', '$address', '$patientType','$symptoms')";
          $query2 = "insert into db_role values('$usernamePatient', '$passwordPatient', '$position')";
          $query_covidTest = "INSERT into db_covidtest values(NULL,'$testDate', NULL, NULL, '$status', '$usernamePatient','$testerUsername','$kitID')";

          $query_run = mysqli_query($conn, $query);
          $queryCovidTest_run = mysqli_query($conn,$query_covidTest);

              if ($query_run) {
                if($queryCovidTest_run){
                  mysqli_query($conn, $query2);
                  $updateStock = $stockAvailability - 1;
                  $query_UpdateKit = "UPDATE db_testkit SET AVAILABLE_STOCK='$updateStock' WHERE KIT_ID='$kitID'";
                  mysqli_query($conn,$query_UpdateKit);
                  echo '<script type="text/javascript">alert("Patient and Test has been added.");location.replace("/CTIS/recordTest.php")</script>';

                }
                else{
                  echo '<script type="text/javascript">alert("Fail to create Test. Please try again.");location.replace("/CTIS/recordTest.php")</script>';
                }
              }
              else {
                echo '<script type="text/javascript">alert("Fail to create Patient. Please try again.");location.replace("/CTIS/recordTest.php")</script>';
              }

        

      }     

}


?>
