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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Add Tester</title>
  </head>
  <body>
    <?php include 'nav-Tester.php'; ?>
    <?php include 'sideNav-Officer.php'; ?>

    <div class="container">
      <?php
      $testerUsername = $_SESSION['LoginUser'];
      $queryTesterName = "SELECT NAME FROM db_centreofficer WHERE USERNAME = '$testerUsername'";
      $queryTesterName_run = mysqli_query($conn, $queryTesterName);
      if($queryTesterName_run){
        foreach ($queryTesterName_run as $rowsTesterName)
        {
          $testerName = $rowsTesterName['NAME'];
          echo "<h1 class='display-4 mt-3 text-center'>Welcome ";
          echo "$testerName";
          echo "</h1>";
        }
      }
       ?>
    </div>


    <!-- Optional JavaScript -->
    <script src="js\sideNav.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
