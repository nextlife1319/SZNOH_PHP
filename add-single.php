<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <h1>Dodaj wpis</h1>
<?php
 require_once('functions.php');
 $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
 $serverName = "tcp:sznohfal.database.windows.net,1433";
 $conn = sqlsrv_connect($serverName, $connectionInfo);

 $nazwaTabeli="Klienci";
 $col=get_col_names($nazwaTabeli, $conn);

 if (isset($_POST[$col[1]])) {

   $addsql= "INSERT INTO ".$nazwaTabeli." (";
   $val=") VALUES (";
   $ii=0;
   foreach($col as $element){
     if ($element!=$col[0]){
       $addsql.=$element;
       $addsql.=", ";
       $params[]=$_POST[$col[$ii]];
       $val.="?, ";
     }
     $ii=$ii+1;
   }
   $addsql=rtrim($addsql, ", ");
   $val=rtrim($val, ", ");
   $addsql.=$val.");";

   echo $addsql;
   print_r($params);
   $getResults= sqlsrv_query($conn, $addsql, $params);
   $rowsAffected = sqlsrv_rows_affected($getResults);
   echo "Dodano wpis";
   sqlsrv_free_stmt($getResults);
 }

echo "<div class='input-group mb-3'><form method='post'>";

foreach($col as $element){
  if ($element!=$col[0]){
    echo $element.":<br>";
    echo "<input type='text' name='".$element."'><br>";
  }
}
echo "<input class='btn btn-primary' type='submit' value='Wprowadź'><a class='btn btn-primary' href='/Table.php'>Wróć</a></form></div></body></html>";
?>
