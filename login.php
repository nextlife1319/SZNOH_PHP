<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
<?php
 require_once('functions.php');
 $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
 $serverName = "tcp:sznohfal.database.windows.net,1433";
 $conn = sqlsrv_connect($serverName, $connectionInfo);





if(isset($_COOKIE['admin'])) {
    echo "<h1> Witaj </h1>" ;
    echo "<a class='btn btn-primary' href='/Home.html'>Wróć</a>";
} else {
  echo "<h1>Zaloguj</h1>";
  if (isset($_POST['user'])) {
    $username = $_POST['user'];
    $password =  $_POST['password'];
    $query="SELECT username FROM Users WHERE username=? AND password=?";

    $params=array($username,$password);
    $getResults= sqlsrv_query($conn, $query, $params);
    $row = sqlsrv_fetch_array( $getResults, SQLSRV_FETCH_NUMERIC);
   if($row){
     echo "Zalogowano";
     $cookie_name = "admin";
     $cookie_value = "True"; //TODO Wyczytac z bazy
     setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
   }
   else{
     echo "Bledny login lub haslo";
   }
    sqlsrv_free_stmt($getResults);
  }
  echo "<div class='input-group mb-3'><form method='post'>";
  echo 'Nazwa użytkownika'.":<br>";
  echo "<input type='text' name='user'><br>";
  echo "Hasło:<br>";
  echo "<input type='password' name='password'><br>";
  echo "<input class='btn btn-primary' type='submit' value='Wprowadź'><a class='btn btn-primary' href='/index.php'>Wróć</a></form></div></body></html>";
}

?>
