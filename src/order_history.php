<?php
// session_start();
include "db_connect.php";   // provides $conn (mysqli)

// Ensure user logged in
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized");
}

$userId = $_SESSION['user_id'];

$curr = $conn->prepare('SELECT * FROM orders WHERE user_id = ?');
$curr->bind_param("i", $userId);
$curr->execute();
$results = $curr->get_result();
foreach ($results as $row) {
?>
    <div class="card card-body">
        <?php

        $curr = $conn->prepare('SELECT * FROM purchases WHERE order_id = ?');
        $curr->bind_param("i", $row["id"]);
        $curr->execute();
        $purchases = $curr->get_result();
        var_dump($purchases);
        $total = 0;

        ?>
        <h3>Order <? echo ($row["id"]); ?></h3>

    </div>
<?
}
?>
<hr>