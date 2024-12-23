<?php
function getDbConnection() {
    $dbPath = __DIR__ . '/../BDD/Gestion.db';
    if (!file_exists($dbPath)) {
        throw new Exception("Database file not found: $dbPath");
    }

    $db = new PDO('sqlite:' . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
?>