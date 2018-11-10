<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/iframe.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Pierwsza Tabela</h1>
      <?php
      require_once('functions.php');

      $connectionInfo = array("UID" => "ServerAdmin@sznoh", "pwd" => "WCYwcy123", "Database" => "SZNOH_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
      $serverName = "tcp:sznoh.database.windows.net,1433";
      $conn = sqlsrv_connect($serverName, $connectionInfo);

      $nazwaTabeli="Platnosci_SZNOH";
      display_table($nazwaTabeli,$conn);
      echo "<a class='btn btn-primary' href='/add-single.php'>Dodaj</a>";

      //Display metadata of the chosen table

      // $sql = "SELECT * FROM Platnosci_SZNOH";
      // $stmt = sqlsrv_prepare( $conn, $sql );
      // foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
      //     foreach( $fieldMetadata as $name => $value) {
      //        echo "$name: $value<br />";
      //     }
      //       echo "<br />";
      // }

      $userToDelete = 'Jared';
$tsql= "DELETE FROM TestSchema.Employees WHERE Name = ?";
$params = array($userToDelete);
$getResults= sqlsrv_query($conn, $tsql, $params);
echo("Deleting user " . $userToDelete . PHP_EOL);
$rowsAffected = sqlsrv_rows_affected($getResults);
if ($getResults == FALSE or $rowsAffected == FALSE)
    die(FormatErrors(sqlsrv_errors()));
echo ($rowsAffected. " row(s) deleted: " . PHP_EOL);
sqlsrv_free_stmt($getResults);


?>
    </div>
  </body>
</html>
