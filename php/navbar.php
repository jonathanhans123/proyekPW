<div class="navbar">
            <div class="top">
                <div class="search">
                    <svg fill="#000000" viewBox="0 0 24 24" class="searchicon">    
                        <path d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 20 22 L 22 20 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z"/>
                    </svg>
                    <div class="searchbar">
                        <form action="" autocomplete="off" method="post">
                        <input type="text" name="searchbar" id="search" placeholder="Search Our Store"></form>
                    </div>
                </div>
                <div class="logo">
                    <a href="index.php">
                    <object data="../icon/logo.svg" width="80" height="80" class="logoicon"></object>
                    <p class="logotext">Shoes</p></a>
                </div>
                <div class="shop">
                    <a href="../php/<?php if (isset($_SESSION["auth"])){ echo 'user.php'; }else { echo 'login.php';} ?>" data-bs-toggle="tooltip" title="Account"><img src="../icon/person.svg" class="loginicon" name="login"></object></a>
                    <a href=""  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" data-bs-toggle="tooltip" title="Cart"><img src="../icon/cart.svg" class="shopicon" name="cart" ></a>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasRightLabel">My Cart</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <label for="">
                                <?php
                                    $count = 0;
                                    foreach($_SESSION["order"] as $key=>$value){
                                        $count += $value["quantity"];
                                    }
                                    echo $count;
                                ?> item</label><br><br>
                                <div class="container-checkout">
                                    <?php
                                        foreach($_SESSION["order"] as $key=>$value){
                                            $id_itemnavbar = $value["id_item"];
                                            $itemnavbar = $conn->query("select * from item where id_item=$id_itemnavbar")->fetch_assoc();
                                            $imagenavbar = explode(",",$itemnavbar["imageurl"]);
                                            $image1navbar = $imagenavbar[0];
                                            
                                            echo '<div style="width:100%;height:100px;margin-bottom:30px;">
                                            <div style="width:100px;height:100px;float:left;"><img src="'.$image1navbar.'" alt=""></div>
                                            <div style="margin-left:150px">
                                                <label style="font-weight:bold;font-size:lager">'.$itemnavbar["item_nama"].' ~ '.$itemnavbar["item_color"].'</label><br>
                                                <label for="">';
                                            $discount = $conn->query("select * from discount where id_item=$id_itemnavbar")->fetch_assoc();
                                            if (empty($discount)){
                                                echo 'Rp. '.number_format($item["item_price"],2).',-';
                                            }else{
                                                if ($discount["discount_type"]=="percentage"){
                                                    $truevalue = floor($item["item_price"]/100*(100-$discount["value"]));
                                                }else if ($discount["discount_type"]=="fixed"){
                                                    $truevalue = $item["item_price"]-$discount["value"];
                                                }
                                                echo 'Rp. '.number_format($truevalue,2) .',-';
                                            }    
                                            echo '</label><br>
                                                <label for="">Size : '.$value["item_size"].'</label><br>
                                                <label for="">Quantity : '.$value["quantity"].'</label><br>
                                            </div>
                                            <hr color="#ccc">
                                        </div>';
                                        }
                                    ?>
                                    
                                    
                                </div>
                                <div class="checkout">Checkout</div>
                            </div>
                        </div>
                    <?php
                        if (isset($_SESSION["auth"])){
                            echo '<a href="../php/wishlist.php"><img src="../icon/wishlist.png" class="wishlist" data-bs-toggle="tooltip" title="Wishlist" style="float:right;width:30px; height:30px; margin-right:20px;margin-top: 2%;" alt=""></a>';
                        }
                    ?>
                </div>
            </div>
            <div class="bottom">
                    <div class="nav-child drop">
                        <a href="">Categories <p style="font-size: 10pt;float: right;margin-top: 4%;">&#9660;</p> </a>
                        <div class="drop-content">
                            <div class="drop-wrap">
                                <a href="productlist.php?category=Sneakers">Sneakers</a>
                                <a href="productlist.php?category=Boots">Boots</a>
                            </div>
                            <div class="drop-wrap">
                                <a href="productlist.php?category=Slip-on">Slip-on</a>
                                <a href="productlist.php?category=Hiking">Hiking</a>
                            </div>
                            <div class="drop-wrap">
                                <a href="productlist.php?category=Oxford">Oxford</a>
                                <a href="productlist.php?category=Wedges">Wedges</a>
                            </div>
                            <div class="drop-wrap">
                                <a href="productlist.php?category=High+heel">High heel</a>
                                <a href="productlist.php?category=High-Tops">High-Tops</a>
                            </div>
                            <div class="drop-wrap">
                                <a href="productlist.php?category=Sandals">Sandals</a>
                                <a href="productlist.php?category=Sports">Sports</a>
                            </div>
                        </div>
                    </div>
                    <div class="nav-child"><a href="">Shop Men's</a></div>
                    <div class="nav-child"><a href="">Shop Women's</a></div>
                    <div class="nav-child"><a href="">About</a></div>
                </ul>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                // Selector input yang akan menampilkan autocomplete.
                $( "#search" ).autocomplete({
                    serviceUrl: "source.php",   // Kode php untuk prosesing data.
                    dataType: "JSON",           // Tipe data JSON.
                    onSelect: function (suggestion) {
                        $( "#search" ).val("" + suggestion.buah);
                    }
                });
            });
        </script>