
<?php

function display_table($nazwaTabeli, $conn){
mysql_query("SET NAMES utf8");
$order=get_col_names($nazwaTabeli, $conn);
$by=$order[0];
$sql="SELECT * FROM $nazwaTabeli ORDER BY $by";
$stmt = sqlsrv_query( $conn, $sql );

   echo "<table class='table table-hover'>";
     echo "<thead>";
      echo "<tr>";
        foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
                $col=$fieldMetadata["Name"];
                echo "<th>".$col."</th>";     #nazwy kolumn
              }
              echo "<th>Edit</th>";
              echo "<th>Usuń</th></tr></thead><tbody>";
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
      print_r($row);
      echo "<tr>";
      foreach($row as $element){
        echo  "<td>".$element."</td>";
      }
      echo "<td><a href=update-single.php?id=".$row[0]."&nazwaTabeli=".$nazwaTabeli.">Edit</a></td>";
      echo "<td><a href=delete-single.php?id=".$row[0]."&nazwaTabeli=".$nazwaTabeli.">Usuń</a></td></tr></tbody>";
    }
  echo "</table>";
 }


 function find_row_by_id($id, $conn, $nazwaTabeli){

   $where=get_col_names($nazwaTabeli, $conn);
   $sql="SELECT * FROM $nazwaTabeli WHERE $where[0] = $id";
   $stmt = sqlsrv_query( $conn, $sql );
   $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
   return $row;
 }

 function get_col_names($nazwaTabeli, $conn){

   $sql="SELECT * FROM $nazwaTabeli";
   $stmt = sqlsrv_query( $conn, $sql );
   foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
           $col[]=$fieldMetadata["Name"];
         }
   return $col;
 }

 function getClients(){
   $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
   $serverName = "tcp:sznohfal.database.windows.net,1433";
   $conn = sqlsrv_connect($serverName, $connectionInfo);
   $sql="SELECT imie,nazwisko FROM Klienci";
   $stmt = sqlsrv_query( $conn, $sql );

   $clients=array();

   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
     $tmp=$row[0]." ".$row[1];
     $clients[]=$tmp;
   }
   print_r($clients);
   return $clients;
 }

?>
