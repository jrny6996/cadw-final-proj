<section>
    <!-- Jonathan's section -->
    <?php
    $catergories = [
        "All",
        "Phones",
        "Laptops",
        "Desktops",
        "Tablets"
    ];

    ?>

    <div class="container">
        <div>
            <div class="category-select">
                <?php
                foreach ($catergories as $cat) {
                ?>
                    <button class="product-select <?php if ($cat == $catergories[0])  echo ('active'); ?>"
                        hx-trigger='click'
                        hx-get="/components/products.php?category=<?php echo ($cat); ?>"
                        hx-target="#product-category-list"
                        hx-swap="innerHTML">
                        <?php echo ($cat); ?>
                    </button>
                <?php } ?>
            </div>

        </div>
        <div>
            <h2>Products</h2>
        </div>
        <div id="product-category-list"
            class="product-category-list" hx-trigger="load" hx-swap="innerHTML" hx-target="this" hx-get="/components/products.php">

        </div>
    </div>

</section>