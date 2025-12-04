<?php
session_start();
// header('Location: /login.php');
// exit(); // or die();
include "db_connect.php";
include "account_models.php";




$method = $_SERVER['REQUEST_METHOD'];

$obj;
// var_dump($method);

if ($method == 'POST') {
    $body = $_POST;
    $obj = new AccountPost($method, $body);
    // $obj->debug();
    $obj->handle($conn);
} elseif ($method == 'PATCH') {
    $input = file_get_contents('php://input');
    parse_str($input, $data);
    $email = $data['email'] ?? null;
    $pw    = $data['pw'] ?? null;
    $cleaned = ['email' => $email, 'password' => $pw];
    $obj = new AccountPatch($method, $cleaned);
    // $obj->debug();
    $res = $obj->handle($conn);
    // var_dump($res);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pear</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="js/lib/htmx.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body class="inter" style="background: #f0f0f0f0;">
    <?php
    include "components/header.php";
    ?>
    <main class="container" style=" padding-top: 96px;">
        <?php

        if (isset($_SESSION['logged_in']) && isset($_SESSION['user_id'])) {
        ?>


            <h1>Your Orders</h1>


            <div id="active-orders" hx-trigger="load" hx-target="this" hx-swap="innerHTML" hx-select="main">

                <?php
                include "order_history.php";
                include "cart.php";

                ?>
            </div>


        <?php
        } else {
        ?>
            <div hx-get="/login.php" hx-target="main" hx-swap="innerHTML" hx-select="#content" hx-trigger="load">
            </div>
        <?php
        }
        ?>

    </main>

    <script src="js/main.js" type="module"></script>
</body>

</html>