<?php
session_start();
include "db_connect.php";
include "components/order_model.php";
$req = $_POST;
var_dump($req);

$cookie = $_COOKIE['cart'] ?? '[]';
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
$cart = stringToIntArray($cookie);
// $cart = json_decode($cart, true);  // now it's an array of IDs

$product_ids = [];



foreach ($cart as $item) {
    if (!isset($product_ids[$item])) {
        $product_ids[$item] = 1;
    } else {
        $product_ids[$item] += 1;
    }
}


?>

<hr>
<?php
$credit_card = $req['credit-card'];
$cvc = $req['cvc'];
// $email = $req['email'];
$email = $_SESSION["user_email"];
$shipping_address = $req['address'] . ", " . $req['city'] . ", " . $req['state'] . ", " . $req['zip'] . ", " . $req['country'];
if (strlen($credit_card) == 16 && strlen($cvc) == 3 && strlen($shipping_address) > 10 && strlen($email) > 1) {
    // echo ($email);
    // echo ($shipping_address);
    $connection = $conn;
    $id;
    $res = get_user_by_email($email, $connection);
    if ($res[0] == false) {
        $res = create_user($email, $conn);
        $id = $res[1];
    } else {
        $id = $res[1];
    }
    $order = create_order($conn, $id, $shipping_address);
    if ($order[0] = true) {
        $order_id = $order[1];

        foreach ($product_ids as $key => $value) {
            $curr = $conn->prepare('INSERT INTO purchases(product_id, quantity, order_id) VALUES(?, ?, ?)');
            $curr->bind_param("iii", $key, $value, $order_id);
            $curr->execute();
            // echo ($key . "," . $value . "," . $order_id . "<br>");
        }

?>
        <div class="container">
            <h1>Successfully completed order</h1>
            <p>Visit <a href="account.php">account</a> to see your orders</p>
            <script>
                cookieStore.set({
                        name: "cart",
                        value: JSON.stringify([]),
                    })
                    .then(() => {
                        window.location.replace("account.php")
                    })
            </script>
        </div>
<?php

        // CREATE TABLE purchases(
        //     id INT PRIMARY KEY AUTO_INCREMENT,
        //     quantity INT NOT NULL,
        //     product_id INT NOT NULL,
        //     order_id INT NOT NULL,
        //     FOREIGN KEY (product_id) REFERENCES products(id),
        //     FOREIGN KEY (order_id) REFERENCES orders(id)
        // );


    }
} else {
    echo ("There was an error fulfilling your order");
}
