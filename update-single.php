<?php

/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */

if (isset($_GET['id'])) {
  try {
    $connection = new PDO("sqlsrv:server = tcp:sznoh.database.windows.net,1433; Database = SZNOH_DB", "ServerAdmin", "WCYwcy123");
    $id = $_GET['id'];

    $connection = $dbh->prepare("DESCRIBE Platnosci_SZNOH");
    $connection->execute();
    $table_fields = $connection->fetchAll(PDO::FETCH_COLUMN);

    print_r($table_fields);

    $sql = "SELECT * FROM Platnosci_SZNOH WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    echo 1;

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
  echo "Something went wrong!";
  exit;
}
?>
