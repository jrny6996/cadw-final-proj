<header>
    <div class="header-container">
        <a href="/" style="color:white; text-decoration: none !important;">
            <div class="logo">iPear</div>
        </a>
        <div style="display:flex; justify-content:space-between; width: 400px;">

            <a class="link" href="/index.php#about">About</a>
            <a class="link" href="/index.php#product-category-list">Latest Products</a>



            <a class="link" href="/account.php">Orders</a>

        </div>
        <a href="/checkout.php">
            <button class="cart-btn btn" style="display: flex; padding: 8px 12px; position:relative;">
                <span style="margin-right: 12px;"> Checkout
                </span>
                <?php include "cart_icon.php" ?>
                <div id="cart-count" style="position: absolute; background:white; color: blue; right:0; top:0; padding:4px 8px; border-radius:16px; transform:translateY(-10px) translateX(10px);">0</div>
            </button>

        </a>

    </div>
</header>