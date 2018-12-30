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
      <?php $nazwaTabeli="Wiadomosci"; ?>
      <h1><?php echo "Wiadomości"; ?></h1>
      <?php
      require_once($_SERVER['DOCUMENT_ROOT'].'/functions.php');

      $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
      $serverName = "tcp:sznohfal.database.windows.net,1433";
      $conn = sqlsrv_connect($serverName, $connectionInfo);

      if($_COOKIE['admin']=="True")
      {
        display_table($nazwaTabeli,$conn);
        echo "<a class='btn btn-primary' href=/add-single.php?nazwaTabeli=".$nazwaTabeli.">Dodaj</a>";

      }
      else
      {
        display_messages_by_id($nazwaTabeli,$conn);
        echo "<a class='btn btn-primary' href=/Recepcjonista/send-message.php?nazwaTabeli=".$nazwaTabeli.">Dodaj</a>";
      }
?>
    </div>
    <script>
    var table = document.getElementById("tableID");
    if (table != null) {
        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function () {
                tableText(this);
            };
        }
    }

    function tableText(tableCell) {
        document.getElementById("field2").value = tableCell.childNodes[1].innerHTML;
    }
    </script>
    <div class="container">
      <br>
      <h2>Treść wiadomości:</h2>
      <br>
      <input type="text" id="field2" >
    </div>
  </body>
</html>
