<?php

$overview_heading = get_field('overview_heading');

if( $overview_heading ) :

?>

<div class="row section-title-row full-margin">

	<div class="small-12 columns text-center">
	
		<h2><?php echo $overview_heading; ?></h2>
	
	</div>

</div>

<?php 

endif; 

if( have_rows('overview_spotlights') ) :

	$rows = get_field('overview_spotlights');
	$row_count = count($rows);
	$row_counter = 1;

	if( $row_count <= 3 ) :

		$spotlight_columns = 'small-12 medium-4 columns';

	elseif( $row_count == 4 ) :

		$spotlight_columns = 'small-12 medium-3 columns';

	endif;

?>

<div class="row spotlight-row">

	<?php 
	
	while( have_rows('overview_spotlights') ) : the_row(); 
	
	if( $row_count == $row_counter ) :
	
		$spotlight_columns = $spotlight_columns . ' end';
	
	endif;
	
	$spotlight_image = get_sub_field('spotlight_image');
	$spotlight_title = get_sub_field('spotlight_title');
	$spotlight_description = get_sub_field('spotlight_description');
	$spotlight_link_text = get_sub_field('spotlight_link_text');
	$spotlight_link_type = get_sub_field('spotlight_link_type');
	
	if( $spotlight_link_type == 'internal' ) :
	
		$spotlight_link = get_sub_field('spotlight_page_link');
		$link_target = '';
	
	elseif( $spotlight_link_type == 'external' ) :
	
		$spotlight_link = get_sub_field('spotlight_link_url');
		$link_target = 'target="_blank"';
	
	endif;
	
	?>
	
	<div class="<?php echo $spotlight_columns; ?> text-center">
	
	<?php if( $spotlight_image ) : ?>
		
		<img src="<?php echo $spotlight_image['url']; ?>" alt="<?php echo $spotlight_image['alt']; ?>" />
		
	<?php 
			 
	endif; 
			 
	if( $spotlight_title ) :
			 
<<<<<<< HEAD
		echo '<h3 class="spitzer-h3">' . $spotlight_title . '</h3>';
=======
<<<<<<< HEAD
		echo '<h3 class="spitzer-h3">' . $spotlight_title . '</h3>';
=======
		echo '<h3 class="orange-h3">' . $spotlight_title . '</h3>';
>>>>>>> 84cf8732e945ccd80fadbd4fb2dbe33d23a27dbf
>>>>>>> 846f18da51f939162dfd9deb1b9e3a1c9833d93b
			 
	endif;
			 
	if( $spotlight_description ) :
			 
		echo $spotlight_description;
			 
	endif;
			 
	if( $spotlight_link && $spotlight_link_text ) :
			 
	?>
	
		<a href="<?php echo $spotlight_link; ?>" class="read-more" <?php if( $link_target ) : echo $link_target; endif; ?>><?php echo $spotlight_link_text; ?> &raquo;</a>
	
	<?php endif; ?>
	
	</div>
	
	<?php $row_counter++; endwhile; ?>

</div>

<?php endif; ?>