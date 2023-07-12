<header class="header-section">
    <nav>
        <div class="container">
            <div class="navbar">
                <div class="left inner-wrapper">
                    <a href="javascript:;" class="menu-toggler cart-icon" onclick="openNav()">
                        <i class="nav-icon fa fa-bars"></i>
                    </a>
                </div>
                <div class="center inner-wrapper">
                    <a href="index.php"class="navbar-logo item">
                        <img src="img/logo5.png" alt="LOGO">
                    </a>
                </div>
                <div class="right inner-wrapper">
                    <a href="user-account.php" class="cart-icon item">
                        <i class="nav-icon fa fa-user"></i>
                    </a>
                    <a href="cart.php" class="cart-icon item">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                        <?php
                            if(!empty($_SESSION["cart"])) {
                                $cart_count = count(array_keys($_SESSION["cart"]));
                                echo '<span class="cart-counter" id="cart-count">'.$cart_count.'</span>';
                            }
                        ?>
                    </a>
                </div>
                <div class="menu-collapse" id="menuToggle">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-window-close"></i></a>
                    <div class="menu-content">
                        <div class="navbar-search">
                            <form action="search.php" method="get" class="menu_search_form">
                                <input type="text" name="q" class="searchTerm" placeholder="Search">
                                <button type="submit" class="searchBtn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="menu-navbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="index.php">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a href="product-category.php?cat=clothing&type=all">CLOTHING</a>
                                </li>
                                <li class="nav-item">
                                    <a href="product-category.php?cat=headwear&type=all">HEADWEAR</a>
                                </li>
                                <li class="nav-item">
                                    <a href="product-category.php?cat=accessories&type=all">ACCESSORIES</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>