<?php
    session_start();
    include 'inc/config.php';

    $errors = array();
    if (isset($_POST['submit'])) {

        $user_firstName = mysqli_real_escape_string($conn,$_POST['user_firstName']);
        $user_lastName = mysqli_real_escape_string($conn,$_POST['user_lastName']);
        $password = mysqli_real_escape_string($conn,$_POST['user_password']);
        $verification_code = $_GET['code'];
        $user_email = $_GET['email'];

        $user_check_query = "SELECT * FROM user WHERE user_email = '$user_email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user) {

            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $user_id = $user['user_id'];
            $query = "UPDATE user SET user_firstName = '$user_firstName', user_lastName = '$user_lastName', user_password ='$hashPassword', verification_code = 'verified' WHERE user_id = $user_id";
            mysqli_query($conn, $query);
            $_SESSION['user_id'] = $user_id;
            mysqli_close($conn);

            echo '<meta http-equiv="refresh" content="0; url= user-account.php">';
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
                    <h3>Register</h3>
                </div>
                <?php if (count($errors) > 0) : ?>
					<?php foreach ($errors as $error) : ?>
						<small style="color: red;"><?php echo $error ?></small>
					<?php endforeach ?>
				<?php endif ?>
                <div class="login-form">
                    <form action="" method="post" class="form">
                        <input type="text" name="user_firstName" placeholder="First Name" required>
                        <input type="text" name="user_lastName" placeholder="Last Name" required>
                        <input type="text" name="user_email" value="<?php echo $_GET['email'] ?>" readonly>
                        <input type="password" name="user_password" placeholder="Password"required>
                        <button type="submit" name="submit" class="login-btn btn">Register</button>
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