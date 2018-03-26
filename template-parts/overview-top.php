<?php 

$overview_top_headline = get_field('overview_top_headline');
$overview_top_description = get_field('overview_top_description');
$description_button_text = get_field('description_button_text');
$description_button_url = get_field('description_button_url');

$callouts_header = get_field('callouts_header');

?>

<section id="overview-top">
	
	<?php if( $overview_top_headline ) : ?>

	<div class="row overview-top section-title-row">
	
		<div class="small-12 columns">
	
			<h2><?php echo $overview_top_headline; ?></h2>
		
		</div>
	
	</div>
	
	<?php endif; ?>
	
	<div class="row overveiw-top-content">
	
		<div class="small-12 medium-6 columns">
		
			<?php
			
			echo $overview_top_description;
			
			if( $description_button_text && $description_button_url ) :
			
				echo '<a href="' . $description_button_url . '" class="button">' . $description_button_text . '</a>';
			
			endif;
			
			?>
		
		</div>
		
		<div class="small-12 medium-5 columns overview-features">
		
			<?php 
			
			if( $callouts_header ) : 
			
				echo '<h3>' . $callouts_header . '</h3>';
			
			endif;
			
			if( have_rows('features_callouts') ) :
			
				while( have_rows('features_callouts') ) : the_row();
			
				$title = get_sub_field('title');
				$text = get_sub_field('text');
			
				?>
				
				<div class="feature">
				
					<?php 
					
					if( $title ) :
					
						echo '<h4>' . $title . '</h4>';
					
					endif;
					
					if( $text ) : 
					
						echo $text;
					
					endif;
					
					?>
				
				</div>
				
				<?php
			
				endwhile;
			
			endif;
			
			?>
		
		</div>
	
	</div>

</section>