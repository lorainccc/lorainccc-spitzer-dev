<?php


global $post;
$search_id = $post->ID;

$background_image = get_field('search_banner_image', 'option');
$background_image_vertical_alignment = get_field('search_background_image_vertical_alignment', 'option');
$banner_headline = '<h1>' . get_field('search_banner_headline', 'option') . '</h1>';
$icon = get_field('search_results_icon', 'option');
$accent_color = get_field('search_accent_color', 'option');

switch( $icon ) :

	case 'kids':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Kids.svg';
		break;

	case 'food':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Adults1.svg';
		break;

	case 'drink':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Adults2.svg';
		break;

	case 'biz':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Business.svg';
		break;

	case 'com':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Community.svg';
		break;

	case 'ent':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Entrepreneurs.svg';
		break;

	case 'student':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Students.svg';
		break;

	case 'program':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Programs.svg';
		break;

	case 'chefs':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Chefs.svg';
		break;

	case 'sas':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Restaurant.svg';
		break;

	case 'fac':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Facilities.svg';
		break;

	case 'about':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-About.svg';
		break;

	case 'news':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-News.svg';
		break;

	case 'events':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Events.svg';
		break;

	case 'contact':
		$icon_url = get_stylesheet_directory_uri() . '/images/icons/BannerIcon-Contact.svg';
		break;

endswitch;



if( $background_image ) :

?>


<div class="page-banner" style="background-image: url(<?php echo $background_image; ?>); background-position: center <?php echo $background_image_vertical_alignment; ?>; background-position: center <?php echo $background_image_vertical_alignment; ?>;">
	
	<div class="page-banner-inner">

		<div class="row banner-row">
		
			<div class="small-12 columns text-center medium-text-left">
			
				<div class="banner-icon" style="background-color:<?php echo $accent_color; ?>;">
					
					<img src="<?php echo $icon_url; ?>" alt="Icon for search results page" />
					
				</div>
				
				<div class="banner-headline">
				
					<span class="headline-wrapper">
					
						<h1><?php echo $banner_headline; ?></h1>
					
					</span>
					
					<div class="headline-underline" style="background-color: <?php echo $accent_color; ?>;"></div>
				
				</div>
			
			</div>
		
		</div>
	
	</div>

</div>


<?php endif; ?>