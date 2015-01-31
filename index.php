<<<<<<< HEAD
<!DOCTYPE>
<html>
	<head>
		<title>Eric Cavazos</title>
		
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			 	
			 	$(".intro").click(function(e) {
			      	e.preventDefault();
			      	alert('ahhh… Hell');
			  	});
			  	
			 });
		</script>
	</head>
	<body>
	<article>
		<div id="main">
			<div class="title-box">
				<h1 class="intro">Eric Cavazos</h1>
				<h3 class="desc">strategist &bull; developer &bull; designer</h3>
				<p class="details">Inspired marketer and technology enthusiast, I work with several companies to explore the possibilities of helping them brand, develop, and introduce new products into the marketplace. <a class="link" href="mailto:eric@marketinfantry.com">Contact me</a>.</p>
			</div>
		</div>
	</article>
	</body>
</html>
=======
<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
>>>>>>> 765d1af74ec9114d63c2a0c6d1fd85fa0da11d52
