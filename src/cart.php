<?php
include "db_connect.php";
?>
<div class="section-box">
    <div class="section-title" style="display: flex;">
        <span style="flex: 1;">Your IPear Bag</span>
        <button id="dump-cart" class="btn">Empty Cart</button>
    </div>

    <div id="cart-content">

        <?php
        function stringToIntArray($str)
        {
            $intArray = array();
            $append = "";
            for ($i = 0; $i < strlen($str); $i++) {
                if ($str[$i] ==  '"' || $str[$i] == "'"  || $str[$i] == "[") {
                    continue;
                }


                if ($str[$i] == "]" || $str[$i] == ",") {
                    $num =  (int) $append;
                    $intArray[] = $num;
                    $append = "";
                    continue;
                }
                $append = $append . $str[$i];
            }

            return $intArray;
        }

        $cookie = $_COOKIE["cart"];
        if (true) {

            // var_dump($_COOKIE['cart']);
            // $cookie = urldecode($cookie);
            // echo ($cookie);
            $cart = stringToIntArray($cookie);
            // var_dump($cart);
            // Validate JSON

            if (count($cart) >= 1 && $cart != [0]) {

                foreach ($cart as $id) {

                    if (!is_numeric($id)) continue;

                    $curr = $conn->prepare("SELECT * FROM products WHERE id = ?");
                    $curr->bind_param("i", $id);
                    $curr->execute();
                    $result = $curr->get_result();
                    $row = $result->fetch_assoc();
        ?>
                    <div class="card" style="display:flex;border:1px solid #dadada;padding:8px;margin-top:12px;">
                        <h4 style="flex:1;"><?= $row['name']; ?></h4>
                        <h4><?= $row['usd_price']; ?></h4>
                    </div>
                <?php
                }
            } else {
                ?>
                <a href="index.php" style="text-decoration:none;">
                    <div class="card-body" style="background:#6576d4;color:white;display:flex;justify-content:center;align-items:center;border-radius:16px;flex-direction:column;">
                        <p><strong>Looks like nothing is in your cart</strong></p>
                        <p>Click to see our products</p>
                    </div>
                </a>
        <?php
            }
        }
        ?>

    </div>
</div>