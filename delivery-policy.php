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
    <div class="long-text-container">
        <h2>Delivery & Collection Information</h2>
        <span class="border-bottom"></span>
        <p><br><br>

        <strong><u>COLLECTION</u></strong><br><br>

        Plaudits SA provides you with an alternative delivery option where you can collect your order at a store location for your convenience.<br><br>

        <strong>where?</strong><br><br>

        Plaudits SA Headquartes<br>
        11011 Makena Street<br>
        Mamelodi East<br>
        Pretoria<br> 
        0122<br><br>

        <strong>when?</strong><br><br>

        Within 14 days of receiving “ready for pick up” notification via email.<br><br>

        
        <strong>how much does it cost?</strong><br><br>

        There is no charge for collecting at our store<br><br>

        <strong><u>DELIVERY</u></strong><br><br>

        You will receive an automated confirmation email after you place your order.<br><br>

        Please allow 4-5 business days for order delivery. Once an order has been placed, it cannot be modified or cancelled.<br><br>

        You will receive an email with tracking info once your order ships. Local (SA) orders are shipped with reliable local couriers (CourierIT, Dawn Wing, Courier Guy etc). International orders are shipped with DHL Express.<br><br>

        Shipping delays may occur during sale days, weekends and public holidays.<br><br>

        Please note, we do not ship on weekends and public holidays. We are unable to ship to P.O. Box addresses. We must have a valid street address in order to deliver to you. <br><br>

        Plaudits SA is not responsible for items lost, damaged, or stolen in transit, and our parcels are not shipped as insured.<br><br> 

        Our standard delivery fee is R100 for orders under R1000, and free for orders over R1000. 
        </p>
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