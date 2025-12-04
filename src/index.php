<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
</head>

<body class="inter">
    <?php include "db_connect.php" ?>

    <?php include "components/header.php"; ?>
    <main>
        <?php include "components/hero.php"; ?>
        <?php include "components/cards.php"; ?>

        <div style="background-color: white;" id="product-list">

            <?php include "components/product_list.php"; ?>
        </div>
    </main>
    <?php include "components/footer.php"; ?>
    <script type="module" src="js/main.js"></script>

</body>

</html>