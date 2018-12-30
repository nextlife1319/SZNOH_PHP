
<?php

function display_table($nazwaTabeli, $conn){
  sqlsrv_query($conn,"SET NAMES utf8");
  $order=get_col_names($nazwaTabeli, $conn);
  $by=$order[0];
  $sql="SELECT * FROM $nazwaTabeli ORDER BY $by";
  $stmt = sqlsrv_query( $conn, $sql );

     echo "<table class='table table-hover' id='tableID'>";
       echo "<thead>";
        echo "<tr>";
          foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
                  $col=$fieldMetadata["Name"];
                  echo "<th>".$col."</th>";     #nazwy kolumn
                }
                echo "<th>Edit</th>";
                echo "<th>Usuń</th></tr></thead><tbody>";
      while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
        //print_r($row);
        echo "<tr>";
        foreach($row as $element){
          echo  "<td>".$element."</td>";
        }
        echo "<td><a href=/update-single.php?id=".$row[0]."&nazwaTabeli=".$nazwaTabeli.">Edit</a></td>";
        echo "<td><a href=/delete-single.php?id=".$row[0]."&nazwaTabeli=".$nazwaTabeli.">Usuń</a></td></tr></tbody>";
      }
    echo "</table>";
 }



 function display_messages_by_id($nazwaTabeli, $conn){
   sqlsrv_query($conn,"SET NAMES utf8");
   $order=get_col_names($nazwaTabeli, $conn);
   $by=$order[0];
   $sql="SELECT * FROM $nazwaTabeli ORDER BY $by";
   $stmt = sqlsrv_query( $conn, $sql );

      echo "<table class='table table-hover' id='tableID'>";
      echo "<col width='100'>";
      echo "<col width='100'>";
        echo "<thead>";
         echo "<tr>";
           echo "<th>Temat</th>";
           echo "<th style='display:none;'>Treść</th>";
           echo "<th>Nadawca</th>";
           echo "<th>Data</th>";
                 echo "<th>Usuń</th></tr></thead><tbody>";
       while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
         //print_r($row);
         $id = getIdFromName($_COOKIE['name']);
         if($id==$row[4])
         {
           echo "<tr>";
           echo  "<td>".$row[1]."</td>";
           echo  "<td style='display:none;'>".$row[2]."</td>";
           echo  "<td>".getUsernameFromId($row[3])."</td>";
           echo  "<td>".$row[5]."</td>";
           echo "<td><a href=/delete-single.php?id=".$row[0]."&nazwaTabeli=".$nazwaTabeli.">Usuń</a></td></tr></tbody>";
         }
       }
     echo "</table>";
  }

 function find_row_by_id($id, $conn, $nazwaTabeli){

   $where=get_col_names($nazwaTabeli, $conn);
   $sql="SELECT * FROM $nazwaTabeli WHERE $where[0] = $id";
   $stmt = sqlsrv_query( $conn, $sql );
   $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
   return $row;
 }

 function get_col_names($nazwaTabeli, $conn){

   $sql="SELECT * FROM $nazwaTabeli";
   $stmt = sqlsrv_query( $conn, $sql );
   foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
           $col[]=$fieldMetadata["Name"];
         }
   return $col;
 }

 function getClients(){
   $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
   $serverName = "tcp:sznohfal.database.windows.net,1433";
   $conn = sqlsrv_connect($serverName, $connectionInfo);
   $sql="SELECT id,imie,nazwisko FROM Klienci";
   $stmt = sqlsrv_query( $conn, $sql );

   $clients=array();

   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
     $tmp=$row[0]."|".$row[1]." ".$row[2];
     $clients[]=$tmp;
   }
   #print_r($clients);
   return $clients;
 }

 function getStaff()
 {
   $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
   $serverName = "tcp:sznohfal.database.windows.net,1433";
   $conn = sqlsrv_connect($serverName, $connectionInfo);
   $sql="SELECT id,imie,nazwisko FROM Pracownicy";
   $stmt = sqlsrv_query( $conn, $sql );

   $staff=array();

   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
     $tmp=$row[0]."|".$row[1]."*".$row[2];
     $staff[]=$tmp;
   }
   #print_r($staff);
   return $staff;
 }


  function getRooms()
  {
    $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:sznohfal.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    $sql="SELECT id,nr_pokoju,cena FROM Pokoje";
    $stmt = sqlsrv_query( $conn, $sql );

    $rooms=array();

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
      $tmp=$row[0]."|"."Pokoj nr:".$row[1]."     ".$row[2]."zl";
      $rooms[]=$tmp;
    }
    #print_r($clients);
    return $rooms;
  }

  function getIdFromName($name)
  {
    $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:sznohfal.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);


    $arr=explode(" ",$name);
    $query="SELECT id from Pracownicy WHERE imie='$arr[0]' AND nazwisko='$arr[1]'";
    #print_r($arr);
    #echo "$query";

    $stmt = sqlsrv_query( $conn, $query );
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
    #echo "ID:".$row[0];

    return $row[0];

  }

  function getUsernameFromId($Id)
  {
    $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:sznohfal.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);


    $arr=explode(" ",$name);
    $query="SELECT username from users WHERE id='$Id'";
    #print_r($arr);
    #echo "$query";

    $stmt = sqlsrv_query( $conn, $query );
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
    #echo "ID:".$row[0];

    return $row[0];

  }


    function getUserIdFromName($name)
    {
      $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
      $serverName = "tcp:sznohfal.database.windows.net,1433";
      $conn = sqlsrv_connect($serverName, $connectionInfo);


      $arr=explode(" ",$name);
      $query="SELECT id from users WHERE username='$name'";
      #print_r($arr);
      #echo "$query";

      $stmt = sqlsrv_query( $conn, $query );
      $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
      #echo "ID:".$row[0];

      return $row[0];

    }

    function getNotyfications()
    {
      $connectionInfo = array("UID" => "SecureAdmin@sznohfal", "pwd" => "WCYwcy123", "Database" => "sznohphp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
      $serverName = "tcp:sznohfal.database.windows.net,1433";
      $conn = sqlsrv_connect($serverName, $connectionInfo);

      $query="SELECT tresc from Powiadomienia";
      $stmt = sqlsrv_query( $conn, $query );
      echo "<h4>Powiadomienia</h4><br><br>";
      echo "<ol>";
      while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC)){
        echo "<li>".$row[0]."</li>";
      }
      echo "</ol>";

    }


?>
