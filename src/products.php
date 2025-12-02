<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<h2>Products</h2>
<div class="products">
<?php
$category = isset($_GET['category']) ? intval($_GET['category']) : null;
$sql = "SELECT p.id, p.name, p.label, p.usd_price, i.url 
        FROM products p 
        LEFT JOIN product_images i ON p.id = i.product_id AND i.is_featured = 1";
if ($category) {
    $sql .= " WHERE p.category_id = :category";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['category' => $category]);
} else {
    $stmt = $pdo->query($sql);
}
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