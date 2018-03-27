<?php

/*
// for any page that isn't the news or events, and has a featured image set
if( has_post_thumbnail() && !is_home() && !is_singular('post') && !is_singular('lccc_events') && !is_archive() ) :

	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
	$background_image = $thumb_url_array[0];
	$background_image_vertical_alignment = get_field('background_image_vertical_alignment');
	$banner_headline = '<h1>' . get_field('banner_headline') . '</h1>';

// if is news archive page and has featured image set
elseif( has_post_thumbnail( get_option('page_for_posts') ) && is_home() ) :

	$blog_archive_id = get_option('page_for_posts');
	$thumb_id = get_post_thumbnail_id( $blog_archive_id );
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
	$background_image = $thumb_url_array[0];
	$background_image_vertical_alignment = get_field('background_image_vertical_alignment', $blog_archive_id);
	$banner_headline = '<h1>' . get_field('banner_headline', $blog_archive_id) . '</h1>';
	

// if is news archive and doesn't have a featued image set, use news default (theme options)
elseif( is_home() && !has_post_thumbnail( get_option('page_for_posts') ) ) : 

	$background_image = get_field('news_banner_image', 'option');
	$background_image_vertical_alignment = get_field('news_background_image_vertical_alignment', 'option');
	$banner_headline = '<h1>' . get_field('news_banner_headline', 'option') . '</h1>';

// if is category or tag archive page
elseif( is_category() || is_tag() ) :

	$blog_archive_id = get_option('page_for_posts');
	
	if( has_post_thumbnail( $blog_archive_id ) ) :
		
		
		$thumb_id = get_post_thumbnail_id( $blog_archive_id );
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', false);
		$background_image = $thumb_url_array[0];
		$background_image_vertical_alignment = get_field('background_image_vertical_alignment', $blog_archive_id);

	else: 

		$background_image = get_field('news_banner_image', 'option');
		$background_image_vertical_alignment = get_field('news_background_image_vertical_alignment', 'option');

	endif;

	$banner_headline = '<h1>' . get_the_archive_title() . '</h1>';
	

// if is single news artice. 
elseif( is_singular('post') || is_single() ) : 
	
	$blog_archive_id = get_option('page_for_posts');

	// if featured image is set on news archive page, use on-page options, otherwise use news default banner (theme options)
	if( has_post_thumbnail( $blog_archive_id ) ) :

	$thumb_id = get_post_thumbnail_id( $blog_archive_id );
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
	$background_image = $thumb_url_array[0];
	$background_image_vertical_alignment = get_field('background_image_vertical_alignment', $blog_archive_id);
	$banner_headline = '<div class="fake-h1">' . get_field('banner_headline', $blog_archive_id) . '</div>';

	else :

	$background_image = get_field('news_banner_image', 'option');
	$background_image_vertical_alignment = get_field('news_background_image_vertical_alignment', 'option');
	$banner_headline = '<div class="fake-h1">' . get_field('news_banner_headline', 'option') . '</div>';

	endif;

	

// if is single event
elseif( is_singular('lccc_events') ) :

	// if single event has a featued image set, use on-page options, otherwise use default for events (theme options)
	if( has_post_thumbnail() ) :

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
		$background_image = $thumb_url_array[0];
		$background_image_vertical_alignment = get_field('events_background_image_vertical_alignment');
		$banner_headline = '<div class="fake-h1">' . get_field('events_banner_headline') . '</div>';

	else :

		$background_image = get_field('events_banner_image', 'option');
		$background_image_vertical_alignment = get_field('events_background_image_vertical_alignment', 'option');
		$banner_headline = '<div class="fake-h1">' . get_field('events_banner_headline', 'option') . '</div>';

	endif;

// if is events or event category archive page, use default banner options (theme options)
elseif( is_post_type_archive('lccc_events') || is_tax('event_categories') ) :

		$background_image = get_field('events_banner_image', 'option');
		$background_image_vertical_alignment = get_field('events_background_image_vertical_alignment', 'option');

		if( is_tax('event_categories') ) :

			$event_cat = single_cat_title( '', false);
			$banner_headline = '<h1>' . $event_cat . '</h1>';		

		else :

			$banner_headline = '<h1>' . get_field('events_banner_headline', 'option') . '</h1>';

		endif;

// if is 404 page, get banner values from Fallbacks/Defaults option page
elseif( is_404() ) :

		$background_image = get_field('404_banner_image', 'option');
		$background_image_vertical_alignment = get_field('404_background_image_vertical_alignment', 'option');
		$angle_overlay = get_field('404_angle_overlay', 'option');
		$banner_headline = '<h1>' . get_field('404_banner_headline', 'option') . '</h1>';

// final else, if all other conditional checks return false, use the page default banner options (theme options)
else :

	global $post;
	$page_id = $post->ID;

	$background_image = get_field('page_banner_image', 'option');
	$background_image_vertical_alignment = get_field('page_background_image_vertical_alignment', 'option');
	$banner_headline = '<h1>' . get_the_title($page_id) . '</h1>';
	
endif;

*/

$id = get_the_ID();

if( is_home() || is_singular('post') ) :

	$banner_image = get_field('news_banner_image', 'option');
	$banner_image_vertical_alignment = get_field('news_background_image_vertical_alignment', 'option');
	$banner_title = '<h1>' . get_field('news_banner_headline', 'option') . '</h1>';

elseif( is_category() || is_tag() ) :

	$banner_image = get_field('news_banner_image', 'option');
	$banner_image_vertical_alignment = get_field('news_background_image_vertical_alignment', 'option');
	$banner_title = '<h1>' . get_the_archive_title() . '</h1>';

elseif( is_search() ) :

	$banner_image = get_field('search_banner_image', 'option');
	$banner_image_vertical_alignment = get_field('search_background_image_vertical_alignment', 'option');
	$banner_title = '<h1><span class="block-title">Search Results for:</span>' . esc_attr(get_search_query()) . '</h1>';

elseif( is_404() ) :

	$banner_image = get_field('404_banner_image', 'option');
	$banner_image_vertical_alignment = get_field('404_background_image_vertical_alignment', 'option');
	$banner_title = '<h1>' . get_field('404_banner_headline', 'option') . '</h1>';

elseif( is_post_type_archive('lccc_events') || is_tax('event_categories') ) :

	$banner_image = get_field('events_banner_image', 'option');
	$banner_image_vertical_alignment = get_field('events_background_image_vertical_alignment', 'option');

	if( is_tax('event_categories') ) :

		$event_cat = single_cat_title( '', false);
		$banner_title = '<h1>' . $event_cat . '</h1>';		

	else :

		$banner_title = '<h1>' . get_field('events_banner_headline', 'option') . '</h1>';

	endif;

elseif( is_singular('lccc_events') ) :

	// if single event has a featued image set, use on-page options, otherwise use default for events (theme options)
	if( has_post_thumbnail() ) :

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
		$banner_image = $thumb_url_array[0];
		$banner_image_vertical_alignment = get_field('events_background_image_vertical_alignment');
		

	else :

		$banner_image = get_field('events_banner_image', 'option');
		$banner_image_vertical_alignment = get_field('events_background_image_vertical_alignment', 'option');
		

	endif;

	$banner_title = '<div class="fake-h1">' . get_field('events_banner_headline') . '</div>';

	if( !isset($banner_title) || empty($banner_title) ) :

		$banner_title = '<div class="fake-h1">' . get_field('events_banner_headline', 'option') . '</div>';

	endif;


else:

	$banner = get_field('banner_image', $id);

	if( $banner ) :

		$banner_image = $banner;
		$banner_image_vertical_alignment = get_field('banner_image_vertical_alignment', $id);
		$banner_title = '<h1>' . get_field('banner_headline', $id) . '</h1>';

	else :

		$banner_image = get_field('page_banner_image', 'option');
		$banner_image_vertical_alignment = get_field('page_background_image_vertical_alignment', $id);

	endif;

	$banner_title = '<h1>' . get_field('banner_headline', $id) . '</h1>';

	if( !isset($banner_title) || empty($banner_title) ) :

		$banner_title = get_the_title();

	endif;

endif;

if( $banner_title ) :

	$banner_headline = $banner_title;

else :

	$banner_headline = '<h1>' . get_the_title() . '</h1>';

endif;


if( $banner_image && $banner_headline ) :

?>

<div id="page-banner" style="background-image: url(<?php echo $banner_image; ?>); background-position: center <?php echo $banner_image_vertical_alignment; ?>;">
	
	<div class="banner-inner">

		<div id="banner-content" class="row">

			<div class="small-12 columns">
				
				<div class="banner-content-inner">
										
					<?php echo $banner_headline; ?>
						
				</div>

			</div>

		</div>
	
	</div>

</div>


<?php endif; ?>