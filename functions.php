
<?php

function display_table($nazwaTabeli, $conn){

$sql="SELECT * FROM $nazwaTabeli";
$stmt = sqlsrv_query( $conn, $sql );

   echo "<table class='table table-hover'>";
     echo "<thead>";
      echo "<tr>";
        foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
                $col=$fieldMetadata["Name"];
                echo "<th>".$col."</th>";
              }
              echo "<th>Edit</th></tr></thead><tbody>";
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {

      echo "<tr>";
      foreach($row as $element){
        echo  "<td>".$element."</td>";
      }
      echo "<td><a href=update-single.php?id=".$row[0]."?conn=".$conn.">Edit</a></td></tr></tbody>";
      //echo "<td><a onclick='newSite(`/update-single.php?id=".$row[0]."`)'>Edit</a></td></tr></tbody>";
    }
  echo "</table>";
 }


 function find_row_by_id($id, $conn){

   $sql="SELECT * FROM Platnosci_SZNOH WHERE IDPlatnosci = $id";
   $stmt = sqlsrv_query( $conn, $sql );
   $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
   return $row;
 }

?>
