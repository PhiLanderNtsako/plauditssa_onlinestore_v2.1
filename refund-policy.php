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
        <h2>Refund Policy</h2>
        <span class="border-bottom"></span>
        <p>
        Plaudits SA Team would like to ensure our customers are happy with their purchase and experience. To assist in the event a customer would like to refund or exchange an item the below terms and conditions will be applicable.<br><br>

        <strong>Refunds</strong><br><br>

        YOU CAN RETURN AN ITEM FOR A REFUND WITHIN 14 DAYS FROM THE DATE OF PURCHASE. WE WILL PROCESS A REFUND GIVEN THE ITEM RETURNED IS IN THE ORIGINAL CONDITION AS WHEN IT WAS PURCHASED AND MEETS THE BELOW REQUIREMENTS:<br><br>
        </p>
        <ol>
            <li>Unworn</li>
            <li>Undamaged</li>
            <li>Unwashed</li>
            <li>Original price tags attached </li>
            <li>Purchased online at www.Plaudits SA.co.za</li>
        </ol>
        <p><br><br>
        Please note the cost of shipping for returned items will be for the customer's account.<br><br>

        <strong>EXCHANGES</strong><br><br>

        YOU CAN EXCHANGE AN ITEM WITHIN 30 DAYS FROM THE DATE OF PURCHASE. AN EXCHANGE WILL ONLY TAKE PLACE GIVEN THE ITEM FOR EXCHANGE IS IN THE ORIGINAL CONDITION AS WHEN IT WAS PURCHASED AND MEETS THE BELOW REQUIREMENTS:<br><br>
        </p>
        <ol>
            <li>Unworn</li>
            <li>Undamaged</li>
            <li>Unwashed</li>
            <li>Original price tags attached </li>
            <li>Purchased online at www.Plaudits SA.co.za</li>
        </ol>
        <p><br><br>
        Please note the cost of shipping to exchange an item will be for the customer's account.<br><br>

        <strong>DEFECTIVE OR FAULTY </strong>  <br><br>

        We at Plaudits SA do our best to ensure that we send items that are of high quality and without defects. A defect is a material imperfection in the manufacture. The following will not be considered as defective:<br><br>
        </p>
        <ol>
            <li>Faults resulting from normal wear and tear</li>
            <li>Damage arising from negligence, user abuse or incorrect usage of the product </li>
        </ol>
        <p><br><br>
        On return of the item, we will assess the validity of the defect, if found to be defective we will replace it with the same item. If stock is not available we will replace it with another item of the same value when purchased.
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