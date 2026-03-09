<div class="case-image-item case-image-3" id="case-image-3">
	<div class="case-info">
		<div class="case-info-lg">
			<div class="case-info-main-col">
				<span class="case-info-main-title"><?= $case_3['main-title'] ?></span>
				<span class="case-info-main-text"><?= $case_3['main-text'] ?></span>
			</div>
			<?= wp_get_attachment_image( $case_2['main-img'], 'full', ''); ?>
			<span class="g-line"></span>
		</div>
		<div class="case-info-amount">
			<span class="v-line"></span>
			<div class="case-icon-text first-item">
				<svg class="case-icon-img">
					<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_3['icon-img'] ?>" />
				</svg>
				<span class="case-icon-name"><?= $case_3['icon-name'] ?></span>
			</div>
			<span class="v-line-sm"></span>
			<div class="case-icon-text second-item">
				<svg class="case-icon-img">
					<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_3['icon-img-2'] ?>" />
				</svg>
				<span class="case-icon-name"><?= $case_3['icon-name-2'] ?></span>
			</div>
			<span class="v-line-sm"></span>
			<div class="case-icon-text third-item">
				<svg class="case-icon-img">
					<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_3['icon-img-3'] ?>" />
				</svg>
				<span class="case-icon-name"><?= $case_3['icon-name-3'] ?></span>
			</div>
		</div>
	</div>
	<div class="case-mockup-block">
		<?= wp_get_attachment_image( $case_3['case-icon-img'], 'full', ''); ?>
	</div>
</div>