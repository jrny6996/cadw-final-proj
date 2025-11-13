<section>
    <!-- Jonathan's section -->
    <?php
    $catergories = [
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
                    <button class="product-select"><?php echo ($cat); ?></button>
                <?php } ?>
            </div>

        </div>
        <div>
            <h2>Products</h2>
        </div>
    </div>

</section>