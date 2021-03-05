<?php

  require '../config.php';

  if(isset($_POST['btnDelete'])) {

    @$kitID = $_POST['id'];

    $query = "DELETE FROM db_testkit WHERE db_testkit.KIT_ID = '$kitID'";
    $query_run = mysqli_query($conn, $query);



    if ($query_run) {
      echo '<script type="text/javascript">alert("Kit successfully deleted.");location.replace("/CTIS/manageTestKit.php")</script>';

    }
    else {
      echo '<script type="text/javascript">alert("Fail to delete kit. Please try again.");location.replace("/CTIS/manageTestKit.php")</script>';
    }
}

?>
