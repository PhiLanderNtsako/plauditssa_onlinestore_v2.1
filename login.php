<?php
    session_start();
    include 'inc/config.php';

    $errors = array();
    
  	if (isset($_POST['submit'])) {

	    $password = mysqli_real_escape_string($conn,$_POST['user_password']);
	    $user_email = mysqli_real_escape_string($conn,$_POST['user_email']);
	    
	    $query = "SELECT * FROM user WHERE user_email = '$user_email'";
	    $result = mysqli_query($conn, $query);
	    $row = mysqli_fetch_array($result);

	    if (!empty($row)) {
	    	
		    if ($row['user_email'] == $user_email) {

		    	$verified_pass = password_verify($password, $row['user_password']);

		        if ($verified_pass){
		            
		            //return true;
		            $_SESSION['user_email']= $user_email;
		            $_SESSION['user_id']= $row['user_id'];
		            echo '<meta http-equiv="refresh" content="0; url= user-account.php">';
	 
		            if (isset($_SESSION['rdurl'])) {
		                
		                echo '<meta http-equiv="refresh" content="0; url= '.$_SESSION['rdurl'].'">';
		            }
		        }else {
		            array_push($errors, " Incorrect User Password.");
		        }
		  	}else {
		  		array_push($errors, " Incorrect User Email.");
		  	}
		}else {
			array_push($errors, " Email Does not Match our records.");
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
?>
    <div class="login-section">
        <div class="container">
            <div class="row">
                <div class="login-header-text">
                    <h3>Login</h3>
                </div>
                <?php if (count($errors) > 0) : ?>
					<?php foreach ($errors as $error) : ?>
						<small style="color: red;"><?php echo $error ?></small>
					<?php endforeach ?>
				<?php endif ?>
                <div class="login-form">
                    <form action="" method="post" class="form">
                        <input type="email" name="user_email" placeholder="Email" pattern="[A-z0-9.]+@[A-z]+\.[A-z.]+" required>
                        <input type="password" name="user_password" placeholder="Password" required>
                        <small><a href="">Forgot your password? </a></small>
                        <button type="submit" name="submit" class="login-btn btn">Login</button>
                        <small class="register-text"><a href="register.php"">create account</a></small>
                    </form>
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