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
      <?php $nazwaTabeli="Pracownicy"; ?>
      <h1><?php echo "Twój profil"; ?></h1>
      <?php
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      require_once($root.'/functions.php');

      $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
      $serverName = "tcp:sznohfal.database.windows.net,1433";
      $conn = sqlsrv_connect($serverName, $connectionInfo);

      $col=get_col_names($nazwaTabeli, $conn);

      $name=explode(" ", $_COOKIE('name'));

      $sql="SELECT * FROM $nazwaTabeli where imie=$name[0] and nazwisko=$name[1]";
      $stmt = sqlsrv_query( $conn, $sql );

      $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC)
      print_r($row);
        // echo "<tr>";
        // foreach($row as $element){
        //   echo  "<td>".$element."</td>";
        // }

      ?>
    </div>
  </body>
</html>
