<link rel="stylesheet" href="css/stylesheet.css">

<?php
$testerUsername = $_SESSION['LoginUser'];
$queryCentreID = "SELECT CENTRE_ID FROM db_centreofficer WHERE USERNAME = '$testerUsername'";
$queryCentreID_run = mysqli_query($conn, $queryCentreID);
if($queryCentreID_run){
  foreach ($queryCentreID_run as $rowsCentreID)
  {
    $centreID = $rowsCentreID['CENTRE_ID'];
  }
}

$queryManagerName = "SELECT NAME FROM db_centreofficer WHERE CENTRE_ID = '$centreID' AND POSITION= 'Manager'";
$queryManagerName_run = mysqli_query($conn, $queryManagerName);
if($queryManagerName_run){
  foreach ($queryManagerName_run as $rowsManagerName)
  {
    $managerName = $rowsManagerName['NAME'];
  }
}

$queryCentre = "SELECT * FROM db_testcentre WHERE CENTRE_ID = '$centreID'";
$queryCentre_run = mysqli_query($conn, $queryCentre);
if($queryCentre_run){
  foreach ($queryCentre_run as $rowsCentre){
    $centreName = $rowsCentre['CENTRE_NAME'];
    $address = $rowsCentre['ADDRESS'];
    $phoneNo = $rowsCentre['PHONE_NO'];
  }
}

$queryEmpNo = "SELECT * FROM db_centreofficer WHERE CENTRE_ID = '$centreID'";
$queryEmpNo_run = mysqli_query($conn, $queryEmpNo);
if($queryEmpNo_run){
  $empNo = mysqli_num_rows($queryEmpNo_run);
}
 ?>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <blockquote class="blockquote text-center text-white">
    <p class="mb-0"><u>Manager</u></p>
    <footer class="blockquote-footer"><?php echo $managerName ?></cite></footer>
  </blockquote>

  <blockquote class="blockquote text-center text-white">
    <p class="mb-0"><u>Centre</u></p>
    <footer class="blockquote-footer"><?php echo $centreName ?></cite></footer>
  </blockquote>

  <blockquote class="blockquote text-center text-white">
    <p class="mb-0"><u>No.Employee</u></p>
    <footer class="blockquote-footer"><?php echo $empNo ?></cite></footer>
  </blockquote>

  <blockquote class="blockquote text-center text-white">
    <p class="mb-0"><u>Address</u></p>
    <footer class="blockquote-footer"><?php echo $address ?></cite></footer>
  </blockquote>

  <blockquote class="blockquote text-center text-white">
    <p class="mb-0"><u>Phone No</u></p>
    <footer class="blockquote-footer"><?php echo $phoneNo ?></cite></footer>
  </blockquote>

</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
