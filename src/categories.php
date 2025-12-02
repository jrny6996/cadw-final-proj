<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<h2>Categories</h2>
<ul>
<?php
$stmt = $pdo->query("SELECT * FROM categories");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<li><a href='products.php?category={$row['id']}'>{$row['title']}</a> - {$row['description']}</li>";
}
?>
</ul>

<?php include 'includes/footer.php'; ?>