<div class="column row no-js">

	<div class="top-bar">
	
		<div class="top-bar-title">
		
			<a href="<?php echo home_url(); ?>" title="Link to Homepage"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Spitzer-Conference-Center-Logo.jpg" alt="Campana Center for Ideation and Invention of Lorain County Community College" class="logo" height="59" width="338"/></a>
			
		</div>
		
		<div class="top-bar-right full-top-bar show-for-large">
		
			<div class="top-nav-container clearfix">
			
				<div class="float-right">
				
					<img class="search-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-search.png" alt="search" data-toggle="search-container" />
				
				</div>
			
				<div class="float-right">
				
					<?php spitzer_top_nav(); ?>
					
				</div>
				
			</div>
			
			<div class="main-nav-container clearfix">
			
				<div class="float-right">
				
					<?php spitzer_main_nav(); ?>
										
				</div>
							
			</div>
			
		</div>
		
		<div class="top-bar-right float-right offcanvas-top-bar hide-for-large text-right">
		
			<button class="menu-icon dark" type="button" data-toggle="offCanvas"></button>
			
		</div>
		
	</div>
</div>


<?php if( is_active_sidebar('lccc-search-sidebar') ) : ?>
				
<div id="search-container" data-toggler data-animate="fade-in fade-out" class="show-for-large">
						
		<div class="row">
						
			<div class="large-11 columns">

				<?php dynamic_sidebar('lccc-search-sidebar'); ?>
						
			</div>
							
			<div class="large-1 columns">
								
				<img class="search-close" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/search-close.svg" height="35" width="35" alt="close search box" data-toggle="search-container" />
							
			</div>
						
		</div>

	</div>

<?php endif; ?>