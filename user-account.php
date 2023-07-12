<?php
    session_start();
    include 'inc/config.php';
    $_SESSION['rdurl'] = $_SERVER['REQUEST_URI'];
    $session_timeout = 9000;

    if(!isset($_SESSION['user_id'])) {

        echo '<meta http-equiv="refresh" content="0; url= login.php">';
      }

    if (!isset($_SESSION['last_visit'])) {
    	$_SESSION['last_visit'] = time();
	} 	
	if ((time() - $_SESSION['last_visit']) > $session_timeout) {

	    unset($_SESSION['user_id']);
	    if (isset($_SESSION['rdurl'])) {
	        echo '<meta http-equiv="refresh" content="0; url= '.$_SESSION['rdurl'].'">';
	    }
	}

    $_SESSION['last_visit'] = time();
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
                    <h3><a>Your Orders</a></h3>
                    <h5><a href="product-category.php?cat=clothing&type=all">Shop More</a></h5>
                </div>
                <div class="cart-items">
                    <div class="cart-items-header cart-item">
                        <h5>Delivery</h5>
                        <h5 id="quantity-header">Summary</h5>
                        <h5>Order</h5>
                    </div>
                    <?php
                        $user_id = $_SESSION['user_id'];

                        // $sel_orders = "SELECT * FROM user INNER JOIN orders ON user.user_id = orders.user_id INNER JOIN order_item ON order_item.order_id = orders.order_id INNER JOIN product ON order_item.product_id = product.product_id WHERE orders.user_id = '$user_id'";
                        // $query_product = mysqli_query($conn, $sel_orders);

                        $sel_product = "SELECT * FROM user INNER JOIN orders ON user.user_id = orders.user_id WHERE orders.user_id = '$user_id' ORDER BY orders.order_date DESC";
                        $query_product = mysqli_query($conn, $sel_product);

                        while($row = mysqli_fetch_array($query_product)){
                    ?>
                    <div class="cart-item">
                        <p class="cart-item-price">
                            <?php echo $row["order_delivery_status"]?>
                        </p>
                        <div class="cart-item-wrap">
                            <div class="cart-item-details">
                                <h5><?php echo $row["order_code"] ?></h5>
                                <h5>Paid: <?php echo $row["order_total_price"] ?></h5>
                                <h5>Delivery: <?php echo $row["order_delivery_method"] ?></h5>
                                
                            </div>
                        </div>
                        <div class="cart-item-details">
                            <h4><a class="btn" href="user-orders.php?id=<?php echo $row['order_id'] ?>">Details</a></h4>   
                        </div>
                        
                    </div>
                    <?php } ?>
                    <!-- <div class="cart-items-footer">
                        <a class="checkout-btn checkout-area" href="checkout-library/checkout.php">Track Order</a>
                    </div> -->
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