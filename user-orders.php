<?php
    session_start();
    include 'inc/config.php';

    $_SESSION['rdurl'] = $_SERVER['REQUEST_URI'];
    $session_timeout = 9000;

    if (!isset($_SESSION['last_visit'])) {
    	$_SESSION['last_visit'] = time();
	} 	
	if ((time() - $_SESSION['last_visit']) > $session_timeout) {
	    unset($_SESSION['user_id']);

	    if (isset($_SESSION['rdurl'])) {
	        echo '<meta http-equiv="refresh" content="0; url= index.php'.$_SESSION['rdurl'].'/">';
	        exit;
	    }
	}

    $_SESSION['last_visit'] = time();

    if(!isset($_SESSION['user_id'])) {

      echo '<meta http-equiv="refresh" content="0; url= login.php">';
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
?>
    <div class="cart-products-section">
        <div class="container">
            <div class="row">
                <div class="cart-header-text">
                    <h3><a>Order Details</a></h3>
                    <h5><a href="product-category.php?cat=clothing&type=all">Shop</a></h5>
                </div>
                <div class="cart-items">
                    <div class="cart-items-header cart-item">
                        <h5>image</h5>
                        <h5 id="quantity-header">details</h5>
                        <h5>Subtotal</h5>
                    </div>
                    <?php
                        $total_price = 0;
                        $user_id = $_SESSION['user_id'];
                        $order_id = $_GET['id'];

                        $sel_orders = "SELECT * FROM (order_item INNER JOIN orders ON order_item.order_id = orders.order_id) INNER JOIN product ON order_item.product_id = product.product_id WHERE order_item.order_id = '$order_id'";
                        $query_product = mysqli_query($conn, $sel_orders);

                        while($row = mysqli_fetch_array($query_product)){
                    ?>
                    <div class="cart-item">
                        <img src="product_images/front/<?php echo $row["product_front_image"] ?>" alt="">
                        <div class="cart-item-wrap">
                            <div class="cart-item-details">
                                <h3><a href="single-product.php?id=<?php echo $row['product_name_slug'] ?>"><?php echo $row["product_name"] ?></a></h3>
                                <h5>Size: <?php echo $row["order_item_size"] ?></h5>
                                <h5>Quantity: <?php echo $row["order_item_quantity"] ?></h5>
                                
                            </div>
                        </div>
                        <p class="cart-item-price">
                            R<?php 
                                $total = $row["product_price"]*$row["order_item_quantity"];
								echo number_format($total, 2, '.', ' '); 
                            ?>
                        </p>
                    </div>
                    <?php
						$total_price = $row["order_total_price"];
						$status = $row["order_delivery_method"];
					    }
					?>
                    <div class="cart-items-footer">
                        <div class="cart-items-subtotal">
                            <h2>Total R<?php echo number_format($total_price, 2, '.', ' '); ?></h2>
                        </div>
                        <small>Delivery & TAX included</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
    <script src="js/main.js"></script>
</body>
</html>