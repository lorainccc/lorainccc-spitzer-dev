<?php

// Get Values from Home Banner ACF field group
$banner_image = get_field('banner_image');
$banner_image_vertical_alignment = get_field('banner_image_vertical_alignment');
$banner_headline = get_field('banner_headline');
//$supporting_content = get_field('supporting_content');

?>

<?php if( $banner_image && $banner_headline ) : ?>

<div id="home-banner" style="background-image: url(<?php echo $banner_image; ?>); background-position: center <?php echo $banner_image_vertical_alignment; ?>;">
	
	<div class="home-banner-inner">

		<div id="home-banner-content" class="row">

			<div class="small-12 columns">
				
				<div class="banner-content-inner">
										
					<h1><?php echo $banner_headline; ?></h1>
						
				</div>

			</div>

		</div>
	
	</div>

</div>

<?php endif; ?>