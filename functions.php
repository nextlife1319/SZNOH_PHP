
<?php


function display_table(){
echo "dziala";
}
// $connectionInfo = array("UID" => "ServerAdmin@sznoh", "pwd" => "WCYwcy123", "Database" => "SZNOH_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
// $serverName = "tcp:sznoh.database.windows.net,1433";
// $conn = sqlsrv_connect($serverName, $connectionInfo);
//
// $sql="SELECT * FROM $nazwaTabeli";
// $stmt = sqlsrv_query( $conn, $sql );
//
//
//   echo "<table class="table table-hover">";
//     echo "<thead>";
//       echo "<tr>";
//         foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
//                 $col=$fieldMetadata["Name"];
//                 echo "<th>".$col."</th>";
//               }
//               echo "<th>Edit</th></tr></thead><tbody>";
//     while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
//
//       echo "<tr>";
//       foreach($row as $element){
//         echo  "<td>".$element."</td>";
//       }
//       echo "<td><a href=update-single.php?id=".$row[0].">Edit</a></td></tr></tbody>";
//     }
//   echo "</table>";

?>
