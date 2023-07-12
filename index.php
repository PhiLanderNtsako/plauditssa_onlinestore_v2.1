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
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- main css -->
    <link rel="stylesheet" href="css/lightslider.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body> 
    <?php
        include 'header.php';
    ?>
    <div class="banner-section">
        <div class="container">
            <div class="banner-text">
                <!-- <h2>Hi, Welcome to Plaudits</h2> -->
            </div>
        </div>
    </div>
    <div class="featured-products-section">
        <div class="container">
            <div class="row">
                <div class="products-header-text">
                    <h3>Fresh Kit</h3>
                    <h5><a>Newly Dropped</a></h5>
                </div>
                <div class="product-slider-container">
                    <div id="cover-slides" class="cs-hidden">
                        <?php
                            $sel_product = "SELECT * FROM product INNER JOIN stock ON product.product_id = stock.product_id ORDER BY product.product_id DESC LIMIT 6";
                            $query_product = mysqli_query($conn, $sel_product);

                            while($row = mysqli_fetch_assoc($query_product)){
                        ?>
                        <div class="products-slider-single">
                            <a href="single-product.php?id=<?php echo $row['product_name_slug'] ?>" alt=""><img src="product_images/front/<?php echo $row['product_front_image'] ?>" alt="" class=""></a>
                            <div class="products-slider-bottom">
                                <div class="products-slider-single-title">
                                    <a href="single-product.php?id=<?php echo $row['product_name_slug'] ?>" alt=""><p><?php echo $row['product_name'] ?></p></a>
                                </div>
                                <div class="products-slider-single-price">
                                    <h5>R<?php echo $row['product_price'] ?></h5>
                                </div>
                            </div>
                        </div>
					    <?php } ?>
                    </div>
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
    <div class="featured-products-section">
        <div class="container">
            <div class="row">
                <?php
                    $sel_product = "SELECT * FROM product INNER JOIN stock ON product.product_id = stock.product_id ORDER BY RAND() ASC LIMIT 6";
                    $query_product = mysqli_query($conn, $sel_product);
                    $row = mysqli_fetch_assoc(mysqli_query($conn, $sel_product));
                ?>
                <div class="products-header-text">
                    <h3>Apparel</h3>
                    <h5><a href="product-category.php?cat=<?php echo $row['product_category'] ?>&type=<?php echo $row['product_type'] ?>">View More</a></h5>
                </div>
                <div class="product-container">
                    <?php
                        while($row2 = mysqli_fetch_assoc($query_product)){
                    ?>
                    <div class="products-slider-single">
                        <a href="single-product.php?id=<?php echo $row2['product_name_slug'] ?>" alt=""><img src="product_images/front/<?php echo $row2['product_front_image'] ?>" alt="" class=""></a>
                        <div class="products-slider-bottom">
                            <div class="products-slider-single-title">
                                <a href="single-product.php?id=<?php echo $row2['product_name_slug'] ?>" alt=""><p><?php echo $row2['product_name'] ?></p></a>
                            </div>
                            <div class="products-slider-single-price">
                                <h5>R<?php echo $row2['product_price'] ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
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