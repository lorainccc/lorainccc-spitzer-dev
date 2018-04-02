<?php

// Get Values from Home Banner ACF field group
//$banner_images = get_field('banner_images');
//$transition_speed = get_field('transition_speed');
$banner_headline = get_field('banner_headline');
//$supporting_content = get_field('supporting_content');




?>

<div id="home-banner" class="home-banner-bg">
	<div class="home-banner-inner">
		<div id="home-banner-content" class="row">
			<div class="small-12 columns">
				<div class="banner-content-inner">
					<?php 
						if( $banner_headline ) :
							echo '<h1>' . $banner_headline . '</h1>';
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>