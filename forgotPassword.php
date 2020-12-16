<?php

include_once './class/user.class.php';
$user = new User();
if (!isset($_SESSION)) {
    session_start();
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
    <!---singleblog--->
    <div class="content">      
        <div class="main-1">
			<div class="container">
				<div class="login-page">
					<div class="account_grid">
                    <div class="col-md-6 login-left">
							<img class="img-responsive" src='images/forgot.png'>
						</div>
						<div class="col-md-6 login-right">
							<h3>Forgot Password</h3>
							<p>Please Select Your Security Question And Answer For Reset Password</p>
							<form action="forgotpassword" method="POST">
                            <div>
									<span>Email Address<label>*</label></span>
                                    <input type="text" id="email" name='email' placeholder="valid@mail.com" required>
                                    <small id="massage"></small>
								</div>
                            <div>
								<span>Security Question<label>*</label></span>
								<select id="question" name="question" class="select" required hidden>
									<option>Select Your Security Question</option>
									<option value="What was your childhood nickname?">What was your childhood nickname?</option>
									<option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
									<option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
									<option value="What was your dream job as a child?">What was your dream job as a child?</option>
									<option value="What is your favourite teacher's nickname?">Your Favorite Movie</option>
								</select>
							</div>
                            <div>
								<span>Security Answer<label>*</label></span>
								<input type="text" id="answer" name="answer" value="<?php echo isset($_POST['answer']) ? htmlspecialchars($_POST['answer'], ENT_QUOTES) : ''; ?>" placeholder="Your Answer" pattern='^([A-Za-z0-9]+ )+[A-Za-z0-9]+$|^[A-Za-z0-9]+$' title="No whites paces,
							-Can be alpha-numeric combination/ only alphabetic,
							-Will be CASE-SENSITIVE" required hidden>
							</div>
								
								<input type="submit" id="reset" name="reset" value="Reset Password" disabled>
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>

    </div>
    <!---footer--->
    <?php include './footer.php' ?>
    <!---footer--->
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){

      $("#email").on("keyup blur",function(){
          let email=$(this).val();
          if(email==''){
            $("#massage").html("<h5 class='text-danger'>This Field is Required</h5>");
            $('#question').prop("hidden",true);
                        $('#answer').prop("hidden",true);
                        $('#reset').prop("disabled", true);
          } else {
            $.ajax({
                    method: "POST",
                    url: "checkAjax.php",
                    data: {
                        email: email,
                    },
                }).done(function(data) {
                    if(data=="found"){
                        $("#massage").html("<h5 class='text-success'>Email is Available</h5>");
                        $('#question').prop("hidden", false);
                        $('#answer').prop("hidden", false);
                        $('#reset').prop("disabled", false);
                    } else {
                        $("#massage").html("<h5 class='text-danger'> Email is Not Exist Or Not Verified</h5>");
                        $('#question').prop("hidden",true);
                        $('#answer').prop("hidden",true);
                        $('#reset').prop("disabled", true);
                    }
                   
                });
          }
         
      })

    })
</script>