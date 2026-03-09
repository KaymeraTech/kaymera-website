<?php
	$pre_title = get_field('pre_title');
	$button_text = get_field('button_text');
	$case_1 = get_field('case_1');
	$case_2 = get_field('case_2');
	$case_3 = get_field('case_3');
	$i = 1;
?>
<section class="section-case" id="section-case">
	<div class="wrap">
		<div class="case-container">
			<!-- Text -->
			<div class="case-text-block">
				<div class="case-text-item case-item-1" id="case-item-1">
					<?php
						if($case_1):
							$case = $case_1;
							include('animated-mockup/text.php');
							$i = 2;
						endif;
					?>
				</div>
				<div class="case-text-item case-item-2" id="case-item-2">
					<?php
						if($case_2):
							$case = $case_2;
							include('animated-mockup/text.php');
							$i = 3;
						endif;
					?>
				</div>
				<div class="case-text-item case-item-3" id="case-item-3">
					<?php
						if($case_3):
							$case = $case_3;
							include('animated-mockup/text.php');
						endif;
					?>
				</div>
			</div>
			<!-- Infographics -->
			<div class="case-image-block">
				<?php
				if($case_1):
					include('animated-mockup/case-image-1.php');
				endif;
				if($case_2):
					include('animated-mockup/case-image-2.php');
				endif;
				if($case_2):
					include('animated-mockup/case-image-3.php');
				endif;
				?>
			</div>
		</div>	
	</div>
</section>