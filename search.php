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

    if (isset($_GET['q'])) {

        $search = mysqli_real_escape_string($conn,$_GET['q']);

        $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%' OR product_type LIKE '%$search%' OR product_category LIKE '%$search%'";
        $result = mysqli_query($conn,$sql);
        $queryResult = mysqli_num_rows($result);
?>
    <section class="browser-navbar-area">
        <nav class="browser-navbar-links" style="display:block; background-color: #797979;">
            <div class="navbar-search">
                <form action="search.php" method="get" class="menu_search_form">
                    <input type="text" name="q" class="searchTerm" placeholder="Search">
                    <button type="submit" class="searchBtn">
                        <i class="fa fa-search"></i>
                    </button>
                    
                </form>
            </div>
        </nav>
    </section>
    <div class="featured-products-section">
        <div class="container">
            <div class="row">
                <div class="products-header-text">
                    <h3><?php echo $queryResult ?> Results for "<?php echo $search ?>"</small> </h3>
                </div>
                <div class="product-container">
                <?php

                    if ($queryResult > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="products-slider-single">
                        <a href="single-product.php?id=<?php echo $row['product_name_slug'] ?>" alt="">
                            <img src="product_images/front/<?php echo $row['product_front_image']?>" alt="" class="">
                        </a>
                        <div class="products-slider-bottom">
                            <div class="products-slider-single-title">
                                <a href="single-product.php?id=<?php echo $row['product_name_slug'] ?>" alt=""><p><?php echo $row['product_name'] ?></p></a>
                            </div>
                            <div class="products-slider-single-price">
                                <h5>R<?php echo $row['product_price'] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
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