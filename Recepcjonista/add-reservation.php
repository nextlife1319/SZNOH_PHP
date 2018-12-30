<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


      <!-- FOR CALENDAR -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>
    <script>
    $( function() {
      $( "#datepicker2" ).datepicker();
    } );
    </script>
      <!-- END FOR CALENDAR -->

  </head>
  <body>
    <?php

    $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:sznohfal.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if (isset($_POST["id_pracownika"])) {
      echo "kupa";

      $addsql='INSERT INTO Rezerwacje (id_pokoju, id_klienta, id_pracownika, data_przyjazdu, data_wyjazdu, czy_zameldowany) VALUES ';
      $addsql+='('.$_POST["id_pokoju"].', '.$_POST["id_klienta"].', '.$_POST["id_pracownika"].', '.$_POST["data_przyjazdu"].', '.$_POST["data_wyjazdu"].', 1);';
      echo $addsql;
    }
    //   $getResults= sqlsrv_query($conn, $addsql);
    //   $rowsAffected = sqlsrv_rows_affected($getResults);
    //   echo "Dodano wpis";
    //   sqlsrv_free_stmt($getResults);
    // }
    ?>

<div class='input-group mb-3'><form method='post'>
    <?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__.'/functions.php');

    echo "<br>Klient<br>";
    $clients = getClients();    #Client dropdown
    echo '<select name="id_klienta">';
    foreach($clients as $row)
    {
      $tmparr=explode("|",$row);
      echo "<option value=".$tmparr[0].">".$tmparr[1]."</option>";
    }
    echo "</select>";

    echo "<br>Pokój<br>";
    $rooms = getRooms();        #Room dropdown
    echo '<select name="id_pokoju">';
    foreach($rooms as $row)
    {
      $tmparr=explode("|",$row);
      echo "<option value=".$tmparr[0].">".$tmparr[1]."</option>";
    }
    echo "</select>";

    echo getIdFromName($_COOKIE['name']);

    echo '<input type="hidden" name="id_pracownika" value='.getIdFromName($_COOKIE['name']).'>';

    echo "<br>Data przyjazdu<br>";
    echo '<input type="text" id="datepicker" name="data_przyjazdu">';

    echo "<br>Data wyjazdu<br>";
    echo '<input type="text" id="datepicker2" name="data_wyjazdu">';


    #echo "<input type='text' name='".$element."'><br>";
    ?>

<br><br><input class='btn btn-primary' type='submit' value='Wprowadź'><a class='btn btn-primary' href='/Rezerwacje.php'>Wróć</a></form></div></body></html>
