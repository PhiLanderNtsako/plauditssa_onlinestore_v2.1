<?php
    session_start();
    include 'inc/config.php';
    $product_name_slug = $_GET['id'];
    $status = "";

	// unset($_SESSION['cart']);

    if (isset($_POST['add-cart'])) {

        $product_id = $_POST['product_id'];

        $query_product = mysqli_query($conn, "SELECT * FROM product INNER JOIN stock ON product.product_id = stock.product_id AND product.product_id = '$product_id'");
        $row = mysqli_fetch_assoc($query_product);


        $product_image = $row['product_front_image'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_size = $_POST['product_size'];
        $code = $product_id.'-'.$product_size;

        $cartArray = array(
            $code => array(
            'code' => $code,
            'product_id' => $product_id,
            'product_image' => $product_image,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_size' => $product_size,
            'product_quantity' =>1
            )
        );

        if(empty($_SESSION['cart'])) {

            $_SESSION['cart'] = $cartArray;
            $status = "Item added to your cart";
        }else {

            $array_keys = array_keys($_SESSION['cart']);
            if(in_array($code,$array_keys)) {

                $status = "Item already added to your cart";
            } else {

                $_SESSION['cart'] = array_merge_recursive($_SESSION['cart'],$cartArray);
                $status = "Item added to your cart";
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

    $sel_product = "SELECT * FROM product INNER JOIN stock ON product.product_id = stock.product_id WHERE product_name_slug = '$product_name_slug' LIMIT 1";
    $query_product = mysqli_query($conn, $sel_product);
    $row = mysqli_fetch_array($query_product);
?>
    <?php 
        if (isset($_POST['add-cart'])) {
    ?>
    <div class="cart-collapse">
        <div class="alert-message">    
            <p><i class="fa fa-check"></i> <?php echo $status ?></p>
        </div>
    </div>
    <?php } ?>
    <div class="single-product-section">
        <div class="container">
            <div class="single-product">
                <div class="single-product-slide">
                    <div class="single-slide fade">
                        <img src="product_images/front/<?php echo $row['product_front_image'] ?>" alt="" class="">
                    </div>
                    <div class="single-slide fade">
                        <img src="product_images/back/<?php echo $row['product_back_image'] ?>" alt="" class="">
                    </div>
                    <div class="single-slide fade">
                        <img src="product_images/model/<?php echo $row['product_model_image'] ?>" alt="" class="">
                    </div>
                    <a class="prev" onclick="plusSlides(-1)"><i class="fa fa-angle-left"></i></a>
                    <a class="next" onclick="plusSlides(1)"><i class="fa fa-angle-right"></i></a>
                </div>
                <div>
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
                <div class="single-product-details">
                    <h5><?php echo $row['product_name'] ?></h5>
                    <h5>R<?php echo $row['product_price'] ?></h5>
                </div>
                <?php
                    if($row['active_yn']){
                        if(
                            $row['size_XS_quantity'] == 0 &
                            $row['size_S_quantity'] == 0 &
                            $row['size_M_quantity'] == 0 &
                            $row['size_L_quantity'] == 0 &
                            $row['size_XL_quantity'] == 0 &
                            $row['size_XXL_quantity'] == 0 &
                            $row['size_fit_all'] == 0
                        ){
                ?>
                        <div class="single-footer-widget">
                            <ul class="nav-footer" id="size-links" style="background: black;">
                                <li><a href="javascript:;" style="color: white;">OUT OF STOCK</a></li>
                            </ul>
                        </div>
                    <?php
                        }else{
                    ?>
                        <div class="single-footer-widget">
						<form method="post" action="" id="cart-form">
                            <h2 id="select-size">Select Size - Add to Cart</h2>
                            <ul class="nav-footer" id="size-links">
                                
                            <?php
                                if($row['size_XS_quantity'] > 0){
                                    echo '
                                    <li>
                                        <input type="radio" id="size_XS_quantity" name="product_size" value="size_XS_quantity" required onclick="this.form.submit();">
                                        <label for="size_XS_quantity">Extra Small - XS</label>
                                    </li>';
                                }
                                if($row['size_S_quantity'] > 0){
                                    echo '
                                    <li>
                                        <input type="radio" id="size_S_quantity" name="product_size" value="size_S_quantity" required onclick="this.form.submit();">
                                        <label for="size_S_quantity">Small - S</label>
                                    </li>';
                                }
                                if($row['size_M_quantity'] > 0){
                                    echo '
                                    <li>
                                        <input type="radio" id="size_M_quantity" name="product_size" value="size_M_quantity" required onclick="this.form.submit();">
                                        <label for="size_M_quantity">Medium - M</label>
                                    </li>';
                                }
                                if($row['size_L_quantity'] > 0){
                                    echo '
                                    <li>
                                        <input type="radio" id="size_L_quantity" name="product_size" value="size_L_quantity" required onclick="this.form.submit();">
                                        <label for="size_L_quantity">Large - L</label>
                                    </li>';
                                }
                                if($row['size_XL_quantity'] > 0){
                                    echo '
                                    <li>
                                        <input type="radio" id="size_XL_quantity" name="product_size" value="size_XL_quantity" required onclick="this.form.submit();">
                                        <label for="size_XL_quantity">Extra Large - XL</label>
                                    </li>';
                                }
                                if($row['size_XXL_quantity'] > 0){
                                    echo '
                                    <li>
                                        <input type="radio" id="size_XXL_quantity" name="product_size" value="size_XXL_quantity" required onclick="this.form.submit();">
                                        <label for="size_XXL_quantity">Extra Extra Large - XXL</label>
                                    </li>';
                                }
                                if($row['size_fit_all'] > 0){
                                    echo '
                                    </ul>
                                    <input type="hidden" id="size_fit_all" name="product_size" value="size_fit_all">
                                    <div class="single-footer-widget" >
                                        <div class="checkout-area">
                                            <button class="checkout-btn" type="submit" name="submit">Add To Cart</button>
                                        </div>
                                    </div>
                                    <style>
                                        #select-size{
                                            display:none;
                                    </style>
                                    ';
                                }
                            ?>
                            <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                            <input type='hidden' name='add-cart' value="add-to-cart" />
                        </form>
                        </div>
                    <?php
                        }
                    }else{
                    ?>
                        <div class="single-footer-widget">
                            <ul class="nav-footer" id="size-links" style="background: black;">
                                <li><a style="color: white;">OUT OF STOCK</a></li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>
                <div class="single-product-description">
                    <h4>Description</h4>
                    <p><?php echo $row['product_description'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>

    <script src="js/main.js"></script>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("single-slide");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active-too", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active-too";
        }

        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
    </script>
</body>
</html>