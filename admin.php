<?php
session_start();
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['action'])) {
        $coins = json_decode(file_get_contents(DB_FILE), true);

        switch ($data['action']) {
            case 'add':
                $coins[$data['child']]++;
                break;
            case 'remove':
                if ($coins[$data['child']] > 0) {
                    $coins[$data['child']]--;
                }
                break;
        }

        file_put_contents(DB_FILE, json_encode($coins));
        echo json_encode(['success' => true, 'coins' => $coins[$data['child']]]);
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Veckopeng</title>
    <link rel="stylesheet" href="style.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.pathname.endsWith('admin.php')) {
                var adminLink = document.querySelector('.admin-link');
                if (adminLink) {
                    adminLink.style.display = 'none';
                }
            }
        });
    </script>

</head>

<body>
    <div class="allowance-tracker">
        <div class="admin-controls">
            <h2>Admin Controls</h2>
            <div>
                <h3>Vera's Coins</h3>
                <button onclick="updateCoins('vera', 'add')">Add Coin</button>
                <button onclick="updateCoins('vera', 'remove')">Remove Coin</button>
            </div>
            <div>
                <h3>Lasse's Coins</h3>
                <button onclick="updateCoins('lasse', 'add')">Add Coin</button>
                <button onclick="updateCoins('lasse', 'remove')">Remove Coin</button>
            </div>
        </div>

        <!-- Include the existing allowance tracker display here -->
        <?php include 'index.php'; ?>
    </div>

    <script src="script.js"></script>
</body>

</html>