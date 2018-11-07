<!DOCTYPE html>
<html lang="en">
<head>
  <title>SZNOH System zarzadzania nowoczesnym obiektem hotelowym</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

<script>

function newSite(string) {

    document.getElementById('myFrame').src =string ;
}
</script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a class="btn btn-dark" href="/index.php">Home</a></li>
        <li><input type="button" value="Table" onClick="newSite(`/Table.php`)" class="btn btn-dark" /></li>
        <li><a class="btn btn-dark" href="#">Projects</a></li>
        <li><a class="btn btn-dark" href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-8 text-left">
      <iframe id="myFrame" src="/Welcome.html" style="height:1000px;width:100%" frameBorder="0"></iframe>
      <?php/*
      // PHP Data Objects(PDO) Sample Code:
      try {
          $conn = new PDO("sqlsrv:server = tcp:sznoh.database.windows.net,1433; Database = SZNOH_DB", "ServerAdmin", "WCYwcy123");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (PDOException $e) {
          print("Error connecting to SQL Server.");
          die(print_r($e));
      }

      // SQL Server Extension Sample Code:
      $connectionInfo = array("UID" => "ServerAdmin@sznoh", "pwd" => "WCYwcy123", "Database" => "SZNOH_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
      $serverName = "tcp:sznoh.database.windows.net,1433";
      $conn = sqlsrv_connect($serverName, $connectionInfo);

      $sql="SELECT * FROM Platnosci_SZNOH";
      $stmt = sqlsrv_query( $conn, $sql );

      ?>
      <table border="1" style="width:100%">
        <tr BGCOLOR="#6D8FFF">
            <td>ID</td>
            <td>Name</td>
            <td>Age</td>
            <td>Price</td>
        </tr>
      <?php
      while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
      ?>
        <tr>
          <td><?php echo $row[0]; ?></td>
          <td><?php echo $row[1]; ?></td>
          <td><?php echo $row[2]; ?></td>
          <td><?php echo $row[3]; ?></td>
        </tr>
      <?php
    }*/
      ?>
      <?php//</table>?>

    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <img src="sznoh_logo.PNG"/>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Made by talented WAT students</p>
</footer>

</body>
</html>
