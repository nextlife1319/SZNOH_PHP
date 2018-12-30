<!DOCTYPE html>
<html lang="en">
<head>
  <title>SZNOH System zarzadzania nowoczesnym obiektem hotelowym</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php //<script src="/iframe.js"></script>
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);?>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 100%}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    img {
      display: block;
      max-width: 100%;
      height: auto;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
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
      <a class="navbar-brand" href="#">SZNOH</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li><a class="btn btn-dark" href="/index.php">Home</a></li>
        <?php
              if(isset($_COOKIE['admin']) && $_COOKIE['admin'] == 'True') {
                $var= <<<'EOD'
        <li><a class="btn btn-dark" onClick="newSite(`/Tabele/Pokoje.php`)">Pokoje</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Tabele/Pracownicy.php`)">Pracownicy</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Tabele/Klienci.php`)">Klienci</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Tabele/Rezerwacje.php`)">Rezerwacje</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Tabele/Wyposazenie.php`)">Wyposażenie</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Tabele/Spis_wyposazenia.php`)">Spis wyposażenia</a></li>
        <li><a class="btn btn-dark" onClick="newSite(`/Tabele/Wiadomosci.php`)">Wiadomości</a></li>
EOD;


        echo $var;
        }
        ?>
        <!--<li><a class="btn btn-dark" onClick="newSite(`/Uzytkownicy.php`)">Uzytkownicy</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php

        ### USERS ONLY FOR ADMIN ###
        $var='<li><a class="btn btn-dark" onClick="newSite(`/Tabele/Uzytkownicy.php`)"><span class="glyphicon glyphicon-user"></span> Dodaj uzytkownika</a></li>';
        if(isset($_COOKIE['admin']) && $_COOKIE['admin'] == 'True') echo $var;

        ### ACCOUNT DETAILS FOR NONADMINS ###
        elseif(isset($_COOKIE['name'])){
          echo '<li><a class="btn btn-dark" onClick="newSite(`/Tabele/Wiadomosci.php`)"><span class="glyphicon glyphicon-envelope"></span>Wiadomości</a></li>';
          echo '<li><a class="btn btn-dark" onClick="newSite(`/Recepcjonista/Profil.php`)"><span class="glyphicon glyphicon-user"></span>'.$_COOKIE['name'].'</a></li>';
        }

        ### LOGIN/LOGOUT ###
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
      <?php
      ### IFRAME SOURCE DEPENDING ON ACCOUNT ###
      $source='';
      if(!isset($_COOKIE['admin'])) $source="/Home.html";
      else{
        if($_COOKIE['admin']=='True') $source="/test.php";
        else $source="/Recepcjonista/menu.php";
      }

      echo '<iframe id="myFrame" src="'.$source.'" style="height:100%;width:100%" frameBorder="0"></iframe>';

      ?>
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
