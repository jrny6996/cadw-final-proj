<?php
include "../db_connect.php";

if(isset($_GET['id'])){
        $id = htmlentities($_GET['id']);
    
        $curr = $conn->prepare("SELECT * FROM products WHERE id=?");
        $curr->bind_param("i", $id);
        $curr->execute();

        $result = $curr->get_result();
        // var_dump($id);
        if ($result->num_rows != 0) {

            foreach($result as $row){
                // var_dump($row);
                ?>
                    
                     <div class="product-horizontal-list-card" style=" width: auto !important; justity-content:left !important; align-items:center; text-align: start !important;"
                     
                     
                     >
        <?php
          
            
            $curr = $conn->prepare("SELECT url FROM product_images WHERE product_id=?");
            $curr->bind_param("i", $row['id']);
            $curr->execute();
            $images = $curr->get_result();

            foreach($images as $image){
                // var_dump($image['url']);

               
                ?>
                <div style="display: flex; width:100%">
                     <div style="flex: 1;  padding-left: 12px;" >
                 <h1><?php echo($row['name']);?></h1>
                  
                   
                    <h2 style="font-weight: 600;">$<?php echo($row['usd_price']);?></h2>
                    <h3 style="font-weight: 500;">Select Color</h3>
             <div class="image-row" style="flex-direction: row !important; width: fit !important; justify-content: start;">

                <?php
                $next_active = true;
                break;
            }

        ?>

        <?php foreach($images as $image){?>  

                <img  height="64" width="64"  src="<?php echo($image['url']); ?>" alt="product image" class="img-row-item <?php if($next_active == true) echo('active'); $next_active = false;    ?>">

            <?php }?>
            </div>
                   <button class="btn-primary btn buy-now" data-id="<?php echo($row['id']);?>" style="margin-top:16px">Buy Now</button>
  
             </div>
                <div class="img-cover featured-image" style=" object-fit: cover;">

                        <img height="380" width="380" src="<?php echo($image['url']); ?>" alt="product image" class="featured"  style="border-radius: 48px !important; display:flex; "  >

                </div>
               
            
        </div>
        <div style="margin-top: 24px; width: 100%;">
                <h2>

                    <span class="label" style="color:orange;">
                    <strong style=" font-weight:600 !important;">

                        <?php echo($row['label']);?>
                </strong>
                </span>
                </h2>
                     <p><?php echo($row['description']);?></p>
                   
                
        </div>
                <?php
                break;

            }



        }
}else{
    header('Location: /index.php');
    exit();
}