
<?php
function display_table($nazwaTabeli){
// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "ServerAdmin@sznoh", "pwd" => "WCYwcy123", "Database" => "SZNOH_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sznoh.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

//$nazwaTabeli="Platnosci_SZNOH";
$sql="SELECT * FROM $nazwaTabeli";
$stmt = sqlsrv_query( $conn, $sql );


  // echo "<table class="table table-hover">";
  //   echo "<thead>";
  //     echo "<tr>";
  //       foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
  //               $col=$fieldMetadata["Name"];
  //               echo "<th>".$col."</th>";
  //             }
  //             echo "<th>Edit</th></tr></thead><tbody>";
  //   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
  //
  //     echo "<tr>";
  //     foreach($row as $element){
  //       echo  "<td>".$element."</td>";
  //     }
  //     echo "<td><a href=update-single.php?id=".$row[0].">Edit</a></td></tr></tbody>";
  //   }
  // echo "</table>";

return <<<HTML
<table class="table table-hover">
  <thead>
    <tr>
      <?php foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
              $col=$fieldMetadata["Name"];
              echo "<th>".$col."</th>";
            }?>
            <th>Edit</th>
    </tr>
  </thead>
  <?php while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) { ?>
  <tbody>

    <tr><?php foreach($row as $element){
    echo  "<td>".$element."</td>";} ?>
    <td><a href="update-single.php?id=<?php echo $row[0]; ?>">Edit</a></td>
    </tr>
  </tbody><?php } ?>
</table>
HTML;
}?>
