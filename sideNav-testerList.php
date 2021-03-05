<link rel="stylesheet" href="css/stylesheet.css">

<div id="testerList" class="sidenavList">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNavList()">&times;</a>

  <table class="table table-bordered text-center text-white ml-4" style="width: 93%">
    <thead>
      <tr>
        <th scope="col" style="width: 17%;">No</th>
        <th scope="col">Username</th>
        <th scope="col">IC</th>
      </tr>
    </thead>

    <?php
    $no = 0;
    $testerUsername = $_SESSION['LoginUser'];
    $query_centreID = "SELECT CENTRE_ID FROM db_centreofficer WHERE USERNAME = '$testerUsername'";
    $queryCentreID_run = mysqli_query($conn, $query_centreID);
    if ($queryCentreID_run) {
      foreach ($queryCentreID_run as $row_centerID) {
        $centreID = $row_centerID['CENTRE_ID'];
      }
    }
    $query_tester = "SELECT NAME, OFFICER_IC FROM db_centreofficer WHERE CENTRE_ID = '$centreID' AND POSITION = 'Tester'";
    $queryTester_run = mysqli_query($conn, $query_tester);
    if ($queryTester_run) {
      foreach ($queryTester_run as $row_tester) {
        $name = $row_tester['NAME'];
        $ic = $row_tester['OFFICER_IC'];

        $no = ($no + 1);
    ?>
    <tbody>
      <tr>
        <th scope="row"><?php echo $no ?></th>
        <td><?php echo $name ?></td>
        <td><?php echo $ic ?></td>
      </tr>
    </tbody>
    <?php
        }
      }
     ?>
  </table>

</div>
<span style="font-size:20px;cursor:pointer; " class="float-right font-weight-bolder mr-2 mt-2" onclick="openNavList()">&#8592;Tester List</span>
