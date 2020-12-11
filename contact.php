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
	<!-- //contact -->
	<div class="content">
		<div class="contact">
			<div class="container">
				<h2>How To Find Us</h2>
				<div class="contact-bottom">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.324004854122!2d80.98076291453187!3d26.861445183149772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd0696fc3245%3A0x9719da00b2748496!2sCEDCOSS%20Technologies%20Private%20Limited!5e0!3m2!1sen!2sin!4v1605693528903!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0; width: 100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="col-md-4 contact-left">
					<h4>Address</h4>
					<p>est eligendi optio cumque nihil impedit quo minus id quod maxime
						<span>26 56D Rescue,US</span></p>
					<ul>
						<li>Free Phone :+1 078 4589 2456</li>
						<li>Telephone :+1 078 4589 2456</li>
						<li>Fax :+1 078 4589 2456</li>
						<li><a href="mailto:info@example.com">info@example.com</a></li>
					</ul>
				</div>
				<div class="col-md-8 contact-left cont">
					<h4>Contact Form</h4>
					<form>
						<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<input type="text" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
						<textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<input type="submit" value="Submit">
						<input type="reset" value="Clear">

					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //contact -->

	</div>
	<!---footer--->
	<?php include './footer.php' ?>
	<!---footer--->


</body>

</html>