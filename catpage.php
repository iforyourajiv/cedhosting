<?php
include_once './class/product.class.php';
$product = new Product();
$productList = "";
$categoryLink = "";
$categoryName = "Coming Soon ";
if (isset($_GET['id'])) {
	$SubCategoryId =  base64_decode($_GET['id']);
	$data = $product->fetchProductForPage($SubCategoryId);
	$categoryLink = $product->fetchSubcategoryHtml($SubCategoryId);
	if ($data) {
		foreach ($data as $element) {
			$productId = $element['id'];
			$category = $element['prod_parent_id'];
			$productName = $element['prod_name'];
			$link = $element['html'];
			$monthlyPrice = $element['mon_price'];
			$annualPrice = $element['annual_price'];
			$sku = $element['sku'];
			$description = json_decode($element['description']);
			$webspace = $description->webspace;
			$bandwidth = $description->bandwidth;
			$freeDomain = $description->freedomain;
			$language = $description->language;
			$mailbox = $description->mailbox;
			$availablity = $element['prod_available'];
			$productList .= '<div class="col-md-3 linux-price">
			<div class="linux-top">
				<h4>' . $productName . ' </h4>
			</div>
			<div class="linux-bottom">
				<h5>&#x20B9;' . $monthlyPrice . '/-<span class="month">per month</span></h5>
				<h5>&#x20B9;' . $annualPrice . '/-<span class="month">per Annum</span></h5>
				<h6> ' . $freeDomain . '  Domain</h6>
				<ul>
					<li><strong>' . $webspace . '</strong> GB Disk Space</li>
					<li><strong>' . $bandwidth . '</strong> GB Data Transfer</li>
					<li><strong>' . $mailbox . '</strong> Email Accounts</li>
					<li>Language Support <strong>' . $language . '</strong></li>
					<li><strong>location</strong> : <img src="images/india.png"></li>
				</ul>
			</div>
			<a href="cart.php?id=' . base64_encode($productId) . '">buy now</a>
		</div>';
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
	<!---singleblog--->
	<div class="content">
		<?php echo $categoryLink['html']  ?>
		<div class="tab-prices">
			<div class="container">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
						<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div id="plan" class="linux-prices">
								<?php echo $productList ?>
								<div class="clearfix"></div>
							</div>
						</div>


						<!-- US Product -->
						<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
							<div class="linux-prices">
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
										<h4>Standard</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$259 <span class="month">per month</span></h5>
										<h6>Single Domain</h6>
										<ul>
											<li><strong>Unlimited</strong> Disk Space</li>
											<li><strong>Unlimited</strong> Data Transfer</li>
											<li><strong>Unlimited</strong> Email Accounts</li>
											<li><strong>Includes </strong> Global CDN</li>
											<li><strong>High Performance</strong> Servers</li>
											<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
										<h4>Advanced</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$359 <span class="month">per month</span></h5>
										<h6>2 Domains</h6>
										<ul>
											<li><strong>Unlimited</strong> Disk Space</li>
											<li><strong>Unlimited</strong> Data Transfer</li>
											<li><strong>Unlimited</strong> Email Accounts</li>
											<li><strong>Includes </strong> Global CDN</li>
											<li><strong>High Performance</strong> Servers</li>
											<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
										<h4>Business</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$539 <span class="month">per month</span></h5>
										<h6>3 Domains</h6>
										<ul>
											<li><strong>Unlimited</strong> Disk Space</li>
											<li><strong>Unlimited</strong> Data Transfer</li>
											<li><strong>Unlimited</strong> Email Accounts</li>
											<li><strong>Includes </strong> Global CDN</li>
											<li><strong>High Performance</strong> Servers</li>
											<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
										<h4>Pro</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$639 <span class="month">per month</span></h5>
										<h6>Unlimited Domains</h6>
										<ul>
											<li><strong>Unlimited</strong> Disk Space</li>
											<li><strong>Unlimited</strong> Data Transfer</li>
											<li><strong>Unlimited</strong> Email Accounts</li>
											<li><strong>Includes </strong> Global CDN</li>
											<li><strong>High Performance</strong> Servers</li>
											<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>

						<!-- US Product End -->
					</div>
				</div>
			</div>
		</div>
		<!-- clients -->
		<div class="clients">
			<div class="container">
				<h3>Some of our satisfied clients include...</h3>
				<ul>
					<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
					<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
					<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
					<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
					<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
					<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
				</ul>
			</div>
		</div>
		<!-- clients -->
		<div class="whatdo">
			<div class="container">
				<h3><?php echo $categoryLink['prod_name']  ?> Features</h3>
				<div class="what-grids">
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="what-grids">
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-move" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
	<!---footer--->
	<?php include './footer.php' ?>
	<!---footer--->


</body>

</html>