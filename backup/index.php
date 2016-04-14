<?php
$msg = "we are a steam ironing service named dsetgo.com\n thank you for contacting us. we will get back to you";

mail($_POST["email"],"My subject",$msg);

?>

<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		
		<title>DsetGo NALEN</title>
		
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">DsetGo</a></h1>
				<nav id="nav">
					<ul>
				<!--		<li><a href="index.html">Home</a></li>
						<li><a href="generic.html">Generic</a></li>
						<li><a href="elements.html">Elements</a></li>
						<li><a href="#" class="button special">Sign Up</a></li>
			-->		</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2>DSetGo Presents  </h2>
				<p>Hasslefree Steam ironing</p>
				<ul class="actions">
					<li>
						<a href="#" class="button big">Lets get started</a>
					</li>
				</ul>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Time for our Awesome Plans!</h2>
						<p></p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color1 fa-cloud"></i>
								<h3>Small Budget</h3>
								<p>24 hrs delivery service.Top notch steam ironing services.Free Pick up Drop.</p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color9 fa-desktop"></i>
								<h3>Medium Budget</h3>
								<p>12 hrs delivery service.Top notch steam ironing services.Free Pick up Drop.</p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color6 fa-rocket"></i>
								<h3>Premium Budget</h3>
								<p>3 hrs delivery service.Top notch steam ironing services.Free Pick up Drop.</p>
							</section>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Customer Testimonials</h2>
						<p>Here's what our awesome customers have to say about our services...</p>
					</header>
					<section class="profiles">
						<div class="row">
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Nishant Sharma</h4>
								<p>Awesome service! Loved it!!</p>
							</section>
							<section class="3u 6u$(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Nalen Anand</h4>
								<p>Excellent delivery service.On time! Loved it.</p>
							</section>
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Ujjal Goswami</h4>
								<p>Not even a single crease on my clothes.Awesome packaging.Great going!</p>
							</section>
							<section class="3u$ 6u$(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Jyotsna Anand</h4>
								<p>What a relief I must say.This startup has really made it easier.</p>
							</section>
						</div>
					</section>
					<footer>
					<!--	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam dolore illum, temporibus veritatis eligendi, aliquam, dolor enim itaque veniam aut eaque sequi qui quia vitae pariatur repudiandae ab dignissimos ex!</p>
					-->	<ul class="actions">
							<li>
								<a href="#" class="button big">Lets order</a>
							</li>
						</ul>
					</footer>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Book your appointment right now!</h2>
						<p>Give us your details so that our executives can confirm your order.</p>
					</header>
				</div>
				<div class="container 50%">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="row uniform">
							<div class="6u 12u$(small)">

								<input name="name" id="name" value="" placeholder="Name" type="text">

							</div>
							<div class="6u$ 12u$(small)">
								<input name="email" id="email" value="" placeholder="Email" type="email">

							</div>
							<div class="12u$">
								<textarea name="message" id="message" placeholder="Message" rows="6"></textarea>

							</div>
							<div class="12u$">
								<ul class="actions">
									<li><input value="Place order" name="button_pressed" class="special big" type="submit"></li>

								</ul>
							</div>
						</div>
					</form>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div align="center">
							<section class="3u 6u(medium) 12u$(small)">
								<h3></h3>
								<ul class="unstyled">
								<!--	<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Nesciunt itaque, alias possimus</a></li>
									<li><a href="#">Optio rerum beatae autem</a></li>
									<li><a href="#">Nostrum nemo dolorum facilis</a></li>
									<li><a href="#">Quo fugit dolor totam</a></li>
							-->	</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3></h3>
								<ul class="unstyled">
							<!--		<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Reiciendis dicta laboriosam enim</a></li>
									<li><a href="#">Corporis, non aut rerum</a></li>
									<li><a href="#">Laboriosam nulla voluptas, harum</a></li>
									<li><a href="#">Facere eligendi, inventore dolor</a></li>
						-->		</ul>
							</section>
							<section class="3u 6u(medium) 12u$(small)">
								<h3></h3>
								<ul class="unstyled">
							<!--		<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Distinctio, inventore quidem nesciunt</a></li>
									<li><a href="#">Explicabo inventore itaque autem</a></li>
									<li><a href="#">Aperiam harum, sint quibusdam</a></li>
									<li><a href="#">Labore excepturi assumenda</a></li>
							-->	</ul>
							</section>
							<section class=class="3u 6u(medium) 12u$(small)">
								<h3>Contact Us</h3>
								<ul class="unstyled">
									<li><a >9650839565</a></li>
									<li><a >support@dsetgo.com</a></li>
								</ul>
							</section>
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>Copyright © 2015· Captain Dhobi Pvt Ltd. All rights reserved</li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

<?php?>
	$email = $_POST["email"];
	$msg = "Hello we are a laundry based service\n thanks u for giving mail id\n we will get back to you with the price list";
	mail($email,"Dsetgo.com at your doorstep",$msg);
?>




	</body>
</html>