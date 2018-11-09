<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Pierwsza Tabela</h1>
      <?php
      require_once('functions.php');
      $nazwaTabeli="Platnosci_SZNOH";
      display_table($nazwaTabeli);
      // echo $var;
      //$nazwaTabeli="Platnosci_SZNOH";
      //echo display_table($nazwaTabeli);
      // SQL Server Extension Sample Code:
      $connectionInfo = array("UID" => "ServerAdmin@sznoh", "pwd" => "WCYwcy123", "Database" => "SZNOH_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
      $serverName = "tcp:sznoh.database.windows.net,1433";
      $conn = sqlsrv_connect($serverName, $connectionInfo);


      $nazwaTabeli="Platnosci_SZNOH";
      display_table($nazwaTabeli,$conn);

      function find_row_by_id($id){
        global $conn;

        $sql="SELECT * FROM Platnosci_SZNOH WHERE IDPlatnosci = $id";
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
        return $row;
      }

      //Display metadata of the chosen table

      // $sql = "SELECT * FROM Platnosci_SZNOH";
      // $stmt = sqlsrv_prepare( $conn, $sql );
      // foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
      //     foreach( $fieldMetadata as $name => $value) {
      //        echo "$name: $value<br />";
      //     }
      //       echo "<br />";
      // }

      $nazwaTabeli="Platnosci_SZNOH";
      $sql="SELECT * FROM $nazwaTabeli";
      $stmt = sqlsrv_query( $conn, $sql );

        ?>
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



<?php

      ////Add row to Database

      // echo ("Inserting a new row into table" . PHP_EOL);
      // $addsql= "INSERT INTO Platnosci_SZNOH VALUES (?,?,?,?);";
      // $params = array(2,'Nie', 100.0, 600.0);
      // $getResults= sqlsrv_query($conn, $addsql, $params);
      // $rowsAffected = sqlsrv_rows_affected($getResults);
      // if ($getResults == FALSE or $rowsAffected == FALSE)
      //     die(FormatErrors(sqlsrv_errors()));
      // echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);
      // sqlsrv_free_stmt($getResults);

?>
    </div>
  </body>
</html>
