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
                    <a href="../php/<?php if (isset($_SESSION["auth"])){ echo 'user.php'; }else { echo 'login.php';} ?>"><img src="../icon/person.svg" class="loginicon" name="login"></object></a>
                    <object data="../icon/cart.svg" class="shopicon" name="cart"></object>
                    <a href="../php/wishlist.php"><img src="../icon/wishlist.png" class="wishlist" style="float:right;width:30px; height:30px; margin-right:20px;margin-top: 2%;" alt=""></a>
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