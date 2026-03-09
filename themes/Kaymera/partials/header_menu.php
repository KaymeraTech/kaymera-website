<?php 
	$menu = new MenuConstructorSA();
?>
<header class="header" id="header">
	<div class="header-container">
		<div class="wrap">
			<div class="header-inner">
			
				<a <?php $front_link = get_home_url();  if(!is_front_page()){ echo 'href="', $front_link, '"'; } ?> class="logo">
					<?php echo  wp_get_attachment_image( 
									get_field('logo_mobile', 'option'),
									'full', '', array('class'=> 'logo-mobile mobile' )).
								wp_get_attachment_image( 
									get_field('logo_desktop', 'option'),
									'full', '', array('class'=> 'logo-dark desktop' )).
								wp_get_attachment_image( 
									get_field('logo_desktop_light', 'option'),
									'full', '', array('class'=> 'logo-light desktop' ));
					?>
					<!--<img src="<?php echo get_template_directory_uri(); ?>/img/kaymera-logo-sm.png" alt="" class="logo-mobile mobile">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="" class="logo-dark desktop">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo-light.svg" alt="" class="logo-light desktop">-->
				</a>
				<?php echo $menu->main(); ?>
				<button class="btn-menu" type="button" id="btn-menu">
					<span class="btn-menu-text desktop">Menu</span>
					<span class="menu-lines">
						<span class="line"></span>
						<span class="line"></span>
						<span class="line"></span>
					</span>
				</button>
			</div>
		</div>
	</div>
	<?php echo $menu->secondary(); ?>
</header>