<?php 
// Starts the engine.
add_action( 'wp_enqueue_scripts', 'brindle_enqueue_styles' );
function brindle_enqueue_styles() {
      wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
      wp_enqueue_style( 'easy-responsive-tabs', get_stylesheet_directory_uri() . '/assets/css/easy-responsive-tabs.css' ); 
      wp_enqueue_style( 'magnific-popup', get_stylesheet_directory_uri() . '/assets/plugins/magnific-popup/magnific-popup.css' );
} 

function brindle_enqueue_scripts() {
        wp_enqueue_script( 'easy-responsive-tabs', get_stylesheet_directory_uri() . '/assets/js/easy-responsive-tabs.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'jquery-scrolltofixed', get_stylesheet_directory_uri() . '/assets/js/jquery-scrolltofixed-min.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script('magnific-popup', get_stylesheet_directory_uri() . '/assets/plugins/magnific-popup/jquery.magnific-popup.min.js', array('jquery'),'1.0',true);
        wp_enqueue_script('all_min', get_stylesheet_directory_uri() . '/assets/js/all.min.js', array('jquery'),'1.0',true);
        wp_enqueue_script('expandable-list', get_stylesheet_directory_uri() . '/assets/js/expandable-list.js', array('jquery'),'1.0',true);
        wp_enqueue_script('main-min', get_stylesheet_directory_uri() . '/assets/js/main.min.js', array('jquery'),'1.0',true);
        
}
add_action( 'wp_enqueue_scripts', 'brindle_enqueue_scripts' );

add_action( 'wp_enqueue_scripts', function() {

    wp_enqueue_style( 'dashicons' );

} );


add_theme_support('editor-styles');
add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_style( 'brindle-pinetop', get_stylesheet_directory_uri() . "/block-editor.css", false, '1.0', 'all' );
} );


add_action('wp_body_open', function() {
	?>
	<div class="generatepress-body-wrapper">
	<?php
});
add_action('generate_after_footer', function() {
	?>
	</div>
	<?php
});


function available_neighborhood_with_out_map_function() {
  ob_start(); 
  include_once(get_stylesheet_directory().'/cpt/show_neighborhood_without_map.php');
  $content = ob_get_clean();
return $content;
   
}

function available_neighborhood_with_map_function() {
  ob_start(); 
  include_once(get_stylesheet_directory().'/cpt/show_neighborhood_with_map.php');
  $content = ob_get_clean();
return $content;
   
}
function available_neighborhood_function() {
  ob_start(); 
  include_once(get_stylesheet_directory().'/cpt/show_neighborhood.php');
  $content = ob_get_clean();
return $content;
   
}
function register_shortcodes(){
   add_shortcode('available-neighborhood', 'available_neighborhood_function');
   add_shortcode('available-neighborhood-with-map', 'available_neighborhood_with_map_function');
   add_shortcode('available-neighborhood-with-out-map', 'available_neighborhood_with_out_map_function');
}
add_action( 'init', 'register_shortcodes');

include_once(get_stylesheet_directory().'/cpt/neighborhood.php');


function year_shortcode () {
$year = date_i18n ('Y');
return $year;
}
add_shortcode ('year', 'year_shortcode');

add_filter( 'generate_typography_default_fonts', function( $fonts ) {
    $fonts[] = 'Gotham';
    $fonts[] = 'Osgard Pro';

    return $fonts;
} );

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
}
require_once get_stylesheet_directory() . '/inc/css-output-child.php';
