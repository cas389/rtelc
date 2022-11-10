<?php
/* ======================================

  Adding Stylsheets and JavaScripts Files

====================================== */
  function custom_theme_scripts(){
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    // Main CSS Stylesheet
    wp_enqueue_style('main-styles', get_stylesheet_uri());

    // Adobe Fonts
    wp_enqueue_style('custom_font', 'https://use.typekit.net/oaj0qtu.css', array(), null, 'all');

    // JavaScript File
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js');
  }

  add_action('wp_enqueue_scripts', 'custom_theme_scripts');

  /* ======================================

    Adding Featured Images

  ====================================== */
  add_theme_support('post-thumbnails');


  /* ======================================

    Custom Header Image (Logo)

  ====================================== */
  $custom_image_header = array(
    'width'   => 220,
    'height'  => 125,
    'uploads' => true
  );

  add_theme_support('custom-header', $custom_image_header);

  /* ======================================

    Post Data Information of Author and Date

  ====================================== */
  function post_data(){
    $archive_year   = get_the_time('Y');
    $archive_month  = get_the_time('m');
    $archive_day    = get_the_time('d');
    ?>

    <p class="post-data">
      Written by: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a> <br />
      Published on: <a href="<?php echo get_day_link($archive_year,$archive_month,$archive_day); ?>"><?php echo "$archive_month/$archive_day/$archive_year"; ?></a>
    </p>
  <?php
  }

  function post_data_for_single_posts(){
    $archive_year   = get_the_time('Y');
    $archive_month  = get_the_time('m');
    $archive_day    = get_the_time('d');
    ?>

    <p class="post-data-for-single-posts">
      Written by: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a> • Published on: <a href="<?php echo get_day_link($archive_year,$archive_month,$archive_day); ?>"><?php echo "$archive_month/$archive_day/$archive_year"; ?></a>
    </p>
  <?php
  }

  /* ======================================

    Add Menus to the Theme

  ====================================== */
  function register_my_menus(){
    register_nav_menus(array(
      'main-menu'     => __('Main Menu'),
      'center-footer-links'   => __('Center Footer Menu'),
    ));
  }

  add_action('init','register_my_menus');

  /* ======================================

    Pagination Links

  ====================================== */

  function pagination_for_site(){
    global $wp_query;

    $big = 999999999; // need an unlikely integer
    $translated = __( 'Page', 'mytextdomain' ); // Supply translatable string

    echo paginate_links( array(
      'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format'             => '?paged=%#%',
      'current'            => max( 1, get_query_var('paged') ),
      'total'              => $wp_query->max_num_pages,
      'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
    ));
  }

  /* ======================================

    Creating Widget Areas

  ====================================== */
  function blank_widgets_init(){
    register_sidebar(array(
      'name'          => ('Home Page Widget - Programs Left'),
      'id'            => 'left-home-page-widget-programs',
      'description'   => 'Left Area in the Programs Section on Home Page',
      'before_widget' => '<div class="left-home-page-widget-programs">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Home Page Widget - Programs Middle'),
      'id'            => 'middle-home-page-widget-programs',
      'description'   => 'Middle Area in the Programs Section on Home Page',
      'before_widget' => '<div class="middle-home-page-widget-programs">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Home Page Widget - Programs Right'),
      'id'            => 'right-home-page-widget-programs',
      'description'   => 'Right Area in the Programs Section on Home Page',
      'before_widget' => '<div class="right-home-page-widget-programs">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Instagram Feed'),
      'id'            => 'instagram-feed',
      'description'   => 'Displays Instagram Feed',
      'before_widget' => '<div class="instagram-feed">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Left Footer Widget'),
      'id'            => 'left-footer',
      'description'   => 'Displays a Widget for the Left Footer',
      'before_widget' => '<div class="left-footer">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Right Footer Widget'),
      'id'            => 'right-footer',
      'description'   => 'Displays a Widget for the Right Footer',
      'before_widget' => '<div class="right-footer">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Right Sidebar'),
      'id'            => 'right-sidebar',
      'description'   => 'Displays a Widget on the Right Sidebar',
      'before_widget' => '<div class="right-sidebar">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

  }

  add_action('widgets_init', 'blank_widgets_init');

  /* ======================================

    Social Media Icons Function from WPGossip.com

  ====================================== */
  function beshar_customizer($wp_customize){
    $wp_customize->add_section(
  		'social_icons_sec',
  		array(
  			'title'	       => __( 'Social Icons' ),
  			 'description' => 'Social Icon Section'
  		)
  	);
    $wp_customize->add_setting(
    		'social_facebook',
    		array(
    			'default'           => '',
    			'sanitize_callback' => 'esc_url_raw'
    		)
    	);
    $wp_customize->add_control(
    	'social_facebook',
    	array(
    		'settings'	=> 'social_facebook',
    		'section'		=> 'social_icons_sec',
    		'type'			=> 'url',
    		'label'			=> __( 'Facebook')
    		)
    	);
    $wp_customize->add_setting(
    	'social_twitter',
    	array(
    		'default'           => '',
    		'sanitize_callback' => 'esc_url_raw'
    		)
    	);
    $wp_customize->add_control(
    	'social_twitter',
    	array(
    		'settings'	=> 'social_twitter',
    		'section'		=> 'social_icons_sec',
    		'type'			=> 'url',
    		'label'			=> __( 'Twitter')
    		)
    	);
    $wp_customize->add_setting(
    	'social_youtube',
    	array(
    		'default'           => '',
    		'sanitize_callback' => 'esc_url_raw'
    	 )
    	);
    $wp_customize->add_control(
    	'social_youtube',
    	array(
    		'settings'	=> 'social_youtube',
    		'section'		=> 'social_icons_sec',
    		'type'			=> 'url',
    		'label'			=> __( 'Youtube')
    		)
    	);
    $wp_customize->add_setting(
      'social_pinterest',
      array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
       )
      );
    $wp_customize->add_control(
      'social_pinterest',
      array(
        'settings'	=> 'social_pinterest',
        'section'		=> 'social_icons_sec',
        'type'			=> 'url',
        'label'			=> __( 'Pinterest')
        )
      );
    $wp_customize->add_setting(
      'social_linkedin',
      array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
       )
      );
    $wp_customize->add_control(
      'social_linkedin',
      array(
        'settings'	=> 'social_linkedin',
        'section'		=> 'social_icons_sec',
        'type'			=> 'url',
        'label'			=> __( 'Linkedin')
        )
      );
    $wp_customize->add_setting(
      'social_instagram',
      array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
       )
      );
    $wp_customize->add_control(
      'social_instagram',
      array(
        'settings'	=> 'social_instagram',
        'section'		=> 'social_icons_sec',
        'type'			=> 'url',
        'label'			=> __( 'Instagram')
        )
      );
    }
    add_action('customize_register', 'beshar_customizer');

  function social_links(){
		$facebook   = get_theme_mod('social_facebook');
		$twitter    = get_theme_mod('social_twitter');
		$pinterest  = get_theme_mod('social_pinterest');
		$youtube    = get_theme_mod('social_youtube');
    $linkedin   = get_theme_mod('social_linkedin');
    $instagram  = get_theme_mod('social_instagram');

		if($facebook)
			echo '<li><a href="'.esc_url( $facebook ).'" target="_blank"><i class="fa fa-facebook"></i></a></li>';

		if($twitter)
			echo '<li><a href="'.esc_url( $twitter ).'" target="_blank"><i class="fa fa-twitter"></i></a></li>';

		if($youtube)
			echo '<li><a href="'.esc_url( $youtube ).'" target="_blank"><i class="fa fa-youtube"></i></a></li>';

    if($pinterest)
      echo '<li><a href="'.esc_url( $pinterest ).'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';

    if($linkedin)
      echo '<li><a href="'.esc_url( $linkedin ).'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';

    if($instagram)
      echo '<li><a href="'.esc_url( $instagram ).'" target="_blank"><i class="fa fa-instagram"></i></a></li>';
  }
  add_action( 'social-media-links', 'social_links');

  /* ======================================

   Changing Excerpt Length (Coding by A2 Hosting)

  ====================================== */
  function new_excerpt_length($length) {
    return 30;
  }

  add_filter('excerpt_length', 'new_excerpt_length');


  /* ======================================

   Removes Error (Learned in live class!)

  ====================================== */
  remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

 ?>
