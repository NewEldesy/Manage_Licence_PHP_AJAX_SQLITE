<?php
function getDbConnection() {
    $db = new PDO('sqlite:BDD/Gestion.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
?>