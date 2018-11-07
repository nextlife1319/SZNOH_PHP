<?php
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
sqlsrv_fetch( $stmt );
$name = sqlsrv_get_field( $stmt, 3 );
echo "$name: ";

