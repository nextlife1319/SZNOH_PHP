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
      <?php $nazwaTabeli="users"; ?>
      <h1><?php echo $nazwaTabeli; ?></h1>
      <?php
      require_once('functions.php');

      display_table($nazwaTabeli,$conn);
      echo "<a class='btn btn-primary' href=/add-single.php?nazwaTabeli=".$nazwaTabeli.">Dodaj</a>";

?>
    </div>
  </body>
</html>
