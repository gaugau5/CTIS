<?php
$role = include("findRole.php");

if(!isset($_SESSION['LoginUser'])){
  header('Location: index.php');
}
if ($role != "Patient") {
  echo '<script type="text/javascript">alert("You are unauthorized to access this page.");location.replace("php/logout.php")</script>';
}
 ?>
