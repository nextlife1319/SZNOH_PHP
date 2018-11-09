<?php

/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */

 require_once('Table1.php');

if (isset($_GET['id'])) {
  echo $_GET['id']; // for testing purposes
} else {
    echo "Something went wrong!";
    exit;
}

$connectionInfo = array("UID" => "ServerAdmin@sznoh", "pwd" => "WCYwcy123", "Database" => "SZNOH_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sznoh.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

$row=find_row_by_id($_GET['id']);

?>

<form>
  IDPlatnosci:<br>
  <input type="text" name="ID" value="<?php echo $row[0]; ?>"><br>
  Zaplacono:<br>
  <input type="text" name="Zap" value="<?php echo $row[1]; ?>"><br>
  Zaliczka:<br>
  <input type="text" name="Zal" value="<?php echo $row[2]; ?>"><br>
  CalaKwota:<br>
  <input type="text" name="Cal" value="<?php echo $row[3]; ?>"><br>
</form>


<?php
// $rowToUpdate = $_GET['id'];
// $tsql= "UPDATE Platnosci_SZNOH SET IDPlatnosci = ?, Zaplacono = ?, Zaliczka = ?, CalaKwota = ?  WHERE IDPlatnosci = ?";
// $params = array('Sweden', $userToUpdate);
// echo("Updating Location for user " . $userToUpdate . PHP_EOL);
//
// $getResults= sqlsrv_query($conn, $tsql, $params);
// $rowsAffected = sqlsrv_rows_affected($getResults);
// if ($getResults == FALSE or $rowsAffected == FALSE)
//     die(FormatErrors(sqlsrv_errors()));
// echo ($rowsAffected. " row(s) updated: " . PHP_EOL);
// sqlsrv_free_stmt($getResults);

?>
