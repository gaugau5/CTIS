<?php
  require '../config.php';

  $request = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "SELECT * FROM db_covidtest WHERE TEST_ID LIKE '%".$request."%' AND STATUS = 'Pending'";

  $result = mysqli_query($conn, $query);

  $data = array();

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $data[] = $row["TEST_ID"];
    }
    echo json_encode($data);
  }
?>
