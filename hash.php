<?php
// composer require doctrine/dbal if not installed
// Make sure PHP has sqlsrv extension enabled

$serverName = "PSASERVER";      // your SQL Server host
$database = "test_paul";        // your database
$username = "sa";               // your DB user
$password = "p$a@dm1n";         // your DB password

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT psa_user_id, psa_user_pwd FROM users");

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $userId = $row['psa_user_id'];
        $plainPassword = $row['psa_user_pwd'];

        // Generate bcrypt hash
        $hash = password_hash($plainPassword, PASSWORD_BCRYPT);

        // Escape single quotes in hash for SQL
        $hash = str_replace("'", "''", $hash);

        // Output SQL update statement
        echo "UPDATE your_table_name SET psa_user_pwd = '$hash' WHERE psa_user_id = '$userId';\n";
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
