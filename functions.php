<?php
/* ======================================

  Adding Stylsheets and JavaScripts Files

====================================== */
  function custom_theme_scripts(){
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');

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
      'center-footer-links'   => __('Center Footer Menu'),
      'main-menu'             => __('Main Menu'),
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
      'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>',
      'after_page_number'  => ' • '
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
      'name'          => ('Right Sidebar on Pages'),
      'id'            => 'right-sidebar-pages',
      'description'   => 'Displays a Widget on the Right Sidebar on Pages',
      'before_widget' => '<div class="right-sidebar-pages">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Right Sidebar on Posts'),
      'id'            => 'right-sidebar-posts',
      'description'   => 'Displays a Widget on the Right Sidebar on Posts',
      'before_widget' => '<div class="right-sidebar-posts">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));


    register_sidebar(array(
      'name'          => ('Contact Page - Location'),
      'id'            => 'contact-location',
      'description'   => 'Displays a Widget for the Location Section on the Contact Page',
      'before_widget' => '<div class="contact-location">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Contact Page - Email'),
      'id'            => 'contact-email',
      'description'   => 'Displays a Widget for the Email Section on the Contact Page',
      'before_widget' => '<div class="contact-email">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Contact Page - Phone Number'),
      'id'            => 'contact-phone',
      'description'   => 'Displays a Widget for the Phone Number Section on the Contact Page',
      'before_widget' => '<div class="contact-phone">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

  }

  add_action('widgets_init', 'blank_widgets_init');

  /* ======================================

    Social Media Icons Function

  ====================================== */
  function socialMediaIcons($wp_customize){
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
    $wp_customize->add_setting(
      'social_tiktok',
      array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
       )
      );
    $wp_customize->add_control(
      'social_tiktok',
      array(
        'settings'	=> 'social_tiktok',
        'section'		=> 'social_icons_sec',
        'type'			=> 'url',
        'label'			=> __( 'Tiktok')
        )
      );
    $wp_customize->add_setting(
      'social_snapchat',
      array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
       )
      );
    $wp_customize->add_control(
      'social_snapchat',
      array(
        'settings'	=> 'social_snapchat',
        'section'		=> 'social_icons_sec',
        'type'			=> 'url',
        'label'			=> __( 'Snapchat')
        )
      );
    }
    add_action('customize_register', 'socialMediaIcons');

  function social_links(){
		$facebook   = get_theme_mod('social_facebook');
		$twitter    = get_theme_mod('social_twitter');
		$pinterest  = get_theme_mod('social_pinterest');
		$youtube    = get_theme_mod('social_youtube');
    $linkedin   = get_theme_mod('social_linkedin');
    $instagram  = get_theme_mod('social_instagram');
    $snapchat   = get_theme_mod('social_snapchat');
    $tiktok     = get_theme_mod('social_tiktok');

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

    if($tiktok)
      echo '<li><a href="'.esc_url( $tiktok ).'" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>';

    if($snapchat)
      echo '<li><a href="'.esc_url( $snapchat ).'" target="_blank"><i class="fa-brands fa-snapchat"></i></a></li>';
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

  /* ======================================

    Breadcrumb Coding for Website

  ====================================== */
  function BreadcrumFunction() {
    $delimiter = '&nbsp; <i class="fa-solid fa-angles-right"></i> &nbsp;';
    $name = '<i class="fa-solid fa-house-chimney"></i> Home'; //text for the 'Home' link
    $currentBefore = '<span class="current">';
    $currentAfter = '</span>';

    if ( !is_home() || !is_front_page() || is_paged () ) {

      echo '<div class="wrap" id="crumbs">';

      global $post;
      $home = get_bloginfo('url');
      echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

      if ( is_category() ) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $currentBefore . 'Archive by category &#39;';
        single_cat_title();
        echo '&#39;' . $currentAfter;

      } elseif ( is_day() ) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $currentBefore . get_the_time('d') . $currentAfter;

      } elseif ( is_month() ) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $currentBefore . get_the_time('F') . $currentAfter;

      } elseif ( is_year() ) {
        echo $currentBefore . get_the_time('Y') . $currentAfter;

      } elseif ( is_single() && !is_attachment() ) {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $currentBefore;
        the_title();
        echo $currentAfter;

      } elseif ( is_attachment() ) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $currentBefore;
        the_title();
        echo $currentAfter;

      } elseif ( is_page() && !$post->post_parent ) {
        echo $currentBefore;
        the_title();
        echo $currentAfter;

      } elseif ( is_page() && $post->post_parent ) {
        $parent_id  = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
        echo $currentBefore;
        the_title();
        echo $currentAfter;

      } elseif ( is_search() ) {
        echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;

      } elseif ( is_tag() ) {
        echo $currentBefore . 'Posts tagged &#39;';
        single_tag_title();
        echo '&#39;' . $currentAfter;

      } elseif ( is_author() ) {
         global $author;
        $userdata = get_userdata($author);
        echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;

      } elseif ( is_404() ) {
        echo $currentBefore . 'Error 404' . $currentAfter;
      }

      if ( get_query_var('paged') ) {
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
        echo __('Page') . ' ' . get_query_var('paged');
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
      }

      echo '</div>';

    }
  }
 ?>
