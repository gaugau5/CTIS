<?php

  require '../config.php';

  if(isset($_POST['btnUpdate'])) {

    @$quantity = $_POST['quantity_Input'];
    @$kitID = $_POST['id'];

    $query = "SELECT AVAILABLE_STOCK FROM db_testkit WHERE KIT_ID='$kitID'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result, 1);
    $stock = $row['AVAILABLE_STOCK'];
    $total = $stock + $quantity;

    if($quantity == ""){
      echo '<script type="text/javascript">alert("Insert in all field.");location.replace("/CTIS/manageTestKit.php")</script>';
    }
    else{
      $query = "UPDATE db_testkit SET AVAILABLE_STOCK='$total' WHERE KIT_ID='$kitID'";
      $query_run = mysqli_query($conn, $query);
      mysqli_query($conn, $query);

      if ($query_run) {
        echo '<script type="text/javascript">alert("Kit updated successfully.");location.replace("/CTIS/manageTestKit.php")</script>';

      }
      else {
        echo '<script type="text/javascript">alert("Fail to update kit. Please try again.");location.replace("/CTIS/manageTestKit.php")</script>';
      }
    }

  }
?>
