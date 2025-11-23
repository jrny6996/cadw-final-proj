<?php
include "../db_connect.php";
if (isset($_GET['category']) && $_GET['category'] != 'All') {

    $category = $_GET['category'];
    // echo ($category);
    $result = [];

    if ($category && strlen($category) > 1) {
        $curr = $conn->prepare("SELECT * FROM categories WHERE title=?");
        $curr->bind_param("s", $category);
        $curr->execute();

        $category_result = $curr->get_result();
        // var_dump($category_result);
        if ($category_result->num_rows != 0) {
            $curr = $conn->prepare("SELECT * FROM products WHERE category_id=?");
            $row = $category_result->fetch_assoc();
            $curr->bind_param("i", $row['id']);
            $curr->execute();
            $result = $curr->get_result();
        }
        $curr->close();
    }
} else {
    $sampledata = "SELECT * FROM products";
    $result = mysqli_query($conn, $sampledata);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
}
foreach ($result as $row) {
?>
    <div class="product-horizontal-list-card">
        <?php
          
            
            $curr = $conn->prepare("SELECT url FROM product_images WHERE product_id=?");
            $curr->bind_param("i", $row['id']);
            $curr->execute();
            $images = $curr->get_result();

            foreach($images as $image){
                // var_dump($image['url']);

               
                ?>
                <div class="img-cover featured-image">

                        <img height="360" width="360" src="<?php echo($image['url']); ?>" alt="product image" class="featured">

                </div>
                <div class="image-row">

                <?php
                $next_active = true;
                break;
            }

        ?>

        <?php foreach($images as $image){?>  

                <img  height="64" width="64"  src="<?php echo($image['url']); ?>" alt="product image" class="img-row-item <?php if($next_active == true) echo('active'); $next_active = false;    ?>">

            <?php }?>
        </div>

        <p style="font-weight: 500; color:gray; margin: 20px 72px 0px;"><?php echo ($row['label']); ?></p>
        <h3 style="padding-left: 12px;"><?php echo ($row['name']); ?></h3>
        <p><?php echo (substr($row['description'], 0, 56) . "..."); ?></p>
        <p class="label"><strong>
                $<?php echo ($row['usd_price']); ?>
            </strong></p>
        <div style="display: flex;">
            <a href="/#" style="text-decoration: none !important;">
                <button class="btn btn-primary">
                    Learn More
                </button>
            </a>
            <button class="btn">
                Buy <span>&nbsp;</span>
                <?php include "icons/chevron.php" ?>

            </button>
        </div>
    </div>


<?php
    // echo ($row['name']);
    // echo ($row['label']);
    // echo ($row['description']);
}



?>
<?php
// echo ($catergory);
?>