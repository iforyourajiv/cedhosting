<?php

include_once './class/user.class.php';
$user = new User();
if (!isset($_SESSION)) {
	session_start();
}

if (isset($_SESSION['email'])) {
	header('Location:index.php');
}

if (isset($_POST['signup'])) {
	$email            = trim(preg_replace('/\s+/', ' ', $_POST['email']));
	$name             = trim(preg_replace('/\s+/', ' ', $_POST['fullname']));
	$mobile           = $_POST['mobile'];
	$question         = $_POST['question'];
	$answer           = $_POST['answer'];
	$password         = $_POST['password'];
	$password_confirm = $_POST['confirm_password'];

	if ($password_confirm == $password) {
		$check = $user->signup($email, $name, $mobile, $question, $answer, $password);
		if ($check) {
			$enc_mail = md5($email);
			echo "<script>alert('Congratulations,Registration Successfully Completed');window.location.href='verificationPage.php?data=$enc_mail';</script>";
		} else {
			echo "<script>alert('Registration failed')</script>";
			echo "<script>window.location.href='account.php';</script>";
		}
	} else {
		echo "<script>alert('Confirm Password Is Not Matched with Password')</script>";
		echo "<script>window.location.href='account.php';</script>";
	}
}

?>


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
	<?php include './header.php' ?>
	<!---header--->
	<div class="content">
		<!-- registration -->
		<div class="main-1">
			<div class="container">
				<div class="register">
					<form action="account.php" method="POST">
						<div class="register-top-grid">
							<h3>personal information</h3>
							<div>
								<span>Email<label>*</label></span>
								<input type="text" name='email' pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" title="Please Enter Valid Email Id" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ''; ?>" placeholder="Email" required>
							</div>
							<div>
								<span>Full Name<label>*</label></span>
								<input type="text" id="fullname" name="fullname" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : ''; ?>" pattern='^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$' title="please Enter Name With Single Space" placeholder="Full Name" required>
							</div>
							<div>
								<span>Mobile Number<label>*</label></span>
								<input type="text" id="mobile" name="mobile" value="<?php echo isset($_POST['mobile']) ? htmlspecialchars($_POST['mobile'], ENT_QUOTES) : ''; ?>" title="Please Enter Valid Mobile Number" placeholder="Mobile Number (10 Digits Only)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required>
							</div>
							<div>
								<span>Security Question<label>*</label></span>
								<select name="question" class="select" required>
									<option>Select Your Security Question</option>
									<option value="What was your childhood nickname?">What was your childhood nickname?</option>
									<option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
									<option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
									<option value="What was your dream job as a child?">What was your dream job as a child?</option>
									<option value="What is your favourite teacher's nickname?">Your Favorite Movie</option>
								</select>
							</div>
							<div></div>
							<div>
								<span>Security Answer<label>*</label></span>
								<input type="text" name="answer" value="<?php echo isset($_POST['answer']) ? htmlspecialchars($_POST['answer'], ENT_QUOTES) : ''; ?>" placeholder="Your Answer" pattern='^([A-Za-z0-9]+ )+[A-Za-z0-9]+$|^[A-Za-z0-9]+$' title="No whites paces,
							-Can be alpha-numeric combination/ only alphabetic,
							-Will be CASE-SENSITIVE" required>
							</div>
							<div class="clearfix"> </div>
							<a class="news-letter" href="#">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
							</a>
						</div>
						<div class="register-bottom-grid">
							<h3>login information</h3>
							<div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" title="No whites spaces,
                                  -Range 8-16 character,
                                 -Combination of UPPERCASE, lowercase, special character and numeric value." required>
							</div>
							<div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name='confirm_password' required>
							</div>
						</div>
						<div class="clearfix"> </div>
						<div class="register-but">
							<input type="submit" name="signup" value="submit">
							<div class="clearfix"> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- registration -->

	</div>
	<!-- login -->
	<!---footer--->
	<?php include './footer.php' ?>
	<!---footer--->
</body>

</html>