<?php
  session_start();
  require 'config.php';

  $message = "";
  $role = "";
  if(isset($_POST["btnLogin"])){
    $username = $_POST["username_Input"];
    $password = $_POST["password_Input"];

    $query = "SELECT * FROM db_role WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){
      while ($row = mysqli_fetch_array($query_run)) {

        if ($row["ROLE"] == "Manager") {
          $_SESSION['LoginUser'] = $row["USERNAME"];
          header('Location: ../managerHome.php');
        }
        elseif ($row["ROLE"] == "Tester") {
          $_SESSION['LoginUser'] = $row["USERNAME"];
          header('Location: ../testerHome.php');
        }
        else {
          $_SESSION['LoginUser'] = $row["USERNAME"];
          header('Location: ../patientHome.php');
        }

      }
    }
    else {
      echo '<script type="text/javascript">alert("Invalid Username or Password");location.replace("../index.php")</script>';
    }
  }
?>
