<?php
	session_start();
    include 'inc/config.php';
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
    <link rel="stylesheet" href="css/lightslider.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
<body>
<?php
    include 'header.php';

    $product_category = $_GET['cat'];
    $product_type = $_GET['type'];

    $sel_product = "SELECT * FROM product INNER JOIN stock ON product.product_id = stock.product_id WHERE product.product_category = '$product_category' ORDER BY product.product_id ASC";
    $query_product = mysqli_query($conn, $sel_product);
    $row = mysqli_fetch_assoc($query_product);
?>
    <section class="browser-navbar-area"  id="filter">
        <nav class="browser-navbar-links">
            <?php
                if($row['product_category'] == 'clothing'){
            ?>
            <ul class="browser-navbar-list">
                <li><a href="product-category.php?cat=clothing&type=t-shirts">T-shirts</a></li>
                <li><a href="product-category.php?cat=clothing&type=hoodies">Hoodies</a></li>
                <li><a href="product-category.php?cat=clothing&type=shorts">Shorts</a></li>
                <li><a href="product-category.php?cat=clothing&type=sweaters">Sweaters</a></li>
                <li><a href="product-category.php?cat=clothing&type=trackpants">Trackpants</a></li>
            </ul>
            <?php
                }elseif($row['product_category'] == 'headwear'){
            ?>
            <ul class="browser-navbar-list">
                <li><a href="product-category.php?cat=headwear&type=caps">Caps</a></li>
                <li><a href="product-category.php?cat=headwear&type=bucket-hats">Bucket Hats</a></li>
                <li><a href="product-category.php?cat=headwear&type=beanies">Beanies</a></li>
            </ul>
            <?php
                }elseif($row['product_category'] == 'accessories'){
            ?>
            <ul class="browser-navbar-list">
                <li><a href="product-category.php?cat=accessories&type=bags">Bags</a></li>
                <li><a href="product-category.php?cat=accessories&type=belts">Belts</a></li>
                <li><a href="product-category.php?cat=accessories&type=socks">Socks</a></li>
            </ul>
             <?php
                }
            ?>
        </nav>
    </section>
    <div class="featured-products-section">
        <div class="container">
            <div class="row">
                <div class="products-header-text">
                    <h3><?php echo strtoupper($row['product_category']).' - <small>'.$product_type ?></small> </h3>
                    <h5><a href="javascript:;" onclick="openFilter()"><i class="fa fa-filter"></i> Filter</a></h5>
                </div>
                <div class="product-container">
                <?php
                    if($_GET['type'] == 'all'){
                        $sel_product = "SELECT * FROM product INNER JOIN stock ON product.product_id = stock.product_id WHERE product.product_category = '$product_category' ORDER BY product.product_id ASC";
                        $query_product = mysqli_query($conn, $sel_product);   
                    }else{
                        $sel_product = "SELECT * FROM product INNER JOIN stock ON product.product_id = stock.product_id WHERE product.product_category = '$product_category' && product.product_type = '$product_type'  ORDER BY product.product_id ASC";
                        $query_product = mysqli_query($conn, $sel_product); 
                    }

                    while($row = mysqli_fetch_array($query_product)){
                ?>
                    <div class="products-slider-single">
                        <a href="single-product.php?id=<?php echo $row['product_name_slug'] ?>" alt="">
                            <img src="product_images/front/<?php echo $row['product_front_image']?>" alt="" class="">
                        </a>
                        <div class="products-slider-bottom">
                            <div class="products-slider-single-title">
                            <a href="single-product.php?id=<?php echo $row['product_name_slug'] ?>" alt="">
                                <p><?php echo $row['product_name']?></p>
                            </a>
                            </div>
                            <div class="products-slider-single-price">
                                <h5>R<?php echo $row['product_price']?></h5>
                            </div>
                        </div> 
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-section-inner">
        <img src="img/banner/banner-bg-1.jpg" alt="">
        <div class="container">
            <div class="banner-text">
                <!-- <h2>Hi, Welcome to Plaudits</h2> -->
            </div>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js" ></script>
    <script>
        // Product Slider
        $(document).ready(function() {
            $('#cover-slides').lightSlider({
                autoWidth:true,
                speed: 5000, //ms'
                auto: true,
                loop: true,
                slideEndAnimation: true,
                pause: 3000,
                controls: true,
                onSliderLoad: function() {
                    $('#cover-slides').removeClass('cs-hidden');
                } 
            });  
        });
    </script>
</body>
</html>