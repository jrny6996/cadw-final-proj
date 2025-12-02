<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<h2>Featured Products</h2>
<div class="products">
<?php
$stmt = $pdo->query("SELECT p.id, p.name, p.label, p.usd_price, i.url 
                     FROM products p 
                     LEFT JOIN product_images i ON p.id = i.product_id AND i.is_featured = 1 
                     LIMIT 4");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='product'>";
    echo "<img src='{$row['url']}' alt='{$row['name']}' />";
    echo "<h3>{$row['name']}</h3>";
    echo "<p>{$row['label']}</p>";
    echo "<p>\${$row['usd_price']}</p>";
    echo "<a href='product_detail.php?id={$row['id']}'>View</a>";
    echo "</div>";
}
?>
</div>

<?php include 'includes/footer.php'; ?>