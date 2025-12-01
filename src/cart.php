   <!-- Bag  -->
                <div class="section-box">
                    <div class="section-title" style="display: flex;">
                    <span style="flex: 1;">

                        Your IPear Bag
                    </span> 
                    <button id="dump-cart" class="btn">
                        Empty Cart
                    </button>
                    </div>
                    <div id="cart-content">

                    <?php
                    $cart = json_decode($_COOKIE['cart']) ?? [];
                    
                    if(count($cart) >= 1){
                        foreach($cart as $id){

                            echo("<p>$id</p>");

                        }



                    }else{
                        ?>
                        <a href="/index.php" style="text-decoration: none !important;">

                        <div class="card-body" style="background: #6576d4ff; color: white; display: flex; justify-content: center; align-items: center; border-radius: 16px;  flex-direction: column;">

                        
                        <h1>Looks like there's nothing in your cart</h1>
                        <p>Click to see our products</p>
                        </div>
                        </a>
                        <?php
                    }

                    ?>
                    </div>
                </div>