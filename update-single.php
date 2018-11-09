<?php

/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */

 require_once('Table1.php');
require_once('functions.php');
 if (isset($_POST['ID'])) {

   $rowToUpdate = $_POST['ID'];
   $tsql= "UPDATE Platnosci_SZNOH SET IDPlatnosci = ?, Zaplacono = ?, Zaliczka = ?, CalaKwota = ?  WHERE IDPlatnosci = ?";
   $params = array($_POST['ID'], $_POST['Zap'], $_POST['Zal'], $_POST['Cal'], $rowToUpdate);

   $getResults= sqlsrv_query($conn, $tsql, $params);
   $rowsAffected = sqlsrv_rows_affected($getResults);
   if ($getResults == FALSE or $rowsAffected == FALSE)
       die(FormatErrors(sqlsrv_errors()));
   echo ($rowsAffected. " row(s) updated: " . PHP_EOL);
   sqlsrv_free_stmt($getResults);
 }

$row=find_row_by_id($_GET['id']);
display_table()
?>

<form method="post">
  IDPlatnosci:<br>
  <input type="text" name="ID" value="<?php echo $row[0]; ?>"><br>
  Zaplacono:<br>
  <input type="text" name="Zap" value="<?php echo $row[1]; ?>"><br>
  Zaliczka:<br>
  <input type="text" name="Zal" value="<?php echo $row[2]; ?>"><br>
  CalaKwota:<br>
  <input type="text" name="Cal" value="<?php echo $row[3]; ?>"><br>
  <input type="submit" value="submit">
</form>
