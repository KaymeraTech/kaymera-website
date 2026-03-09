<div class="case-image-item case-image-2" id="case-image-2">
	<div class="case-mockup-block">
		<?= wp_get_attachment_image( $case_2['mockup-img'], 'full', ''); ?>
		<?= wp_get_attachment_image( $case_2['box-important'], 'full', '', array('class'=>'icon-block important')); ?>
		<?= wp_get_attachment_image( $case_2['user-shield'], 'full', '', array('class'=>'icon-block user')); ?>
	</div>
	<div class="case-info">
		<div class="case-user-row">
			<div class="case-users">
				<div class="case-users-list">
					<div class="case-user-image">
						<?= wp_get_attachment_image( $case_2['user-img'], 'full', ''); ?>
					</div>
					<div class="case-user-abs case-user-next">
						<?= wp_get_attachment_image( $case_2['user-img-2'], 'full', ''); ?>
					</div>
					<div class="case-user-abs case-user-next-second">
						<?= wp_get_attachment_image( $case_2['user-img-3'], 'full', ''); ?>
					</div>
				</div>
				<div class="case-user-col">
					<span class="case-user-name"><?= $case_2['user-name'] ?></span>
					<span class="case-user-text"><?= $case_2['user-text'] ?></span>
				</div>
			</div>
		</div>
		<span class="v-line"></span>
		<div class="case-icon-text first-item">
			<span class="g-line"></span>
			<svg class="case-icon-img">
				<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_2['icon-img'] ?>" />
			</svg>
			<span class="case-icon-name"><?= $case_2['icon-name'] ?></span>
		</div>
		<span class="v-line-sm"></span>
		<div class="case-icon-text second-item">
			<span class="g-line"></span>
			<svg class="case-icon-img">
				<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_2['icon-img-2'] ?>" />
			</svg>
			<span class="case-icon-name"><?= $case_2['icon-name-2'] ?></span>
		</div>
		<span class="v-line-sm"></span>
		<div class="case-icon-text third-item">
			<span class="g-line"></span>
			<svg class="case-icon-img">
				<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_2['icon-img-3'] ?>" />
			</svg>
			<span class="case-icon-name"><?= $case_2['icon-name-3'] ?></span>
		</div>
		<div class="case-icon-text case-icon-text-hacker down">
			<span class="g-line"></span>
			<div class="case-user-image">
				<?= wp_get_attachment_image( $case_2['case-icon-img'], 'full', ''); ?>
			</div>
			<div class="case-icon-info-block">
				<div class="case-icon-info">
					<span class="case-icon-title red"><?= $case_2['case-icon-title'] ?></span>
					<span class="case-icon-desc"><?= $case_2['case-icon-desc'] ?></span>
				</div>
			</div>
		</div>
	</div>
</div>