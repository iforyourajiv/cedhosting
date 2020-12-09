<?php

include_once './class/user.class.php';
$user = new User();
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['email'])) {
    header('Location:index.php');
}

if (isset($_GET['data'])) {
    $email = $_GET['data'];
    $fetch = $user->selectMail();
    foreach ($fetch as $emails) {
        $encryptedEmail = md5($emails['email']);
        if ($email == $encryptedEmail) {
            $decryptedEmail = $emails['email'];
            $mobile         = $emails['mobile'];
            $checkMail      = $user->checkEmail($decryptedEmail);
            $checkMobile    = $user->checkMobile($mobile);
        } else {
            echo "<script>alert('Email Not Exist');window.location.href='login.php';</script>";
        }
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
				<!-- Verification -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="#" method="POST">
				 <div class="register-top-grid">
					<h3>Verification Status</h3>
					 <div>
                        <span>Email<label>*</label>

                        <?php
if ($checkMail) {
    echo "<i class='fa fa-check text-success' style='font-size:16px aria-hidden='true'></i>";
} else {
    echo "<i class='fa fa-times text-danger' style='font-size:16px;' aria-hidden='true'></i>";
}
?></span>
						<input  type="hidden" name='email' id="emailValue" style="margin-bottom:10px"
						pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$"
						title="Please Enter Valid Email Id"  placeholder="Email" disabled>
                        <button class="btn btn-success" id="emailverify">Verify Email</button>
                        <p id="status"></p>

                    </div>
					 <div>

						 <span>Mobile Number<label>*</label><?php

if ($checkMobile) {
    echo "<i class='fa fa-check text-success' style='font-size:16px aria-hidden='true'></i>";
} else {
    echo "<i class='fa fa-times text-danger' style='font-size:16px;' aria-hidden='true'></i>";
}
?></span>
                         <input type="text" id="mobile" style="margin-bottom:10px"  name="mobile" value="<?php echo $mobile ?>"  disabled>
                         <button class="btn btn-success" id="mobileverify" name="mobileverify">Verify Mobile</button>
                        </div>

				</form>
		   </div>
		 </div>
	</div>


			</div>

				<!---footer--->
				<?php include './footer.php' ?>
            <!---footer--->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
$("#emailverify").click(function(e){
  e.preventDefault();
  let email="<?php echo $decryptedEmail ?>";
  let action="email";
    $("#status").html("<p class='text-danger'>Sending...</p>")
  $.ajax({
            method: "POST",
            url: "verify.php",
            data: {
                email:email,
                action:action,
            },
        }).done(function(data) {
         $("#emailverify").text("Re-Send Email");
         $("#status").html("<p class='text-success'>Email Has Been Sent Successfully to : "+ email+" </p>")
        });
})

// $("#verifyOTP").click(function() {
//     let otp=$("#otp").val();
//     let action="verify";
//     let verificationSessionId=$("#VerificationSessionId").val();
//         $.ajax({
//             method: "POST",
//             url: "verifyOTP.php",
//             data: {
//                 otp: otp,
//                 action:action,
//                 verificationSessionId:verificationSessionId
//             },
//         }).done(function(data) {
//            $("#message").html(data);

//         });
// });
});
</script>
</body>
</html>
