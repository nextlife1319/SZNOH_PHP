<!DOCTYPE html>
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

  </head>
  <body>
    <div class="container">
      <?php $nazwaTabeli="Rezerwacje"; ?>
      <h1><?php echo $nazwaTabeli; ?></h1>



      <?php
      require_once('functions.php');

      $clients = getStaff();    #Client dropdown
      echo '<select name="client">';
      foreach($clients as $row)
      {
        $tmparr=explode("|",$row);
        echo "<option value=".$tmparr[0].">".$tmparr[1]."</option>";
      }
      echo "</select>";

      $rooms = getRooms();        #Room dropdown
      echo '<select name="client">';
      foreach($rooms as $row)
      {
        $tmparr=explode("|",$row);
        echo "<option value=".$tmparr[0].">".$tmparr[1]."</option>";
      }
      echo "</select>";

      $name=$_COOKIE['name'];   #obtaining name
      echo "<br>".$name;
?>
<br>
<p>Date: <input type="text" id="datepicker"></p>

    </div>
  </body>
</html>
