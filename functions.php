<?php

add_action("wp_enqueue_scripts", "bt_enqueue_frontend", 11);

function bt_enqueue_frontend() {

    wp_enqueue_script('bt_js', get_template_directory_uri().'/js/production.min.js', array('jquery'), '1.2', false);
   wp_enqueue_script( 'google_js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyDMXiIXW6fNzDDmuj64J_dFJXyz0TUYqyA', '', '' );
    wp_localize_script( 'bt_js', 'ajax_bt', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
    
    $mtime = filemtime(dirname(__FILE__) . '/css/style.css');

    wp_register_style( 'bt-stylesheet', get_bloginfo('template_url') . '/css/style.min.css', array(), $mtime, 'all');

    wp_enqueue_style( 'bt-stylesheet' );
    
}
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/admin/admin.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/*
* Creating a function to create our CPT
*/
 
function bt_post_type() {
 
// Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x( 'Promos', 'Post Type General Name', 'twentythirteen' ),
    'singular_name'       => _x( 'Promo', 'Post Type Singular Name', 'twentythirteen' ),
    'menu_name'           => __( 'Promos', 'twentythirteen' ),
    'parent_item_colon'   => __( 'Parent Promo', 'twentythirteen' ),
    'all_items'           => __( 'All Promos', 'twentythirteen' ),
    'view_item'           => __( 'View Promo', 'twentythirteen' ),
    'add_new_item'        => __( 'Add New Promo', 'twentythirteen' ),
    'add_new'             => __( 'Add New Promo', 'twentythirteen' ),
    'edit_item'           => __( 'Edit Promo', 'twentythirteen' ),
    'update_item'         => __( 'Update Promo', 'twentythirteen' ),
    'search_items'        => __( 'Search Promos', 'twentythirteen' ),
    'not_found'           => __( 'Not Found', 'twentythirteen' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
  );
     
// Set other options for Custom Post Type
     
  $args = array(
    'label'               => __( 'promos', 'twentythirteen' ),
    'description'         => __( 'Featured Promos', 'twentythirteen' ),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'excerpt'),
    // You can associate this CPT with a taxonomy or custom taxonomy. 
    // 'taxonomies'          => array( 'project-cats' ),
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */ 
    'taxonomies'  => array( 'category' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_rest'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
     
// Registering your Custom Post Type
  register_post_type( 'promos', $args );
 
}
add_action( 'init', 'bt_post_type', 0 );

function create_projects_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project_type' ),
    );

    register_taxonomy( 'projects_categories', array( 'projects' ), $args );
}
add_action( 'init', 'create_projects_taxonomies', 0 );

function bt_testimonials() {
 
// Set UI labels for Custom Post Type
  $labels2 = array(
    'name'                => _x( 'Testimonials', 'Post Type General Name', 'twentythirteen' ),
    'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'twentythirteen' ),
    'menu_name'           => __( 'Testimonials', 'twentythirteen' ),
    'parent_item_colon'   => __( 'Parent Testimonial', 'twentythirteen' ),
    'all_items'           => __( 'All Testimonials', 'twentythirteen' ),
    'view_item'           => __( 'View Testimonial', 'twentythirteen' ),
    'add_new_item'        => __( 'Add New Testimonial', 'twentythirteen' ),
    'add_new'             => __( 'Add New', 'twentythirteen' ),
    'edit_item'           => __( 'Edit Testimonial', 'twentythirteen' ),
    'update_item'         => __( 'Update Testimonial', 'twentythirteen' ),
    'search_items'        => __( 'Search Testimonials', 'twentythirteen' ),
    'not_found'           => __( 'Not Found', 'twentythirteen' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
  );
     
// Set other options for Custom Post Type
     
  $args2 = array(
    'label'               => __( 'testimonials', 'twentythirteen' ),
    'description'         => __( 'Featured Landscaping Projects', 'twentythirteen' ),
    'labels'              => $labels2,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', ),
    // You can associate this CPT with a taxonomy or custom taxonomy. 
    'taxonomies'  => array( 'category', 'genres' ),
    
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */ 
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
     
// Registering your Custom Post Type
  register_post_type( 'testimonials', $args2 );
 
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'bt_testimonials', 0 );

function ffcu_moneyschool() {
 
// Set UI labels for Custom Post Type
  $labels2 = array(
    'name'                => _x( 'MoneySchool Tips', 'Post Type General Name', 'twentythirteen' ),
    'singular_name'       => _x( 'MoneySchool Tip', 'Post Type Singular Name', 'twentythirteen' ),
    'menu_name'           => __( 'MoneySchool Tips', 'twentythirteen' ),
    'parent_item_colon'   => __( 'Parent MoneySchool Tip', 'twentythirteen' ),
    'all_items'           => __( 'All MoneySchool Tips', 'twentythirteen' ),
    'view_item'           => __( 'View MoneySchool Tip', 'twentythirteen' ),
    'add_new_item'        => __( 'Add New MoneySchool Tip', 'twentythirteen' ),
    'add_new'             => __( 'Add New', 'twentythirteen' ),
    'edit_item'           => __( 'Edit MoneySchool Tip', 'twentythirteen' ),
    'update_item'         => __( 'Update MoneySchool Tip', 'twentythirteen' ),
    'search_items'        => __( 'Search MoneySchool Tips', 'twentythirteen' ),
    'not_found'           => __( 'Not Found', 'twentythirteen' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
  );
     
// Set other options for Custom Post Type
     
  $args2 = array(
    'label'               => __( 'moneyschool', 'twentythirteen' ),
    'description'         => __( 'MoneySchool 101 and Tuesday Tips', 'twentythirteen' ),
    'labels'              => $labels2,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', ),
    // You can associate this CPT with a taxonomy or custom taxonomy. 
    'taxonomies'  => array( 'category', 'genres' ),
    
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */ 
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
     
// Registering your Custom Post Type
  register_post_type( 'moneyschool', $args2 );
 
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'ffcu_moneyschool', 0 );

function focus_holidays() {
 
// Set UI labels for Custom Post Type
  $labels2 = array(
    'name'                => _x( 'Holidays', 'Post Type General Name', 'twentythirteen' ),
    'singular_name'       => _x( 'Holiday', 'Post Type Singular Name', 'twentythirteen' ),
    'menu_name'           => __( 'Holidays', 'twentythirteen' ),
    'parent_item_colon'   => __( 'Parent Holiday', 'twentythirteen' ),
    'all_items'           => __( 'All Holidays', 'twentythirteen' ),
    'view_item'           => __( 'View Holiday', 'twentythirteen' ),
    'add_new_item'        => __( 'Add New Holiday', 'twentythirteen' ),
    'add_new'             => __( 'Add New', 'twentythirteen' ),
    'edit_item'           => __( 'Edit Holiday', 'twentythirteen' ),
    'update_item'         => __( 'Update Holiday', 'twentythirteen' ),
    'search_items'        => __( 'Search Holidays', 'twentythirteen' ),
    'not_found'           => __( 'Not Found', 'twentythirteen' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
  );
     
// Set other options for Custom Post Type
     
  $args2 = array(
    'label'               => __( 'holidays', 'twentythirteen' ),
    'description'         => __( 'Holiday Closings', 'twentythirteen' ),
    'labels'              => $labels2,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', ),
    // You can associate this CPT with a taxonomy or custom taxonomy. 
    'taxonomies'  => array( 'category', 'genres' ),
    
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */ 
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
     
// Registering your Custom Post Type
  register_post_type( 'holidays', $args2 );
 
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'focus_holidays', 0 );


function bt_custom_excerpt_length( $length ) {
return 15;
}
add_filter( 'excerpt_length', 'bt_custom_excerpt_length', 999 );


class CSS_Menu_Walker extends Walker {

    private $curItem;

    var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
    
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $sidenav = include 'sidenav.php';
        $navbg = get_the_post_thumbnail_url( $this->curItem );
        if( $depth == 0 ) {
            $output .= "\n$indent<div class='dropdown-menu'><div class='nav-bg'style='background-image:url(".  $navbg . ");'></div><div class='banner-bottom'></div>" . $sidenav . "<ul class='megamenu'>\n";
        }
        if( $depth == 1 ) {
            $output .= "\n$indent<div class='nav-holder-2'><ul class='in-dropdown'>\n";
        }
        
    }
    
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        
        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        /* Add active class */
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
            unset($classes['current-menu-item']);
        }
        
        /* Check for children */
        $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
        if (!empty($children)) {
            $classes[] = 'has-sub';
        }
        if( $depth == 0 ) {
            $classes[] = 'lvl0';
        }
        if( $depth == 1 ) {
            $classes[] = 'lvl1';
        }
        if( $depth == 2 ) {
            $classes[] = 'lvl2';
        }
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li itemprop="name"' . $id . $value . $class_names . '>';
        
        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
       
            
       
        // get thumbnail
         $thumbnail = '';
          if ( has_post_thumbnail( $item->object_id ) and 0 == $depth ) {
            $this->curItem = $item->object_id;
           $thumbnail = get_the_post_thumbnail_url( $item->object_id );
         }

        $format = '%1$s<a class="top-link" itemprop="url"%2$s>%3$s%4$s%5$s</a>%6$s';
        if(!empty($children)) $format = '%1$s<a class="top-link" itemprop="url"%2$s>%3$s%4$s%5$s</a><div class="sub-nav-trigger"><span></span></div>%6$s';
        if( $depth == 1 && !empty($children)) $format = '%1$s<a class="lvl1-link" itemprop="url"%2$s>%3$s%4$s%5$s</a><div class="sub-nav-trigger-1"><span></span></div>%6$s';
        if( $depth == 1 && empty($children)) $format = '%1$s<a class="lvl1-link" itemprop="url"%2$s>%3$s%4$s%5$s</a>%6$s';
        if( $depth == 2 ) $format = '%1$s<a class="lvl2-link" itemprop="url"%2$s>%3$s%4$s%5$s</a>%6$s';
        $item_output = sprintf( $format,
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );

        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}


function main_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-container',
        'container_id'    => 'main-menu',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul class="topnav" itemscope itemtype="http://www.schema.org/SiteNavigationElement">%3$s<li class="lvl0 mobile-extra"><a href="/news" class="top-link">News</a></li><li class="lvl0 mobile-extra"><a href="/locations" class="top-link">Locations</a></li></ul>',
        'depth'           => 0,
        'walker'          => new CSS_Menu_Walker()
        )
    );
}
function footer_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'footer-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu_slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="footer-nav">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}
function side_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'side-dropdown-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'sub-menu-container',
        'container_id'    => '',
        'menu_class'      => 'side-menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="perma-nav">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'main_nav'),
        'side-dropdown-menu' => __('Dropdown Side Menu', 'side_nav'),
        'footer-menu' => __('Footer Menu', 'footer_nav') // Main Navigation
    ));
}

add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu

//Enable Custom Theme Support

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'custom-logo' );
add_theme_support( 'title-tag' );
//Create Widgets if needed


Function create_widget( $name, $id, $description){
$args = array(
  'name'          => __( $name),
  'id'            => $id,
  'description'   => $description,
  'before_widget' => '',
  'after_widget'  => '',
  'before_title'  => '<h5>',
  'after_title'   => '</h5>' 
); 

register_sidebar( $args );

}


create_widget('Sidebar', "sidebar", "Displays in the sidebar on the page template");
create_widget('Middle Footer', "footer_middle", "Displays in the bottom middle of footer");
create_widget('Right Footer', "footer_right", "Displays in the bottom right of footer");



if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'General Settings',
        'menu_title'    => 'General Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    acf_add_options_page(array(
        'page_title'    => 'Rates',
        'menu_title'    => 'Rates',
        'menu_slug'     => 'theme-rates',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}



add_filter('post_class', function($classes){
  global $wp_query;

  if(($wp_query->current_post + 1) == $wp_query->post_count)
    $classes[] = 'last';

  return $classes;
});

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );

add_filter('gettext','custom_enter_title');
function custom_enter_title( $input ) {

    global $post_type;

    if( is_admin() && 'Enter title here' == $input )
        if('testimonials' == $post_type )
            return 'Enter Name Here';
        elseif('staff' == $post_type )
            return 'Enter Name Here';
        elseif('faqs' == $post_type )
            return 'Question';
        elseif('winners' == $post_type )
            return 'Enter Name Here';

    return $input;
}



?>