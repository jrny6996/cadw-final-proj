<?php
$orders = [
    [
        'id' => 'ORD-10234',
        'date' => 'Nov 17, 2025',
        'total' => '$1,049.00',
        'status' => 'Delivered',
        'items' => ['PearPad', 'Pear15'],
    ],
    [
        'id' => 'ORD-10210',
        'date' => 'Oct 5, 2025',
        'total' => '$59.49',
        'status' => 'Shipped',
        'items' => ['Portable Charger'],
    ],
    [
        'id' => 'ORD-10188',
        'date' => 'Sept 12, 2025',
        'total' => '$249.00',
        'status' => 'Processing',
        'items' => ['PearStation'],
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order History</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="container">
        <h1>Order History</h1>

        <?php foreach ($orders as $order): ?>
            <div class="order-card">
                <div class="order-header">
                    <div>
                        <h2><?= $order['id']; ?></h2>
                        <p><?= $order['date']; ?></p>
                    </div>
                    <span class="status"><?= $order['status']; ?></span>
                </div>

                <p>Items: <?= implode(', ', $order['items']); ?></p>

                <div class="order-footer">
                    <p class="total">Total: <?= $order['total']; ?></p>
                    <button class="details-btn">View Details</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
