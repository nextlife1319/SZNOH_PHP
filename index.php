<!DOCTYPE html>
<html lang="en">
<head>
  <title>SZNOH System zarzadzania nowoczesnym obiektem hotelowym</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php //<script src="/iframe.js"></script> ?>
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

      document.getElementById('myFrame').src =string;
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

        <li><a class="btn btn-dark" href="/index.php">Home</a></li>
        <?php
              if(isset($_COOKIE['admin'])) {
                $var= <<<'EOD'
        <li><a class="btn btn-dark" onClick="newSite(`/Pokoje.php`)">Pokoje</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Pracownicy.php`)">Pracownicy</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Klienci.php`)">Klienci</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Rezerwacje.php`)">Rezerwacje</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Wyposazenie.php`)">Wyposazenie</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Spis_wyposazenia.php`)">Spis wyposazenia</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Wiadomosci.php`)">Wiadomosc</a></li>
EOD;


        echo $var;
        }
        ?>
        <!--<li><a class="btn btn-dark" onClick="newSite(`/users.php`)">Uzytkownicy</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php

        $var='<li><a class="btn btn-dark" onClick="newSite(`/users.php`)"><span class="glyphicon glyphicon-user"></span> Dodaj uzytkownika</a></li>';
        if(isset($_COOKIE['admin']) && $_COOKIE['admin'] == 'True') echo $var;
        $notloggedin ='<li><a class="btn btn-dark" onClick="newSite(`/login.php`)"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        $loggedin='<li><a class="btn btn-dark" onClick="newSite(`/logout.php`)"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
        if(isset($_COOKIE['admin'])) {echo $loggedin;}
        else echo $notloggedin;
        ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <?php //<p><a href="#">Link</a></p> ?>
    </div>
    <div class="col-sm-8 text-left">
      <iframe id="myFrame" src="/Home.html" style="height:1000px;width:100%" frameBorder="0"></iframe>
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
