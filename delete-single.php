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
    <h1>Usunięto wpis</h1>
<?php
 require_once('functions.php');
 $connectionInfo = array("UID" => "ServerAdmin@sznoh", "pwd" => "WCYwcy123", "Database" => "SZNOH_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
 $serverName = "tcp:sznoh.database.windows.net,1433";
 $conn = sqlsrv_connect($serverName, $connectionInfo);

 $nazwaTabeli="Platnosci_SZNOH";
 $col=get_col_names($nazwaTabeli, $conn);

   $delsql= "DELETE FROM $nazwaTabeli WHERE $col[0] = ?";
   $params=array($_GET["id"]);
   echo $delsql;
   print_r($params);
   $getResults= sqlsrv_query($conn, $addsql, $params);
   $rowsAffected = sqlsrv_rows_affected($getResults);
   sqlsrv_free_stmt($getResults);
   echo "<a class='btn btn-primary' href='/Table.php'>Wróć</a>";

?>
