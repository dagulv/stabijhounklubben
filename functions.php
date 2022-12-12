<?php
/**
 * staby functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package staby
 */

if ( ! defined( 'staby_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'staby_VERSION', '1.0.0' );
}

if ( ! function_exists( 'staby_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function staby_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on staby, use a find and replace
		 * to change 'staby' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'staby', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		// add_image_size( 'header-medium', 1400, 475);
		add_image_size( 'header-widescreen', 1920);
		add_image_size( 'header-laptop', 1400);
		add_image_size( 'header-mobile', 600, 300);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'staby' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo');

		/* Add excerpt to pages */
		add_post_type_support( 'page', 'excerpt' );
		// wp_get_script_polyfill('dialog-polyfill-script', 'dialog');
	}
endif;
add_action( 'after_setup_theme', 'staby_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function staby_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'staby_content_width', 640 );
}
add_action( 'after_setup_theme', 'staby_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require get_template_directory() . '/inc/custom-widget-sponsor.php';

function staby_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sponsorer', 'staby' ),
			'id'            => 'sponsors',
			'description'   => esc_html__( 'Add sponsorwidgets here.', 'staby' ),
			'before_widget' => '<div class="sponsor-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'staby' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'staby' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s post-item">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'staby' ),
			'id'            => 'footer-sidebar',
			'description'   => esc_html__( 'Add footer widgets here.', 'staby' ),
			'before_widget' => '<ul>',
			'after_widget'  => '</ul>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_widget('Widget_Staby_Sponsors');
}
add_action( 'widgets_init', 'staby_widgets_init' );




function staby_google_fonts() {
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap', false);
	wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap', false);
	wp_enqueue_style( 'rubik', 'https://fonts.googleapis.com/css2?family=Rubik&family=Saira+Semi+Condensed:wght@700&display=swap', false);
	wp_enqueue_style( 'work_sans', "https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600&display=swap", false);
}
add_action( 'wp_enqueue_scripts', 'staby_google_fonts');

/**
 * Enqueue scripts and styles.
 */
function staby_scripts() {
	wp_enqueue_style( 'staby-style', get_stylesheet_uri(), array(), time() );
	wp_enqueue_style( 'staby-front-style', get_template_directory_uri() . '/css/front-style.css', ['staby-style'], time() );
	wp_enqueue_style( 'staby-blog-style', get_template_directory_uri() . '/css/blog-style.css', ['staby-style'], time() );
	wp_enqueue_style( 'dialog-polyfill-style', get_template_directory_uri() . '/inc/polyfill/dialog-polyfill.css', array(), time() );
	wp_style_add_data( 'staby-style', 'rtl', 'replace' );

	wp_enqueue_script( 'staby-custom-script', get_template_directory_uri() . '/js/custom-script.js', array(), staby_VERSION, true);
	wp_enqueue_script( 'dialog-polyfill-script', get_template_directory_uri() . '/inc/polyfill/dialog-polyfill.js', array(), staby_VERSION, true);
	wp_enqueue_script( 'dialog-polyfill-script-activate', get_template_directory_uri() . '/js/dialog-polyfill.js', ['dialog-polyfill-script'], staby_VERSION, true);
	
	// wp_enqueue_script( 'staby-navigation', get_template_directory_uri() . '/js/navigation.js', array(), staby_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//Ajax script loader
	if (!is_user_logged_in()) {
		wp_enqueue_script( 'staby-login-handler', get_template_directory_uri() . '/js/staby_login_handler.js', array("jquery"), staby_VERSION, true);
		wp_localize_script( 'staby-login-handler', 'staby_login_ajax_object', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce('user_login_nonce'),
			'home_url' => home_url('/medlem')
		));
	}
}
add_action( 'wp_enqueue_scripts', 'staby_scripts' );

/****** Enqueue theme block editor scripts. *********/
/***** Gutenberg editor custom styles ********/
function staby_gutenberg_scripts() {
	wp_enqueue_script( 
		'staby-gutenberg-script', 
		get_template_directory_uri(). '/js/guten.js',
		array('wp-blocks', 'wp-dom-ready', 'wp-edit-post', 'wp-hooks')
	);
}
add_action( 'enqueue_block_editor_assets', 'staby_gutenberg_scripts' );
function staby_gutenberg_styles() {
	wp_enqueue_style('staby-gutenberg-style', get_template_directory_uri(). '/css/guten.css');
}
add_action( 'enqueue_block_assets', 'staby_gutenberg_styles' );

// /*  Custom function list child pages  */

// function staby_wp_list_pages() {
// 	global $post;
// 	if (is_page() && $post->post_parent) {
// 		$
// 	}
// }

//Excerpt length
add_filter( 'excerpt_length', function( $length ) { return 30; } );


// login shortcode
function staby_add_login_form_shortcode() {
	add_shortcode('staby_login_form', 'staby_login_shortcode');
	function staby_login_shortcode() {
		if (!is_user_logged_in()):
			require get_template_directory() . '/inc/login-popup-form.php';
		endif;
	}
}
add_action('init', 'staby_add_login_form_shortcode');

// // Login redirect
// function redirect_login_page() {
// 	$login_page  = home_url( '/' );
// 	$page_viewed = basename($_SERVER['REQUEST_URI']);

// 	if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
// 		wp_redirect($login_page);
// 		exit;
// 	}
// }
// add_action('init','redirect_login_page');

//  function login_failed() {
// 	$login_page  = home_url( '/' );
// 	wp_redirect( $login_page . '?login=failed' );
// 	exit;
//   }
//   add_action( 'wp_login_failed', 'login_failed' );
   
//   function verify_username_password( $user, $username, $password ) {
// 	$login_page  = home_url( '/' );
// 	  if( $username == "" || $password == "" ) {
// 		  wp_redirect( $login_page . "?login=empty" );
// 		  exit;
// 	  }
//   }
//   add_filter( 'authenticate', 'verify_username_password', 1, 3);

  function staby_logout_page() {
	wp_redirect( home_url( '/' ) );
	exit;
  }
  add_action('wp_logout','staby_logout_page');

 

//Ajax login/registration handler
add_action('wp_ajax_nopriv_staby_login_message', 'staby_ajax_login_handler');
// add_action('wp_ajax_staby_login_message', 'staby_ajax_login_handler');
function staby_ajax_login_handler() {
	check_ajax_referer('user_login_nonce');

	$params = array();
	$params['user_login'] = sanitize_text_field($_POST['username']);
	$params['user_password'] = sanitize_text_field($_POST['password']);
	$params['remember'] = true;
	
	if (is_email(sanitize_email($_POST['username']))) {
		$params['user_login'] = sanitize_email($_POST['username']);
		$user = get_user_by('email', $params['user_login']);
		if(empty($user)) {
			wp_send_json(array('loggedIn'=>false, 'message'=>__('Fel mejl eller lösenord')));
		}
		$params['user_login'] = $user->user_login;
	} 
	else {
		$user = get_user_by('login', $params['user_login']);
		if(empty($user)) {
			wp_send_json(array('loggedIn'=>false, 'message'=>__('Fel användarnamn eller lösenord')));
		}
	}
	
	$user = wp_signon($params, false);
	
	if (is_wp_error($user)) {
		wp_send_json(array('loggedIn'=>false, 'message'=>__('Fel användarnamn eller lösenord')));
    }
    wp_send_json(array('loggedIn'=>true, 'message'=>__('Inloggning lyckad, omdirigeras...')));	
}




  //Remove adminbar for non-admins
  add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (current_user_can('subscriber') && !is_admin()) {
	show_admin_bar(false);
	}
}

// Added name and mail to comment
add_filter( 'comment_form_default_fields', 'staby_comment_form_fields');
function staby_comment_form_fields( $fields ) {
	unset($fields['author']);
	unset($fields['email']);

	$fields['author'] = '<p class="comment-form-author"><br /><input id="author" name="author" aria-required="true" placeholder="Namn"></input></p>';
	$fields['email'] = '<p class="comment-form-email"><br /><input id="email" name="email" placeholder="Email"></input></p>';
	
	return $fields;
}


// Custom Comment List
function staby_comment_list($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
<<?php echo esc_html($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
    id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="comment-author vcard">
            <?php 
            printf( __( '<div class="fn">%s</div> ' ), get_comment_author_link() ); ?>
            <div class="comment-bullet">&#8226;</div>
            <div class="comment-meta commentmetadata">
                <a href="<?php echo esc_url(htmlspecialchars( get_comment_link( $comment->comment_ID ) )); ?>"><?php
                /* translators: 1: date, 2: time */
                printf( esc_html__( '%s sedan', 'textdomain' ), human_time_diff(get_comment_time ( 'U' ), current_time( 'timestamp' ) ) ); ?>
                </a><?php 
            edit_comment_link( __( '(Redigera)' ), '  ', '' ); ?>
            </div>
        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Din kommentar inväntar moderation' ); ?></em><br /><?php 
        } ?>


        <div class="comment-text"><?php comment_text(); ?></div>
		
        <div class="reply">
			
			<?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
							'add_below' => $add_below,
							'reply_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none">
							<path d="M7.89797 1.51956C7.9311 1.50497 7.96737 1.49895 8.00344 1.50204C8.03951 1.50514 8.07423 1.51724 8.1044 1.53726C8.13456 1.55727 8.15922 1.58454 8.17609 1.61657C8.19297 1.6486 8.20152 1.68436 8.20097 1.72056V3.45006C8.20097 3.64897 8.27998 3.83974 8.42064 3.98039C8.56129 4.12104 8.75206 4.20006 8.95097 4.20006C9.95147 4.20006 11.9705 4.20756 13.901 5.43306C15.377 6.36906 16.886 8.07306 17.7935 11.2471C16.2635 9.77256 14.516 8.97306 12.986 8.54856C12.0455 8.28882 11.0791 8.13486 10.1045 8.08956C9.70554 8.07204 9.30596 8.07605 8.90747 8.10156H8.88797L8.88047 8.10306H8.87897L8.95097 8.85006L8.87597 8.10306C8.69084 8.12167 8.51924 8.20842 8.3945 8.34647C8.26975 8.48452 8.20078 8.664 8.20097 8.85006V10.5796C8.20097 10.7416 8.03597 10.8436 7.89797 10.7806L1.92197 6.38106C1.90168 6.36601 1.88066 6.352 1.85897 6.33906C1.82635 6.31946 1.79936 6.29175 1.78063 6.25864C1.76189 6.22552 1.75204 6.18811 1.75204 6.15006C1.75204 6.11201 1.76189 6.0746 1.78063 6.04149C1.79936 6.00837 1.82635 5.98066 1.85897 5.96106C1.88066 5.94813 1.90169 5.93411 1.92197 5.91906L7.89797 1.51956ZM9.70097 9.57906C9.80297 9.57906 9.91547 9.58356 10.0355 9.58806C10.6865 9.61806 11.5865 9.71706 12.5855 9.99456C14.5745 10.5466 16.9295 11.7976 18.4955 14.6146C18.5802 14.7666 18.7151 14.8845 18.8771 14.948C19.0392 15.0115 19.2183 15.0166 19.3837 14.9625C19.5492 14.9084 19.6907 14.7985 19.7839 14.6515C19.8772 14.5046 19.9165 14.3298 19.895 14.1571C19.199 8.59206 17.066 5.66406 14.705 4.16706C12.8375 2.98206 10.9145 2.75406 9.70097 2.71056V1.72056C9.70111 1.41166 9.61786 1.10846 9.46002 0.842932C9.30218 0.577407 9.07559 0.359412 8.80417 0.211948C8.53274 0.0644844 8.22654 -0.0069799 7.91788 0.0050963C7.60922 0.0171725 7.30954 0.112341 7.05047 0.280561L1.05947 4.69056C0.811788 4.84516 0.607527 5.06026 0.465915 5.31559C0.324303 5.57092 0.25 5.85809 0.25 6.15006C0.25 6.44203 0.324303 6.7292 0.465915 6.98453C0.607527 7.23986 0.811788 7.45496 1.05947 7.60956L7.05047 12.0196C7.30954 12.1878 7.60922 12.2829 7.91788 12.295C8.22654 12.3071 8.53274 12.2356 8.80417 12.0882C9.07559 11.9407 9.30218 11.7227 9.46002 11.4572C9.61786 11.1917 9.70111 10.8885 9.70097 10.5796V9.57906Z" fill="#878A8C"/>
							</svg> Svara', 'staby'),
							'reply_to_text' => __( 'Svara %s' ),
							'login_text'    => __( '' ),
                            
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
    	</div><?php 
    endif;
}

//srcset sizes
// function staby_content_images_sizes_attr($size) {
// 	$width = $size[0];
// 	var_dump(get_page_template_slug($post->ID));
// }
// add_filter('wp_calculate_image_sizes', 'staby_content_images_sizes_attr');

//Gallery images frontpage resize
// add_filter( 'shortcode_atts_gallery', 'staby_gallery_atts', 10, 3 );
// function staby_gallery_atts( $output, $pairs, $atts ) {
 
//     $atts = shortcode_atts( array(
// 		'size' => 'medium',
// 	  ), $atts );

// 	  $output['size'] = $atts['size'];
   
// 	  return $output;
 
// }

//Custom Roles (stored to db on theme activations)

		// add_role(
		// 	'styrelsen',
		// 	__( 'Styrelsen', 'staby' ),
		// 	array(
		// 		'pages_id' => array(6911),
		// 		'read' => true,
		// 		'edit_pages' => true,
		// 		'edit_published_pages' => true,
		// 		'edit_others_pages' => true,
		// 		'publish_pages' => true,
		// 		'edit_posts' => true,
		// 		'publish_posts' => true
		// 	)
		// );
		// add_role(
		// 	'avelskommitten',
		// 	__( 'Avelskommittén', 'staby' ),
		// 	array(
		// 		'pages_id' => array(25,27),
		// 		'read' => true,
		// 		'edit_pages' => true,
		// 		'edit_published_pages' => true,
		// 		'edit_others_pages' => true,
		// 		'publish_pages' => true,
		// 		'edit_posts' => true,
		// 		'publish_posts' => true
		// 	)
		// );
		// add_role(
		// 	'jaktkommitten',
		// 	__( 'Jaktkommittén', 'staby' ),
		// 	array(
		// 		'pages_id' => array(29),
		// 		'read' => true,
		// 		'edit_pages' => true,
		// 		'edit_published_pages' => true,
		// 		'edit_others_pages' => true,
		// 		'publish_pages' => true,
		// 		'edit_posts' => true,
		// 		'publish_posts' => true
		// 	)
		// );
		// add_role(
		// 	'specialenkommitten',
		// 	__( 'Specialenkommittén', 'staby' ),
		// 	array(
		// 		'pages_id' => array(33),
		// 		'read' => true,
		// 		'edit_pages' => true,
		// 		'edit_published_pages' => true,
		// 		'edit_others_pages' => true,
		// 		'publish_pages' => true,
		// 		'edit_posts' => true,
		// 		'edit_published_posts' => true,
		// 		'publish_posts' => true
		// 	)
		// );

// I used `init` just for testing.
// add_action( 'init', 'staby_add_pages_id_cap' );
// function staby_add_pages_id_cap() {
// 	if ( ! get_option( 'avelskommitten_pages_id' ) ) {
// 		update_option( 'avelskommitten_pages_id', array( 6911 ) );
// 	}
// }

function staby_cap_filter( $allcaps, $cap, $args, $user ) {
    // Get the current user's roles.
	if (!is_user_logged_in()) {
		return $allcaps;
	}
    $role = (array) $user->roles;
	$pages_options = get_option( $role[0].'_pages_id' );
	if ( is_int($pages_options[0])) {
		$pages_id = $pages_options;
	}
	else {
		$pages_id = array_map('intval', explode(',',get_option( $role[0].'_pages_id' )));
	}
	$rolesArray = ['avelskommitten', 'styrelsen', 'jaktkommitten', 'specialenkommitten', 'utstallningskommitten'];
    /* Do nothing if:
       1. The above roles doesn't include '<role>', or
       2. edit_post is not the capability being checked, or
       3. The post ID was not specified, or
       4. pages_id is empty.
    */
    if ( ! in_array( $role[0], $rolesArray ) ||
        ( 'edit_post' !== $args[0] )  
		|| empty( $args[2] ) || empty( $pages_id )
    ) {
        return $allcaps;
    }

	// If the user being checked is the author of the post (which can be a custom
    // post type), then do nothing.
    if ( (int) $args[1] === (int) get_post_field( 'post_author', $args[2] ) ) {
        return $allcaps;
    }

    // Get the first ancestor of the current post that's being checked.
    $parent_ids   = get_post_ancestors( $args[2] );
    $first_parent = array_pop( $parent_ids );
    $allowed_ids = array_intersect(
        array( $first_parent, $args[2] ),
        $pages_id
    );
	
    // Disable the capability if the post ID is not in the allowed list.
    if ( empty( $allowed_ids ) ) {
        $allcaps[ $cap[0] ] = false;
    }
    return $allcaps;
}
add_filter( 'user_has_cap', 'staby_cap_filter', 10, 4 );

//See if role can edit correspondent page 
function staby_role_can_edit( $user_id, $page_id) {
	$page = get_post( $page_id );
   // let's find the topmost page in the hierarchy
   while( $page && (int) $page->parent ) {
     $page = get_post( $page->parent );
   }
   
   if ( ! $page ) {
     return false;
   }

   $user = new WP_User($user_id);
   if ($user->allcaps['pages_id']) {
	   $user_pages = $user->allcaps['pages_id'];
	   if (!in_array($page->ID, $user_pages)) {
			return false;
	   }
   }
   
   return true;

}
// Add memberpage to only logged in users in menu
add_filter( 'wp_nav_menu_items', 'add_search_to_nav', 10, 2 );
function add_search_to_nav( $items, $args )
{
	// If user is not logged in return
	if ( is_user_logged_in() ) {
		$items .= '<li class="menu-item"><div class="menu-item-link-wrapper"><a class="nav-a drop" href="'.get_page_link(get_page_by_title('Medlem')).'">Medlem</a></div></li>';
	}
    return $items;
}

// Add admin page for configuring specific pages for respective roles
add_action( 'admin_menu', 'staby_add_admin_page');
function staby_add_admin_page()  {
	add_menu_page('Inställningar för roller', 'Roller', 'manage_options', 'staby_roles_menu', 'staby_create_admin_page', '', 99);
	add_action('admin_init', 'staby_role_settings');
}
function staby_role_settings() {
	register_setting('staby-settings-group', 'avelskommitten_pages_id', 'staby_santize_field');
	register_setting('staby-settings-group', 'jaktkommitten_pages_id', 'staby_santize_field');
	register_setting('staby-settings-group', 'specialenkommitten_pages_id', 'staby_santize_field');
	register_setting('staby-settings-group', 'utstallningskommitten_pages_id', 'staby_santize_field');
	add_settings_section('staby-roles-options', '', 'staby_roles_options', 'staby_roles_menu');
	add_settings_field('role-avel', 'Avelskommittén', 'staby_role_avel', 'staby_roles_menu', 'staby-roles-options');
	add_settings_field('role-jakt', 'Jaktkommittén', 'staby_role_jakt', 'staby_roles_menu', 'staby-roles-options');
	add_settings_field('role-special', 'Specialenkommittén', 'staby_role_special', 'staby_roles_menu', 'staby-roles-options');
	add_settings_field('role-utstall', 'Utställningskommittén', 'staby_role_utstall', 'staby_roles_menu', 'staby-roles-options');
}
function staby_roles_options() {
	echo 'Ändra rollernas sidor. Gör såhär: <ul><li>Gå in på sidans toppförälder.</li><li>Kopiera idnumret från sökfältet i webbläsaren.</li><li>Klistra in idnumret i textrutan för rollen.<li>';
}
function staby_sanitize_field( $input ) {
	$output = sanitize_text_field($input);
	return $output;
}
function staby_role_avel() {
	$avel = esc_attr( get_option('avelskommitten_pages_id') );
	echo '<input type="text" name="avelskommitten_pages_id" value="'.$avel.'" placeholder="Id för avelskommittén" />';
}
function staby_role_jakt() {
	$jakt = esc_attr( get_option('jaktkommitten_pages_id') );
	echo '<input type="text" name="jaktkommitten_pages_id" value="'.$jakt.'" placeholder="Id för jaktkommittén" />';
}
function staby_role_special() {
	$special = esc_attr( get_option('specialenkommitten_pages_id') );
	echo '<input type="text" name="specialenkommitten_pages_id" value="'.$special.'" placeholder="Id för specialenkommittén" />';
}
function staby_role_utstall() {
	$utstall = esc_attr( get_option('utstallningskommitten_pages_id') );
	echo '<input type="text" name="utstallningskommitten_pages_id" value="'.$utstall.'" placeholder="Id för utställningskommittén" />';
}
function staby_create_admin_page() {
	require_once( get_template_directory() . '/inc/custom-admin.php');
}

// add_action('init', 'staby_forgot_password');
// function staby_forgot_password() {
// 	if(isset($_POST['form_forgot_pass'])) {
// 		$to = 'yerena2044@upshopt.com';
// 		$subject = 'The subject';
// 		$body = 'The email body content';
// 		$headers = array('Content-Type: text/html; charset=UTF-8');
//  		wp_mail( $to, $subject, $body, $headers );
// 	}
// }
//Forgot username/password
add_action('init', 'staby_forgot_password');
function staby_forgot_password() {
	if(isset($_POST['form_forgot_pass'])) {
		if(!empty($_POST['emailToReceive'])) {
			$email = esc_sql(trim($_POST['emailToReceive']));

			if ( strpos($email, '@') ) {
				$user_data = get_user_by( 'email', $email ); 
				if(empty($user_data) ) {
					$errors['invalid_email'] = 'Invalid E-mail address!'; 
				}
		   }
		   if(empty($errors)) { 
			if(staby_forgot_password_reset_email($user_data->user_email)) {
				 $success['reset_email'] = "We have just sent you an email with Password reset instructions.";
			} else {
				 $errors['emailError'] = "Email failed to send for some unknown reason."; 
			} //emailing password change request details to the user 
	   }
		}
	}
	if(isset($_GET['key']) && $_GET['action'] == "reset_pwd") { 
		$reset_key = $_GET['key'];
		$user_login = $_GET['login'];
		$user_data = $wpdb->get_row("SELECT ID, user_login, user_email FROM $wpdb->users WHERE user_activation_key = '".$reset_key."' AND user_login = '". $user_login."'");
		$user_login = $user_data->user_login;
		$user_email = $user_data->user_email;
		if(!empty($reset_key) && !empty($user_data)) {
			if ( staby_rest_setting_password($reset_key, $user_login, $user_email, $user_data->ID) ) {
				$errors['emailError'] = "Email failed to sent for some unknown reason"; 
			}
			else {
				$redirect_to = get_site_url()."/login?action=reset_success";
				wp_safe_redirect($redirect_to);
				exit();
			}
		}
		else exit('Not a Valid Key.'); 
	}
} 	
function staby_forgot_password_reset_email($user_input) {
	global $wpdb; 
	$user_data = get_user_by( 'email', $user_input ); 
	$user_login = $user_data->user_login;
	$user_email = $user_data->user_email;

	$key = $wpdb->get_var("SELECT user_activation_key FROM $wpdb->users WHERE user_login ='".$user_login."'");
	if(empty($key)) {
	//generate reset key
		$key = wp_generate_password(20, false);
		$wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
	}

	$message = __('Someone requested that the password be reset for the following account:') . "<br><br><br>";
	$message .= get_option('siteurl') . "<br><br>";
	$message .= sprintf(__('Username: %s'), $user_login) . "<br><br><br>";
	$message .= __('If this was a error, just ignore this email as no action will be taken.') . "<br><br>";
	$message .= __('To reset your password, visit the following address:') . "<br><br>";
	$message .= '<a href="'.staby_validate_url() . "action=reset_pwd&key=$key&login=" . rawurlencode($user_login) . '" > '.staby_validate_url() . "action=reset_pwd&key=$key&login=" . rawurlencode($user_login) ."</a><br><br>";

	if ( $message && !wp_mail($user_email, 'Password Reset Request', $message) ) {
	$msg = false ; 
	}
	else $msg = true; 

	return $msg ; 
}
function staby_rest_setting_password($reset_key, $user_login, $user_email, $ID) {
 
	$new_password = wp_generate_password(7, false); //you can change the number 7 to whatever length needed for the new password
	wp_set_password( $new_password, $ID ); //mailing the reset details to the user

	$message = __('Your new password for the account at:') . "<br><br>";
	$message .= get_bloginfo('name') . "<br><br>";
	$message .= sprintf(__('Username: %s'), $user_login) . "<br><br>";
	$message .= sprintf(__('Password: %s'), $new_password) . "<br><br>";
	$message .= __('You can now login with your new password at: ').'<a href="'.get_option('siteurl')."/login" .'" >' . get_option('siteurl')."/login" . "</a> <br><br>";

	if ( $message && !wp_mail($user_email, 'Your New Password to login into eimams', $message) ) {
		 $msg = false; 
	} else {
		 $msg = true; 
		 $redirect_to = get_site_url()."/login?action=reset_success";
		 wp_safe_redirect($redirect_to);
		 exit();
	} 

	return $msg; 
}
function staby_validate_url() {
	$page_url = esc_url(get_permalink( home_url() ));
	$urlget = strpos($page_url, "?");
	if ($urlget === false) {
		$concate = "?";
	} else {
		$concate = "&";
	}
	return $page_url.$concate;
}

add_action('init', 'staby_add_sponsor_shortcode');
function staby_add_sponsor_shortcode() {
	
	function staby_add_shortcode_sponsor() {
		if ( !is_active_sidebar( 'sponsors' ) ) :
			return;
		endif;
		ob_start();
		require_once get_template_directory() . '/inc/sponsors.php';
		$sponsor = ob_get_clean();
		return $sponsor;
	}
	add_shortcode('staby_sponsor_shortcode', 'staby_add_shortcode_sponsor');
}

add_action('init', 'staby_add_breeder_shortcode');
function staby_add_breeder_shortcode() {
	
	function staby_add_shortcode_breeder() {
		if ( !is_active_sidebar( 'sponsors' ) ) :
			return;
		endif;
		ob_start();
		require_once get_template_directory() . '/inc/uppfodare.php';
		$sponsor = ob_get_clean();
		return $sponsor;
	}
	add_shortcode('staby_uppfödare_shortcode', 'staby_add_shortcode_breeder');
}
//Find pages with template
function wpdocs_get_pages_by_template_filename( $page_template_filename ) {
	return get_pages( array(
		'meta_key' => '_wp_page_template',
		'meta_value' => $page_template_filename
	) );
}
// function staby_debug () {
// 	// $role = get_role( 'styrelsen' );
// 	// $author = get_role( 'editor' );
// 	$current = new WP_User(get_current_user_id());
	
// 	$user = new WP_User($current->ID);
// 	$user_pages = $user->allcaps['pages_id'];
// 	if (!in_array(6911, $user_pages)) {
// 		 return false;
// 	}
	
// 		// var_dump($author->capabilities);
// 		// var_dump($current->allcaps);
// 		// var_dump($current->allcaps['pages_id']);
// }
// add_action('init', 'staby_debug');

// /**
//  * Implement the Custom Header feature.
//  */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

// /**
//  * Functions which enhance the theme by hooking into WordPress.
//  */
// require get_template_directory() . '/inc/template-functions.php';

// /**
//  * Customizer additions.
//  */
// require get_template_directory() . '/inc/customizer.php';

// /**
//  * Load Jetpack compatibility file.
//  */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/* Walker sub-menu */
require get_template_directory() . '/inc/custom-walker-nav.php';