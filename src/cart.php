<?php
include "db_connect.php";

?>
<!-- Bag  -->
<div class="section-box">
    <div class="section-title" style="display: flex;">
        <span style="flex: 1;">

            Your IPear Bag
        </span>
        <button id="dump-cart" class="btn">
            Empty Cart
        </button>
    </div>
    <div id="cart-content">

        <?php
        $cookie = $_COOKIE['cart'] ?? null;
        if ($cookie) {

            $cart = json_decode($cookie, true);
            $sub_total = 0;
            if (count($cart) >= 1) {
                foreach ($cart as $id) {
                    $curr = $conn->prepare("SELECT * FROM products WHERE id = ?");
                    $curr->bind_param("i", $id);
                    $curr->execute();
                    $result = $curr->get_result();
                    $row = $result->fetch_assoc();

        ?>
                    <div class="card" style="display: flex; border: solid #dadadaff 1px; padding: 8px; margin-top: 12px;">
                        <h4 style="flex: 1;"><? echo ($row['name']); ?></h4>
                        <h4><? echo ($row['usd_price']); ?></h4>
                    </div>

                <?

                }
            } else {
                ?>
                <a href="/index.php" style="text-decoration: none !important;">

                    <div class="card-body" style="background: #6576d4ff; color: white; display: flex; justify-content: center; align-items: center; border-radius: 16px;  flex-direction: column;">

                        <p><strong>Looks like nothing is in you cart</strong></p>
                        <p>Click to see our products</p>
                    </div>
                </a>
        <?php
            }
        }
        ?>
    </div>

</div>