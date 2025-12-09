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
    <div class="card card-body" style="margin-top: 8px; display:flex; justify-content:center; flex: 1; flex-direction:column;">
        <?php

        $curr = $conn->prepare('SELECT * FROM purchases WHERE order_id = ?');
        $curr->bind_param("i", $row["id"]);
        $curr->execute();
        $purchases = $curr->get_result();
        // var_dump($purchases);
        $total = 0;
        $itemized = [];
        $i = 0;
        foreach ($purchases as $pur) {


            $curr = $conn->prepare('SELECT * FROM products WHERE id = ?');
            $curr->bind_param("i", $pur["product_id"]);
            $curr->execute();
            $results = $curr->get_result();
            $product = $results->fetch_assoc();

            $item_price = $product['usd_price'];
            $quantity = $pur['quantity'];
            $total += $item_price * $quantity;

            $itemized[$i] = ["total" => $item_price * $quantity, 'price' => $item_price, 'quantity' => $quantity, "name" => $product['name']];
            $i++;
        }

        ?>
        <div style="display:flex">
            <h3 style="flex: 1;">Order <?php echo ($row["id"]); ?></h3>
            <h3 style="font-weight: 400;">$<?php echo ($total); ?> + $<?php echo ($total * .07);  ?> = <?php echo ($total * 1.07); ?></h3>
            <button class="btn dropdown-btn">View</button>
        </div>
        <?php
        foreach ($itemized as $line) {
        ?>
            <div class=" dropdown ">
                <hr style="opacity: 0.5;">

                <div style="display: flex;">
                    <p style="padding: 0px 8px; flex: 1;"><?php echo ($line['name']); ?></p>

                    <p style="padding: 0px 8px;"><?php echo ($line['price']); ?> * <?php echo ($line['quantity']); ?>=</p>

                    <p><strong>$<?php echo ($line['total']); ?> </strong></p>
                </div>
            </div>

        <?php
        }

        ?>
    </div>
<?php
}
?>
<hr>