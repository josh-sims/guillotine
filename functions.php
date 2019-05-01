<?php
// Remove all default WP template redirects/lookups
remove_action( 'template_redirect', 'redirect_canonical' );

// Redirect all requests to index.php so the Vue app is loaded and 404s aren't thrown
function remove_redirects() {
	add_rewrite_rule( '^/(.+)/?', 'index.php', 'top' );
}
add_action( 'init', 'remove_redirects' );

// Load scripts
function load_vue_scripts() {
	wp_enqueue_script(
		'vuejs-wordpress-theme-starter-js',
		get_stylesheet_directory_uri() . '/dist/scripts/index.min.bundle.js',
		array( 'jquery' ),
		filemtime( get_stylesheet_directory() . '/dist/scripts/index.min.bundle.js' ),
		true
	);

}

add_action( 'wp_enqueue_scripts', 'load_vue_scripts', 100 );

wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
wp_enqueue_style('devwiki', get_stylesheet_directory_uri() . '/dist/styles.css');
wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');
wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );

add_action( 'rest_api_init', 'get_all_posts' );   

function get_all_posts() {
  register_rest_route( 'myroutes', '/get-all-posts', array(
      'methods' => 'GET',
      'callback' => 'get_all_posts_callback',
  ));
}

function get_all_posts_callback( $request ) {

    // Will have to instantiate for each function because scope doesn't reach outside
    $post_types = array(
        'post',
        'page'
    );

    $post_types_names= array(
        'Post',
        'Page'
    );

    // Initialize the array that will receive the posts' data. 
    $posts_data = array();

    // foreach($post_types as $key=>$type){
        $posts = get_posts( array(
            // 'category_name'     => $category,
            'posts_per_page'    => -1,           
            'post_type'         => $post_types,
            )
        );

        if ( ! empty( $posts ) ) {
            // $item = (object)array();
            // $item->type = get_post_type_object($type)->label;
            // $item->posts = array();
            // $item->color = $type_colors[$key];
            

            foreach( $posts as $post){
                $id = $post->ID; 

                    setup_postdata( $id );
                
                    $item = (object)array();
                    $post_url = get_the_permalink($id);
                    $item_post_date = get_post_meta($id, 'item_postdate', true);
                    $item_excerpt = get_the_excerpt($id);

                    
                    $item = (object) array( 
                        'url' => $post_url, 
                        'title' => str_replace("amp;","", $post->post_title),
                        'excerpt' => $item_excerpt,
                        'date' => get_the_date( 'M j, y', $id )
                    );

                    $posts_data[] = $item;


              
            }

        
        
        } else {
           //No post found
        }
    // }

    return $posts_data;                   
}

function admin_default_page() {
  return '/';
}

add_filter('login_redirect', 'admin_default_page');