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
	<link rel="stylesheet" href="checkout-library/css/style.css">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
<style>
		#checkout-nav{
			color:grey;
			text-decoration:none;
		}
		#checkout-nav:hover{
			color:blue;
			text-decoration:none;
		}
		#checkout-nav:active{
			color:red;
			text-decoration:none;
		}
		.form-group .form-control:focus{
			border: 1px red solid;
			color: red;
		}

		.billing-top{
			display: flex;
			justify-content: space-between;
            margin-bottom: 2em;
		}

		.billing-top a{
			color: black;
			font-size: 1.2em;
		}

		#dropdown-hoodies{
			display: none;
		}
        #dropdown-tees{
			display: none;
		}
        #dropdown-kids{
			display: none;
		}
        #dropdown-ladies{
			display: none;
		}
        #dropdown-men{
			display: none;
		}
        #dropdown-long-sleeve{
			display: none;
		}
        
		#closeHoodies{
			display: none;
		}
        #closeTees{
			display: none;
		}
        #closeKidst{
			display: none;
		}
        #closeLongSleeve{
			display: none;
		}
        #closeLadiesVneck{
			display: none;
		}
        #closeMenVneck{
			display: none;
		}
        .size-guide img{
            height: 100%;
            width: 280px;
            margin: auto;
        }
	</style>
<body>
<?php
    include 'header.php';
?>
	<section class="checkout_area section_gap" style="max-width:912px; padding:auto; margin:auto;">
        <div class="long-text-container">
            <h2>Size Guide</h2>
            <span class="border-bottom"></span>
        </div>
		<div class="container">
            <div class="billing-top">
                <h3>Hoodies</h3>
                <a href="javasxript:;" id="openHoodies" onclick="openHoodies()"><i class="fa fa-chevron-down"></i></a>
                <a href="javasxript:;" id="closeHoodies" onclick="closeHoodies()"><i class="fa fa-chevron-right"></i></a>
            </div>
            <ul class="size-guide" id="dropdown-hoodies">
                <li>
                    <img src="img/size-guide/hoodies-sz.png" alt="">
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="billing-top">
                <h3>T-Shirts</h3>
                <a href="javasxript:;" id="openTees" onclick="openTees()"><i class="fa fa-chevron-down"></i></a>
                <a href="javasxript:;" id="closeTees" onclick="closeTees()"><i class="fa fa-chevron-right"></i></a>
            </div>
            <ul class="size-guide" id="dropdown-tees">
                <li>
                    <img src="img/size-guide/t-shirts-sz.png" alt="">
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="billing-top">
                <h3>Kids</h3>
                <a href="javasxript:;" id="openKidst" onclick="openKidst()"><i class="fa fa-chevron-down"></i></a>
                <a href="javasxript:;" id="closeKidst" onclick="closeKidst()"><i class="fa fa-chevron-right"></i></a>
            </div>
            <ul class="size-guide" id="dropdown-kids">
                <li>
                    <img src="img/size-guide/kids-t-sz.png" alt="">
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="billing-top">
                <h3>Slong Sleeve</h3>
                <a href="javasxript:;" id="openLongSleeve" onclick="openLongSleeve()"><i class="fa fa-chevron-down"></i></a>
                <a href="javasxript:;" id="closeLongSleeve" onclick="closeLongSleeve()"><i class="fa fa-chevron-right"></i></a>
            </div>
            <ul class="size-guide" id="dropdown-long-sleeve">
                <li>
                    <img src="img/size-guide/long-sleeve-sz.png" alt="">
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="billing-top">
                <h3>Ladies V-Neck</h3>
                <a href="javasxript:;" id="openLadiesVneck" onclick="openLadiesVneck()"><i class="fa fa-chevron-down"></i></a>
                <a href="javasxript:;" id="closeLadiesVneck" onclick="closeLadiesVneck()"><i class="fa fa-chevron-right"></i></a>
            </div>
            <ul class="size-guide" id="dropdown-ladies">
                <li>
                    <img src="img/size-guide/ladies-vneck-sz.png" alt="">
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="billing-top">
                <h3>Men V-Neck</h3>
                <a href="javasxript:;" id="openMenVneck" onclick="openMenVneck()"><i class="fa fa-chevron-down"></i></a>
                <a href="javasxript:;" id="closeMenVneck" onclick="closeMenVneck()"><i class="fa fa-chevron-right"></i></a>
            </div>
            <ul class="size-guide" id="dropdown-men">
                <li>
                    <img src="img/size-guide/men-vneck-sz.png" alt="">
                </li>
            </ul>
        </div>
    </section>

    <?php
        include 'footer.php';
    ?>
	<script src="js/main.js"></script>
    <script src="checkout-library/js/main.js"></script>
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