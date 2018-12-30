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
    <!-- END FOR CALENDAR -->
  </head>
  <body>
    <div class="container">
<br><br><br>
<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/Tabele/Uzytkownicy.php'" >Zarzadzaj kontami</button>
<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/Tabele/Klienci.php'" >Zarzadzaj danymi klientów</button>
<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/Tabele/Powiadomienia.php'" >Zarzadzaj powiadomieniami</button>


    </div>
  </body>
</html>
