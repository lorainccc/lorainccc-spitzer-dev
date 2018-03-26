<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lorainccc_subsite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'spitzer' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Gateway Menu Sidebar', 'spitzer' ),
		'id'            => 'gateway-menu-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			register_sidebar( array(
		'name'          => esc_html__( 'Calendar Sidebar', 'spitzer' ),
		'id'            => 'calendar-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

		register_sidebar( array(
		'name'          => esc_html__( 'Sub Site Announcement Sidebar', 'spitzer' ),
		'id'            => 'sub-site-announcements-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Dashboard Icons Sidebar', 'spitzer' ),
		'id'            => 'cta-icons-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'LCCC Spotlights Sidebar', 'spitzer' ),
		'id'            => 'lccc-spotlights-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'LCCC Highlights Sidebar', 'spitzer' ),
		'id'            => 'lccc-highlights-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			register_sidebar( array(
		'name'          => esc_html__( 'LCCC Events Sidebar', 'spitzer' ),
		'id'            => 'lccc-events-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			register_sidebar( array(
		'name'          => esc_html__( 'LCCC Announcements Sidebar', 'spitzer' ),
		'id'            => 'lccc-announcements-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			register_sidebar( array(
		'name'          => esc_html__( 'LCCC Badges Sidebar', 'spitzer' ),
		'id'            => 'lccc-badges-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'LCCC Program Pathways Sidebar', 'spitzer' ),
		'id'            => 'lccc-programpathways-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			register_sidebar( array(
		'name'          => esc_html__( 'LCCC 404 Sidebar', 'spitzer' ),
		'id'            => 'lccc-four-o-four-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spitzer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
 	register_sidebar( array(
		'name'          => esc_html__( 'LCCC Search Sidebar', 'lorainccc' ),
		'id'            => 'lccc-search-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'lorainccc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'id'            => 'ss_recent_posts',
		'class'         => 'ss-recent-posts',
		'name'          => __( 'Standard Sub Recent Posts', 'spitzer' ),
		'description'   => __( 'Widget Area Designated for Recent Posts widget', 'spitzer' ),
		'before_widget' => '<div class="sidebar-recent-posts sidebar-widget">',
		'after_widget'  => '</div>',
	));
}
add_action( 'widgets_init', 'lorainccc_subsite_widgets_init' );
