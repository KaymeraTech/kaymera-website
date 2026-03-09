<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<?php
	//header("Cache-control: public");
	//header("Expires: " . gmdate("D, d M Y H:i:s", time() + 31536000) . " GMT");
	//Direct analytics
	/*if (get_field('analytics','option') != '') : ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php the_field('analytics','option'); ?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', '<?php the_field('analytics','option'); ?>');
		</script>
	<?php endif; */
	?>

	<?php 
	// seo fix uppercase URL to lovercase
	$url = parse_url($_SERVER['REQUEST_URI']);
	// print_r($url);
	// echo '-------------';
	// echo $_SERVER['REQUEST_URI'];
	if($url['path'] !== trim(preg_replace('/-+/', '-', $url['path']), '-')){
		$url['path'] = trim(preg_replace('/-+/', '-', $url['path']), '-');
		header('Location: //'.$_SERVER['HTTP_HOST'] . strtolower($url['path']), true, 301);
	}
	// echo $url['path'];
	// echo 'ttttest';
	if ( $url['path'] != strtolower($url['path']) ) {
		if(!$url['query']){
			header('Location: //'.$_SERVER['HTTP_HOST'] . strtolower($url['path']), true, 301);
		} else{
			header('Location: //'.$_SERVER['HTTP_HOST'] . strtolower($url['path']) . '?'. $url['query'], true, 301);
		}
		exit();
	}
	

	?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NQQDH62');</script>
	<!-- End Google Tag Manager -->

			<!-- connect to domain of font files -->
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<!-- optionally increase loading priority -->
		<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

		<!-- async CSS -->
		<link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

		<!-- no-JS fallback -->
		<noscript>
			<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
		</noscript>


    <?php wp_head(); ?>
</head>
<body class="<?= theme_class(); ?>">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQQDH62"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php get_template_part('partials/header_menu'); ?>



