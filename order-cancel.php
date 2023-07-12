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
        echo '<meta http-equiv="refresh" content="8; url= user-account.php">';
    ?>
    <div class="cart-collapse">
        <div class="alert-message" style="text-align:center;">    
            <p><i class="fa fa-check"></i>Payment was cancelled</p><br><br>
            <p>Page redirecting...</p>
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