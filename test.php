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
      <?php $nazwaTabeli="Rezerwacje"; ?>
      <h1><?php echo $nazwaTabeli; ?></h1>



      <?php
      require_once('functions.php');

      $clients = getClients();
      echo '<select name="client">';
      foreach($clients as $row)
      {
        $tmparr=explode("|",$row);
        echo "<option value=".$tmparr[0].">".$tmparr[1]."</option>";
      }
      echo "</select>";

      $rooms = getRooms();
      echo '<select name="client">';
      foreach($rooms as $row)
      {
        $tmparr=explode("|",$row);
        echo "<option value=".$tmparr[0].">".$tmparr[1]."</option>";
      }
      echo "</select>";

?>
    </div>
  </body>
</html>
