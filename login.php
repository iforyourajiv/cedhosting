<?php
include_once './class/product.class.php';
$filename = basename($_SERVER['REQUEST_URI']);
if (!isset($_SESSION)) {
	session_start();
}
$product = new Product();
if (isset($_SESSION['email'])) {
	if ($_SESSION['usertype'] == 'admin') {
		header("location:admin/index.php");
	} else {
		header("location:index.php");
	}
}

if (isset($_SESSION['email'])) {
	header('Location:index.php');
}

include_once './class/user.class.php';
$user = new User();
if (isset($_POST['login'])) {
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$check    = $user->login($email, $password);
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!---fonts-->
	<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!---fonts-->

</head>

<body>
	<!--script-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="css/swipebox.css">
	<script src="js/jquery.swipebox.min.js"></script>
	<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
	</script>
	<!--script-->
	<!---header--->
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<i class="sr-only">Toggle navigation</i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
						</button>
						<div class="navbar-brand">
							<a href="index.php"><img class="img-responsive position-relative" src="./images/logo.png" alt="logo" height="20%" width="35%"></a>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li <?php if ($filename == 'index.php') : ?> class="active" <?php endif; ?>><a href="index.php"> Home </a></li>
							<li <?php if ($filename == 'about.php') : ?> class="active" <?php endif; ?>><a href="about.php">About</a></li>
							<li <?php if ($filename == 'services.php') : ?> class="active" <?php endif; ?>><a href="services.php">Services</a></li>
							<li class="dropdown <?php if ($filename == 'linuxhosting.php' || $filename == 'wordpresshosting.php' || $filename == 'windowshosting.php' || $filename == 'cmshosting.php') : ?> active  <?php endif; ?>">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
								<ul class="dropdown-menu">
									<?php
									$data = $product->fetchNavBar();
									if ($data) {
										foreach ($data as $element) {
											$SubmenuId = $element['id'];
											$SubmenuName = $element['prod_name'];
											$link = $element['link'];

									?>
											<li><a href="<?php echo $link ?>"><?php echo $SubmenuName ?></a></li>
									<?php }
									} ?>
								</ul>
							</li>
							<li <?php if ($filename == 'pricing.php') : ?> class="active" <?php endif; ?>><a href="pricing.php">Pricing</a></li>
							<li <?php if ($filename == 'blog.php') : ?> class="active" <?php endif; ?>><a href="blog.php">Blog</a></li>
							<li <?php if ($filename == 'contact.php') : ?> class="active" <?php endif; ?>><a href="contact.php">Contact</a></li>
							<li><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>
							<?php
							if (!isset($_SESSION['username'])) {
								$html = "<li><a href='login.php'>Login</a></li>";
							}
							echo $html;
							?>
						</ul>

					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>
	<!---header--->
	<!---login--->
	<div class="content">
		<div class="main-1">
			<div class="container">
				<div class="login-page">
					<div class="account_grid">
						<div class="col-md-6 login-left">
							<h3>new customers</h3>
							<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
							<a class="acount-btn" href="account.php">Create an Account</a>
						</div>
						<div class="col-md-6 login-right">
							<h3>registered</h3>
							<p>If you have an account with us, please log in.</p>
							<form action="login.php" method="POST">
								<div>
									<span>Email Address<label>*</label></span>
									<input type="text" name='email' placeholder="valid@mail.com" required>
								</div>
								<div>
									<span>Password<label>*</label></span>
									<input type="password" name="password">
								</div>
								<a class="forgot" href="#">Forgot Your Password?</a>
								<input type="submit" name="login" value="Login">
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- login -->
	<!---footer--->
	<?php include './footer.php' ?>
	<!---footer--->
</body>

</html>