<?php

$show_carousel_section = get_field('show_carousel_section');
$section_background_image = get_field('section_background_image');
$background_image_vertical_positioning = get_field('background_image_vertical_positioning');
$carousel_transition_effect = get_field('carousel_transition_effect');
$carousel_transition_speed = get_field('carousel_transition_speed') * 1000;
$carousel_short_description = get_field('carousel_short_description');
$images = get_field('images');
$carousel_headline = get_field('carousel_headline');
$carousel_description = get_field('carousel_description');

$data_options = 'data-options="timerDelay:' . $carousel_transition_speed . ';';

if( $carousel_transition_effect === 'fade' ) :

	$data_options .= ' animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;';

endif;

$data_options .= '"';


$slide_counter = 1;
$bullet_counter = 0;

if( $show_carousel_section ) :

?>

<section id="carousel-section" style="background-image: url(<?php echo $section_background_image; ?>); background-position: center <?php echo $background_image_vertical_positioning; ?>;">
	
	<div class="carousel-section-inner">
		
		<div class="row">
			
			<div class="small-12 columns">
				
				<?php if( $images ) : ?>
				
				<div class="orbit" role="region" aria-label="<?php echo $carousel_short_description; ?>" data-orbit <?php echo $data_options; ?>>
					
					<div class="orbit-wrapper">
						
						<ul class="orbit-container">
							
							<?php
							
							foreach( $images as $image ) :
							
								if( $slide_counter === 1 ) :
							
									$is_active = ' is_active';
							
								else : 

									$is_active = '';
							
								endif;
							
							?>
							
							<li class="orbit-slide<?php echo $is_active; ?>">
								
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="orbit-image" />
							
							</li>
							
							<?php $slide_counter++; endforeach; ?>
						
						</ul>
						
						<nav class="orbit-bullets">
							
							<?php 
							
							foreach( $images as $image ) : 
							
								if( $bullet_counter === 0 ) :
							
									$active_bullet = ' class="is-active"';
							
								else : 

									$active_bullet = '';
							
								endif;
							
							?>
							
							<button<?php echo $active_bullet; ?> data-slide="<?php echo $bullet_counter; ?>"><span class="show-for-sr"><?php echo $image['alt']; ?></span></button>
							
							<?php $bullet_counter++; endforeach; ?>
						
						</nav>
					
					</div>
				
				</div> <!-- end .orbit -->
				
				<?php endif; ?>
				
				<?php 
				
				if( $carousel_headline ) : 
				
					echo '<h2>' . $carousel_headline . '</h2>'; 
				
				endif; 
				
				if( $carousel_description ) :
				
					echo $carousel_description;
				
				endif;
				
				?>
			
			</div>
		
		</div>
	
	</div>

</section>

<?php endif; ?>
