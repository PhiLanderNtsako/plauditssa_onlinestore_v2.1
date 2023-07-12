<?php
    session_start();
    include 'inc/config.php';
	// unset($_SESSION['order']);

  // session_destroy();

    // $_SESSION['rdurl'] = $_SERVER['REQUEST_URI'];
    $status = "";

	if(isset($_POST['delivery_method'])){
		$_SESSION['delivery_method'] = $_POST['delivery_method'];
	}

    if (isset($_POST['action']) && $_POST['action'] == "clear") {
        $status = " Your Cart Is Cleared";
        unset($_SESSION['cart']);
        unset($_SESSION['order']);
    }
    if (isset($_POST['action']) && $_POST['action'] == "remove") {

        if (!empty($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $key => $value) {

                if ($_POST['code'] == $key) {

                    unset($_SESSION['cart'][$key]);
                    $status = " Item Removed From Your Cart";
                }
                if (empty($_SESSION['cart'])) {
                    unset($_SESSION['cart']);
                    unset($_SESSION['order']);
                }
            }
        }
    }
    if (isset($_POST['action']) && $_POST['action']=="change") {

	    foreach($_SESSION["cart"] as &$value) {

		    if($value['code'] === $_POST["code"]) {

		        $value['product_quantity'] = $_POST["product_quantity"];
				$status = " Your Cart is Updated";
		        break; // Stop the loop after we've found the product
		    }
		}
	}
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Plaudits SA</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
<body>
<?php
    include 'header.php';
    if(isset($_SESSION["cart"])) {
        
        $total_price = 0;
            if (isset($_POST['action']) && $_POST['action']=="change" || isset($_POST['action']) && $_POST['action'] == "clear" || isset($_POST['action']) && $_POST['action'] == "remove") {
                echo'
                <div class="cart-collapse">
                <div class="alert-message">    
                    <p><i class="fa fa-check"></i>'.$status.'</p>
                </div>
            </div>';
            }
?>
    <div class="cart-products-section main">
        <div class="container">
            <div class="row">
                <div class="cart-header-text">
                    <h3><a>Your Cart</a></h3>
                    <h5><a href="product-category.php?cat=clothing&type=all">Continue shopping</a></h5>
                </div>
                <div class="cart-items-header cart-item">
                    <h5>Image</h5>
                    <h5 class="desktop">Product</h5>
                    <h5 id="quantity-header">Quantity</h5>
                    <h5>Subtotal</h5>
                </div>
                    <?php
						foreach ($_SESSION["cart"] as $product) {

							$product_id = $product['product_id'];
							$product_size = $product['product_size'];

                            switch($product_size){

                                case 'size_XS_quantity':
                                $product_size_name = 'Extra Small (XS)';
                                break;
                                case 'size_S_quantity':
                                $product_size_name = 'Small (S)';
                                break;
                                case 'size_M_quantity':
                                $product_size_name = 'Medium (M)';
                                break;
                                case 'size_L_quantity':
                                $product_size_name = 'Large (L)';
                                break;
                                case 'size_XL_quantity':
                                $product_size_name = 'XL (Extra Large)';
                                break;
                                case 'size_XXL_quantity':
                                $product_size_name = 'XXL (Extra Extra Large)';
                                break;
                                case 'size_fit_all':
                                    $product_size_name = 'Fit all';
                                    break;
                            }

                            $query_product = mysqli_query($conn, "SELECT * FROM product INNER JOIN stock ON product.product_id = stock.product_id AND product.product_id = '$product_id'");
                            $row = mysqli_fetch_assoc($query_product);
                    ?>
                    <div class="cart-item">
                        <div class="cart-image">
                            <img src="product_images/front/<?php echo $product["product_image"] ?>" alt="<?php echo $product["product_image"] ?>">
                        </div>
                        <div class="cart-item-details desktop">
                            <h3><a href="single-product.php?id=<?php echo $row['product_name_slug'] ?>"><?php echo $product["product_name"] ?></a></h3>
                            <h5>Size: <?php echo $product_size_name ?></h5>
                        </div>
                        <div class="cart-item-wrap">
                            <div class="cart-item-details mobile">
                                <h3><a href="single-product.php?id=<?php echo $row['product_name_slug'] ?>"><?php echo $product["product_name"] ?></a></h3>
                                <h5>Size: <?php echo $product_size_name ?></h5>
                            </div>
                            <div class="cart-iterm-quantity">
                                <div class="form-select">
									<form method='post' action=''>
                                        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                        <input type='hidden' name='action' value="change" />
                                        <select name="product_quantity" onchange="this.form.submit();">
                                            <option value="<?php echo $product["product_quantity"] ?>"><?php echo $product["product_quantity"] ?></option>
                                            <?php
                                                $size = $row[$product_size];
                                                for($x = 1; $x <= $size; $x++){
                                                    echo '<option value="'.$x.'">'.$x.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </form>
                                </div>
                                <form method='post' action='' id='clear-form'>
									<input type='hidden' name='action' value="remove">
                                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
									<a class="cart-item-del" href="javascript:;" onclick="document.getElementById('clear-form').submit();"><i class="fa fa-trash"> </i></a>
								</form>
                            </div>
                        </div>
                        <p class="cart-item-price">
                            R<?php 
                                $total = $product["product_price"]*$product["product_quantity"];
								echo number_format($total, 2, '.', ' '); 
                            ?>
                        </p>
                    </div>
                    <?php
						$total_price += $total;
					    }
					?>
                    <div class="cart-items-footer">
                        <div class="cart-items-subtotal">
                            <h2>Subtotal R<?php echo number_format($total_price, 2, '.', ' '); ?></h2>
                        </div>
                        <small>Tax included and shipping calculated at checkout</small>
                            <a class="checkout-btn checkout-area" href="checkout-library/checkout.php">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }else{
    ?>
    <div class="cart-products-section">
        <div class="container">
            <div class="row">
                <div class="cart-header-text">
                    <h3><a>Your Cart is Empty</a></h3>
                    <h5><a href="product-category.php?cat=clothing&type=all">Continue shopping</a></h5>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
        include 'footer.php';
    ?>
    <script src="js/main.js"></script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
    </script>
</body>
</html>