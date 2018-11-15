<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <h1>Edytuj wpis</h1>
<?php
 require_once('functions.php');
 $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
 $serverName = "tcp:sznohfal.database.windows.net,1433";
 $conn = sqlsrv_connect($serverName, $connectionInfo);

 $nazwaTabeli=$_GET['nazwaTabeli'];

 $row=find_row_by_id($_GET['id'], $conn, $nazwaTabeli);
 $col=get_col_names($nazwaTabeli, $conn);

 if (isset($_POST[$col[0]])) {

   $rowToUpdate = $_POST[$col[0]];
   $tsql= "UPDATE ".$nazwaTabeli." SET ";
   $ii=0;
   foreach($col as $element){
     if ($element!=$col[0]){
       $tsql.=$element."= ?, ";
       $params[]=$_POST[$col[$ii]];
     }
     $ii=$ii+1;
   }
   $params[]=$rowToUpdate;
   $tsql=rtrim($tsql, ", ");
   $tsql.=" WHERE ".$col[0] . " = ?";

   $getResults= sqlsrv_query($conn, $tsql, $params);
   $rowsAffected = sqlsrv_rows_affected($getResults);
   echo "Zmodyfikowano wpis";
   sqlsrv_free_stmt($getResults);
 }
$row=find_row_by_id($_GET['id'], $conn, $nazwaTabeli);
echo "<div class='input-group mb-3'><form method='post'>";
$i=0;
foreach($col as $element){
  if ($element==$col[0]){
    echo "<input type='hidden' name='".$element."' value='".$row[$i]."'><br>";
  }else{
    echo $element.":<br>";
    echo "<input type='text' name='".$element."' value='".$row[$i]."'><br>";
  }
  $i=$i+1;
}
echo "<input class='btn btn-primary' type='submit' value='Wprowadź'><a class='btn btn-primary' href='/".$nazwaTabeli.".php'>Wróć</a></form></div></body></html>";
?>
