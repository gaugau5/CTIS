<?php
  require 'php/config.php';
  session_start();

  $username = $_SESSION['LoginUser'];
  $role = "SELECT ROLE FROM db_role WHERE USERNAME = '$username'";

  $queryRole_run = mysqli_query($conn, $role);

  if(mysqli_num_rows($queryRole_run) > 0){
    while ($row = mysqli_fetch_array($queryRole_run)) {
      if ($row["ROLE"] == "Manager") {
        return "Manager";
      }
      elseif ($row["ROLE"] == "Tester") {
        return "Tester";
      }
      else {
        return "Patient";
      }
    }
  }
  else {
    echo '<script type="text/javascript">alert("Cant find role");location.replace("../index.php")</script>';
  }

 ?>
