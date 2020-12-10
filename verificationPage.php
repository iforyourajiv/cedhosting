<?php

include_once './class/user.class.php';
$user = new User();
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['email'])) {
    header('Location:index.php');
}
$mobile = "";
if (isset($_GET['data'])) {
    $email = $_GET['data'];
    $fetch = $user->selectMail();
    $flag = 0;
    foreach ($fetch as $emails) {
        $encryptedEmail = md5($emails['email']);
        if ($email == $encryptedEmail) {
            $decryptedEmail = $emails['email'];
            $mobile         = $emails['mobile'];
            $checkMail      = $user->checkEmail($decryptedEmail);
            $flag = 1;
        }
    }
    if ($flag != 1) {
        echo "<script>alert('Email Not Exist'); window.location.href = 'login.php';</script>";
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

                                <button class="btn btn-success" id="emailverify">Verify Email</button>
                                <p id="status"></p>

                            </div>
                            <div>

                                <span>Mobile Number<label>*</label><?php
                                                                    $checkMobile = $user->checkMobile($mobile);
                                                                    if ($checkMobile) {
                                                                        echo "<i class='fa fa-check text-success' style='font-size:16px aria-hidden='true'></i>";
                                                                    } else {
                                                                        echo "<i class='fa fa-times text-danger' style='font-size:16px;' aria-hidden='true'></i>";
                                                                    }
                                                                    ?>
                                </span>
                                <button class="btn btn-success" id="mobileverify" name="mobileverify">Verify
                                    Mobile</button>
                                <p id="statusformobile"></p>
                            </div>
                            <div>
                            </div>

                            <div id="varifiactionDiv">
                                <input type="text" id="otp" maxlength="6" class="form-control" style="width:20%;margin-bottom:10px" name="otp" value="" required="required" placeholder="Enter OTP">
                                <input type="hidden" id="VerificationSessionId" name="VerificationSessionId" value="">
                                <button id="verifyOTP" class="btn btn-primary">Verify OTP </button>
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
            $("#varifiactionDiv").hide();
            $("#emailverify").click(function(e) {
                e.preventDefault();
                let email = "<?php echo $decryptedEmail ?>";
                let action = "email";
                $("#status").html("<p class='text-danger'>Sending...</p>")
                $.ajax({
                    method: "POST",
                    url: "verify.php",
                    data: {
                        email: email,
                        action: action,
                    },
                }).done(function(data) {
                    $("#emailverify").text("Re-Send Email");

                    $("#status").html("<p class='text-success'>Email Has Been Sent Successfully to : " + email + " </p>")
                });
            })
            $("#mobileverify").click(function(e) {
                e.preventDefault();
                let mobile = "<?php echo $mobile ?>";
                let action = "mobile";
                $("#statusformobile").html("<p class='text-danger'>Sending...</p>")
                $.ajax({
                    method: "POST",
                    url: "verify.php",
                    data: {
                        mobile: mobile,
                        action: action,
                    },
                }).done(function(data) {
                    $("#mobileverify").text("Re-Send OTP");
                    $("#varifiactionDiv").show();
                    $("#VerificationSessionId").val(data);
                    $("#statusformobile").html("<p class='text-success'>One Time Password Has Been Sent Successfully to : " + mobile + " </p>")
                });
            })

            $("#verifyOTP").click(function(e) {
                e.preventDefault();
                let otp = $("#otp").val();
                let action = "verify";
                let mobile = "<?php echo $mobile ?>";
                let verificationSessionId = $("#VerificationSessionId").val();
                $.ajax({
                    method: "POST",
                    url: "verify.php",
                    data: {
                        otp: otp,
                        mobile: mobile,
                        action: action,
                        verificationSessionId: verificationSessionId
                    },
                }).done(function(data) {
                    alert(data);
                    window.location.href = 'login.php';

                });
            });

        });
    </script>
</body>

</html>