<?php

$cool_background_image = get_field('cool_background_image');
$cool_headline = get_field('cool_headline');
$cool_subheading = get_field('cool_subheading');
$cool_image = get_field('cool_image');
$cool_descriptive_text = get_field('cool_descriptive_text');

?>

<section id="cool" style="background-image: url(<?php echo $cool_background_image; ?>);">
	
	<div class="cool-inner">
	
		<?php if( $cool_headline ) : ?>

		<div class="row section-title-row half-margin">

			<div class="small-12 columns text-center">

				<?php 

				if( $cool_headline ) :

					echo '<h2>' . $cool_headline . '</h2>';

				endif;

				?>

			</div>

		</div>

		<?php endif; ?>

		<div class="row home-cool-row">

			<div class="small-12 medium-10 medium-centered large-5 large-uncentered columns">

				<img src="<?php echo $cool_image['url']; ?>" alt="<?php echo $cool_image['alt']; ?>" />

			</div>

			<div class="small-12 medium-10 medium-centered large-7 large-uncentered columns">

			<?php

			if( $cool_subheading ) :

				echo '<h3>' . $cool_subheading . '</h3>';

			endif;

			echo $cool_descriptive_text;

			?>

			</div>

		</div>
		
	</div>

</section>