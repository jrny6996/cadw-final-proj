<?php include "db_connect.php";
$sub_total = 0;
?>
<!DOCTYPE html>

<!--Fernnada-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="js/lib/htmx.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Pear</title>
</head>

<body class="inter">
    <!-- Nav -->
    <!-- <nav id="navbar">
        <div class="nav-container">
            <div class="logo">iPear</div>
            <ul class="nav-links">
                <li><a href="/">Store</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#iphone">iPear Phone</a></li>
                <li><a href="#ipad">iPear Pad</a></li>
                <li><a href="#watch">iPear Watch</a></li>
                <li><a href="#support">Support</a></li>
            </ul>
            <div class="nav-icons">
                <button>🔍</button>
                
            </div>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">☰</button>
        </div>
    </nav> -->

    <?php include "components/header.php"; ?>
    <div class="container" style="padding-top: 96px;">
        <?php if (isset($_SESSION['logged_in']) && isset($_SESSION['user_id'])) { ?>
            <div class="checkout-layout">

                <!-- Main Side -->
                <div class="main-content">

                    <!-- contacnt section for shipping  -->
                    <div class="section-box ">
                        <div class="section-title">Shipping & Contact</div>

                        <form class="shipping-form" method="POST" action="order.php" id="shipping-form">

                            <div class="input-group">
                                <label>Email</label>
                                <input name="email" type="email" placeholder="you@example.com" required>
                            </div>



                            <div class="input-group">
                                <div style="display: flex;">
                                    <label style="flex: 1;">Card Number</label>
                                    <!-- <label style="width: 60px;">CVC</label> -->

                                </div>
                                <div style="display: flex;">

                                    <input name="credit-card" required style="flex: 1;" type="password" placeholder="NOT Your real credit card" minlength="16" maxlength="16" required>
                                    <input required type="password" name="cvc" placeholder="cvc" name="" id="" minlength="3" maxlength="3" style="width: 32px; margin-left: 8px;">
                                </div>

                            </div>

                            <div class="input-group">
                                <label>Address</label>
                                <input type="text" name="address" placeholder="123 Main St" required>
                            </div>


                            <div class="input-row">
                                <div class="input-group">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="City" required>
                                </div>

                                <div class="input-group">
                                    <label>State</label>
                                    <input type="text" name="state" placeholder="State" required>
                                </div>

                                <div class="input-group">
                                    <label>ZIP</label>
                                    <input type="text" name="zip" placeholder="00000" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Country</label>
                                <select required name="country">
                                    <option value="" disabled selected>Select Country</option>
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>

                        </form>
                    </div>

                    <!-- Bag  -->
                    <?php include "cart.php"; ?>

                </div>

                <!-- Summary Sidebar -->
                <div class="summary-sidebar">
                    <div class="section-box">

                        <div class="section-title">Summary</div>
                        <?php
                        $sub_total = 0;
                        $cookie = $_COOKIE['cart'] ?? null;
                        if ($cookie) {
                            $cart = stringToIntArray($cookie);
                            // $cart = json_decode($cookie, true);
                            // $cart = array('intval', explode(',', $_COOKIE['cart']));

                            if (count($cart) >= 1 && $cart != [0]) {
                                foreach ($cart as $id) {
                                    $curr = $conn->prepare("SELECT * FROM products WHERE id = ?");
                                    $curr->bind_param("i", $id);
                                    $curr->execute();
                                    $result = $curr->get_result();
                                    $row = $result->fetch_assoc();
                                    $sub_total += $row['usd_price'];
                                }
                            }
                        }
                        // var_dump($row);

                        // echo ($sub_total);
                        ?>
                        <div class="summary-details">
                            <div class="summary-row">
                                <span>Subtotal:</span>
                                <span id="subtotal-amount">$<?php echo ($sub_total); ?></span>
                            </div>

                            <div class="summary-row">
                                <span>Shipping:</span>
                                <span id="shipping-amount">$0.00</span>
                            </div>

                            <div class="summary-row">
                                <span>Tax:</span>
                                <span id="tax-amount">$<?php echo ($sub_total * .07); ?></span>
                            </div>

                            <div class="summary-row total">
                                <span>Total Due:</span>
                                <span id="total-amount">$<?php echo ($sub_total * 1.07); ?></span>
                            </div>
                        </div>

                        <button id="checkout-btn" class="btn btn-primary" style="width: 100%; margin: 12px 0px;">
                            Complete IPear Order
                        </button>

                        <p id="empty-cart-text"
                            style="text-align:center; margin-top:15px; font-size:14px; color:#c1c1c1;">
                        </p>

                    </div>
                </div>

            </div>
        <?php   } else {
        ?>
            <div style="width: 800px ;">
                <div hx-get="login.php" hx-trigger="load" hx-swap="this" hx-select="main"></div>

            </div>
        <?php } ?>
    </div>
    <script type="module" src="js/main.js"></script>

</body>

</html>