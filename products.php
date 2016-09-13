<?php
include "view/v_public_blogs.php"; 
//Check if search data was submitted
if ( isset( $_GET['s'] ) ) {

  // Include the search class
  require_once( dirname( __FILE__ ) . '\search\class-search.php' );
  
  // Instantiate a new instance of the search class
  $search = new search();
  
  // Store search term into a variable
  $search_term = htmlspecialchars($_GET['s'], ENT_QUOTES);
  
  // Send the search term to our search class and store the result
  $search_results = $search->search($search_term);

}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Document Title
	============================================= -->
	<title>Products | Land Rover Automotive</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

	<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="images/logo.png"><img src="images/logo.png" alt="Canvas Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="images/logo.png"><img src="images/logo.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li><a href="index.php"><div>Home</div></a>
								
							</li>
							<li class="current"><a href="products.php"><div>Products</div></a>
								<ul>
									<li>
										<a href="products.php"><div><i class="icon-stack"></i>Defender</div></a>
									</li>
									<li>
										<a href="products.php"><div><i class="icon-gift"></i>Discovery 3 & 4</div></a>
									</li>
									<li>
										<a href="products.php"><div><i class="icon-umbrella"></i>Discovery Sport</div></a>
									</li>
									<li>
										<a href="products.php"><div><i class="icon-line-layout"></i>Freelander</div></a>
									</li>
									<li>
										<a href="products.php"><div><i class="icon-line-columns"></i>Range Rover Evoque</div></a>
									</li>
									<li>
										<a href="products.php"><div><i class="icon-ok-sign"></i>Range Rover L322</div></a>
									</li>
									<li>
										<a href="products.php"><div><i class="icon-envelope-alt"></i>Range Rover L405</div></a>
									</li>
									<li>
										<a href="products.php"><div><i class="icon-th"></i>Range Rover Sport</div></a>
									</li>
									<li>
										<a href="products.php"><div><i class="icon-calendar3"></i>General</div></a>
									</li>
								</ul>
							</li>
							<li class="#"><a href="#"><div>Fitting Service</div></a>

							</li>
							<li class="#"><a href="contact.php"><div>Contact</div></a>

							</li>
						
						</ul>


						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->


		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Defender</h1>
				    <?php if ( @$search_results ) : ?>
    <div class="results-count">
      <p><?php echo @$search_results['count']; ?> results found</p>
    </div>
    <div class="results-table">
      <?php foreach ( @$search_results['results'] as $search_result ) : ?>
      <div class="result">
        <p><?php echo @$search_result->title; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="search-raw">
      <pre><?php print_r(@$search_results); ?></pre>
    </div>
    <?php endif; ?>
					<form action="#" role="form" class="fright form-inline nobottommargin" style="margin-top:-31px !important;" novalidate="novalidate">
						<div class="form-group">
							<input type="text" class="form-control" style="border: 1px solid #222;" name="s" placeholder="" required="" aria-required="true">

								<input type="submit" class="btn btn-success bgcolor" style="border: 1px solid #c5c5c5;" type="submit" value="Search">

						</div>
					</form>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin col_last">

						<!-- Shop
						============================================= -->
						<div id="shop" class="shop product-3 clearfix">
							<?php
								$products = display_products(); 
          						echo $products; 
							?>


					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin">
						<div class="sidebar-widgets-wrap">

							<div class="widget widget_links clearfix">

								<h4></h4>
								<ul>
									<li class="hrs"><i class="icon-th-large"><a href="#"></i>&nbsp; Defender</a></li>

									<li class="hrs"><i class="icon-th-large"><a href="#"></i>&nbsp; Discovery 3 & 4</a></li>


									<li class="hrs"><i class="icon-th-large"><a href="#"></i>&nbsp; Discovery Sport</a></li>

									<li class="hrs"><i class="icon-th-large"><a href="#"></i>&nbsp; Freelander</a></li>

									<li class="hrs"><i class="icon-th-large"><a href="#"></i>&nbsp; Range Rover Evoque</a></li>

									<li class="hrs"><i class="icon-th-large"><a href="#"></i>&nbsp; Range Rover L322</a></li>

									<li class="hrs"><i class="icon-th-large"><a href="#"></i>&nbsp; Range Rover L405</a></li>

									<li class="hrs"><i class="icon-th-large"><a href="#"></i>&nbsp; Range Rover Sport</a></li>

									<li class="hrs-last"><i class="icon-th-large"><a href="#"></i>&nbsp; General</a></li>

								</ul>

							</div>

						</div>
					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->

<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">


			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2016 All Rights Reserved by <a href="www.amytisweb.com" >Amytis Web Development </a><br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright copyright-links">
						<div class="fright clearfix">
							<img src="images/payments.png" style="max-width: 50%;">
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i><a href="mailto:info@landroverautomotive.co.uk"> info@landroverautomotive.co.uk</a> <span class="middot">&middot;</span> <i class="icon-phone"></i><a href="tel:01302482040"> 01302 482040</a> 
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>