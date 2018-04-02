<?php

$community_headline = get_field('community_headline');
$community_sub_heading = get_field('community_sub_heading');


?>

<section id="community">
	
	<div class="row section-title-row half-margin">

		<div class="small-12 columns text-center">

			<?php 

			if( $community_headline ) :

				echo '<h2>' . $community_headline . '</h2>';

			endif;
			
			if( $community_sub_heading ) :
			
				echo '<h2 class="subheading">' . $community_sub_heading . '</h2>';
			
			endif;

			?>

		</div>

	</div>
	
	<?php if( have_rows('community_columns') ) : ?>
	
	<div class="row">
		
		<?php 
		
		while( have_rows('community_columns') ) : the_row(); 
		
			$title = get_sub_field('title');
			$description = get_sub_field('description');
			$link_text = get_sub_field('link_text');
			$link_type = get_sub_field('link_type');
		
			if( $link_type == 'internal' ) :
				$page_link = get_sub_field('page_link');
				$link_target = '';
			elseif( $link_type == 'external' ) :
				$page_link = get_sub_field('external_url');
				$link_target = ' target="_blank"';
			endif;
		
		?>
		
		<div class="small-12 medium-6 large-3 columns community-column text-center">
			
			<div class="column-inner">
			
				<?php 

					if( $title ) :

						echo '<h3>' . $title . '</h3>';

					endif;

					if( $description ) :

						echo $description;

					endif;

					if( $link_text && $page_link ) :

						echo '<a href="' . $page_link . '" class="read-more"' . $link_target . '>' . $link_text . ' &raquo;</a>';

					endif;

				?>
				
			</div>
		
		</div>
		
		<?php endwhile; ?>
	
	</div>
	
	<?php endif; ?>
	
</section>