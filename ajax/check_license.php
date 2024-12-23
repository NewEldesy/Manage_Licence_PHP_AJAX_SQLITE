<?php
include '../includes/db.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $db = getDbConnection();

    $stmt = $db->prepare("SELECT * FROM licenses WHERE user_id = ?");
    $stmt->execute([$user_id]);

    $license = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($license) {
        if ($license['status'] === 'active' && $license['expiration_date'] >= date('Y-m-d')) {
            echo json_encode(['status' => 'valid']);
        } else {
            echo json_encode(['status' => 'expired']);
        }
    } else {
        echo json_encode(['status' => 'no_license']);
    }
} else {
    echo json_encode(['status' => 'unauthenticated']);
}
?>