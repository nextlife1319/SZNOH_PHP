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
<?php
 require_once('functions.php');
 $connectionInfo = array("UID" => "ServerAdmin@sznoh", "pwd" => "WCYwcy123", "Database" => "SZNOH_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
 $serverName = "tcp:sznoh.database.windows.net,1433";
 $conn = sqlsrv_connect($serverName, $connectionInfo);

 $row=find_row_by_id($_GET['id'], $conn);
 $nazwaTabeli="Platnosci_SZNOH";
 $col=get_col_names($nazwaTabeli, $conn);
 echo $col[0];
 echo $col[1];
 echo $col[2];
 echo $col[3];



 if (isset($_POST[$col[0]])) {
   echo "dupa";

   echo $_POST[$col[0]];
   echo $_POST[$col[1]];
   echo $_POST[$col[2]];
   echo $_POST[$col[3]];

   $rowToUpdate = $_POST[$col[0]];
   $tsql= "UPDATE Platnosci_SZNOH SET ";
   $ii=0;
   foreach($col as $element){
     $tsql.=$element."= ?, ";
     $params[]=$_POST[$col[$ii]];
     $ii=$ii+1;
   }
   $params[]=$rowToUpdate;
   $tsql=rtrim($tsql, ", ");
   $tsql.=" WHERE ".$col[0] . " = ?";
   echo $tsql;
   print_r($params);
   $getResults= sqlsrv_query($conn, $tsql, $params);
   $rowsAffected = sqlsrv_rows_affected($getResults);
   echo "Zmodyfikowano wpis";
   sqlsrv_free_stmt($getResults);
 }

echo "<div class='input-group mb-3'><form method='post'>";
$i=0;
foreach($col as $element){
  echo $element.":<br>";
  echo "<input type='text' name='".$element."' value='".$row[$i]."'><br>";
  $i=$i+1;
}
echo "<input class='btn btn-primary' type='submit' value='Wprowadź'><a class='btn btn-primary' href='/Table.php'>Wróć</a></form></div></body></html>";
?>
