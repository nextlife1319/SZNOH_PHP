<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <h1>Wyswietl historie</h1>
<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once(__ROOT__.'/functions.php');

 $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
 $serverName = "tcp:sznohfal.database.windows.net,1433";
 $conn = sqlsrv_connect($serverName, $connectionInfo);

 $nazwaTabeli='Rezerwacje';
 $col=get_col_names($nazwaTabeli, $conn);

 echo "<div class='input-group mb-3'><form method='post'>";
 $Staff = getStaff();    #Staff dropdown
 echo '<select name="client">';
 foreach($Staff as $row)
 {
   $tmparr=explode("|",$row);
   $tmparr[1]=str_replace("*"," ",$tmparr[1]);
   echo "<option value=".$tmparr[0].">".$tmparr[1]."</option>";
 }
 echo "</select>";
 echo "<input class='btn btn-primary' type='submit' value='Wprowadź'><a class='btn btn-primary' href='/".$nazwaTabeli.".php'>Wróć</a></form></div></body></html>";
 ?>
