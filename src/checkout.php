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

    <?php include "components/header.php" ;?>
    <div class="container" style="padding-top: 24px;">
        <h1 class="header">IPear Order Review</h1>

        <div class="checkout-layout">

            <!-- Main Side -->
            <div class="main-content">

                <!-- contacnt section for shipping  -->
                <div class="section-box ">
                    <div class="section-title">Shipping & Contact</div>

                    <form class="shipping-form">

                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" placeholder="you@example.com" required>
                        </div>

                        <div class="input-group">
                            <label>Phone Number</label>
                            <input type="tel" placeholder="(123) 456-7890">
                        </div>

                        <div class="input-group">
                            <label>Full Name</label>
                            <input type="text" placeholder="Your full name" required>
                        </div>

                        <div class="input-group">
                            <label>Address</label>
                            <input type="text" placeholder="123 Main St" required>
                        </div>

                        <div class="input-row">
                            <div class="input-group">
                                <label>City</label>
                                <input type="text" placeholder="City" required>
                            </div>

                            <div class="input-group">
                                <label>State</label>
                                <input type="text" placeholder="State" required>
                            </div>

                            <div class="input-group">
                                <label>ZIP</label>
                                <input type="text" placeholder="00000" required>
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Country</label>
                            <select required>
                                <option value="" disabled selected>Select Country</option>
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>

                    </form>
                </div>

                <!-- Bag  -->
        <?php               include "cart.php"?>

            </div>

            <!-- Summary Sidebar -->
            <div class="summary-sidebar">
                <div class="section-box">
                    <div class="section-title">Summary</div>

                    <div class="summary-details">
                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span id="subtotal-amount">$0.00</span>
                        </div>

                        <div class="summary-row">
                            <span>Shipping:</span>
                            <span id="shipping-amount">$0.00</span>
                        </div>

                        <div class="summary-row">
                            <span>Tax (Local):</span>
                            <span id="tax-amount">$0.00</span>
                        </div>

                        <div class="summary-row total">
                            <span>Total Due:</span>
                            <span id="total-amount">$0.00</span>
                        </div>
                    </div>

                    <button class="btn btn-primary" style="width: 100%; margin: 12px 0px;" id="checkout-button" disabled>
                        Complete IPear Order
                    </button>

                    <p id="empty-cart-text" 
                       style="text-align:center; margin-top:15px; font-size:14px; color:#c1c1c1;">
                    </p>

                </div>
            </div>

        </div>
    </div>
    <script type="module" src="js/main.js"></script>

</body>
</html>
