<div class="case-image-item case-image-1" id="case-image-1">
	<div class="case-mockup-block">
        <?= wp_get_attachment_image( $case_1['mockup-img'], 'full', ''); ?>
	</div>
	<div class="case-info">
		<div class="case-user-row">
			<div class="case-users">
				<div class="case-user-image">
                    <?= wp_get_attachment_image( $case_1['user-img'], 'full', ''); ?>
				</div>
			<div class="case-user-col">
				<span class="case-user-name"><?= $case_1['user-name'] ?></span>
					<span class="case-user-text"><?= $case_1['user-text'] ?></span>
				</div>
			</div>
		</div>
	    <span class="v-line"></span>
		<div class="case-icon-text first-item">
			<span class="g-line"></span>
            <svg class="case-icon-img">
				<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_1['icon-img'] ?>" />
			</svg>
			<span class="case-icon-name"><?= $case_1['icon-name'] ?></span>
		</div>
		<span class="v-line-sm"></span>
		<div class="case-icon-text second-item">
			<span class="g-line"></span>
			<svg class="case-icon-img">
				<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_1['icon-img-2'] ?>" />
			</svg>
			<span class="case-icon-name"><?= $case_1['icon-name-2'] ?>/span>
		</div>
		<span class="v-line-sm"></span>
		<div class="case-icon-text third-item">
			<span class="g-line"></span>
			<svg class="case-icon-img">
				<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_1['icon-img-3'] ?>" />
			</svg>
			<span class="case-icon-name"><?= $case_1['icon-name-3'] ?></span>
		</div>
		<div class="case-icon-text down">
			<span class="g-line"></span>
            <svg class="case-icon-img">
				<use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#<?= $case_1['case-icon-img'] ?>" />
			</svg>
			<div class="case-icon-info-block">
				<div class="case-icon-info secure">
					<span class="case-icon-title green"><?= $case_1['case-icon-title'] ?></span>
					<span class="case-icon-desc"><?= $case_1['case-icon-desc'] ?></span>
				</div>
                <div class="case-icon-info unsecure absolute">
                    <span class="case-icon-title red"><?= $case_1['case-icon-title-2'] ?></span>
                    <span class="case-icon-desc"><?= $case_1['case-icon-desc-2'] ?></span>
                </div>
            </div>
		</div>
	</div>
</div>